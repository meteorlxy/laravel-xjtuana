<?php 

namespace Xjtuana\Cas\Facades;

use Illuminate\Support\Facades\Facade;

class XjtuanaWsSms extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { 
	    return 'xjtuana.ws.sms'; 
	}

}