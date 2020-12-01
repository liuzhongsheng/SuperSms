<?php
namespace SuperSms\Sms;

use SuperSms\iTemplate\Send;

class Ucpaas implements Send
{
    // 定义返回值信息
    protected $msg = [
        '000000'  => '短信发送成功',
        '100001  账户余额/套餐包余额不足    请及时充值或购买套餐包',
        '100005  发送请求的IP不在白名单内   访问IP不在白名单之内，可在后台 应用管理→点击需要设置的应用→编辑→服务器白名单 里添加该IP',
        '100008  手机号码不能为空    请输入标准的国内手机号码',
        '100009  手机号为受保护的号码  不可向该号码发送短信',
        '100015  号码不合法   请输入标准的国内手机号码',
        '100016  账号余额被冻结 请联系客服',
        '100017  余额已注销   请联系客服',
        '100019  应用可用额度余额不足  调大应用可用余额，后台→应用管理→可用额度',
        '100699  系统内部错误  请联系客服',
        '101105  主账户sid存在非法字符    可在后台首页获取“Account Sid”',
        '101108  开发者账户已注销    请联系客服',
        '101109  主账户sid未激活   请联系客服',
        '101110  主账户sid已锁定   请联系客服',
        '101111  主账户sid不存在   可在后台首页获取“Account Sid”',
        '101112  主账户sid为空    可在后台首页获取“Account Sid”',
        '101117  缺少token参数或参数为空  参数token，可从后台首页获取“Auth Token”',
        '102100  应用appid为空   获取路径后台→应用管理→点击需要对接应用，查看appId',
        '102101  应用appid存在非法字符   获取路径后台→应用管理→点击需要对接应用，查看appId',
        '102102  应用appid不存在  获取路径后台→应用管理→点击需要对接应用，查看appId',
        '102103  应用未上线   请先上线应用',
        '102105  应用appid不属于该主账号  获取路径后台→应用管理→点击需要对接应用，查看appId',
        '103126  未上线应用只能使用白名单中的号码    申请应用上线，或者将该号码加入测试白名单，可在后台应用管理→应用测试→添加号码，添加该手机号码',
        '105110  该appid下，此短信模板(templateid)不存在    可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID',
        '105111  短信模板(templateid)未审核通过   等待审核，工作日时间内审核时间为15分钟。如审核不通过可咨询在线客服',
        '105112  请求的参数(param)与模板上的变量数量不一致    参数param上的数量与模板中的变量数量不一致，多个参数使用英文逗号隔开（如：param=“a,b,c”）',
        '105113  短信模板(templateid)不能为空    可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID',
        '105115  短信类型(type)长度应为1个字符  短信类型错误，类型：0:通知短信、5:会员服务短信、4:验证码短信(此类型content内必须至少有一个参数{1})',
        '105117  短信模板(templateid)含非法字符   可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID',
        '105118  短信模板有替换内容，但缺少param参数或参数为空   请按照param的规则提供参数值',
        '105119  每个参数的长度不能超过100字 减少参数长度',
        '105120  群发号码单次提交不能超过100个    减少单次群发号码，将号码限制为100各以内',
        '105121  短信模板(templateid)已删除 已被删除，请重新创建模板',
        '105124  短信模板内容为空    填写模板内容',
        '105125  创建短信模板失败    联系客服',
        '105126  短信模板名称格式错误  短信模板名称，限20位长度',
        '105128  短信模板(templateid)不能为空    可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID',
        '105133  短信内容过长，超过500字   减少短信长度',
        '105134  参数(param)中含有超过一对【】  短信内容只能包含一对【】且不能只有短信签名，短信签名只能在开头或结尾',
        '105135  参数(param)中含有特殊符号    参数中不能含有特殊符号，例如“【】”',
        '105136  签名长度应为2到12位 签名长度为2到12位',
        '105138  群发号码重复  对群发号码去重',
        '105140  账号未认证   请先申请认证，后台→账号设置',
        '105141  主账号需为企业认证   请升级认证为企业开发者，后台→账号设置',
        '105142  模板被定时群发任务锁定暂无法修改    停止占用该模板的定时群发任务',
        '105143  模板不属于该用户    请填写正确的模板ID，可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID',
        '105144  创建验证码模板短信需带参数   当type=4时类型为验证码模板，需要带至少一个参数{1}',
        '105145  签名(autograph)格式错误   限2-12个汉字、英文字母和数字，不能纯数字',
        '105146  短信类型(type)错误    短信类型错误，类型：0:通知短信、5:会员服务短信、4:验证码短信(此类型content内必须至少有一个参数{1})',
        '105147  对同个号码发送短信超过限定频率 查看是否被盗刷接口，客户端侧需要增加图片/滑块验证码，如您是用于告警等合法场景，请联系客服',
        '105150  短信发送频率过快    降低请求发起频率',
        '105152  请求的参数(param)格式错误    请使用utf-8',
        '105153  手机号码格式错误    请输入标准的国内手机号码',
        '105154  短信服务请求异常e100    请联系客服',
        '105155  缺少签名(autograph)参数或参数为空  请提供签名,建议使用公司名/APP名/网站名',
        '105156  查询短信类型错误    查询的短信类型，默认为0，获取验证通知及会员营销短信记录；1，只获取验证通知类短信；2，只能获取会员营销短信记录。',
        '105157  变量数量超过100个  减少变量数量',
        '105158  接口不支持GET方式调用    请按提示或者文档说明的方法调用，一般为POST',
        '105159  接口不支持POST方式调用   请按提示或者文档说明的方法调用，一般为GET',
        '105161  开始时间错误  短信发送结束时间,格式YYYYMMDDhhmmss',
        '105162  结束时间错误  短信发送开始时间,格式YYYYMMDDhhmmss，结束时间不能早于开始时间',
        '105163  超过可查询时间范围   暂时只能查询一天的数据',
        '105164  页码错误    请不要超出总页数',
        '105165  每页个数错误，限制访问(1-100)  每页可获取的数量为1-100个',
        '105166  请求频率过快  降低请求频率',
        '105167  uid格式错误或超过60位   不要使用特殊符号，并且长度控制在60位内',
        '105168  参数sid或token错误   sid和token从后台首页获取“Auth Token”，“Account Sid”',
        '105169  超过页码数   减少页码数',
        '300001  提交失败    请联系客服',
        '300002  未知  请联系客服',
        '300003  空号  请核对手机号码',
        '300004  黑名单 请联系客服',
        '300005  超频  按限定的提交频率提交短信。同一个手机号1分钟内不能超过2条，24小时内验证类不能超过8条，通知类不能超过10条',
        '300006  系统忙 请联系客服',
    ];

