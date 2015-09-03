<?php

namespace Shadowhand\Test\Destrukt;

use Shadowhand\Destrukt\ListStruct;

class ListTest extends \PHPUnit_Framework_TestCase
{
    private $list;

    public function setUp()
    {
        $this->list = new ListStruct([
            'red',
            'green',
            'blue',
            'white',
            'black',
            'white',
        ]);
    }

    public function testReplace()
    {
        $list = $this->list;
        $copy = $list->withData([
            'yellow',
            'orange',
        ]);

        $this->assertEquals(6, count($list));
        $this->assertEquals(2, count($copy));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testReplaceFailure()
    {
        $this->list->withData([
            'actually' => 'hash',
        ]);
    }

    public function testAppend()
    {
        $list = $this->list;
        $copy = $list->withValue('red');

        $this->assertEquals(6, count($list));
        $this->assertEquals(7, count($copy));
    }

    public function testNotUnique()
    {
        $list = $this->list->toArray();

        $this->assertNotEquals($list, array_unique($list));
    }
}
