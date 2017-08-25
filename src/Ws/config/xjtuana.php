<?php

return [

    /**
     * Web Service相关配置
     */
    'ws' => [
        /**
         * 获取用户信息
         */
        'userinfo' => [
            'url'  => env('XJTU_WS_USERINFO_URL', null),
            'auth' => env('XJTU_WS_USERINFO_AUTH', null),
        ],

        /**
         * 获取用户照片
         */
        'userphoto' => [
            'url'  => env('XJTU_WS_USERPHOTO_URL', null),
            'auth' => env('XJTU_WS_USERPHOTO_AUTH', null),
        ],

        /**
         * 发送短信
         */
        'sms' => [
            'url'  => env('XJTU_WS_SMS_URL', null),
            'usr'  => env('XJTU_WS_SMS_USER', null),
            'pwd'  => env('XJTU_WS_SMS_PWD', null),
        ]

    ],

];
