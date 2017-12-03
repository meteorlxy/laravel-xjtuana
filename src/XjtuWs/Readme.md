# WS - Webservice

## 说明

为方便使用学校提供的WebService而开发。

目前支持：查询用户信息、查询用户照片、发送短信。

想要使用这些接口，需要自行向网络中心申请使用权。

## 使用方法


根据需要，在`.env`文件中配置相应变量

```ini
XJTUANA_WS_USERINFO_URL=
XJTUANA_WS_USERINFO_AUTH=
XJTUANA_WS_USERPHOTO_URL=
XJTUANA_WS_USERPHOTO_AUTH=
XJTUANA_WS_SMS_URL=
XJTUANA_WS_SMS_USER=
XJTUANA_WS_SMS_PWD=
```

`SoapClient`附加配置：

在`config/xjtuana.php`的`ws`模块下，`options`为可选添加到`SoapClient`中的`options`选项

> http://php.net/manual/en/soapclient.soapclient.php


通过注册的 Facade 进行使用

示例代码：

```php
try {
    if ( empty($userinfo = \WsUserInfo::getByNetid($netid)) ) {
        return false;
    }
} catch(\Exception $e) {
    return false;
}
dd($userinfo);
```