<?php

namespace Ez\Html;

/**
 * Class Select
 * @package Ez\Html
 * @author Derek Li
 */
class Select extends Element
{
    /**
     * @var string
     */
    protected $tag = 'select';

    public function __construct($name = null)
    {
        if (isset($name)) {
            $this->attr('name', $name);
        }
    }

    /**
     * @param string $value
     * @param string $label
     * @param bool $default
     * @param array $optionAttributes
     * @return $this
     */
    public function addOption($value, $label, $default = false, $optionAttributes = array())
    {
        $option = new Option($value, $label);
        $option->attr($optionAttributes);
        if ($default) {
            $option->attr('selected', 'selected');
        }
        return $this->add($option);
    }
}