<?php

namespace Ez\Html;

/**
 * Class Button
 * @package Ez\Html
 * @author Derek Li
 */
class Button extends Element
{
    /**
     * @var string
     */
    protected $tag = 'button';

    /**
     * @param string $type
     * @param string $label
     */
    public function __construct($type = null, $label = null)
    {
        if (isset($type)) {
            $this->attr('type', $type);
        }
        if (isset($label)) {
            $this->add($label);
        }
    }
}