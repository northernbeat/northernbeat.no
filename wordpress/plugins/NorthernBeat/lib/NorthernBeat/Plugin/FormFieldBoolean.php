<?php

namespace NorthernBeat\Plugin;

class FormFieldBoolean extends \NorthernBeat\Plugin\FormField
{

    protected $message = "";
    protected $defaultValue = true;
    


    public function getOverrides()
    {
        return array (
            "type" => "true_false",
			"message" => $this->message,
			"default_value" => $this->defaultValue
        );
    }
}