<?php

namespace NorthernBeat\Plugin;

class FormFieldColorpicker extends \NorthernBeat\Plugin\FormField
{

    protected $defaultValue = "";
    


    public function getOverrides()
    {
        return array (
            "type" => "color_picker",
			"default_value" => $this->defaultValue,
        );
    }
}