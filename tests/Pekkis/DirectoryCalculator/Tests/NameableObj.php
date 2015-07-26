<?php

namespace Pekkis\DirectoryCalculator\Tests;

use Pekkis\DirectoryCalculator\Nameable;

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
