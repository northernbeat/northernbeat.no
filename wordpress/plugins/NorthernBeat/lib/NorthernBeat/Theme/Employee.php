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
        $append = "@nbeat.no";

        return $this->getProp("email") . $append;
    }



    public function getPhone()
    {
        $prepend = "+47 ";

        return $prepend . $this->getProp("phone");
    }



    public function getModalId()
    {
        // print_pre_r($this);
        return "modal-" . md5($this->getFirstname() . $this->getLastname());
    }



    public function getSlug()
    {
        return $this->slug;
    }
}
