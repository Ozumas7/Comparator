<?php

namespace Kolter\Comparator;


/**
 * Class Comparator
 * @package Kolter\Comparator
 */
class Comparator
{
    /**
     * @var array
     */
    private $array;

    public function __construct(array &$array)
    {
        $this->array = &$array;
    }

    public function reverse()
    {
        array_reverse($this->array);

        return $this;
    }

    public function naturalSort(bool $caseInsensitive = false)
    {
        if ($caseInsensitive === false) {
            natsort($this->array);

            return $this;
        }
        natcasesort($this->array);

        return $this;

    }

    public function shuffle()
    {
        shuffle($this->array);

        return $this;
    }

    public function sortKeys(callable $callback = null, int $flags = SORT_REGULAR)
    {
        if (!$this->isAssoc()) return $this;

        if ($callback === null) {
            ksort($this->array, $flags);

            return $this;
        }
        if ($this->isAssoc()) {
            uksort($this->array, $callback);

            return $this;
        }

        return $this;
    }

    public function sort(callable $callback = null, int $flags = SORT_REGULAR)
    {
        if ($callback === null && !$this->isAssoc()) {
            sort($this->array, $flags);

            return $this;
        }
        if ($callback === null && $this->isAssoc()) {
            asort($this->array, $flags);

            return $this;
        }
        if ($this->isAssoc()) {
            uasort($this->array, $callback);

            return $this;
        }
        usort($this->array, $callback);

        return $this;
    }

    private function isAssoc()
    {
        return array_keys($this->array) !== range(0, count($this->array) - 1);
    }

}
