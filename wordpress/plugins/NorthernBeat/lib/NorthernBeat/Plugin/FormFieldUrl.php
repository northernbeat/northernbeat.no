<?php

namespace NorthernBeat\Plugin;

class FormFieldUrl extends \NorthernBeat\Plugin\FormField
{

    protected $defaultValue = "";



    public function getOverrides()
    {
        return array (
			"type"          => "url",
			"default_value" => $this->defaultValue
        );
    }
}