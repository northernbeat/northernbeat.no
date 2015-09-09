<?php

namespace NorthernBeat\Theme;

class LayoutQuote extends \NorthernBeat\Theme\Layout
{
    protected $fields = array("quote", "quotetarget");
    protected $quote;

    public function getQuote()
    {
        if (!is_object($this->quote)) {
            $this->quote = new \NorthernBeat\Theme\Quote($this->data["quote"]);
        }

        return $this->quote;
    }

    public function getCssClasses()
    {
        if ("nbeat" == $this->data["quotetarget"]) {
            return "no-nbeat-bg-blue";
        } else {
            return "no-nbeat-bg-white";
        }
    }

}
