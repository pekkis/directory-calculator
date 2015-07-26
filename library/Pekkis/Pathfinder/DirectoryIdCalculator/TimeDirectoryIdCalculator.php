<?php

/**
 * This file is part of the Xi Filelib package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder\DirectoryIdCalculator;

use Pekkis\Pathfinder\Dateable;
use Pekkis\Pathfinder\Identifiable;
use Pekkis\Pathfinder\LogicException;

/**
 * Calculates directory id by formatting an objects creation date
 */
class TimeDirectoryIdCalculator implements DirectoryIdCalculator
{
    /**
     * @param string $format
     */
    public function __construct($format = 'Y/m/d')
    {
        $this->format = $format;
    }

    /**
     * @var string
     */
    private $format = 'Y/m/d';

    /**
     * Returns directory creation format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @see DirectoryIdCalculator::calculateDirectoryId
     */
    public function calculateDirectoryId(Identifiable $obj)
    {
        if (!$obj instanceof Dateable) {
            throw new LogicException('Expected a dateable');
        }

        $dt = $obj->getDateCreated();
        $path = $dt->format($this->getFormat());
        return $path;
    }
}
