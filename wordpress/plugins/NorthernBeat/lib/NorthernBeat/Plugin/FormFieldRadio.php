<?php

namespace NorthernBeat\Plugin;

class FormFieldRadio extends \NorthernBeat\Plugin\FormField
{

    protected $choices = array();
    protected $otherChoice = 0;
    protected $saveOtherChoice = 0;
    protected $defaultValue = "";
    protected $layout = "vertical";


    
    public function getOverrides()
    {
        return array (
            "type" => "radio",
            "choices" => $this->choices,
			"other_choice" => $this->otherChoice,
			"save_other_choice" => $this->saveOtherChoice,
			"default_value" => $this->defaultValue,
			"layout" => $this->layout
        );
    }
}