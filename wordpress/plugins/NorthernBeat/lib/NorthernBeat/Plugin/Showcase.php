<?php

namespace NorthernBeat\Plugin;

class Showcase extends \NorthernBeat\Plugin\CustomPost
{

    public function __construct()
    {
        $this->id       = "case";
        $this->prefix   = "case-";
        $this->plural   = "Case";
        $this->singular = "Case";
        $this->slug     = "case";
        $this->icon     = "dashicons-format-gallery";

        $this->form = array(
            array("groupCase", "Om caset",
                  array("tab", ["key" => "tabBasic", "label" => "Basisinformasjon"],
                        "customers", ["required" => true], "coverimage", "ingress", "webpage", "webpagetitle",
                        
                        "tab", ["key" => "tabContent", "label" => "Innhold"],
                        "content", ["layouts" => ["quote", "text", "photo", "metrics", "contact"]],

                        "tab", ["key" => "tabColors", "label" => "Farger"],
                        "set::color",

                        // "tab", ["key" => "tabPeople", "label" => "Kontaktpersoner"],
                        // "set::contact",

                        "tab", ["key" => "tabThumb", "label" => "Thumbnail"],
                        "message", ["message" => "Du kan bruke disse feltene til å overstyre bilde, overskrift og ingress i listevisning av case (feks. på forsiden). Hvis du ikke legger inn noe her, brukes bilde, overskrift og ingress som angitt i 'Basisinformasjon'."],
                        "photo", ["key" => "thumbimage"], "heading", ["key" => "thumbheading"],
                        "ingress", ["key" => "thumbingress"],
                  ),
                  array("style" => "seamless")
            ),
        );

    }
}
