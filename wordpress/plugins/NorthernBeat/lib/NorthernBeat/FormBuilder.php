<?php

namespace NorthernBeat;

class FormBuilder
{

    // Advanced fields
    private $advanced = array(
        "tab"       => array("class"    => "FormFieldTab"),
        "post"      => array("class"    => "FormFieldPost"),
        "content"   => array("class"    => "FormFieldComplexContent",
                             "label"    => "Innhold"),
        "contactUs" => array("class"    => "FormFieldComplexContactUs"),
        "customer"  => array("class"    => "FormFieldPost",
                             "key"      => "customer",
                             "label"    => "Kunde",
                             "postType" => array("customer"),
                             "multiple" => false),
        "customers" => array("class"    => "FormFieldPost",
                             "key"      => "customer",
                             "label"    => "Kunde",
                             "postType" => array("customer"),
                             "multiple" => true),
        "selectQuote"  => array("class"    => "FormFieldPost",
                                "key"      => "quote",
                                "label"    => "Sitat",
                                "postType" => array("quote"),
                                "multiple" => false),
    );

    // Simple fields
    private $simple = array(
        
        // Personal-ish about/contact information
        "name" => array("label" => "Navn",
                        "type" => "text"),
        "firstname" => array("label" => "Fornavn",
                             "type" => "text"),
        "lastname" => array("label" => "Etternavn",
                            "type" => "text"),
        "email" => array("label" => "Epost",
                         "type" => "text",
                         "append" => "@northernbeat.no"),
        "phone" => array("label" => "Telefon",
                         "type" => "text",
                         "prepend" => "+47"),
        "title" => array("label" => "Tittel/rolle",
                         "type" => "text"),

        // Social media
        "facebook" => array("label" => "Facebook",
                            "type" => "text",
                            "prepend" => "https://facebook.com/"),
        "instagram" => array("label" => "Instagram",
                            "type" => "text",
                            "prepend" => "https://instagram.com/"),
        "twitter" => array("label" => "Twitter",
                           "type" => "text",
                           "prepend" => "https://twitter.com/"),
        "snapchat" => array("label" => "Snapchat",
                            "type" => "text"),
        "homepage" => array("label" => "Webside",
                            "type" => "url"),

        // Images
        "photo" => array("label" => "Bilde",
                         "type" => "image"),
        "logo" => array("label" => "Logo",
                         "type" => "image"),

        // Text fields
        "description" => array("label" => "Beskrivelse",
                               "type" => "textarea"),
        "plaintext" => array("label" => "Tekst",
                             "type" => "textarea"),


    );

    // Layouts
    private $layouts = array(
        // Quote
        "quote" => array("label" => "Sitat",
                         "fields" => array("selectQuote", "name")
        )
    );



    public function __construct($input, $postType, $prefix)
    {
        $this->orig     = $input;
        $this->postType = $postType;
        $this->prefix   = $prefix;
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
            $this->log($groupData);
            acf_add_local_field_group($groupData);
        }
    }

    private function parseGroup(array $g)
    {
        $key       = $g[0];
        $label     = $g[1];
        $fields    = $g[2];
        $groupOpts = array();

        if (isset($g[3]) && is_array($g[3])) {
            $groupOpts = $g[3];
        }

        $group = new \NorthernBeat\FormGroup($key, $label, $this->postType, $this->prefix, $groupOpts);
        $list = $this->parseFields($fields);
        $group->setFields($list);
        
        return $group->get();
    }



    private function parseFields($fields)
    {
        $ret = array();
        
        for ($i = 0; $i < count($fields); ++$i) {
            $name = $fields[$i];
            $opts  = array();
            $next  = $i + 1;
            $field = null;
            
            if (is_array($name)) {
                continue;
            }

            if (isset($fields[$next]) && is_array($fields[$next])) {
                $opts = $fields[$next];
            }

            if (!isset($opts["key"])) {
                $opts["key"] = $this->prefix . $name;
            }

            // If target is one of the predefined classes, ie. tab
            if (isset($this->advanced[$name])) {
                $class = "\\NorthernBeat\\" . $this->advanced[$name]["class"];
                $opts  = array_merge($this->advanced[$name], $opts);
                $field = new $class($opts, $this);

            // If target is a predefined simple field, ie. firstname
            } elseif (isset($this->simple[$name])) {
                $opts = array_merge($this->simple[$name], $opts);
                $field = new \NorthernBeat\FormField($opts, $this);
            } else {
                die(sprintf("Invalid custom post field configuration. Post type: %s, Group: %s, Field: %s",
                            $this->postType, $key, $name));
            }

            $ret[] = $field->get();
        }

        return $ret;
    }

    

    public function getLayout($l, $parentKey)
    {
        if (!isset($this->layouts[$l])) {
            die("Invalid layout '$l'");
        }

        $opts = $this->layouts[$l];
        $opts["key"] = $parentKey . "-" . $l;
        
        $fields = $opts["fields"];
        unset($opts["fields"]);
        $layout = new \NorthernBeat\FormLayout($opts);
        $list = $this->parseFields($fields);
        $layout->setFields($list);

        return $layout->get();
    }



    private function log($in)
    {
        $file = "/tmp/wp-debug.log";
        $fh = fopen($file, "a");

        fwrite($fh, print_r($in, true));
        fclose($fh);
    }

}
