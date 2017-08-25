<?php

namespace Xjtuana\Ws\WebService;

use SoapClient;
use SoapFault;
use Xjtuana\Ws\XjtuanaWsException;


/**
 * Class Sms.
 * 发送短信的Web Service
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 * @example 
 *          try {
 *              $sms = resolve('xjtu.ws.sms')
 *              if ($sms->send('17777777777,18888888888', '短信内容')) {
 *                  ....send fail....
 *              } 
 *          } catch (\Exception $e) {
 *              ....Log/throw....
 *          }
 *
 */
class Sms {

    /**
     * The soap client used by the webservice.
     *
     * @var \SoapClient
     */
    protected $soap;

    /**
     * 调用该webservice需要的用户名.
     *
     * @var string
     */
    protected $usr;

    /**
     * 调用该webservice需要的密码.
     *
     * @var string
     */
    protected $pwd;

    /**
     * 构造函数，传入config数组.
     *
     * @param  array    $config 
     *
     * @return void
     * @throws XjtuanaWsException
     */
    public function __construct(array $config) {
        if (is_null($config['url']) || is_null($config['usr']) || is_null($config['pwd'])) {
            throw new XjtuanaWsException('The config of '.__CLASS__.' service is not complete.');
        }
        $this->soap = new SoapClient($config['url']);
        $this->soap->soap_defencoding = 'utf-8';
        $this->soap->xml_encoding = 'utf-8';
        $this->usr = $config['usr'];
        $this->pwd = $config['pwd'];
    }

    /**
     * 发送短信.
     *
     * @param  string   $mobile     目标手机号，可用多个半角逗号隔开
     * @param  string   $content    短信内容
     *
     * @return int
     */
    public function send($mobile, $content) {
        try {
            $result = $this->soap->sendMsg([
                'in0' => $this->usr,
                'in1' => $this->pwd,
                'in2' => $mobile,
                'in3' => $content,
            ]);
        } catch (SoapFault $e) {
            throw $e;
        }

        return $this->parseResult($result);
    }

    /**
     * 处理webservice返回的结果
     *
     * @param  mixed    $result 
     *
     * @return int
     * @throws XjtuanaWsException
     */
    protected function parseResult($result) {
 
        if (! property_exists($result, 'out')) {
            throw new XjtuanaWsException('Invalid response from web service server.');
        }

        $result = $result->out;

        return $result;
    }

}