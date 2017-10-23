<?php

namespace Xjtuana;

use Illuminate\Support\ServiceProvider;

/**
 * Class XjtuWsServiceProvider.
 * 为Laravel提供WebService相关服务
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 * @see /config/app.php
 *
 * @example 	1.运行php artisan vendor:publish自动生成config/xjtuana.php文件；
 *			  			或者手动将config目录下的xjtuana.php放入Laravel的config目录。
 *			  			然后在.env中设置对应的变量。
 *						2.在config/app.php中，将该类注册进providers中
 *
 */
class XjtuanaServiceProvider extends ServiceProvider {

    /**
	 * Bootstrap the application.
	 *
	 * @return void
	 */
	public function boot()
	{
	    $this->publishes([
            __DIR__.'/config/xjtuana.php' => config_path('xjtuana.php'),
	    ], 'config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
			$this->app->singleton('xjtuana.cas.proxy', function($app) {
					$config = $app->config['xjtuana.cas.proxy'];
					switch($config['version']) {
							case 'v1':
							default:
									$client = \Xjtuana\Cas\ProxyClient\ClientV1::class;
					}
					return new $client($config);
			});
			
			$this->app->singleton('xjtuana.ws.userinfo', function($app) {
				 return new \Xjtuana\XjtuWs\WebService\WsUserInfo($app->config['xjtuana.ws.userinfo']);
			});
	
	    $this->app->singleton('xjtuana.ws.userphoto', function($app) {
				 return new \Xjtuana\XjtuWs\WebService\WsUserPhoto($app->config['xjtuana.ws.userphoto']);
			});
	
	    $this->app->singleton('xjtuana.ws.sms', function($app) {
				 return new \Xjtuana\XjtuWs\WebService\WsSms($app->config['xjtuana.ws.sms']);
			});
			
			$this->app->singleton('xjtuana.api.pppoelog', function($app) {
				 return new \Xjtuana\XjtuApi\Api\ApiPppoeLog($app->config['xjtuana.api.pppoelog']);
			});
			
			$this->app->singleton('xjtuana.api.sms', function($app) {
				 return new \Xjtuana\XjtuApi\Api\ApiSms($app->config['xjtuana.api.sms']);
			});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
			return [
					'xjtuana.cas.proxy',
					'xjtuana.ws.userinfo',
					'xjtuana.ws.userphoto',
					'xjtuana.ws.sms',
					'xjtuana.api.pppoelog',
			];
	}
}