<?php

/**
 * This file is part of the Xi Filelib package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder\DirectoryIdCalculator;

use Pekkis\PathFinder\Identifiable;

interface DirectoryIdCalculator
{
    /**
     * Calculates directory id (path) for a resource or a file
     *
     * @param Identifiable $obj
     * @return string
     */
    public function calculateDirectoryId(Identifiable $obj);
}
