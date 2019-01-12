<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Validator::extend('no_numbers', function(string $attribute, $value, array $parameters, \Illuminate\Validation\Validator $validator) {
			return preg_match('#^[^0-9]*$#', $value);
		});
		Validator::extend('ends_with_dot', function(string $attribute, $value, array $parameters, \Illuminate\Validation\Validator $validator) {
			return is_null($value) || substr($value, strlen($value) - 1) == '.';
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		if ($this->app->environment() == 'local') {
			$this->app->register(\Reliese\Coders\CodersServiceProvider::class);
		}
	}
}
