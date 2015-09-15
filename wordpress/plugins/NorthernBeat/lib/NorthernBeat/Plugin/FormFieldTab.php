<?php

namespace NorthernBeat\Plugin;

class FormFieldTab extends \NorthernBeat\Plugin\FormField
{

    protected $placement = "top";
    protected $endpoint = 0;


    
    public function getOverrides()
    {
        return array (
            "name" => "",
            "type" => "tab",
            "placement" => $this->placement,
            "endpoint" => $this->endpoint
        );
    }
}