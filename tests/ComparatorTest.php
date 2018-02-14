<?php

namespace Kolter\Comparator\Tests;


use Kolter\Comparator\Comparator;

class ComparatorTest extends AbstractTest
{


    public function testSimpleSort()
    {
        $arr = [5, 4, 3, 6, 8];
        $expected = [3, 4, 5, 6, 8];
        $cmp = new Comparator($arr);
        $cmp->sort();

        $this->assertEquals($arr, $expected);
    }

    public function testSimpleKeySort()
    {
        $arr = ["a" => 1, "d" => 4, "c" => 3];
        $expected = ["a" => 1, "c" => 3, "d" => 4];
        $cmp = new Comparator($arr);
        $cmp->sort();

        $this->assertEquals($arr, $expected);
    }
}