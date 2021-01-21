<?php
/**
 * Cloudflare plugin for Craft CMS 3.x
 *
 * Purge Cloudflare caches from Craft.
 *
 * @link      https://workingconcept.com
 * @copyright Copyright (c) 2017 Working Concept
 */

namespace workingconcept\cloudflare\variables;

use workingconcept\cloudflare\Cloudflare;

/**
 * @author    Working Concept
 * @package   Cloudflare
 * @since     1.0.0
 */
class CloudflareVariable
{
    /**
     * Returns the zones.
     *
     * @return array|null
     */
    public function getZones()
    {
        return Cloudflare::$plugin->api->getZones();
    }

    /**
     * Returns the zone options.
     *
     * @return array
     */
    public function getZoneOptions(): array
    {
        $options = [];

        if ($zones = $this->getZones())
        {
            foreach ($zones as $zone)
            {
                $options[$zone->id] = $zone->name;
            }
        }

        return $options;
    }

    /**
     * Returns the rules.
     *
     * @return array
     */
    public function getRulesForTable(): array
    {
        return Cloudflare::$plugin->rules->getRulesForTable();
    }

    /**
     * @return bool|\craft\base\Model|null
     */
    public function getSettings()
    {
        return Cloudflare::$plugin->getSettings();
    }
}
