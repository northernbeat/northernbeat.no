<?php

namespace NorthernBeat\Plugin;

class Customer extends \PCP\Post
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
            array("groupDetails", "Detaljer",
                  array("tab", ["key" => "tabAbout",
                                "label" => "Om kunden"],
                        "webpage", "description",

                        "tab", ["key" => "tabLogo",
                                "label" => "Logo"],
                        "logo",

                        "tab", ["key" => "tabSocial",
                                "label" => "Sosiale medier"],
                        "facebook", "twitter", "instagram", "snapchat"
                  ),
                  array("labelPlacement" => "left",
                        "style" => "normal")
            ),
        );

    }
}
