<?php

namespace NorthernBeat;

class FormLayout
{

    protected $key;
    protected $name;
    protected $label;
    protected $display = "block";
    protected $fields;
    protected $min;
    protected $max;
    
    public function __construct($in = array())
    {
        if (is_array($in)) {
            foreach ($in as $key => $val) {
                if (property_exists($this, $key)) {
                    $this->$key = $val;
                }
            }
        }

        if (!isset($this->name)) {
            $this->name = $this->key;
        }
    }
    
    public function setFields(array $f)
    {
        $this->fields = $f;
    }

    public function get()
    {
        return array (
            "key" => $this->key,
            "name" => $this->name,
            "label" => $this->label,
            "display" => $this->display,
            "sub_fields" => $this->fields,
            "min" => $this->min,
            "max" => $this->max
        );
    }
}