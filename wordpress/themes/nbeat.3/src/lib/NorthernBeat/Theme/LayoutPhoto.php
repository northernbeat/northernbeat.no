<?php

namespace NorthernBeat\Theme;

class LayoutPhoto extends \NorthernBeat\Theme\Layout
{
    protected $fields = array("one-or-two-photos", "photowidth", "caption");

    public function getNumPhotos()
    {
        return count($this->data["one-or-two-photos"]);
    }

    public function getNumPhotosClass()
    {
        if (2 == count($this->data["one-or-two-photos"])) {
            return "list-of-two";
        } else {
            return "list-of-one";
        }
    }

    public function getPhotos()
    {
        $ret = array();
        
        foreach ($this->data["one-or-two-photos"] as $p) {
            $ret[] = new \TimberImage($p);
        }

        return $ret;
    }

    public function getWidth()
    {
        return $this->data["photowidth"];
    }
    
}
