<?php

namespace NorthernBeat;

class Case extends \NorthernBeat\CustomPost
{

    public function __construct()
    {
        $this->id = "case";
        $this->plural = "Case";
        $this->singular => "Case";
        $this->slug = "case";
        $this->icon = "dashicons-format-gallery";
    }
}
