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

namespace CyrildeWit\LaravelMapsUrls\Tests\Unit;

use CyrildeWit\MapsUrls\Actions\SearchAction;
use CyrildeWit\MapsUrls\Actions\DirectionAction;
use CyrildeWit\LaravelMapsUrls\Facades\MapsUrl;
use CyrildeWit\LaravelMapsUrls\Tests\UnitTestCase;

class MapsUrlTest extends UnitTestCase
{
    public function testMakeSearch()
    {
        $search = MapsUrl::makeSearch(function ($action) {
            $action->setQuery('Amsterdam');

            return $action;
        });

        $this->assertEquals('https://www.google.com/maps/search/?api=1&query=Amsterdam', $search);
    }

    public function testMakeDirection()
    {
        $search = MapsUrl::makeDirection(function ($action) {
            $action->setOrigin('Amsterdam');

            return $action;
        });

        $this->assertEquals('https://www.google.com/maps/dir?api=1&origin=Amsterdam', $search);
    }

    public function testMakeDisplayMap()
    {
        $search = MapsUrl::makeDisplayMap(function ($action) {
            $action->setCenter(20, 40);

            return $action;
        });

        $this->assertEquals('https://www.google.com/maps/@?api=1&map_action=map&center=20%2C40', $search);
    }

    public function testMakeDisplayStreetViewPanorama()
    {
        $search = MapsUrl::makeDisplayStreetViewPanorama(function ($action) {
            $action->setViewpoint(20, 40);

            return $action;
        });

        $this->assertEquals('https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=20%2C40', $search);
    }
}
