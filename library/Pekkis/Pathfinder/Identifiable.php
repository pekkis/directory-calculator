<?php

namespace Pekkis\Pathfinder;

/**
 * This file is part of the pekkis-pathfinder package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

interface Identifiable
{
    /**
     * @return mixed An identifier of some sort unique to objects of this type
     */
    public function getId();
}