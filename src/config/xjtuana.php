<?php

return [
    
    /**
     * Cas相关配置
     */
    'cas' =>  [
        'proxy' => [
            'version'  => env('XJTUANA_CAS_PROXY_VERSION', 'v1'),
            'hostname' => env('XJTUANA_CAS_PROXY_HOSTNAME', null),
            'prefix'   => env('XJTUANA_CAS_PROXY_PREFIX', null),
            'protocol' => env('XJTUANA_CAS_PROXY_PROTOCOL', 'https'),
        ],
    ],

    /**
     * Web Service相关配置
     */
    'ws' => [
        /**
         * 获取用户信息
         */
        'userinfo' => [
            'url'  => env('XJTUANA_WS_USERINFO_URL', null),
            'auth' => env('XJTUANA_WS_USERINFO_AUTH', null),
        ],

        /**
         * 获取用户照片
         */
        'userphoto' => [
            'url'  => env('XJTUANA_WS_USERPHOTO_URL', null),
            'auth' => env('XJTUANA_WS_USERPHOTO_AUTH', null),
        ],

        /**
         * 发送短信
         */
        'sms' => [
            'url'  => env('XJTUANA_WS_SMS_URL', null),
            'usr'  => env('XJTUANA_WS_SMS_USER', null),
            'pwd'  => env('XJTUANA_WS_SMS_PWD', null),
        ]

    ],

    /**
     * API相关配置
     */
    
    'api' => [
        'pppoelog' => [
            'url' => env('XJTUANA_API_PPPOELOG_URL', null),
        ],
        'sms' => [
            'url' => env('XJTUANA_API_SMS_URL', null),
            'accountID' => env('XJTUANA_API_SMS_ACCOUNT_ID', null),
            'accountKey' => env('XJTUANA_API_SMS_ACCOUNT_KEY', null),
            'channelIds' => env('XJTUANA_API_SMS_CHANNEL_ID', null),
        ],
    ],

];
