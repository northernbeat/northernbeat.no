<?php

namespace NorthernBeat\Plugin;

class Service extends \NorthernBeat\Plugin\CustomPost
{

    public function __construct()
    {
        $this->id       = "service";
        $this->prefix   = "service-";
        $this->plural   = "Tjenester";
        $this->singular = "Tjeneste";
        $this->slug     = "tjenester";
        $this->icon     = "dashicons-screenoptions";

        $this->form = array(
            array("groupAbout", "Om tjenesten",
                  array("tab", ["key" => "tabBasic", "label" => "Basisinformasjon"],
                        "icon", "description", ["instructions" => "Kort beskrivelse for brukt på forsiden"],
                        
                        "tab", ["key" => "tabContent", "label" => "Innhold"],
                        "content",

                        "tab", ["key" => "tabContact", "label" => "Kontakt oss"],
                        "set::contact",
                  ),
                  array("style" => "seamless")
            ),
        );
    }
}
