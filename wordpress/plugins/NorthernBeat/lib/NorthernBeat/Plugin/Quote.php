<?php

namespace NorthernBeat\Plugin;

class Quote extends \NorthernBeat\Plugin\CustomPost
{

    public function __construct()
    {
        $this->id       = "quote";
        $this->prefix   = "quote-";
        $this->plural   = "Sitater";
        $this->singular = "Sitat";
        $this->archive  = false;
        $this->slug     = "sitater";
        $this->icon     = "dashicons-format-quote";

        $this->form = array(
            array("details", "Detaljer",
                  array("plaintext", "customer", "name", "title")
            ),
        );

    }
}
