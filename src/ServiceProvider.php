<?php
/**
 * Created by PhpStorm.
 * User: ashe
 * Date: 7/24/17
 * Time: 7:08 PM
 */

namespace agangofkittens\vgwrap;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Config;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/config/config.php';

        if (function_exists('config_path')) {
            $publishPath = config_path('vgwrap.php');
        } else {
            $publishPath = base_path('config/vgwrap.php');
        }

        // Publish config files
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/config/config.php';

        $this->app->bind('vgwrap', function ($app) {
            return new VGWrapClient(config('vgwrap.api-key'), config('vgwrap.base-uri'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('vgwrap');
    }
}
