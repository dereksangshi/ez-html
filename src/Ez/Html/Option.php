<?php

namespace Ez\Html;

/**
 * Class Option
 * @package Ez\Html
 * @author Derek Li
 */
class Option extends Element
{
    /**
     * @var string
     */
    protected $tag = 'option';

    /**
     * @param string $value
     * @param string $label
     */
    public function __construct($value = null, $label = null)
    {
        if (isset($value)) {
            $this->attr('value', $value);
        }
        if (isset($label)) {
            $this->add($label);
        }
    }
}