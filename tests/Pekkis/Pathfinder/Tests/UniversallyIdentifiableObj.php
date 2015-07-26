<?php

namespace Pekkis\Pathfinder\Tests;

use Pekkis\Pathfinder\UniversallyIdentifiable;

class UniversallyIdentifiableObj extends IdentifiableObj implements UniversallyIdentifiable
{
    private $uuid;

    public function __construct($id, $uuid)
    {
        parent::__construct($id);
        $this->uuid = $uuid;

    }

    public function getUuid()
    {
        return $this->uuid;
    }
}
