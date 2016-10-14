<?php namespace T20n\Holder\Facades;

use Illuminate\Support\Facades\Facade;

class HolderFacade extends Facade {

	protected static function getFacadeAccessor() {

		return 'holder';
	}
}