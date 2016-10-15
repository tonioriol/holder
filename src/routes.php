<?php

Route::get('holder/{height}/{width}/{color?}', function ($h, $w, $c = null) {
	return T20n\Holder\Facades\HolderFacade::make($h, $w, $c)->response();
});
