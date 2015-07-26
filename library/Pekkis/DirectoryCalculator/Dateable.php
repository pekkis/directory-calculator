<?php

/**
 * This file is part of the pekkis-pathfinder package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\DirectoryCalculator;

use DateTimeInterface;

interface Dateable extends Identifiable
{
    /**
     * @return DateTimeInterface Returns a date when this object was born
     */
    public function getDateCreated();
}