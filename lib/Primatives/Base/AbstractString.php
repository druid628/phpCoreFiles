<?php

namespace DruiD628\Primatives\Base;

use DruiD628\Primatives\Array628;
use DruiD628\Primatives\Base\Contracts\{ ArrayInterface, StringInterface };

class AbstractString implements StringInterface
{
    protected $value;

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

    public function explode($delimiter = '', $limit = PHP_INT_MAX): ArrayInterface
    {
        return new Array628(explode($delimiter, $this->getValue(), $limit));
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getValue();
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
     *
     * @return StringInterface
     */
    public function setValue($value): StringInterface
    {
        $this->value = $value;

        return $this;
    }

}