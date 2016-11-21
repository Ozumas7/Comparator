<?php

namespace Kolter\Comparator;

use Kolter\Comparator\Exceptions\NoSuchSorterFunctionFound;
use Kolter\Comparator\Interfaces\Sorter;

/**
 * Class Comparator
 * @package Kolter\Comparator
 */
class Comparator
{
    /**
     * @var bool
     */
    private $mantainsKeyAssociation;

    /**
     * @var string
     */
    private $orderOfSort;

    /**
     * @var array
     */
    private $array;

    /**
     * @var int
     */
    private $sortFlags;

    /**
     * @var
     */
    private $callable;

    /**
     * Comparator constructor.
     * @param array $array
     * @param bool $immutable
     * @param int $sortFlags
     */
    public function __construct(array &$array, int $sortFlags = SORT_REGULAR)
    {
        $this->sortBy = 'value';
        $this->mantainsKeyAssociation = false;
        $this->orderOfSort = 'ASC';
        $this->sortFlags = $sortFlags;
        $this->array = &$array;
    }


    /**
     * @return $this
     */
    public function asc()
    {
        $this->orderOfSort = 'ASC';

        return $this;
    }

    /**
     * @return $this
     */
    public function desc()
    {
        $this->orderOfSort = 'DESC';

        return $this;
    }

    public function regularSort()
    {
        $this->sortFlags = SORT_REGULAR;

        return $this;
    }

    /**
     * @return $this
     */
    public function naturalSort()
    {
        $this->sortFlags = SORT_NATURAL;

        return $this;
    }

    /**
     * @return $this
     */
    public function insensitiveSort()
    {
        $this->sortFlags = $this->sortFlags | SORT_FLAG_CASE;

        return $this;
    }

    public function stringsSort()
    {
        $this->sortFlags = SORT_STRING;

        return $this;
    }

    public function numbersSort()
    {
        $this->sortFlags = SORT_NUMERIC;

        return $this;
    }

    /**
     * @return $this
     */
    public function keepKeys()
    {
        $this->mantainsKeyAssociation = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function noKeepKeys()
    {
        $this->mantainsKeyAssociation = false;

        return $this;
    }

    /**
     * @return $this
     */
    public function byKeys()
    {
        $this->sortBy = 'key';

        return $this;
    }

    /**
     * @return $this
     */
    public function byValues()
    {
        $this->sortBy = 'value';

        return $this;
    }

    /**
     * @param callable|null $callable
     * @return array
     */
    public function sort(callable $callback = null) : int
    {
        if (!is_null($callback)) {
            $this->orderOfSort = 'USER';
            $callable = $this->getSorter()->getCallable();

            return $callable($this->array, $callback);
        }
        $callable = $this->getSorter()->getCallable();

        return $callable($this->array, $this->getSortFlags());
    }

    /**
     * @return Sorter
     * @throws NoSuchSorterFunctionFound
     */
    private function getSorter() : Sorter
    {
        $sorterCollection = (new SorterCollection())->getSorterColleciton();
        $result = null;
        foreach ($sorterCollection as $key => $value) {
            if ($value->getOrderOfSort() == $this->orderOfSort
                && $value->getMantainsKeyAssociation() == $this->mantainsKeyAssociation
                && $value->getSortBy() == $this->sortBy
            ) {
                $result = $value;
                break;
            }
        }
        if (is_null($result)) {
            throw new NoSuchSorterFunctionFound();
        }

        return $result;
    }

    /**
     * @return int
     */
    public function getSortFlags(): int
    {
        return $this->sortFlags;
    }

    /**
     * @param int $sortFlags
     */
    public function setSortFlags(int $sortFlags)
    {
        $this->sortFlags = $sortFlags;
    }


}
