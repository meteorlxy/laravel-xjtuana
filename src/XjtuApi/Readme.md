# API

## 说明

为方便使用学校提供的API而开发。

目前支持：查询用户PPPOE日志。

想要使用这些接口，需要自行向网络中心申请使用权。

## 使用方法

### 1. 注册ServiceProvider & Facade

在`config/app.php`的`providers`下，加入：

```php
Xjtuana\XjtuApi\XjtuApiServiceProvider::class,
```

在`config/app.php`的`aliases`下，加入：

```php
'PppoeLog' => Xjtuana\XjtuApi\Facades\XjtuApiPppoeLog::class,
```

### 2. 配置

运行以下命令生成配置文件

```shell
php artisan vendor:publish --provider="Xjtuana\XjtuWs\XjtuApiServiceProvider"
```

根据需要，在`.env`文件中配置相应变量

```ini
XJTUANA_API_PPPOELOG_URL=
```

### 3. 使用

通过上述注册的 Facade 进行使用

示例代码：

```php
$pppoelog = \PppoeLog::getByUsername($username);
dd($pppoelog);
```