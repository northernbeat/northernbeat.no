<?php

namespace NorthernBeat\Plugin;

class FormFieldTextarea extends \NorthernBeat\Plugin\FormField
{

    protected $defaultValue = "";
    protected $placeholder = "";
    protected $maxLength = "";
    protected $rows = 8;
    protected $newLines = "wpautop";
    protected $readonly= 0;
    protected $disabled = 0;


    
    public function getOverrides()
    {
        return array (
            "type" => "textarea",
            "default_value" => $this->defaultValue,
            "placeholder" => $this->placeholder,
            "maxlength" => $this->maxLength,
            "rows" => $this->rows,
            "new_lines" => $this->newLines,
            "readonly" => $this->readonly,
            "disabled" => $this->disabled,
        );
    }
}