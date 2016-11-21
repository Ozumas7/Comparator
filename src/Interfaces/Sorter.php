<?php

namespace Kolter\Comparator\Interfaces;

/**
 * Interface Sorter
 * @package Kolter\Comparator\Interfaces
 */
interface Sorter
{
    /**
     * @return bool
     */
    public function getIsUserDefined() : bool;

    /**
     * @return bool
     */
    public function getMantainsKeyAssociation() : bool;

    /**
     * @return string
     */
    public function getSortBy() : string;

    /**
     * @return mixed
     */
    public function getOrderOfSort();

    /**
     * @return callable
     */
    public function getCallable() : callable;
}
