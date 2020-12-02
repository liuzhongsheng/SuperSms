<?php
require '../vendor/autoload.php';
$obj = new SuperSms\Init();
echo '<pre>';
$param = [
    'class_name' => 'Ucpaas',
    'sid'=>'',
    'token'=>'',
    'appid'=>'',
    'templateid'=>'',
    'param'=>mt_rand(1000,9999),
    'mobile'=>'',
    'uid'=>'',
];
$data = $obj->query($param);

echo '<Pre>';
print_r($data);