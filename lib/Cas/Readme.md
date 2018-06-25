# CAS - 统一身份认证

## 说明

使用Laravel默认的Auth模块，通过社团Cas Proxy Server接入学校CAS统一身份认证  

详细的Auth方法参考Laravel文档：
- [Laravel Docs - Authentication](https://laravel.com/docs/5.4/authentication)
- [Laravel 学院 - [ Laravel 5.4 文档 ] 安全 —— 用户认证](http://laravelacademy.org/post/6803.html)

## 使用方法

1. 根据需要，在`.env`文件中配置相应变量

```ini
XJTUANA_CAS_PROXY_PROTOCOL=
XJTUANA_CAS_PROXY_HOSTNAME=
XJTUANA_CAS_PROXY_PREFIX=
XJTUANA_CAS_PROXY_VERSION=
```

2. 使用CasUserProvider

在`app/Providers/AuthServiceProvider.php`中的`boot()`下，加入：
```php
Auth::provider('cas', function($app, array $config) {
    return new \Xjtuana\Cas\Auth\CasUserProvider($config['model']);
});
```

3. 创建用户模型Model

Eloquent用户模型`User`改为继承`Xjtuana\Cas\Auth\CasUser`
```php
namespace App\Models;
...
class User extends \Xjtu\Cas\Auth\CasUser {
  ...
}

```

4. 修改认证配置

在`config/auth.php`中，修改`providers.users`

 ```php
'users' => [
    'driver' => 'cas',
    'model' => App\Models\User::class, // 替换为你的User Model
],
 ```

5. 使用
 
通过 `Auth` Facade 和 `CasProxy` Facade 进行CAS验证等操作

示例登录流程：
- `Auth::guest()`判断是否登录Laravel应用
- 若未登录，则调用`CasProxy::login()`进行登录，并获取用户名
- 通过`$request->session()->regenerate()`重置session
- 通过`Auth::attempt(['netid' => $netid])`进行登录
- 登录后即可在应用中通过`Auth::user()`获取用户模型，通过`Auth::id()`获取用户NETID