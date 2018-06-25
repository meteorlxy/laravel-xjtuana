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
            'config' => [
                'auth' => env('XJTUANA_WS_USERINFO_AUTH', null),
            ],
            'options' => [
            ],
        ],

        /**
         * 获取用户照片
         */
        'userphoto' => [
            'url'  => env('XJTUANA_WS_USERPHOTO_URL', null),
            'config' => [
                'auth' => env('XJTUANA_WS_USERPHOTO_AUTH', null),
            ],
            'options' => [
            ],
        ],

        /**
         * 发送短信
         */
        'sms' => [
            'url'  => env('XJTUANA_WS_SMS_URL', null),
            'config' => [
                'usr'  => env('XJTUANA_WS_SMS_USER', null),
                'pwd'  => env('XJTUANA_WS_SMS_PWD', null),
            ],
            'options' => [
            ],
        ]

    ],

    /**
     * API相关配置
     */
    
    'api' => [
        'networklog' => [
            'url' => env('XJTUANA_API_NETWORKLOG_URL', null),
            'config' => [
            ],
            'options' => [
            ],
        ],
        'sms' => [
            'url' => env('XJTUANA_API_SMS_URL', null),
            'config' => [
                'accountID' => env('XJTUANA_API_SMS_ACCOUNT_ID', null),
                'accountKey' => env('XJTUANA_API_SMS_ACCOUNT_KEY', null),
                'channelIds' => env('XJTUANA_API_SMS_CHANNEL_ID', null),
            ],
            'options' => [
            ],
        ],
    ],

];
