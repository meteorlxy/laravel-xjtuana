<?php 

namespace Xjtuana\HealthCheck\Facades;

use Illuminate\Support\Facades\Facade;

class CheckKms extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { 
	    return 'xjtuana.healthcheck.kms';
	}

}