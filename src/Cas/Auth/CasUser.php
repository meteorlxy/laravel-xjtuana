<?php

namespace Xjtuana\Cas\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;


/**
 * Class CasUser.
 * 相比于Laravel默认提供的User类，去掉了密码相关的方法
 * 由于Netid不作为主键存储，因此修改了其中获取AuthIdentifier的方法
 *
 * @author liuxinyu <meteor.lxy@foxmail.com>
 *
 * @see \Illuminate\Foundation\Auth\User
 * @see \App\Models\User
 * @see /config/auth.php
 *
 * @example 1.User的Eloquent Model继承此类，并设置$authIdentifierName为netid字段
 *          2.在config/auth.php中，将providers下使用的model改为1中实现的User::class
 *
 */
class CasUser extends Model implements 
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * CAS NETID field name
     * NETID在数据库中的字段名称，用于验证CAS登录
     *
     * @var string
     */
    protected $authIdentifierName;

    /**
     * Get the name of the unique identifier for the user.
     * 获取用于CAS登录的用户名字段名称
     *
     * @return string
     */
    public function getAuthIdentifierName() {
        return isset($this->authIdentifierName) ? 
            $this->authIdentifierName : 
            $this->getKeyName();
    }

    /**
     * Get the unique identifier for the user.
     * 获取用于CAS登录的用户名
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->{$this->getAuthIdentifierName()};
    }
}
