<?php

namespace Xjtuana\Cas;

use Illuminate\Support\ServiceProvider;

/**
 * Class XjtuanaCasServiceProvider.
 * 为Laravel提供Cas相关服务
 *
 * @author meteorlxy <meteor.lxy@foxmail.com>
 */
class XjtuanaCasServiceProvider extends ServiceProvider {

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
			];
	}
}