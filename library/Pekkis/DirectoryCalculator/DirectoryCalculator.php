<?php

namespace Pekkis\DirectoryCalculator;

use Pekkis\DirectoryCalculator\Strategy\Strategy;

class DirectoryCalculator
{
    /**
     * @var Strategy
     */
    private $strategy;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @param Strategy $strategy
     * @param string $prefix
     */
    public function __construct(Strategy $strategy, $prefix = '')
    {
        $this->strategy = $strategy;
        $this->prefix = rtrim($prefix, " \t\n\r\0\x0B" . DIRECTORY_SEPARATOR);
    }

    /**
     * @param Identifiable $obj
     * @return string
     */
    public function calculateDirectory(Identifiable $obj)
    {
        return ($this->prefix ? $this->prefix . DIRECTORY_SEPARATOR : '') . $this->strategy->calculateDirectory($obj);
    }
}