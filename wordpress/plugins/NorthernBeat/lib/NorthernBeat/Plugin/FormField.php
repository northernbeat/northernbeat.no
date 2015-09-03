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
    protected $defaultValue = "";
    protected $placeholder = "";
    protected $prepend = "";
    protected $append = "";
    protected $maxLength = "";
    protected $readonly;
    protected $disabled;

    public function __construct($in = array(), $builder = null)
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
    
    public function get()
    {
        return array (
            "key" => $this->key,
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
            ),
            "default_value" => $this->defaultValue,
            "placeholder" => $this->placeholder,
            "prepend" => $this->prepend,
            "append" => $this->append,
            "maxlength" => $this->maxLength,
            "readonly" => $this->readonly,
            "disabled" => $this->disabled
        );
    }
}
