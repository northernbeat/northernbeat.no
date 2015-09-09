<?php

namespace NorthernBeat\Theme;

class Customer extends \NorthernBeat\Theme\Post
{

    public function getName()
    {
        return $this->post_title;
    }
    
}
