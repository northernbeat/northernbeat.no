<?php

namespace NorthernBeat;

class CustomPost
{

    protected $id;
    protected $plural;
    protected $singular;
    protected $public = true;
    protected $archive = true;
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
                               "labels" => array(
                                   "name" => __($this->plural),
                                   "singular_name" => __($this->singular)
                               ),
                               "public" => $this->public,
                               "has_archive" => $this->archive,
                               "rewrite" => array("slug" => $this->slug),
                               "supports" => $this->supports,
                               "menu_icon" => $this->icon
                           )
        );
    }



    public function buildForm()
    {
        $form = new \NorthernBeat\FormBuilder($this->form, $this->id, $this->prefix);
        $form->parse();
    }
            
}
