<?php

namespace Ez\Html;

/**
 * Class Label
 * @package Ez\Html
 * @author Derek Li
 */
class Label extends Element
{
    /**
     * @var string
     */
    protected $tag = 'label';

    /**
     * @param string $label
     * @param string $for
     */
    public function __construct($label = null, $for = null)
    {
        if (isset($label)) {
            $this->add($label);
        }
        if (isset($for)) {
            $this->attr('for', $for);
        }
    }
}