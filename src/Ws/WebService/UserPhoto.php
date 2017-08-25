<?php

namespace Xjtuana\Ws\WebService;

use SoapClient;
use SoapFault;
use Xjtuana\Ws\XjtuanaWsException;


/**
 * Class UserPhoto.
 * 获取用户照片的Web Service
 * 默认获取的是照片的base64编码，可直接通过<img>标签显示
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 * @example 
 *          try {
 *              $userphoto = resolve('xjtu.ws.userphoto')
 *              $photo = $userphoto->getByUserno('2120405015');
 *          } catch (\Exception $e) {
 *              ....Log/throw....
 *          }
 *
 */
class UserPhoto {

    /**
     * The soap client used by the webservice.
     *
     * @var \SoapClient
     */
    protected $soap;

    /**
     * 调用该webservice需要的凭证.
     *
     * @var string
     */
    protected $auth;

    /**
     * 构造函数，传入config数组.
     *
     * @param  array    $config 
     *
     * @return void
     * @throws XjtuanaWsException
     */
    public function __construct(array $config) {
        if (is_null($config['url']) || is_null($config['auth'])) {
            throw new XjtuanaWsException('The config of '.__CLASS__.' service is not complete.');
        }
        $this->soap = new SoapClient($config['url']);
        $this->auth = $config['auth'];
    }

    /**
     * 根据用户学工号查询照片.
     *
     * @param  string   $userno 
     *
     * @return string
     * @throws XjtuanaWsException
     */
    public function getByUserno($userno) {
        try {
            $result = $this->soap->getPhotoByNo([
                'auth'  => $this->auth,
                'sno'   => $userno
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
     * @return string   base64
     * @throws XjtuanaWsException
     */
    protected function parseResult($result) {
 
        if (! property_exists($result, 'return')) {
            throw new XjtuanaWsException('Invalid response from web service server.');
        }

        $result = $result->return;

        return base64_encode($result);
    }

}