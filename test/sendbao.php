<?php
require '../vendor/autoload.php';
$obj = new SuperSms\Init();
echo '<pre>';
$param = [
    'class_name' => 'Smsbao',
    'user'       => 'swlacn',
    'password'   => 'swlacn',
    'phone'		 => '18210560183',
    'content'    => '这是测试内容',
];
$data = $obj->query($param);