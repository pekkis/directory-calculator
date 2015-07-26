<?php

/**
 * This file is part of the pekkis-directory-calculator package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\DirectoryCalculator\Strategy;

use Pekkis\DirectoryCalculator\Identifiable;

interface Strategy
{
    /**
     * Calculates directory id (path) for a resource or a file
     *
     * @param Identifiable $obj
     * @return string
     */
    public function calculateDirectory(Identifiable $obj);
}
