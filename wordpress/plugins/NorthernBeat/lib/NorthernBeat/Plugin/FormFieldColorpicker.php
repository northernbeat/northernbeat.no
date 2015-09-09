<?php

namespace NorthernBeat\Plugin;

class FormFieldColorpicker extends \NorthernBeat\Plugin\FormField
{
    protected $defaultValue = "";
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "color_picker",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
			"default_value" => $this->defaultValue,
        );
    }
}