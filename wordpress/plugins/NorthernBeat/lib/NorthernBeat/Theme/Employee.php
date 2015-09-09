<?php

namespace NorthernBeat\Theme;

class Employee extends \NorthernBeat\Theme\Post
{
    
    public function getPhoto()
    {
        if (isset($this->custom["employee-photo"])) {
            $img = new \TimberImage($this->custom["employee-photo"]);
            return $img->src;
        }
    }



    public function getEmail()
    {
        $append = "@northernbeat.no";

        return $this->getProp("email") . $append;
    }



    public function getPhone()
    {
        $prepend = "+47 ";

        return $prepend . $this->getProp("phone");
    }

}
