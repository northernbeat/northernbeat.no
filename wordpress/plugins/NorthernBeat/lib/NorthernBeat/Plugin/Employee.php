<?php

namespace NorthernBeat\Plugin;

class Employee extends \NorthernBeat\Plugin\CustomPost
{

    public function __construct()
    {
        $this->id       = "employee";
        $this->prefix   = "employee-";
        $this->plural   = "Ansatte";
        $this->singular = "Ansatt";
        $this->slug     = "menneskene";
        $this->icon     = "dashicons-groups";

        $this->form = array(
            array("groupDetails", "Detaljer",
                  array("tab", ["key" => "tabAbout",
                                "label" => "Personlig informasjon"],
                        "firstname", "lastname", "email", "phone", "title", "description",
                        
                        "tab", ["key" => "tabPhoto",
                                "label" => "Foto"],
                        "photo",

                        "tab", ["key" => "tabSocial",
                                "label" => "Sosiale medier"],
                        "facebook", "twitter", "instagram", "snapchat"
                  ),
            ),
        );
    }
}
