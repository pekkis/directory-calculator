<?php

/**
 * This file is part of the pekkis-pathfinder package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\DirectoryCalculator;

interface UniversallyIdentifiable extends Identifiable
{
    /**
     * @return string UUID
     */
    public function getUuid();
}