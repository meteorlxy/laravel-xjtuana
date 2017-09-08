# WS - Webservice

## 说明

为方便使用学校提供的WebService而开发。

目前支持：查询用户信息、查询用户照片、发送短信。

想要使用这些接口，需要自行向网络中心申请使用权。

## 使用方法

### 1. 注册ServiceProvider & Facade

在`config/app.php`的`providers`下，加入：

```php
Xjtuana\XjtuWs\XjtuWsServiceProvider::class,
```

在`config/app.php`的`aliases`下，加入：

```php
'WsUserInfo' => Xjtuana\XjtuWs\Facades\XjtuWsUserInfo::class,
'WsUserPhoto' => Xjtuana\XjtuWs\Facades\XjtuWsUserPhoto::class,
'WsSms' => Xjtuana\XjtuWs\Facades\XjtuWsSms::class,
```

### 2. 配置

运行以下命令生成配置文件

```shell
php artisan vendor:publish --provider="Xjtuana\XjtuWs\XjtuWsServiceProvider"
```

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

### 3. 使用

通过上述注册的 Facade 进行使用

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