<?php

namespace NorthernBeat\Theme;

class LayoutMetrics extends \NorthernBeat\Theme\Layout
{
    protected $fields = array("mheading", "mtext", "metrics");


    public function getMetrics()
    {
        return $this->data["metrics"];
    }


    
    public function getHeading()
    {
        if (isset($this->data["mheading"])) {
            return $this->data["mheading"];
        }
    }


    
    public function getText()
    {
        return $this->getPlaintext("mtext");
    }

}
