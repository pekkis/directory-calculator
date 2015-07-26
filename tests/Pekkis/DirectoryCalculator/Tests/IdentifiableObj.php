<?php

namespace Pekkis\DirectoryCalculator\Tests;

use Pekkis\DirectoryCalculator\Identifiable;

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