    // 定义接口请求地址
    protected $api = 'https://open.ucpaas.com/';
    public function send($param)
    {
        $sendurl = $this->api . "ol/sms/sendsms";
        $param = [
            'sid'=>$param['sid'],
            'token'=>$param['token'],
            'appid'=>$param['appid'],
            'templateid'=>$param['templateid'],
            'param'=>$param['param'],
            'mobile'=>$param['mobile'],
            'uid'=>$param['uid'],
        ];
        $body = json_encode($param);
        $result = $this->getResult($sendurl, $body,'post');
        $result = json_decode($result,true);
        if ($result['code'] != '000000') {
            return [
                'success' => false,
                'message' => 'error: 错误码'.$result['code'].' '.$this->msg[$result['code']],
            ];
        }
        return [
            'succcss' => true,
            'message' => '消息发送成功',
        ];
    }
    private function getResult($url, $body = null, $method)
    {
        $data = $this->connection($url,$body,$method);
        if (isset($data) && !empty($data)) {
            $result = $data;
        } else {
            $result = '没有返回数据';
        }
        return $result;
    }
    private function connection($url, $body,$method)
    {
        if (function_exists("curl_init")) {
            $header = array(
                'Accept:application/json',
                'Content-Type:application/json;charset=utf-8',
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            if($method == 'post'){
                curl_setopt($ch,CURLOPT_POST,1);
                curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            curl_close($ch);
        } else {
            $opts = array();
            $opts['http'] = array();
            $headers = array(
                "method" => strtoupper($method),
            );
            $headers[]= 'Accept:application/json';
            $headers['header'] = array();
            $headers['header'][]= 'Content-Type:application/json;charset=utf-8';

            if(!empty($body)) {
                $headers['header'][]= 'Content-Length:'.strlen($body);
                $headers['content']= $body;
            }

            $opts['http'] = $headers;
            $result = file_get_contents($url, false, stream_context_create($opts));
        }
        return $result;
    }
}
