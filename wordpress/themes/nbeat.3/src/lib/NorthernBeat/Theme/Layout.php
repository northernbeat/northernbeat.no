<?php

namespace NorthernBeat\Theme;

class Layout
{

    protected $data = array();
    protected $fields = array();


    
    public function __construct()
    {
        $this->fields = array_flip($this->fields);
    }



    public function set($key, $val)
    {
        if ("type" == $key || isset($this->fields[$key])) {
            $this->data[$key] = $val;
        }
    }



    public function getType()
    {
        return $this->data["type"];
    }



    protected function getPlaintext($field)
    {
        if (!isset($this->data[$field])) {
            return false;
        }

        $tmp = $this->data[$field];
        $ret = "";
        
        foreach (explode("\n", $tmp) as $line) {
            if (trim($line)) {
                $ret .= "<p>" . $line . "</p>";
            }
        }
        
        return $ret;
    }

}
