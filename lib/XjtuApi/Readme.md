# API

## 说明

为方便使用学校提供的API而开发。

目前支持：查询用户Network日志、统一消息协作平台（短信接口）。

想要使用这些接口，需要自行向网络中心申请使用权。

## 使用方法

### 1. 配置

根据需要，在`.env`文件中配置相应变量

```ini
XJTUANA_API_NETWORKLOG_URL=

XJTUANA_API_SMS_URL=
XJTUANA_API_SMS_ACCOUNT_ID=
XJTUANA_API_SMS_ACCOUNT_KEY=
XJTUANA_API_SMS_CHANNEL_ID=
```

通过注册的 Facade 进行使用

示例代码：

```php
$networklog = \ApiNetworkLog::getStuPppoeByUsername($username);
dd($networklog);

$networklog = \ApiNetworkLog::getStuWlanByUsername($username);
dd($networklog);

$networklog = \ApiNetworkLog::getWenetPppoeByUsername($username);
dd($networklog);

$sms = \ApiSms::getChannels();
dd($sms);

$sms = \ApiSms::send(['18888888888'], 'sms content');
dd($sms);
```