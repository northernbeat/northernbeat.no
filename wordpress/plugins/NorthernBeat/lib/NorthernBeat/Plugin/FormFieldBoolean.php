<?php

namespace NorthernBeat\Plugin;

class FormFieldBoolean extends \NorthernBeat\Plugin\FormField
{
    protected $message = "";
    protected $defaultValue = true;
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "true_false",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
			"message" => $this->message,
			"default_value" => $this->defaultValue
        );
    }
}