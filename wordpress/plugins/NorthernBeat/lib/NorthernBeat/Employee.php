<?php

namespace NorthernBeat;

class Employee extends \NorthernBeat\CustomPost
{

    public function __construct()
    {
        $this->id = "employee";
        $this->plural = "Ansatte";
        $this->singular = "Ansatt";
        $this->slug = "employee";
        $this->icon = "dashicons-groups";

        /*
        $this->form = array(array("group" => array("title" => "Kontaktinformasjon"),
                                  "firstname",
                                  "lastname",
                                  "title",
                                  "email" => array("append" => "@northernbeat.no")
                                  "phone" => array("prepend" => "+47")),
                            array("group" => array("title" => "Beskrivelse"),
                                  "plaintext"),
                            array("group" => array("Portrett"),
                                  "photo")
        */
        $this->form = array(array("group" => array("contact",
                                                   "Kontaktinformasjon",
                                                   $this->id,
                                                   "emp-"),
                                  "firstname", "lastname", "email", "phone"),
                            array("group" => array("photo",
                                                   "Bilde",
                                                   $this->id,
                                                   "emp-"),
                                  "photo")
        );
    }
}
