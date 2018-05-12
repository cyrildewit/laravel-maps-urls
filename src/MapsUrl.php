<?php

namespace CyrildeWit\LaravelMapsUrls;

/*
 * This file is part of the Maps URLs package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use CyrildeWit\MapsUrls\MapsUrl as OriginalMapsUrl;
use CyrildeWit\MapsUrls\Actions\SearchAction;
use CyrildeWit\MapsUrls\Actions\DirectionAction;

class MapsUrl
{
    /**
     * Create a search URL.
     */
    public function search(string $query, string $queryPlaceId)
    {
        $search = (new SearchAction())->setQuery($query);

        if ($queryPlaceId)
        {
            $search->setQueryPlaceId($queryPlaceId);
        }

        $url = (new OriginalMapsUrl($search))->getUrl();
    }

    public function searchCoordinates(float $lat, float $lng, $queryPlaceId = null)
    {
        $search = (new SearchAction())->setCoordinates($lat, $lng);

        if ($queryPlaceId)
        {
            $search->setQueryPlaceId($queryPlaceId);
        }

        $url = (new OriginalMapsUrl($search))->getUrl();
    }

    /**
     *
     */
    public function direction(string $origin, string $destination, string $travelmode)
    {
        $direction = (new DirectionAction())->setCoordinates($lat, $lng);

        $url = (new OriginalMapsUrl($direction))->getUrl();
    }

    public function makeSearch()
    {
        $url = new OriginalMapsUrl(new SearchAction());
    }

    /**
     *
     */
    public function makeDirection()
    {
        $url = new OriginalMapsUrl(new DirectionAction());
    }
}

// ()->byDriving, byWalking
