<?php

namespace NorthernBeat\Plugin;

class FormFieldPost extends \NorthernBeat\Plugin\FormField
{
    protected $postType = array();
    protected $taxonomy = array();
    protected $allowNull = false;
    protected $multiple = true;
    protected $returnObject = "object";
    protected $ui = true;
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => "post_object",
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            'post_type' => $this->postType,
			'taxonomy' => $this->taxonomy,
			'allow_null' => $this->allowNull,
			'multiple' => $this->multiple,
			'return_format' => $this->returnObject,
			'ui' => $this->ui
        );
    }
}