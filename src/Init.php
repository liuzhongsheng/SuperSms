<?php
namespace SuperSms;
class init
{
	protected $baseParam = null;
	public function query($param,$event='send')
	{
        $className = 'SuperSms\\Sms\\' . $param['class_name'];
        unset($param['class_name']);
        $obj       = new $className();
        return $obj->$event($param);
	}
}