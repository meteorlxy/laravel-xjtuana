<?php

namespace Xjtuana\Cas\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

/**
 * Class CasUserProvider.
 * 相比于Laravel默认提供的EloquentUserProvider类，去掉了密码相关的方法
 *
 * @author liuxinyu <meteor.lxy@foxmail.com>
 *
 * @see \Illuminate\Auth\EloquentUserProvider
 * @see \App\Providers\AuthProvider
 * @see /config/auth.php
 *
 * @example 1.在AuthProvider中扩展此provider
 *          2.在config/auth.php中，将providers下使用的driver改为1中设置的名称
 *
 */
class CasUserProvider implements UserProvider {

    /**
     * The Eloquent user model.
     *
     * @var string
     */
    protected $model;

    /**
     * Create a new database user provider.
     *
     * @param  \Illuminate\Contracts\Hashing\Hasher  $hasher
     * @param  string  $model
     * @return void
     */
    public function __construct($model) {
        $this->model = $model;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier) {
        $model = $this->createModel();

        return $model->where($model->getAuthIdentifierName(), $identifier)->first();
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token) {
        $model = $this->createModel();

        return $model->newQuery()
            ->where($model->getAuthIdentifierName(), $identifier)
            ->where($model->getRememberTokenName(), $token)
            ->first();
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(UserContract $user, $token) {
        $user->setRememberToken($token);

        $timestamps = $user->timestamps;

        $user->timestamps = false;

        $user->save();

        $user->timestamps = $timestamps;
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials) {
        if (empty($credentials)) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            $query->where($key, $value);
        }

        return $query->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials) {
        return true;
    }

    /**
     * Create a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createModel() {
        $class = '\\'.ltrim($this->model, '\\');
        return new $class;
    }

    /**
     * Gets the name of the Eloquent user model.
     *
     * @return string
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * Sets the name of the Eloquent user model.
     *
     * @param  string  $model
     * @return $this
     */
    public function setModel($model) {
        $this->model = $model;
        return $this;
    }
}

