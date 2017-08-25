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

];
