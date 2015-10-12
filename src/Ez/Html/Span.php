<?php

namespace Ez\Html;

/**
 * Class Span
 * @package Ez\Html
 * @author Derek Li
 */
class Span extends Element
{
    /**
     * @var string
     */
    protected $tag = 'span';

    /**
     * @param string $text
     */
    public function __construct($text = null)
    {
        if (isset($text)) {
            $this->add($text);
        }
    }
}