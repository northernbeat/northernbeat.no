<?php

namespace NorthernBeat\Theme;

class Post extends \TimberPost
{

    protected $classOverride;


    public function __call($name, $args)
    {
        if ("get" == substr($name, 0, 3)) {
            return $this->getMagicProp($name);
        } else {
            $trace = debug_backtrace();
            trigger_error("Undefined property  " . $name,
                          E_USER_NOTICE);
        }
    }


    
    public function getClass()
    {
        if (isset($this->classOverride)) {
            $class = $this->classOverride;
        } else {
            $class = get_class($this);
        }

        $class = strtolower($class);

        if ($pos = strrpos($class, "\\")) {
            return substr($class, $pos + 1);
        } else {
            return $class;
        }
    }


    
    public function getMagicProp($id)
    {
        $id  = substr($id, 3);
        return $this->getProp($id);
    }


    
    public function hasProp($id, $type = "string")
    {
        $key = strtolower($this->getClass() . "-$id");

        if ("string" == $type) {
            if (isset($this->custom[$key]) && strlen($this->custom[$key]) > 0) {
                return true;
            }
        } elseif ("array" == $type) {
            if (isset($this->custom[$key]) && count($this->custom[$key]) > 0) {
                return true;
            }
        }

        return false;
    }


    
    public function getProp($id)
    {
        $key = strtolower($this->getClass() . "-$id");

        if ($this->hasProp($id)) {
            return $this->custom[$key];
        } else {
            return false;
        }
    }


    
    public function populatePeopleList()
    {
        if (isset($this->people) && is_array($this->people)) {
            foreach ($this->people as $id) {
                $this->peoplelist[] = new \NorthernBeat\Theme\Post($id);
            }
        }
    }



    public function getContent()
    {
        if (!$this->hasProp("content", "array")) {
            return array();
        }

        if (!isset($this->contentObjs)) {
            $list = $this->getRawLayoutList();
            $this->contentObjs = $this->populateLayouts($list);
        }
        
        return $this->contentObjs;
    }



    public function getNumContentItems()
    {
        return count($this->getContent);
    }

    
    private function getRawLayoutList()
    {
        $class   = strtolower($this->getClass());
        $key     = $class . "-content";
        $ret     = array();
        $maxLen  = count($this->custom[$key]);
        $other   = array();
        
        if (!isset($this->custom[$key]) || !is_array($this->custom[$key]) || count($this->custom[$key]) < 1) {
            return $ret;
        }

        foreach ($this->custom[$key] as $idx => $val) {
            $type = substr($val, strlen($key) + 1);
            $ret[$idx]["_label"] = $type;
        }
        
        foreach ($this->custom as $idx => $val) {
            if (0 == strncmp($idx, $key, strlen($key))) {
                $_substring = substr($idx, strlen($key) + 1);
                
                $elIdx = substr($_substring, 0, strpos($_substring, "_"));

                if ($elIdx < $maxLen) {
                    $_rawLabel = $this->custom[$class . "-content"][$elIdx];
                    $_label = substr($_rawLabel, strlen($class . "-content-"));
                    $_field = substr($_substring, strpos($_substring, "_") + strlen($class . "-") + 1);

                    // Metrics
                    if ("metrics_" == substr($_field, 0, strlen("metrics_"))) {
                        $_sub = substr($_field, strlen("metrics_"));
                        $_idx = substr($_sub, 0, strpos($_sub, "_"));
                        $_val = substr($_sub, strpos($_sub, "_") + strlen($class . "-") + 1);

                        $other[$elIdx]["metrics"][$_idx][$_val] = $val;
                    }

                    // Answers
                    else if ("answers_" == substr($_field, 0, strlen("answers_"))) {
                        $_sub = substr($_field, strlen("answers_"));
                        $_idx = substr($_sub, 0, strpos($_sub, "_"));
                        $_val = substr($_sub, strpos($_sub, "_") + strlen($class . "-") + 1);

                        $other[$elIdx]["answers"][$_idx][$_val] = $val;
                    } else {
                        $ret[$elIdx][] = array("field" => $_field,
                                               "value" => $val);
                    }
                }
            }
        }
        
        foreach ($other as $idx => $sub) {
            foreach ($sub as $name => $val) {
                $ret[$idx][] = array("field" => $name,
                                     "value" => $val);
            }
        }

        return $ret;
    }


    
    private function populateLayouts(array $list)
    {
        $classes = array("quote"    => "Quote",
                         "text"     => "Text",
                         "photo"    => "Photo",
                         "metrics"  => "Metrics",
                         "question" => "Question",
                         "contact"  => "Contact",
                         "listview" => "ListView");
        $ret = array();
        $i   = 1;
        
        foreach ($list as $raw) {
            $label = $raw["_label"];
            unset($raw["_label"]);
            $class = "\\NorthernBeat\\Theme\\Layout" . $classes[$label];
            $layout = new $class();

            $layout->set("type", $label);
            $layout->set("num", $i);
            
            foreach ($raw as $field) {
                $layout->set($field["field"], $field["value"]);
            }

            $ret[] = $layout;
            ++$i;
        }

        return $ret;
    }

}
