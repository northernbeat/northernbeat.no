<?php

// UNFINISHED

namespace NorthernBeat\Plugin;

class FormFieldCheck extends \NorthernBeat\Plugin\FormField
{
    protected $choices = array();
    protected $otherChoice = 0;
    protected $saveOtherChoice = 0;
    protected $defaultValue = "";
    protected $layout = "vertical";
    protected $type = "check";
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name
            "type" => "check",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            "choices" => $this->choices,
			"other_choice" => $this->otherChoice,
			"save_other_choice" => $this->saveOtherChoice,
			"default_value" => $this->defaultValue,
			"layout" => $this->layout
        );
    }
}