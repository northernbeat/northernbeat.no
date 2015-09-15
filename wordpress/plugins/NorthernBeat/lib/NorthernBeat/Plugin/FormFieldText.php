<?php

namespace NorthernBeat\Plugin;

class FormFieldText extends \NorthernBeat\Plugin\FormField
{
    
    protected $defaultValue = "";
    protected $placeholder = "";
    protected $prepend = "";
    protected $append = "";
    protected $maxLength = "";
    protected $readonly = 0;
    protected $disabled = 0;


    
    public function getOverrides()
    {
        return array (
            "type" => "text",
            "default_value" => $this->defaultValue,
            "placeholder" => $this->placeholder,
            "prepend" => $this->prepend,
            "append" => $this->append,
            "maxlength" => $this->maxLength,
            "readonly" => $this->readonly,
            "disabled" => $this->disabled,
        );
    }
}