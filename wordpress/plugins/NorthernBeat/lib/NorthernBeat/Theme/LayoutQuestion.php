<?php

namespace NorthernBeat\Theme;

class LayoutQuestion extends \NorthernBeat\Theme\Layout
{
    protected $fields = array("num", "question", "answers");


    public function getQuestion()
    {
        if (isset($this->data["question"])) {
            return $this->data["question"];
        }
    }


    
    public function getId()
    {
        if (isset($this->data["num"])) {
            return $this->data["num"];
        } else {
            error_log("no num set");
        }
    }
    

    
    public function getAnswers()
    {
        $ret = array();
        
        if (isset($this->data["answers"])) {
            foreach ($this->data["answers"] as $key => $val) {
                $id = md5($val["answer"]);
                if (1 == $val["correct"]) {
                    $id = md5("q" . $this->getId() . "rekti");
                }
                
                $ret[] = array("id"   => $id,
                               "text" => $val["answer"]);
            }
        }

        return $ret;
    }

}
