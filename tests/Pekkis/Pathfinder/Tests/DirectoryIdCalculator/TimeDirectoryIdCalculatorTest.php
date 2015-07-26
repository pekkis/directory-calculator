<?php

/**
 * This file is part of the Xi Filelib package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pekkis\Pathfinder\Tests\DirectoryIdCalculator;

use DateTime;
use Pekkis\Pathfinder\DirectoryIdCalculator\TimeDirectoryIdCalculator;
use Pekkis\Pathfinder\LogicException;
use Pekkis\Pathfinder\Tests\DateableObj;
use Pekkis\Pathfinder\Tests\IdentifiableObj;

/**
 * @group storage
 */
class TimeDirectoryIdCalculatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function provideData()
    {
        return array(
            array('1980/01/01', 'Y/m/d', '1980-01-01'),
            array('21/03/1978', 'd/m/Y', '1978-03-21'),
            array('11/11/2030/10/30/35', 'm/d/Y/H/i/s', '2030-11-11 10:30:35')
        );
    }


    /**
     * @test
     * @dataProvider provideData
     */
    public function calculateShouldCalculateCorrectly($expected, $format, $dateCreated)
    {
        $resource = new DateableObj(1, new \DateTimeImmutable($dateCreated));
        $calc = new TimeDirectoryIdCalculator($format);
        $this->assertEquals($expected, $calc->calculateDirectoryId($resource));
    }

    /**
     * @test
     */
    public function defaultSettingsShouldProduceSaneDirectoryId()
    {
        $resource = new DateableObj(1, new \DateTimeImmutable('1978-03-21 03:03:03'));
        $calc = new TimeDirectoryIdCalculator();
        $this->assertEquals('1978/03/21', $calc->calculateDirectoryId($resource));
    }

    /**
     * @test
     */
    public function throwsExceptionOnNonDateable()
    {
        $resource = new IdentifiableObj('xoo');
        $calc = new TimeDirectoryIdCalculator();

        $this->setExpectedException(LogicException::class);
        $calc->calculateDirectoryId($resource);
    }

}
