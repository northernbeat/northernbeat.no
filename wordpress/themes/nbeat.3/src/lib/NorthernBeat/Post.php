<?php

namespace NorthernBeat;

class Post extends \TimberPost
{

    public $peoplelist = array();



    public function populatePeopleList()
    {
        if (isset($this->people) && is_array($this->people)) {
            foreach ($this->people as $id) {
                $this->peoplelist[] = new \NorthernBeat\Post($id);
            }
        }
    }
    
}
