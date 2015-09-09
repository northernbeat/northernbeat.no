<?php

namespace NorthernBeat\Theme;

class Service extends \NorthernBeat\Theme\Post
{
    private $icon;


    
    public function getName()
    {
        return $this->post_title;
    }


    
    public function fetchIcon()
    {
        if (!isset($this->icon)) {
            if (isset($this->custom["service-icon"])) {
                $this->icon = new \TimberImage($this->custom["service-icon"]);
            }
        }
    }


    
    public function getIcon()
    {
        $this->fetchIcon();
        return $this->icon->url;
    }


    
    public function getDescription()
    {
        if (isset($this->custom["service-description"])) {
            return $this->custom["service-description"];
        }
    }
    
}
