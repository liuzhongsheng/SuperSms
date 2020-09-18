<?php
namespace SuperSms\Sms;

use SuperSms\iTemplate\Send;

class Smsbao implements Send
{
    // 定义返回值信息
    protected $msg = [
        '0'  => '短信发送成功',
        '-1' => '参数不全',
        '-2' => '服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！',
        '30' => '密码错误',
        '40' => '账号不存在',
        '41' => '余额不足',
        '42' => '帐户已过期',
        '43' => 'IP地址限制',
        '50' => '内容含有敏感词',
    ];

    // 定义接口请求地址
    protected $api = 'http://api.smsbao.com/';
    public function send($param)
    {
        $sendurl = $this->api . "sms?u=" . $param['user'] . "&p=" . md5($param['password']) . "&m=" . $param['phone'] . "&c=" . urlencode($param['content']);
        $result  = file_get_contents($sendurl);
        if ($result != 0) {
            return [
                'success' => false,
                'message' => $this->msg[$result],
            ];
        }
        return [
            'succcss' => true,
            'message' => '消息发送成功',
        ];
    }
}
