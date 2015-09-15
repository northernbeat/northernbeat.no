<?php

namespace NorthernBeat\Plugin;

class FormFieldRepeater extends \NorthernBeat\Plugin\FormField
{

    protected $min;
    protected $max;
    protected $layout = "row";
    protected $buttonLabel = "Legg til ny rad";



    public function getOverrides()
    {
        return array (
            "type" => "repeater",
            "min" => $this->min,
            "max" => $this->max,
            "layout" => $this->layout,
            "button_label" => $this->buttonLabel,
            "sub_fields" => $this->fields
        );
    }
}