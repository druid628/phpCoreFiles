<?php

namespace DruiD628\Primatives\Base\Contracts;

interface StringInterface
{

    public function length() : int;

    public function explode($delimiter = '', $limit = PHP_INT_MAX) : ArrayInterface;

    public function getValue() : string;

    public function setValue($value) : StringInterface;

    public function __toString(): string;
}