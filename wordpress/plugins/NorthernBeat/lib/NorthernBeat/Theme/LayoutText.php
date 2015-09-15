<?php

namespace NorthernBeat\Theme;

class LayoutText extends \NorthernBeat\Theme\Layout
{

    protected $fields = array("heading", "richtext", "numcolumns");


    
    public function getHeading()
    {
        if (isset($this->data["heading"])) {
            return $this->data["heading"];
        }
    }


    
    public function getText()
    {
        return $this->getPlaintext("richtext");
    }
    
    
    
    public function getNumColumns()
    {
        if (isset($this->data["numcolumns"])) {
            return $this->data["numcolumns"];
        } else {
            return 1;
        }
    }

}
