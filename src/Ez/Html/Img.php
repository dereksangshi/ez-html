<?php

namespace Ez\Html;

/**
 * Class Img
 * @package Ez\Html
 * @author Derek Li
 */
class Img extends Element
{
    /**
     * @var string
     */
    protected $tag = 'img';

    /**
     * @param string $src
     * @param string $alt
     */
    public function __construct($src = null, $alt = null)
    {
        if (isset($src)) {
            $this->attr('src', $src);
        }
        if (isset($alt)) {
            $this->attr('alt', $alt);
        }
    }
}