<?php

namespace NorthernBeat\Theme;

class Showcase extends \NorthernBeat\Theme\Post
{

    protected $customers = array();
    protected $classOverride = "case";
    
    
    protected function fetchCustomers()
    {
        if (count($this->customers) < 1) {
        
            if (isset($this->custom["case-customers"])) {
                foreach ($this->custom["case-customers"] as $c) {
                    $tmp = new \NorthernBeat\Theme\Customer($c);
                    $this->customers[] = $tmp;
                }
            }
        }

        return $this->customers;
    }



    public function getCustomers()
    {
        $list = array();

        foreach ($this->fetchCustomers() as $c) {
            $list[] = $c->getName();
        }

        return implode(", ", $list);
    }



    public function getThumbTitle()
    {
        if ($this->hasProp("thumbheading")) {
            return $this->getProp("thumbheading");
        } else {
            return $this->post_title;
        }
    }



    public function getThumbIngress()
    {
        if ($this->hasProp("thumbingress")) {
            return $this->getProp("thumbingress");
        } else {
            return $this->getProp("ingress");
        }
    }



    public function getCoverImage()
    {
        $img = new \TimberImage($this->getProp("coverimage"));
        return $img->src;
    }



    public function getThumbImage()
    {
        if ($this->hasProp("thumbimage")) {
            $img = new \TimberImage($this->getProp("thumbimage"));
            return $img->src;
        } else {
            return $this->getCoverImage();
        }
    }


    private function usePredefinedColors()
    {
        if ("self" == $this->getProp("colorscheme-radio")) {
            return false;
        } else {
            return true;
        }
    }


    
    private function useTint()
    {
        if ($this->hasProp("color-tint")) {
            if (true == $this->getProp("color-tint")) {
                return true;
            } else {
                return false;
            }
        }
    }



    private function getPredefinedColor()
    {
        if ($this->hasProp("colorscheme-pre")) {
            return $this->getProp("colorscheme-pre");
        } else {
            return "default";
        }
    }



    private function getUserColors()
    {
        $data = array("bg" => "#575757",
                      "fg" => "#ffffff");
        
        if ($this->hasProp("colorpicker-bg") && $this->hasProp("colorpicker-fg")) {
            $data["bg"] = $this->getProp("colorpicker-bg");
            $data["fg"] = $this->getProp("colorpicker-fg");
        }
        
        return $data;
    }
    

    
    public function getBgCss()
    {
        if ($this->usePredefinedColors()) {
            return "no-nbeat-bg-" . $this->getPredefinedColor();
        } else {
            return "no-nbeat-bg-attrs";
        }
    }


    
    public function getFgCss()
    {
        if ($this->usePredefinedColors()) {
            return "no-nbeat-fg-" . $this->getPredefinedColor();
        } else {
            return "no-nbeat-fg-attrs";
        }
    }


    
    public function getThumbCssClasses()
    {
        $set = array();
        
        if ($this->usePredefinedColors()) {
            $set[] = "no-nbeat-bg-" . $this->getPredefinedColor();
        } else {
            $set[] = "no-nbeat-bg-attrs";
        }
        
        if ($this->useTint()) {
            $set[] = "no-nbeat-bg-tint";
        }

        return implode($set, " ");
    }



    public function getColorAttrs()
    {
        if ($this->usePredefinedColors()) {
            return;
        }

        $set = $this->getUserColors();
        $attrs = sprintf("data-bg=\"%s\" data-fg=\"%s\"",
                         $set["bg"], $set["fg"]);

        return $attrs;
    }


    
    public function getColorFgAttrs()
    {
        if ($this->usePredefinedColors()) {
            return;
        }

        $set = $this->getUserColors();
        $attrs = sprintf("data-fg=\"%s\"",
                         $set["bg"]);

        return $attrs;
    }

    public function getNext()
    {
        $tmp = $this->next();

        if ($tmp) {
            $obj = new \NorthernBeat\Theme\Showcase($tmp->id);
            return $obj;
        }
    }

    public function getLink()
    {
        if (!$this->hasProp("webpage")) {
            return false;
        }

        $href = $this->getProp("webpage");

        if ($this->hasProp("webpagetitle")) {
            $title = $this->getProp("webpagetitle");
        } else {
            $url   = parse_url($href);
            $title = $url["host"];

            if ("www." == substr($title, 0, 4)) {
                $title = substr($title, 4);
            }
        }

        return array("url" => $href, "title" => $title);
    }

}
