<?php

namespace NorthernBeat;

class FormFieldComplexContent extends \NorthernBeat\FormField
{
    protected $buttonLabel = "Legg til innhold";
    protected $min = 0;
    protected $max = 0;
    protected $layouts = array();

    public function __construct($opts, $builder)
    {
        parent::__construct($opts);
        $this->layouts = array();
        
        if (isset($opts["layouts"])) {
            foreach ($opts["layouts"] as $l) {
                $this->layouts[] = $builder->getLayout($l, $this->key);
            }
        }
    }
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "flexible_content",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            "button_label" => $this->buttonLabel,
            "min" => $this->min,
            "max" => $this->max,
            "layouts" => $this->layouts
        );
    }
}
