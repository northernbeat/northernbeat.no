<?php

namespace NorthernBeat\Plugin;

class FormFieldMessage extends \NorthernBeat\Plugin\FormField
{

    protected $message = "";
    protected $escHtml = 0;


    
    public function getOverrides()
    {
        return array (
            "type" => "message",
            "message" => $this->message,
            "esc_html" => $this->escHtml,
        );
    }
}