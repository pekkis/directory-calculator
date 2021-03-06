<?php

namespace Pekkis\DirectoryCalculator\Tests;

use Pekkis\DirectoryCalculator\Dateable;

class DateableObj extends IdentifiableObj implements Dateable
{
    private $date;

    public function __construct($id, \DateTimeImmutable $date)
    {
        parent::__construct($id);
        $this->date = $date;
    }

    public function getDateCreated()
    {
        return $this->date;
    }
}
