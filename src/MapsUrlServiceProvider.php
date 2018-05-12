<?php

declare(strict_types=1);

/*
 * This file is part of the Laravel Maps Urls package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\LaravelMapsUrls;

use Illuminate\Support\ServiceProvider;
use CyrildeWit\LaravelMapsUrls\MapsUrl;

/**
 * Class MapsUrlServiceProvider.
 *
 * @author Cyril de Wit <github@cyrildewit.nl>
 */
class MapsUrlServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerContracts();
        $this->registerPublishes();
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfig();
    }

    /**
     * Register the class bindings.
     *
     * @return void
     */
    protected function registerContracts()
    {
        $this->app->bind('maps-url', function ($app) {
            return new MapsUrl();
        });
    }

    /**
     * Setup the resource publishing groups for Eloquent Viewable.
     *
     * @return void
     */
    protected function registerPublishes()
    {
        // If the application is not running in the console, stop with executing
        // this method.
        if (! $this->app->runningInConsole()) {
            return;
        }

        // $this->publishes([
        //     __DIR__.'/../publishable/config/eloquent-viewable.php' => $this->app->configPath('eloquent-viewable.php'),
        // ], 'config');
    }

    /**
     * Merge the user's config file.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        // $this->mergeConfigFrom(
        //     __DIR__.'/../publishable/config/eloquent-viewable.php',
        //     'eloquent-viewable'
        // );
    }
}
