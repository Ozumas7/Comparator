<?php

namespace Kolter\Comparator\Sorters;

use Kolter\Comparator\Interfaces\Sorter;

class Ksort implements Sorter
{
    private $isUserDefined = false;
    private $maintainsKeyAssociation = true;
    private $sortBy = 'key';
    private $orderOfSort = 'ASC';
    private $callable = 'ksort';

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
