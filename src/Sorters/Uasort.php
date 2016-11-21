<?php

namespace Kolter\Comparator\Sorters;

use Kolter\Comparator\Interfaces\Sorter;

/**
 * Class Uasort
 * @package Kolter\Comparator\Sorters
 */
class Uasort implements Sorter
{
    /**
     * @var bool
     */
    private $isUserDefined = true;
    /**
     * @var bool
     */
    private $maintainsKeyAssociation = true;
    /**
     * @var string
     */
    private $sortBy = 'value';
    /**
     * @var string
     */
    private $orderOfSort = 'USER';
    /**
     * @var string
     */
    private $callable = 'uasort';

    /**
     * @return bool
     */
    public function getIsUserDefined() : bool
    {
        return $this->isUserDefined;
    }

    /**
     * @return bool
     */
    public function getMantainsKeyAssociation() : bool
    {
        return $this->maintainsKeyAssociation;
    }

    /**
     * @return string
     */
    public function getSortBy() : string
    {
        return $this->sortBy;
    }

    /**
     * @return mixed
     */
    public function getOrderOfSort()
    {
        return $this->orderOfSort;
    }

    /**
     * @return callable
     */
    public function getCallable() : callable
    {
        return $this->callable;
    }
}
