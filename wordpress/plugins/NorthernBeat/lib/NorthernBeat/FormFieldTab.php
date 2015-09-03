<?php

namespace NorthernBeat;

class FormFieldTab extends \NorthernBeat\FormField
{
    protected $placement = "top";
    protected $endpoint = 0;
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => "",
            "type" => "tab",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            "placement" => $this->placement,
            "endpoint" => $this->endpoint
        );
    }
}