<?php

namespace Xjtuana\XjtuApi;

use Illuminate\Support\ServiceProvider;

/**
 * Class XjtuApiServiceProvider.
 * 为Laravel提供WebService相关服务
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 *
 */
class XjtuApiServiceProvider extends ServiceProvider {

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
					'xjtuana.api.pppoelog',
					'xjtuana.api.sms',
			];
	}
}