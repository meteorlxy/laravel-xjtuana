<?php

return [

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
