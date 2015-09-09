<?php

namespace NorthernBeat\Theme;

class LayoutText extends \NorthernBeat\Theme\Layout
{
    protected $fields = array("heading", "plaintext");


    
    public function getHeading()
    {
        if (isset($this->data["heading"])) {
            return $this->data["heading"];
        }
    }


    public function getText()
    {
        return $this->getPlaintext("plaintext");
    }

}
