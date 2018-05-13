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

namespace CyrildeWit\LaravelMapsUrls\Facades;

use Illuminate\Support\Facades\Facade;

class MapsUrl extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'maps-url';
    }
}
