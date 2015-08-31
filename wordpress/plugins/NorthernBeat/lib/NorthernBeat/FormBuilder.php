<?php

namespace NorthernBeat;

class FormBuilder
{
    private $pre = array("firstname" => array("label" => "Fornavn",
                                              "type" => "text"),
                         "lastname" => array("label" => "Etternavn",
                                             "type" => "text"),
                         "email" => array("label" => "Epost",
                                          "type" => "text",
                                          "append" => "@northernbeat.no"),
                         "phone" => array("label" => "Telefon",
                                          "type" => "text",
                                          "prepend" => "+47"),
                         "photo" => array("label" => "Bilde",
                                          "type" => "image")
    );
                                       

    public function __construct($input)
    {
        $this->orig = $input;
    }

    public function parse()
    {
        $gIndex = 0;
        
        if (!is_array($this->orig) || sizeof($this->orig) < 1) {
            error_log("Form builder input is not valid");
        }

        foreach ($this->orig as $group) {
            ++$gIndex;
            $groupData = $this->parseGroup($group);
            $groupData["menu_order"] = $gIndex;
            acf_add_local_field_group($groupData);
        }
    }

    private function parseGroup(array $g)
    {
        $group = null;
        $field = null;
        $prefix = "";

        $gOpts = array_shift($g);
        list($key, $title, $postType, $prefix) = $gOpts;
        $group = new \NorthernBeat\FormGroup($key, $title, $postType);
        
        foreach ($g as $key => $val) {
            unset($opts);

            if (is_string($val) && isset($this->pre[$val])) {
                $key = $val;
                $opts = $this->pre[$key];
            } elseif (is_string($key) && isset($this->pre[$key]) && is_array($val)) {
                $opts = array_merge($this->pre[$key], $val);
            } elseif (is_string($key) && is_array($val)) {
                $opts = $val;
            } else {
                die("Not how we want things");
            }
            
            $opts["key"] = $key;
            $opts["prefix"] = $prefix;

            $field = $this->buildField($key, $opts);
            $group->addField($field);
        }

        return $group->get();
    }

    private function buildField($id, $opts)
    {
        $field = new \NorthernBeat\FormField($opts);
        return $field->get();
    }
}

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

    public function __construct($key, $title, $postType)
    {
        $this->key = $key;
        $this->title = $title;
        $this->postType = $postType;
    }

    public function addField($f)
    {
        $this->fields[] = $f;
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
            "menu_order" => 0,
            "position" => "normal",
            "style" => "default",
            "label_placement" => "left",
            "instruction_placement" => "label",
            "hide_on_screen" => "",
            "active" => 1,
            "description" => ""
        );
    }
}

class FormField
{
    protected $key;
    protected $label;
    protected $name;
    protected $type = "text";
    protected $instructions;
    protected $required = 0;
    protected $conditionalLogic = 0;
    protected $wrapperWidth = "";
    protected $wrapperClass = "";
    protected $wrapperId = "";
    protected $defaultValue = "";
    protected $placeholder = "";
    protected $prepend = "";
    protected $append = "";
    protected $maxLength = "";
    protected $readonly;
    protected $disabled;
    protected $prefix;

    public function __construct($in = array())
    {
        $prefix = null;

        if (isset($in["prefix"])) {
            $this->prefix = $in["prefix"];
            unset($in["prefix"]);
        }
        
        if (is_array($in)) {
            foreach ($in as $key => $val) {
                if (property_exists($this, $key)) {

                    if ("key" == $key && isset($this->prefix)) {
                        $key = $prefix . $key;
                    }
                    
                    $this->$key = $val;
                }
            }
        }

        if (!isset($this->name)) {
            $this->name = $this->key;
        }
    }
    
    public function get()
    {
        return array (
            "key" => $this->key,
            "label" => $this->label,
            "name" => $this->name,
            "type" => $this->type,
            "instructions" => $this->instructions,
            "required" => $this->required,
            "conditional_logic" => $this->conditionalLogic,
            "wrapper" => array (
                "width" => $this->wrapperWidth,
                "class" => $this->wrapperClass,
                "id" => $this->wrapperId,
            ),
            "default_value" => $this->defaultValue,
            "placeholder" => $this->placeholder,
            "prepend" => $this->prepend,
            "append" => $this->append,
            "maxlength" => $this->maxLength,
            "readonly" => $this->readonly,
            "disabled" => $this->disabled
        );
    }
}
    