<?php

namespace NorthernBeat\Theme;

class LayoutContactForm extends \NorthernBeat\Theme\Layout
{

    protected $fields = array("heading", "contactform");


    
    public function getHeading()
    {
        // print_pre_r($this);
        // $post = new \TimberPost($this->data["contactform"]);
        // print_pre_r($post);
        return $this->data["heading"];
    }



    public function getForm()
    {
        $form = new \TimberPost($this->data["contactform"]);
        $code = sprintf("[contact-form-7 id=\"%s\" title=\"%s\"]",
                        $this->data["contactform"], $form->post_title);
        
        return do_shortcode($code);
    }

}
