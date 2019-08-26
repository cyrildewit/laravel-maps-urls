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

    public function testSearch()
    {
        $search = MapsUrl::search('Amsterdam', 'abcdefghijklmnopqrstuvwxyz');

        $this->assertEquals('https://www.google.com/maps/search/?api=1&query=Amsterdam&query_place_id=abcdefghijklmnopqrstuvwxyz', $search);
    }

    public function testSearchCoordinates()
    {
        $search = MapsUrl::searchCoordinates(45, 4, 'abcdefghijklmnopqrstuvwxyz');

        $this->assertEquals('https://www.google.com/maps/search/?api=1&query=45%2C4&query_place_id=abcdefghijklmnopqrstuvwxyz', $search);
    }

    public function testDirection()
    {
        $search = MapsUrl::direction('Monnickendam', 'Amsterdam', 'bicycling');

        $this->assertEquals('https://www.google.com/maps/dir/?api=1&origin=Monnickendam&destination=Amsterdam&travelmode=bicycling', $search);
    }

    public function testMakeSearchEmpty()
    {
        $searchAction = MapsUrl::makeSearch();

        $this->assertInstanceOf(SearchAction::class, $searchAction);
    }

    public function testMakeSearchCallback()
    {
        $search = MapsUrl::makeSearch(function ($action) {
            $action->setQuery('Amsterdam');
            $action->setQueryPlaceId('abcdefghijklmnopqrstuvwxyz');

            return $action;
        });

        $this->assertEquals('https://www.google.com/maps/search/?api=1&query=Amsterdam&query_place_id=abcdefghijklmnopqrstuvwxyz', $search);
    }

    public function testMakeDirection()
    {
        $directionAction = MapsUrl::makeDirection();

        $this->assertInstanceOf(DirectionAction::class, $directionAction);
    }

    public function testMakeDirectionCallback()
    {
        $search = MapsUrl::makeDirection(function ($action) {
            $action->setOrigin('Amsterdam');
            $action->setOriginPlaceId('abcdefghijklmnopqrstuvwxyz');

            return $action;
        });

        $this->assertEquals('https://www.google.com/maps/dir/?api=1&origin=Amsterdam&origin_place_id=abcdefghijklmnopqrstuvwxyz', $search);
    }
}
