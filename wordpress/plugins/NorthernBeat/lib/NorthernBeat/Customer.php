<?php

namespace NorthernBeat;

class Customer extends \NorthernBeat\CustomPost
{

    public function __construct()
    {
        $this->id = "customer";
        $this->plural = "Ansatte";
        $this->singular => "Ansatt";
        $this->slug = "menneskene";
        $this->icon = "dashicons-groups";
    }
}
