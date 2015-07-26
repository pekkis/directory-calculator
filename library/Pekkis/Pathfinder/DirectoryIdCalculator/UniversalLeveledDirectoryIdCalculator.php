<?php

/**
 * This file is part of the Xi Filelib package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder\DirectoryIdCalculator;

use Pekkis\PathFinder\Identifiable;
use Pekkis\Pathfinder\LogicException;
use Pekkis\PathFinder\UniversallyIdentifiable;


/**
 * Creates directories in a leveled hierarchy based on a numeric file id
 *
 */
class UniversalLeveledDirectoryIdCalculator implements DirectoryIdCalculator
{
    private $uuidRegex = '/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}/i';

    /**
     * @see DirectoryIdCalculator::calculateDirectoryId
     */
    public function calculateDirectoryId(Identifiable $obj)
    {
        if (!$obj instanceof UniversallyIdentifiable) {
            throw new LogicException('Expected an universally identifiable');
        }

        if (!preg_match($this->uuidRegex, $obj->getUuid())) {
            throw new LogicException('Expected a valid UUID');
        }

        $uuid = str_replace('-', '', $obj->getUuid());
        $dirs = [];

        for ($x = 0; $x < strlen($uuid); $x += 2) {
            $dirs[] = substr($uuid, $x, 2);
        }
        return implode(DIRECTORY_SEPARATOR, $dirs);
    }
}
