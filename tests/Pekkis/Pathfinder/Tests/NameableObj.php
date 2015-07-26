<?php

namespace Pekkis\Pathfinder\Tests;

use Pekkis\Pathfinder\Nameable;

class NameableObj extends IdentifiableObj implements Nameable
{
    private $name;

    public function __construct($id, $name)
    {
        parent::__construct($id);
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
