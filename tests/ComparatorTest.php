<?php

namespace Kolter\Comparator\Tests;


use Kolter\Comparator\Comparator;

class ComparatorTest extends AbstractTest
{

    public function testRsort()
    {
        $arr = [4, 5, 2, 1, 5, 6];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->desc()->noKeepKeys()->sort();
        rsort($arr2);


        $this->assertEquals($arr, $arr2);
    }

    public function testSort()
    {
        $arr = [4, 5, 2, 1, 5, 6];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->asc()->noKeepKeys()->sort();
        sort($arr2);

        $this->assertEquals($arr, [1, 2, 4, 5, 5, 6]);
    }

    public function testAsort()
    {
        $arr = [4, 5, 2, 1, 5, 6];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->asc()->keepKeys()->sort();
        asort($arr2);

        $this->assertEquals($arr, $arr2);
    }

    public function testArsort()
    {
        $arr = [4, 5, 2, 1, 5, 6];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->desc()->keepKeys()->sort();
        arsort($arr2);

        $this->assertEquals($arr, $arr2);
    }


    public function testKrsort()
    {
        $arr = [4, 5, 2, 1, 5, 6];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->desc()->keepKeys()->byKeys()->sort();
        krsort($arr2);

        $this->assertEquals(array_keys($arr), array_keys($arr2));
    }

    public function testKsort()
    {
        $arr = [4, 5, 2, 1, 5, 6];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->asc()->keepKeys()->byKeys()->sort();
        ksort($arr2);
        $this->assertEquals(array_keys($arr), array_keys($arr2));
    }

    public function testNatsort()
    {
        $arr = ["010", "0", "as1", 04, "12"];
        $arr2 = $arr;

        $comparator = new Comparator($arr);
        $comparator->desc()->naturalSort()->keepKeys()->sort();
        natsort($arr2);
        $this->assertEquals($arr, $arr2);
    }

    public function testNatCaseSort()
    {
        $arr = $arr2 = ['IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png'];

        $comparator = new Comparator($arr);
        $comparator->naturalSort()->insensitiveSort()->keepKeys()->sort();
        natcasesort($arr2);

        $this->assertEquals($arr2, $arr);
    }

    public function testUsort()
    {
        $arr = $arr2 = ['a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4];
        $callable = function ($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        };

        $comparator = new Comparator($arr);
        $comparator->byValues()->noKeepKeys()->sort($callable);

        usort($arr2, $callable);

        $this->assertEquals($arr, $arr2);
    }

    public function testUASort()
    {
        $arr = $arr2 = ['a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4];
        $callable = function ($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        };

        $comparator = new Comparator($arr);
        $comparator->byValues()->keepKeys()->sort($callable);

        uasort($arr2, $callable);

        $this->assertEquals($arr, $arr2);
    }

    public function testUkSort()
    {
        $arr = $arr2 = ["Víctor" => 1, "la Tierra" => 2, "una manzana" => 3, "un plátano" => 4];
        $callable = function ($a, $b) {
            $a = preg_replace('@^(un|una|la) @', '', $a);
            $b = preg_replace('@^(un|una|la) @', '', $b);
            return strcasecmp($a, $b);
        };

        $comparator = new Comparator($arr);
        $comparator->byKeys()->keepKeys()->sort($callable);

        uksort($arr2, $callable);

        $this->assertEquals($arr, $arr2);
    }
}