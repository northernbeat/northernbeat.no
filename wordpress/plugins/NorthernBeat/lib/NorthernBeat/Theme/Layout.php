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
            // var_dump("|" . $line . "|");
            $line = trim($line);
        
            if (strlen($line) > 0 && substr($line, 0, 1) != "<") {
                $ret .= "<p>" . $line . "</p>";
            } else {
                $ret .= $line;
            }
        }
        
        return $ret;
    }

}
