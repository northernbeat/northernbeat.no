<?php

namespace NorthernBeat\Theme;

class Quote extends \NorthernBeat\Theme\Post
{

    private $customer;


    
    public function getName()
    {
        if (isset($this->custom["quote-name"])) {
            return $this->custom["quote-name"];
        }
    }


    
    public function getTitle()
    {
        if (isset($this->custom["quote-title"])) {
            return $this->custom["quote-title"];
        }
    }


    
    public function getText()
    {
        if (isset($this->custom["quote-plaintext"])) {
            return $this->custom["quote-plaintext"];
        }
    }


    
    private function fetchCustomer()
    {
        if (!isset($this->customer)) {
            if (isset($this->custom["quote-customer"])) {
                $this->customer = new \NorthernBeat\Theme\Customer($this->custom["quote-customer"]);
            }
        }
    }



    public function getCustomer()
    {
        $this->fetchCustomer();

        if (isset($this->customer)) {
            return $this->customer->getName();
        }
    }



    public function hasFooter()
    {
        $customer = $this->getCustomer();
        $name     = $this->getName();
        
        if (isset($customer) && strlen($customer) > 0 && isset($name) && strlen($name) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
