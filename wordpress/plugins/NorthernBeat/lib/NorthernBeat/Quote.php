<?php

namespace NorthernBeat;

class Quote extends \NorthernBeat\CustomPost
{

    public function __construct()
    {
        $this->id = "quote";
        $this->plural = "Sitater";
        $this->singular => "Sitat";
        $this->archive = false;
        $this->slug = "sitater";
        $this->icon = "dashicons-format-quote";
    }
}
