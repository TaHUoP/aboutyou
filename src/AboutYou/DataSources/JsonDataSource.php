<?php

namespace AboutYou\DataSources;


use AboutYou\Contracts\DataSources\DataSourceInterface;
use AboutYou\Factories\EntityFactory;

class JsonDataSource implements DataSourceInterface
{
    /*
     * Entire configuration class is not necessary for only one parameter (at least for now)
     */
    const DATA_DIR = '..' . DIRECTORY_SEPARATOR . 'data';

    /**
     * Maps from category name to the id for the category service.
     *
     * @var array
     */
    private $categoryNameToIdMapping;

    /**
     * @var EntityFactory
     */
    private $entityFactory;

    /**
     * @param EntityFactory $entityFactory
     */
    public function __construct(EntityFactory $entityFactory)
    {
        $this->entityFactory = $entityFactory;

        $this->categoryNameToIdMapping = $this->getNameToIdMapping();
    }

    /**
     * @return array
     */
    private function getNameToIdMapping()
    {
        foreach (glob(self::DATA_DIR . DIRECTORY_SEPARATOR . '[0-9]*.json') as $file){
            $mapping[json_decode(file_get_contents($file))->name] = basename($file, '.json');
        }

        return $mapping;
    }

    /**
     * @param string $className
     *
     * @return string
     */
    private function makeClassName($className)
    {
        /*
         * This method won't work for multi word class names and for names whose plural form differs from plain 's' suffix.
         * I'm a huge fan of universal solutions, but I was advised not to over-engineer it.
         */
        return substr($className, -1) == 's' ? substr(ucfirst($className), 0, -1) : ucfirst($className);
    }

    /**
     * @param string $json
     * @param string $className
     * @param array $defaults
     *
     * @return object|array
     */
    private function map($json, $className, $defaults = [])
    {
        $data = json_decode($json);

        if(\AboutYou\Utilities\Helpers\is_collection($data)){
            $item = [];

            foreach($data as $id => $object){
                $item[]= $this->map(json_encode($object), $className, ['id' => $id]);
            }
        }else{
            $item = $this->entityFactory->make($className);

            foreach ($defaults as $prop => $value){
                $item->{$prop} = $value;
            }

            foreach($data as $prop => $value){
                if(\AboutYou\Utilities\Helpers\is_scalar($value)){
                    $item->{$prop} = $value;
                } else {
                    $item->{$prop} = $this->map(json_encode($value), $this->makeClassName($prop));
                }
            }
        }

        return $item;
    }

    /**
     * @inheritdoc
     */
    public function getCategoryById($id)
    {
        $category_data = file_get_contents(sprintf('%s' . DIRECTORY_SEPARATOR . '%d.json', self::DATA_DIR, $id));

        return $this->map($category_data, 'Category');
    }

    /**
     * @inheritdoc
     */
    public function getCategoryByName($name)
    {
        if (!isset($this->categoryNameToIdMapping[$name]))
        {
            throw new \InvalidArgumentException(sprintf('Given category name [%s] is not mapped.', $name));
        }

        return $this->getCategoryById($this->categoryNameToIdMapping[$name]);
    }
}