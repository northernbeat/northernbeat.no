<?php

namespace NorthernBeat\Theme;

class LayoutAgenda extends \NorthernBeat\Theme\Layout
{

    protected $fields = array("heading", "agendaitem");


    
    public function getHeading()
    {
        return $this->data["heading"];
    }



    public function getItems()
    {
        return $this->data["agendaitem"];
    }



    // public function getWidth()
    // {
    //     if (isset($this->data["gridwidth"])) {
    //         return $this->data["gridwidth"];
    //     }
    // }



    // public function getListClasses()
    // {
    //     if (3 == $this->data["numperrow"]) {
    //         return "list-of-three";
    //     } else if (2 == $this->data["numperrow"]) {
    //         return "list-of-two";
    //     } else {
    //         return "list-of-one";
    //     }
    // }



    // public function getItems()
    // {
    //     if (count($this->list) < 1) {
    //         $this->fetchItems();
    //     }

    //     return $this->list;
    // }



    // private function fetchItems()
    // {
    //     $type    = $this->data["posttype"];
    //     $classes = array("employee" => "Employee",
    //                      "case"     => "Showcase",
    //                      "service"  => "Service",
    //                      "quote"    => "Quote");
    //     $class   = "\\NorthernBeat\\Theme\\" . $classes[$type];
    //     $args    = array("post_type" => $type,
    //                      "orderby"   => $this->data["orderby"],
    //                      "order"     => $this->data["order"]);

    //     if ("all" != $this->data["numitems"]) {
    //         $args["numberposts"] = $this->data["numitems"];
    //     }

    //     $this->list = \Timber::get_posts($args, $class);
    // }

}
