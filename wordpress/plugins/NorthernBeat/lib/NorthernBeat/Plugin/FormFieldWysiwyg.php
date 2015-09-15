<?php

namespace NorthernBeat\Plugin;

class FormFieldWysiwyg extends \NorthernBeat\Plugin\FormField
{
    
    protected $defaultValue = "";
    protected $tabs = "visual";
    protected $toolbar = "basic";
    protected $mediaUpload = 0;
    


    public function getOverrides()
    {
        return array (
            "type" => "wysiwyg",
			"default_value" => $this->defaultValue,
			"tabs" => $this->tabs,
			"toolbar" => $this->toolbar,
			"media_upload" => $this->mediaUpload,
        );
    }
}