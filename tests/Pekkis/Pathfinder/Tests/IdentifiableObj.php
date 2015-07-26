<?php

namespace Pekkis\Pathfinder\Tests;

use Pekkis\Pathfinder\Identifiable;

class IdentifiableObj implements Identifiable
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
