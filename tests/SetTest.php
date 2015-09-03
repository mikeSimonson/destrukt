<?php

namespace Shadowhand\Test\Destrukt;

use Shadowhand\Destrukt\SetStruct;

class SetTest extends \PHPUnit_Framework_TestCase
{
    private $set;

    public function setUp()
    {
        $this->set = new SetStruct([
            'red',
            'green',
            'blue',
            'black',
            'white',
        ]);
    }

    public function testReplace()
    {
        $set = $this->set;
        $copy = $set->withData([
            'yellow',
            'orange',
        ]);

        $this->assertEquals(5, count($set));
        $this->assertEquals(2, count($copy));
    }

    public function testAppend()
    {
        $set  = $this->set;
        $copy = $set->withValue('cyan');

        $this->assertEquals(5, count($set));
        $this->assertEquals(6, count($copy));
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testAppendFailure()
    {
        $this->set->withValue('red');
    }

    public function testUnique()
    {
        $set = $this->set->toArray();

        $this->assertEquals($set, array_unique($set));
    }
}
