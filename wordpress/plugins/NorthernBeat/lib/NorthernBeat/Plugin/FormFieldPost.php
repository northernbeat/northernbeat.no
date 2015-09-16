<?php

namespace NorthernBeat\Plugin;

class FormFieldPost extends \NorthernBeat\Plugin\FormField
{

    protected $postType = array();
    protected $taxonomy = array();
    protected $allowNull = false;
    protected $multiple = true;
    protected $returnFormat = "id";
    protected $ui = true;
    


    public function getOverrides()
    {
        return array (
            "type" => "post_object",
            'post_type' => $this->postType,
			'taxonomy' => $this->taxonomy,
			'allow_null' => $this->allowNull,
			'multiple' => $this->multiple,
			'return_format' => $this->returnFormat,
			'ui' => $this->ui
        );
    }
}