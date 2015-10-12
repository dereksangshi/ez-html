<?php

namespace Ez\Html;

/**
 * Class Form
 * @package Ez\Html
 * @author Derek Li
 */
class Form extends Element
{
    /**
     * @var string
     */
    protected $tag = 'form';

    /**
     * @param string $action
     * @param string $method
     * @param string $enctype
     */
    public function __construct($action = null, $method = 'post', $enctype = null)
    {
        if (isset($action)) {
            $this->attr('action', $action);
        }
        $this->attr('method', $method);
        if (isset($enctype)) {
            $this->attr('enctype', $enctype);
        }
    }
}