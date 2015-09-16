<?php

namespace NorthernBeat\Plugin;

class FormFieldComplexContent extends \NorthernBeat\Plugin\FormField
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


    
    public function getOverrides()
    {
        return array (
            "type" => "flexible_content",
            "button_label" => $this->buttonLabel,
            "min" => $this->min,
            "max" => $this->max,
            "layouts" => $this->layouts
        );
    }
}
