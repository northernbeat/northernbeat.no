<?php

namespace NorthernBeat;

class Customer extends \NorthernBeat\CustomPost
{

    public function __construct()
    {
        $this->id       = "customer";
        $this->prefix   = "cus-";
        $this->plural   = "Kunder";
        $this->singular = "Kunde";
        $this->archive  = false;
        $this->slug     = "kunder";
        $this->icon     = "dashicons-groups";

        $this->form = array(
            array("details", "Detaljer",
                  array("tab", ["key" => "tab-about", "label" => "Om kunden"],
                        "homepage", "description",

                        "tab", ["key" => "tab-logo", "label" => "Logo"],
                        "logo",

                        "tab", ["key" => "tab-social", "label" => "Sosiale medier"],
                        "facebook", "twitter", "instagram", "snapchat"
                  ),
                  array("labelPlacement" => "left",
                        "style" => "normal")
            ),
        );

    }
}
