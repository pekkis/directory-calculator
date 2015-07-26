<?php

/**
 * This file is part of the pekkis-pathfinder package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder;

interface Nameable extends Identifiable
{
    /**
     * @return string Some sort of human understandable name for this thing (not unique, necessarily)
     */
    public function getName();
}