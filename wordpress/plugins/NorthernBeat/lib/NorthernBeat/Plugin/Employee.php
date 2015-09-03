<?php

namespace NorthernBeat\Plugin;

class Employee extends \NorthernBeat\Plugin\CustomPost
{

    public function __construct()
    {
        $this->id       = "employee";
        $this->prefix   = "emp-";
        $this->plural   = "Ansatte";
        $this->singular = "Ansatt";
        $this->slug     = "menneskene";
        $this->icon     = "dashicons-groups";

        $this->form = array(
            array("details", "Detaljer",
                  array("tab", ["key" => "tab-about", "label" => "Personlig informasjon"],
                        "firstname", "lastname", "email", "phone", "description",

                        "tab", ["key" => "tab-photo", "label" => "Foto"],
                        "photo",

                        "tab", ["key" => "tab-social", "label" => "Sosiale medier"],
                        "facebook", "twitter", "instagram", "snapchat"
                  ),
            ),
        );
    }
}
