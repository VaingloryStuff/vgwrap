<?php
/**
 * Created by PhpStorm.
 * User: ashe
 * Date: 7/24/17
 * Time: 7:08 PM
 */

namespace agangofkittens\vgwrap;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use agangofkittens\vgwrap\VGWrapClient as VGWrapClient;
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
        // Publish config files
        $this->publishes(
            [
                __DIR__ . '/../config/config.php' => config_path('vgwrap.php'),
            ], 'config'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('vgwrap', function($app) {
            return new VGWrapClient(config('vgwrap.api-key'));
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
