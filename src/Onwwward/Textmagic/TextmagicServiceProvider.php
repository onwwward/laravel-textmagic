<?php

namespace Onwwward\Textmagic;

use Onwwward\Textmagic\Textmagic;
use Illuminate\Support\ServiceProvider;

class TextmagicServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('textmagic', function ($app) {
            return new Textmagic($app['config']['textmagic']);
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('textmagic.php')
        ], 'config');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['textmagic'];
    }

}