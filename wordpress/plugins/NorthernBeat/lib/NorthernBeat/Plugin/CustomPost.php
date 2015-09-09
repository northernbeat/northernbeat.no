<?php

namespace NorthernBeat\Plugin;

class CustomPost
{

    protected $id;
    protected $plural;
    protected $singular;
    protected $public = true;
    protected $archive = true;
    protected $menuPosition = 1;
    protected $slug;
    protected $supports = array("title");
    protected $icon;
    protected $form = array();

    public function __construct()
    {
    }


    public function register()
    {
        register_post_type($this->id,
                           array(
                               "label" => __($this->plural),
                               "labels" => array(
                                   "name" => __($this->plural),
                                   "singular_name" => __($this->singular)
                               ),
                               "public" => $this->public,
                               // "menu_position" => $this->menuPosition,
                               "has_archive" => $this->archive,
                               "rewrite" => array("slug" => $this->slug),
                               "supports" => $this->supports,
                               "menu_icon" => $this->icon
                           )
        );
        flush_rewrite_rules();
    }



    public function buildForm()
    {
        $form = new \NorthernBeat\Plugin\FormBuilder($this->form, $this->id);
        $form->parse();
    }
            
}
