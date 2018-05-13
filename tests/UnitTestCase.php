<?php

declare(strict_types=1);

/*
 * This file is part of the Laravel Maps URLs package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\LaravelMapsUrls\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class UnitTestCase extends Orchestra
{
    /**
     * Load package service providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \CyrildeWit\LaravelMapsUrls\MapsUrlServiceProvider::class,
        ];
    }

    /**
     * Load package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'MapsUrl' => CyrildeWit\LaravelMapsUrls\Facades\MapsUrl::class
        ];
    }
}
