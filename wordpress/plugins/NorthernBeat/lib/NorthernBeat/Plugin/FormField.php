<?php

namespace NorthernBeat\Plugin;

class FormField
{
    protected $key;
    protected $label;
    protected $name;
    protected $type = "text";
    protected $instructions;
    protected $required = 0;
    protected $conditionalLogic = 0;
    protected $wrapperWidth = "";
    protected $wrapperClass = "";
    protected $wrapperId = "";
    protected $fields = array();


    
    public function __construct($in = array(), $builder = null)
    {
        if (is_array($in)) {
            foreach ($in as $key => $val) {
                if (property_exists($this, $key)) {
                    $this->$key = $val;
                }
            }
        }

        $this->name = $this->key;
    }


    
    public function setFields(array $f)
    {
        $this->fields = $f;
    }


    
    public function get()
    {
        $overrides = $this->getOverrides();
        $fields    = array("key" => $this->key,
                           "label" => $this->label,
                           "name" => $this->name,
                           "type" => $this->type,
                           "instructions" => $this->instructions,
                           "required" => $this->required,
                           "conditional_logic" => $this->conditionalLogic,
                           "wrapper" => array (
                               "width" => $this->wrapperWidth,
                               "class" => $this->wrapperClass,
                               "id" => $this->wrapperId,
                           )
        );

        return array_merge($fields, $overrides);
    }


    
    protected function getOverrides()
    {
        return array();
    }

}
