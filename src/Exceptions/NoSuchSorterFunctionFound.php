<?php

namespace Kolter\Comparator\Exceptions;

/**
 * Class NoSuchSorterFunctionFound
 * @package Kolter\Comparator\Exceptions
 */
class NoSuchSorterFunctionFound extends \Exception
{
    protected $message = 'There is not a sort function according to the arguments';
}
