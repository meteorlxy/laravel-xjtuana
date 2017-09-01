# Laravel Xjtuana

XJTUANA development package for Laravel

Site: https://ana.xjtu.edu.cn

Authors:
- meteorlxy - [meteor.lxy@foxmail.com]

## Introduction 简介

### CAS模块

- 通过[xjtuana/cas-proxy-client](https://git.xjtuana.com/XJTUANA/cas-proxy-client-php)，结合[xczh/cas-proxy](https://git.xjtuana.com/xczh/cas-proxy)进行CAS代理认证
- 通过Laravel的`Eloquent模型`和`用户认证`，配置使用CAS的用户登录认证流程

### WS模块

- 快速使用学校的相应Webservice接口
- 目前支持：查询用户信息、查询用户照片、发送短信
- 需要向网络信息中心申请使用权限



## Usgae 使用方法

### 1. 通过Composer引入（[Packagist](https://packagist.org/packages/xjtuana/laravel-xjtuana)）

```
composer require xjtuana/laravel-xjtuana ~1.0
```

### 2. 注册ServiceProvider & Facade

** 可以通过`Xjtuana\XjtuanaServiceProvider`配置所有模块，也可以根据需要的子模块，使用其中提供的`ServiceProvider`分别配置 **

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

### 3. 配置

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

### 4. 具体模块配置和使用

- [CAS模块](./src/Cas/Readme.md)
- [Ws模块](./src/Ws/Readme.md)
