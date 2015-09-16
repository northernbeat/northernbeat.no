<?php

namespace NorthernBeat\Plugin;

class FormFieldSelect extends \NorthernBeat\Plugin\FormField
{

    protected $choices = array();
    protected $defaultValue = "";
    protected $allowNull = 0;
    protected $multiple = 0;
    protected $ui = 0;
    protected $ajax = 0;
    protected $placeholder = 0;
    protected $disabled = 0;
    protected $readonly = 0;
    
    public function getOverrides()
    {
        return array (
            "type" => "select",
            "choices" => $this->choices,
			"default_value" => $this->defaultValue,
			"allow_null" => $this->allowNull,
			"multiple" => $this->multiple,
			"ui" => $this->ui,
			"ajax" => $this->ajax,
			"placeholder" => $this->placeholder,
			"disabled" => $this->disabled,
			"readonly" => $this->readonly,
        );
    }
}