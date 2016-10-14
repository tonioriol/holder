<?php namespace T20n\Holder;

use Illuminate\Support\ServiceProvider;

class HolderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

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
		$this->app->singleton('holder', 'T20n\Holder\Holder');
	}
}
