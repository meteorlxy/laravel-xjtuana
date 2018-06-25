<?php 

namespace Xjtuana\HealthCheck\Facades;

use Illuminate\Support\Facades\Facade;

class CheckShadowsocks extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { 
	    return 'xjtuana.healthcheck.shadowsocks';
	}

}