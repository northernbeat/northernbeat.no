<?php

namespace NorthernBeat\Plugin;

class FormFieldMessage extends \NorthernBeat\Plugin\FormField
{
    protected $message = "";
    protected $escHtml = 0;
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "message",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            "message" => $this->message,
            "esc_html" => $this->escHtml,
        );
    }
}