<?php

/**
 * This file is part of the pekkis-pathfinder package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder;

use DateTimeInterface;

interface Versionable extends Identifiable
{
    /**
     * @return DateTimeInterface Returns the version of the object
     */
    public function getVersion();
}