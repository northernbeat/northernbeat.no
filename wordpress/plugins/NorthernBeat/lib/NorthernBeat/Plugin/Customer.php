<?php

namespace NorthernBeat\Plugin;

class Customer extends \NorthernBeat\Plugin\CustomPost
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
                  array("tab", ["key" => "cus-tab-about",
                                "label" => "Om kunden"],
                        "homepage", "description",

                        "tab", ["key" => "cus-tab-logo",
                                "label" => "Logo"],
                        "logo",

                        "tab", ["key" => "cus-tab-social",
                                "label" => "Sosiale medier"],
                        "facebook", "twitter", "instagram", "snapchat"
                  ),
                  array("labelPlacement" => "left",
                        "style" => "normal")
            ),
        );

    }
}
