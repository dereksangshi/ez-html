<?php

namespace Ez\Html;

/**
 * Class A
 * @package Ez\Html
 * @author Derek Li
 */
class A extends Element
{
    /**
     * @var string
     */
    protected $tag = 'a';

    /**
     * @param string $href
     */
    public function __construct($href = null)
    {
        if (isset($href)) {
            $this->attr('href', $href);
        }
    }
}