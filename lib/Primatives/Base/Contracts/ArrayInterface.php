<?php

namespace DruiD628\Primatives\Base\Contracts;

use ArrayAccess;
use Iterator;

interface ArrayInterface extends ArrayAccess, Iterator
{

    function count(): int;

    function rewind();

    function valid();

    function key();

    function next();

    function current();

    function offsetUnset($offset);

    function offsetSet($offset, $value);

    function offsetGet($offset);

    function offsetExists($offset);
}