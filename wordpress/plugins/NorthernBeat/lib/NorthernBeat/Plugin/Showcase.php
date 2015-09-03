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
            array("basic", "Something",
                  array("tab", ["key" => "tab-basic", "label" => "Basic"],
                        "customers",
                        
                        "tab", ["key" => "tab-thumb", "label" => "Thumbnail"],
                        "photo", "plaintext",

                        "tab", ["key" => "tab-people", "label" => "Kontaktpersoner"],
                        "facebook",
                  ),
            ),
            array("content", "Innhold",
                  array("content", ["layouts" => ["quote"]])
            ),
        );

    }
}
