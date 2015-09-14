<?php

namespace NorthernBeat\Theme;

class LayoutContact extends \NorthernBeat\Theme\Layout
{
    protected $fields = array("contactheading", "contactingress", "employees");
    protected $employees = array();

    
    
    public function getHeading()
    {
        if (isset($this->data["contactheading"])) {
            return $this->data["contactheading"];
        }
    }


    
    public function getIngress()
    {
        if (isset($this->data["contactingress"])) {
            return $this->data["contactingress"];
        }
    }
    

    
    public function getEmployees()
    {
        if (!is_array($this->employees) || count($this->employees) < 1) {
            if (is_array($this->data["employees"]) && count($this->data["employees"]) > 0) {
                foreach ($this->data["employees"] as $id) {
                    $this->employees[] = new \NorthernBeat\Theme\Employee($id);
                }
            }
        }

        return $this->employees;
    }


}
