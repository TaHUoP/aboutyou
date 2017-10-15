<?php

use AboutYou\Validators\Validator;

require __DIR__  . '/../../../vendor/autoload.php';

$rules = [
    'isDefault' => 'bool|required',
    'isAvailable' => 'bool|required',
    'quantity' => 'numeric|required|positive',
    'size' => 'validSize',
];

$data = [
    'isAvailable' => true,
    'isDefault' => true,
    'size' => 'XXXXXXL',
    'quantity' => -1,
];;

Validator::validate($data, $rules);