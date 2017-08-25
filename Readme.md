# Laravel Xjtuana

XJTUANA development package for Laravel

Site: https://ana.xjtu.edu.cn

Authors:
- meteorlxy - [meteor.lxy@foxmail.com]

## Usgae 使用方法

** 可以通过`Xjtuana\XjtuanaServiceProvider`配置所有模块，也可以根据需要的子模块，使用其中提供的`ServiceProvider`分别配置 **

### 1. 注册ServiceProvider & Facade

在`config/app.php`的`providers`下，加入：

```php
Xjtuana\XjtuanaServiceProvider::class,
```

在`config/app.php`的`aliases`下，加入：

```php
'CasProxy' => Xjtuana\Cas\Facades\XjtuanaCasProxy::class,
'WsUserInfo' => Xjtuana\Ws\Facades\XjtuanaWsUserInfo::class,
'WsUserPhoto' => Xjtuana\Ws\Facades\XjtuanaWsUserPhoto::class,
'WsSms' => Xjtuana\Ws\Facades\XjtuanaWsSms::class,
```

### 2. 配置

运行以下命令生成配置文件

```shell
php artisan vendor:publish --provider="Xjtuana\XjtuanaServiceProvider"
```

根据需要，在`.env`文件中配置相应变量

```ini
XJTUANA_CAS_PROXY_PROTOCOL=
XJTUANA_CAS_PROXY_HOSTNAME=
XJTUANA_CAS_PROXY_PREFIX=
XJTUANA_CAS_PROXY_VERSION=

XJTUANA_WS_USERINFO_URL=
XJTUANA_WS_USERINFO_AUTH=
XJTUANA_WS_USERPHOTO_URL=
XJTUANA_WS_USERPHOTO_AUTH=
XJTUANA_WS_SMS_URL=
XJTUANA_WS_SMS_USER=
XJTUANA_WS_SMS_PWD=
```

### 3. 配置和使用细节

- (CAS模块)[./Cas/Readme.md]
- (Ws模块)[./Ws/Readme.md]
