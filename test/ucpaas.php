<?php
require '../vendor/autoload.php';
$obj = new SuperSms\Init();
echo '<pre>';
$param = [
    'class_name' => 'Ucpaas',
    'sid'=>'b8863324f8ff2930c1e83660123bea64',
    'token'=>'827687c60df374a3b8e3af97bfbd184b',
    'appid'=>'781b276e6ed84f79bb0b3f76bf88c492',
    'templateid'=>'576897',
    'param'=>mt_rand(1000,9999),
    'mobile'=>'18210560183',
    'uid'=>'18210560183',
];
$data = $obj->query($param);