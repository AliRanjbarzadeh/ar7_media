<?php

namespace Ar7\Media;

use Ar7\Media\Helpers\MediumHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		app()->bind('ar7media', function () {
			return new MediumHelper;
		});
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		config()->set('ar7_media.version', '1.0.0');
		Blade::directive('ar7_media', function ($file) {
			$file = trim($file, "'");
			if ($file == 'css') {
				return '<?php $css_media_selector = asset(trim(config(\'ar7_media.url_prefix\'), \'/\') . \'/\' . \'ar7/media/css/media-selector.css\'); echo \'<link href="\' . $css_media_selector . \'?ver=\' . rand(10000000, 99999999) . \'" rel="stylesheet" type="text/css"/>\'; ?>';
			} else if ($file == 'js') {
				return '<?php $js_media_selector = asset(trim(config(\'ar7_media.url_prefix\'), \'/\') . \'/\' . \'ar7/media/js/media-selector.js\'); echo \'<script src="\' . route(\'ar7_media_router\') . \'"></script><script src="\' . route(\'ar7_media_config\') . \'"></script><script src="\' . $js_media_selector . \'?ver=\' . rand(10000000, 99999999) . \'"></script>\'; ?>';
			} else {
				return '';
			}
		});
		Blade::directive('ar7_media_start', function () {
			return '<div class="media-container">';
		});
		Blade::directive('ar7_media_end', function () {
			return '</div>';
		});
		Blade::directive('ar7_media_file', function ($expression) {
			list($id, $options) = explode("', '", trim($expression, "'"));
			return '<div id="' . $id . '" data-plugin="media" data-options=\'' . $options . '\'></div>';
		});

		$this->loadRoutesFrom(__DIR__ . '/routes.php');
		$this->loadTranslationsFrom(__DIR__ . '/lang', 'ar7_media');
		$this->loadViewsFrom(__DIR__ . '/views', 'ar7_media');

		$this->publishes([
			__DIR__ . '/config' => base_path('config'),
		], 'ar7-media-config');

		$this->publishes([
			__DIR__ . '/../dist' => public_path('ar7/media'),
		], 'ar7-media-public');

		$this->publishes([
			__DIR__ . '/migrations' => database_path('migrations'),
		], 'ar7-media-migrations');

		$this->publishes([
			__DIR__ . '/lang' => $this->app->langPath('ar7/media'),
		], 'ar7-media-lang');
	}
}