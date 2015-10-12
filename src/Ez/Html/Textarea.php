<?php

namespace Ez\Html;

/**
 * Class Textarea
 * @package Ez\Html
 * @author Derek Li
 */
class Textarea extends Element
{
    /**
     * @var string
     */
    protected $tag = 'textarea';

    /**
     * @param string $rows
     * @param string $cols
     */
    public function __construct($rows = null, $cols = null)
    {
        if (isset($rows)) {
            $this->attr('rows', $rows);
        }
        if (isset($cols)) {
            $this->attr('cols', $cols);
        }
    }
}