<?php

namespace Xjtuana\XjtuWs;

use Illuminate\Support\ServiceProvider;

/**
 * Class XjtuWsServiceProvider.
 * 为Laravel提供WebService相关服务
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
class XjtuWsServiceProvider extends ServiceProvider {

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
			$this->app->singleton('xjtuana.ws.userinfo', function($app) {
				 return new \Xjtuana\XjtuWs\WebService\WsUserInfo($app->config['xjtuana.ws.userinfo']);
			});
	
	    $this->app->singleton('xjtuana.ws.userphoto', function($app) {
				 return new \Xjtuana\XjtuWs\WebService\WsUserPhoto($app->config['xjtuana.ws.userphoto']);
			});
	
	    $this->app->singleton('xjtuana.ws.sms', function($app) {
				 return new \Xjtuana\XjtuWs\WebService\WsSms($app->config['xjtuana.ws.sms']);
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
					'xjtuana.ws.userinfo',
					'xjtuana.ws.userphoto',
					'xjtuana.ws.sms',
			];
	}
}