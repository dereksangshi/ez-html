<?php
namespace Ez\Html;

/**
 * Class Input
 * @package Ez\Html
 * @author Derek Li
 */
class Input extends Element
{
    /**
     * @var string
     */
    protected $tag = 'input';

    /**
     * @param string $type
     * @param string $name
     * @param string $value
     */
    public function __construct($type = null, $name = null, $value = null)
    {
        if (isset($type)) {
            $this->attr('type', $type);
        }
        if (isset($name)) {
            $this->attr('name', $name);
        }
        if (isset($name)) {
            $this->attr('value', $value);
        }
    }
}