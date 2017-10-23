<?php 

namespace Xjtuana\XjtuApi\Facades;

use Illuminate\Support\Facades\Facade;

class XjtuApiSms extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { 
	    return 'xjtuana.api.sms'; 
	}

}