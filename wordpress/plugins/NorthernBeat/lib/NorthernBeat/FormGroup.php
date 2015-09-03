<?php

namespace NorthernBeat;

class FormGroup
{
    protected $key;
    protected $title;
    protected $fields = array();
    protected $postType;
    protected $menuOrder = 0;
    protected $position = "normal";
    protected $style = "default";
    protected $labelPlacement = "left";
    protected $instructionPlacement = "label";
    protected $hideOnScreen = "";
    protected $active = 1;
    protected $description = "";
    protected $prefix = null;

    public function __construct($key, $title, $postType, $prefix, $opts)
    {
        $this->key = $prefix . $key . "-group";
        $this->title = $title;
        $this->postType = $postType;
        $this->prefix = $prefix;

        if (is_array($opts)) {
            foreach ($opts as $key => $val) {
                if (property_exists($this, $key)) {
                    $this->$key = $val;
                }
            }
        }
    }

    public function setFields(array $f)
    {
        $this->fields = $f;
    }

    public function get()
    {
        return array (
            "key" => $this->key,
            "title" => $this->title,
            "fields" => $this->fields,
            "location" => array (
                array (
                    array (
                        "param" => "post_type",
                        "operator" => "==",
                        "value" => $this->postType,
                    ),
                ),
            ),
            "menu_order" => $this->menuOrder,
            "position" => $this->position,
            "style" => $this->style,
            "label_placement" => $this->labelPlacement,
            "instruction_placement" => $this->instructionPlacement,
            "hide_on_screen" => $this->hideOnScreen,
            "active" => $this->active,
            "description" => $this->description
        );
    }
}
