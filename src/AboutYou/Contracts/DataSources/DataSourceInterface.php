<?php

namespace AboutYou\Contracts\DataSources;


interface DataSourceInterface
{
    public function getCategoryById($id);

    public function getCategoryByName($name);
}