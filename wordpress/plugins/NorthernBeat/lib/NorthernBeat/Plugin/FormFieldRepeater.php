<?php

namespace NorthernBeat\Plugin;

class FormFieldRepeater extends \NorthernBeat\Plugin\FormField
{
    protected $min = 0;
    protected $max = 0;
    protected $layout = "table";
    protected $buttonLabel = "Legg til ny rad";
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "repeater",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            "min" => $this->min,
            "max" => $this->max,
            "layout" => $this->layout,
            "button_label" => $this->buttonLabel,
            "sub_fields" => $this->fields
        );
    }
}