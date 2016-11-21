<?php

namespace Kolter\Comparator;

use Kolter\Comparator\Interfaces\Sorter;
use Kolter\Comparator\Sorters\Arsort;
use Kolter\Comparator\Sorters\Asort;
use Kolter\Comparator\Sorters\Krsort;
use Kolter\Comparator\Sorters\Ksort;
use Kolter\Comparator\Sorters\NatCasesort;
use Kolter\Comparator\Sorters\Natsort;
use Kolter\Comparator\Sorters\Rsort;
use Kolter\Comparator\Sorters\Sort;
use Kolter\Comparator\Sorters\Uasort;
use Kolter\Comparator\Sorters\Uksort;
use Kolter\Comparator\Sorters\Usort;

/**
 * Class SorterCollection.
 */
class SorterCollection
{
    /**
     * @var array
     */
    private $sorterCollection;

    /**
     * SorterCollection constructor.
     */
    public function __construct()
    {
        $this->sorterCollection =
            [
                new Arsort(),
                new Asort(),
                new Krsort(),
                new Ksort(),
                new Rsort(),
                new Sort(),
                new Uasort(),
                new Uksort(),
                new Usort(),
            ];
    }

    /**
     * @return Sorter[]
     */
    public function getSorterColleciton() : array
    {
        return $this->sorterCollection;
    }
}
