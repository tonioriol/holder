<?php namespace T20n\Holder;

use Illuminate\Support\ServiceProvider;

class HolderServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		if (!$this->app->routesAreCached()) {
			require __DIR__ . '/routes.php';
		}
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind('holder', 'T20n\Holder\Holder');
	}
}
