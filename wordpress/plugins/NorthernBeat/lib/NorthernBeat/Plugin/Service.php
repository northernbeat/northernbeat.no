<?php

namespace NorthernBeat;

class Service extends \NorthernBeat\CustomPost
{

    public function __construct()
    {
        $this->id       = "service";
        $this->prefix   = "ser-";
        $this->plural   = "Tjenester";
        $this->singular = "Tjeneste";
        $this->slug     = "tjenester";
        $this->icon     = "dashicons-screenoptions";
        
    }
}
