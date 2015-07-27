<?php

/**
 * This file is part of the pekkis-directory-calculator package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\DirectoryCalculator\Strategy;

use Pekkis\DirectoryCalculator\Dateable;
use Pekkis\DirectoryCalculator\Identifiable;
use Pekkis\DirectoryCalculator\LogicException;

/**
 * Calculates directory id by formatting an objects creation date
 */
class TimeStrategy implements Strategy
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
     * @see DirectoryCalculator::calculateDirectory
     */
    public function calculateDirectory(Identifiable $obj)
    {
        if (!$obj instanceof Dateable) {
            throw new LogicException('Expected a dateable');
        }

        $dt = $obj->getDateCreated();
        $path = $dt->format($this->getFormat());
        return $path;
    }
}
