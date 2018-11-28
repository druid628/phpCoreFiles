<?php

namespace com\druid628\Primatives;

/**
 * Class String628
 *
 * @package com\druid628\Primatives
 */
class String628
{

    private $value;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function length(): int
    {
        return strlen($this->value);
    }

    /**
     * @return string
     */
    public function upper(): string
    {
        return strtoupper($this->getValue());
    }

    /**
     * @return string
     */
    public function lower(): string
    {
        return strtolower($this->getValue());
    }

    public function explode($delimiter = '', $limit = PHP_INT_MAX): Array628
    {
        return new Array628(explode($delimiter, $this->getValue(), $limit));
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value): String628
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getValue();
    }
}