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
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "select",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
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