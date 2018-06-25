<?php 

namespace Xjtuana\XjtuWs\Facades;

use Illuminate\Support\Facades\Facade;

class XjtuWsUserPhoto extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { 
	    return 'xjtuana.ws.userphoto'; 
	}

}