<?php

namespace Ez\Html;

/**
 * Class Element
 * @package Ez\Html
 * @author Derek Li
 */
class Element
{
    /**
     * Attributes of the html element.
     *
     * @var array
     */
    protected $attributes = array();

    /**
     * The html tag.
     *
     * @var string
     */
    protected $tag = null;

    /**
     * Html children.
     *
     * @var array
     */
    protected $children = array();

    /**
     * Constructor.
     *
     * @param $tag - the tag of this component.
     */
    public function __construct($tag = null)
    {
        if (isset($tag)) {
            $this->tag = $tag;
        }
    }

    /**
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add a class to the html element.
     *
     * @param string $class Class to add.
     * @return $this
     */
    public function addClass($class)
    {
        if ($this->hasAttr('class')) {
            $classes = explode(' ', $this->getAttr('class'));
            //Does the class name already exist?
            if (in_array($class, $classes)) {
                return $this;
            }
            $classes[] = $class;
            $this->attr('class', implode(' ', $classes));
        } else { //No class attribute set yet
            $this->attr('class', $class);
        }
        return $this;
    }

    /**
     * Checks if the component has the given attribute set with a value.
     * @param $attribute - the attribute to check for.
     * @return true if the attribute is set, false otherwise.
     */
    public function hasAttr($attribute)
    {
        return array_key_exists($attribute, $this->attributes);
    }

    /**
     * Checks if the given className is present in the 'class' attribute of the component.
     * @param $class - the class name to check for
     * @return true if present, false otherwise.
     */
    public function hasClass($class)
    {
        if ($this->hasAttr('class')) {
            $classes = explode(' ', $this->getAttr('class'));
            return in_array($class, $classes);
        } else {
            return false;
        }
    }

    /**
     * Remove class.
     *
     * @param string $class The class to remove.
     * @return $this
     */
    public function removeClass($class)
    {
        if ($this->hasAttr('class')) {
            $classes = explode(' ', $this->getAttr('class'));
            $classes = array_diff($classes, array($class));
            if (count($classes) > 0) {
                $this->attr('class', implode(' ', $classes));
            } else {
                $this->removeAttr('class');
            }
        }
        return $this;
    }

    /**
     * Get or set the attribute.
     *
     * @param mixed $attribute Name of the attribute.
     * @param mixed $value OPTIONAL Value to set.
     * @return mixed|$this Value of the attribute or $this
     */
    public function attr($attribute = null, $value = null)
    {
        if (func_num_args() <= 1) {
            if (is_array($attribute)) {
                foreach ($attribute as $attr => $val) {
                    $this->setAttr($attr, $val);
                }
            } else {
                return $this->getAttr($attribute);
            }
        } else {
            $this->setAttr($attribute, $value);
            return $this;
        }
    }

    /**
     * @param string $attribute Name of the attribute.
     * @param mixed $value Value of the attribute.
     * @return $this
     */
    protected function setAttr($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
        return $this;
    }

    /**
     * Retrieves the value for the given attribute or null if no such attribute is set.
     * @param $attribute - the attribute to retrieve the value of.
     * @return mixed
     */
    protected function getAttr($attribute = null)
    {
        if (!isset($attribute)) {
            return $this->attributes;
        }
        if (array_key_exists($attribute, $this->attributes)) {
            return $this->attributes[$attribute];
        } else {
            return null;
        }
    }

    /**
     * Removes the given attribute (or attributes) from the attribute set.
     * A single attribute or an array of attributes can be given.
     * @param $attribute - the attribute (or attributes) to remove from the set.
     */
    public function removeAttr($attribute)
    {
        //Remove all given attributes if it is an array
        if (is_array($attribute)) {
            $this->attributes = array_diff($this->attributes, $attribute);
        } else { //Remove the given single attribute
            unset($this->attributes[$attribute]);
        }
    }

    /**
     * Add child.
     *
     * @param $child
     * @return $this
     */
    public function add($child)
    {
        if (is_array($child)) {
            foreach ($child as $c) {
                $this->add($c);
            }
            return $this;
        }
        //Add the child
        array_push($this->children, $child);
        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Remove all the children.
     *
     * @return $this
     */
    public function removeChildren()
    {
        //Remove all children
        $this->children = array();
        return $this;
    }

    /**
     * Get all the attributes as a string.
     *
     * @return string
     */
    public function attrsToString()
    {
        //Keys of the various attributes
        $keys = array_keys($this->attributes);

        //Return an empty string if there are no attributes
        if (count($keys) == 0) {
            return '';
        }

        //Start the string with a leading whitespace.
        $returnString = '';

        //Create array with an 'attribute="value" for each attribute
        $attributePairs = array();
        foreach ($this->attributes as $attribute => $value) {
            $attributePairs[] = sprintf("%s=\"%s\"", $attribute, $value);
        }

        $returnString .= implode(" ", $attributePairs);
        return $returnString;
    }

    /**
     * Gets the innerHTML of the element.
     *
     * @return string Inner html of the element
     */
    public function innerHTML()
    {
        $html = "";

        // Walk through each child
        foreach ($this->children as $child) {
            $html .= $child;
        }
        return $html;
    }

    /**
     * Return the html.
     *
     * @return string
     */
    public function __toString()
    {
        $html = '';
        //Begin with the start tag <tag ..>
        $html .= sprintf("<%s %s>", $this->getTag(), $this->attrsToString());
        //Add each child between the start and end tag
        $html .= $this->innerHTML();
        //Finish with the end tag </tag> and return html
        $html .= sprintf("</%s>", $this->getTag());
        return $html;
    }
}