<?php

namespace NorthernBeat\Theme;

class LayoutQuote extends \NorthernBeat\Theme\Layout
{

    protected $fields = array("quote", "quotetarget", "quote-random");
    protected $quote;



    public function getQuote()
    {
        if (!is_object($this->quote)) {
            if (isset($this->data["quote-random"]) && "random" == $this->data["quote-random"]) {
                $this->fetchRandom();
            } else {
                $this->quote = new \NorthernBeat\Theme\Quote($this->data["quote"]);
            }
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



    private function fetchRandom()
    {
        $args = array("orderby"   => "rand",
                      "post_type" => "quote");

        $tmp = \Timber::get_post($args, "\\NorthernBeat\\Theme\\Quote");
        $this->quote = $tmp;
    }

}
