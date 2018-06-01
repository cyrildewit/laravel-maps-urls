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

use CyrildeWit\MapsUrls\UrlGenerator;
use CyrildeWit\MapsUrls\Actions\SearchAction;
use CyrildeWit\MapsUrls\Actions\DirectionAction;
use CyrildeWit\MapsUrls\Actions\DisplayMapAction;
use CyrildeWit\MapsUrls\Actions\DisplayStreetViewPanoramaAction;

class MapsUrl
{
    /**
     * Create a new search action URL.
     *
     * @param  function  $callback
     * @return string
     */
    public function makeSearch($callback)
    {
        $searchAction = $callable(new SearchAction);

        return (new UrlGenerator($searchAction))->generate();
    }

    /**
     * Create a new direction action URL.
     *
     * @param  function  $callback
     * @return string
     */
    public function makeDirection($callback)
    {
        $directionAction = $callable(new DirectionAction);

        return (new UrlGenerator($directionAction))->generate();
    }

    /**
     * Create a new display map action URL.
     *
     * @param  function  $callback
     * @return string
     */
    public function makeDisplayMap($callback)
    {
        $displayMapAction = $callable(new DisplayMapAction);

        return (new UrlGenerator($displayMapAction))->generate();
    }

    /**
     * Create a new display street view panorama action URL.
     *
     * @param  function  $callback
     * @return string
     */
    public function makeDisplayStreetViewPanorama($callback)
    {
        $displayStreetViewPanoramaAction = $callable(new DisplayStreetViewPanoramaAction);

        return (new UrlGenerator($displayStreetViewPanoramaAction))->generate();
    }
}
