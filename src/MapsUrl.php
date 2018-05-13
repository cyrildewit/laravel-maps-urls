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

namespace CyrildeWit\LaravelMapsUrls;

use CyrildeWit\MapsUrls\MapsUrl as OriginalMapsUrl;
use CyrildeWit\MapsUrls\Actions\SearchAction;
use CyrildeWit\MapsUrls\Actions\DirectionAction;

class MapsUrl
{
    /**
     * Build a search URL with the given query and query place id.
     *
     * @param  string  $query
     * @param  string|null  $queryPlaceId
     * @return string
     */
    public function search(string $query, $queryPlaceId = null)
    {
        $search = (new SearchAction())->setQuery($query);

        if ($queryPlaceId)
        {
            $search->setQueryPlaceId($queryPlaceId);
        }

        return (new OriginalMapsUrl($search))->getUrl();
    }

    /**
     * Build a search URL with the given coordinates and query place id.
     *
     * @param  float  $lat
     * @param  float  $lng
     * @param string|null  $queryPlaceId
     * @return string
     */
    public function searchCoordinates(float $lat, float $lng, $queryPlaceId = null)
    {
        $search = (new SearchAction())->setCoordinates($lat, $lng);

        if ($queryPlaceId)
        {
            $search->setQueryPlaceId($queryPlaceId);
        }

        return (new OriginalMapsUrl($search))->getUrl();
    }

    /**
     * Build a direction URL with the given origin, destination and travelmode.
     *
     * @param  string  $origin
     * @param  string  $destination
     * @param  string  $travelmode
     * @return string
     */
    public function direction(string $origin, string $destination, string $travelmode)
    {
        $direction = (new DirectionAction())
            ->setOrigin($origin)
            ->setDestination($destination)
            ->setTravelmode($travelmode);

        return (new OriginalMapsUrl($direction))->getUrl();
    }

    /**
     * Create a new search action instance.
     *
     * @param  function|null  $search
     * @return \CyrildeWit\MapsUrls\Actions\SearchAction
     */
    public function makeSearch($search = null)
    {
        if ($search) {
            $searchAction = $search(new SearchAction());

            return (new OriginalMapsUrl($searchAction))->getUrl();
        }

        return new SearchAction();
    }

    /**
     * Create a new direction action instance.
     *
     * @param  function|null  $direction
     * @return \CyrildeWit\MapsUrls\Actions\DirectionAction|string
     */
    public function makeDirection($direction = null)
    {
        if ($direction) {
            $directionAction = $direction(new DirectionAction());

            return (new OriginalMapsUrl($directionAction))->getUrl();
        }

        return new DirectionAction();
    }
}

// ()->byDriving, byWalking
