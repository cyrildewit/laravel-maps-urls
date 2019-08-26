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

use CyrildeWit\MapsUrls\UrlGenerator as UrlGenerator;
use CyrildeWit\MapsUrls\Actions\SearchAction;
use CyrildeWit\MapsUrls\Actions\DirectionAction;
use CyrildeWit\MapsUrls\Actions\DisplayStreetViewPanoramaAction;

class MapsUrl
{
    /**
     * Build a search URL with the given query and query place id.
     *
     * @param  string|array  $query
     * @param  string|null  $queryPlaceId
     * @return string
     */
    public function search($query, $queryPlaceId = null)
    {
        if (is_array($query)) {
            $search = SearchAction::make($query);

            return (new UrlGenerator($search))->generate();
        } else {
            $search = (new SearchAction())->setQuery($query);

            if ($queryPlaceId)
            {
                $search->setQueryPlaceId($queryPlaceId);
            }
        }

        return (new UrlGenerator($search))->generate();
    }

    public function displayStreetViewPanorama($options)
    {
        if (is_array($options)) {
            $panorama = DisplayStreetViewPanoramaAction::make($options);

            return (new UrlGenerator($panorama))->generate();
        }
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
     * @param  array  $options
     * @return string
     */
    public function direction(array $options)
    {
        $direction = DirectionAction::make($options);
        // $direction = (new DirectionAction())
        //     ->setOrigin($origin)
        //     ->setDestination($destination)
        //     ->setTravelmode($travelmode);

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
