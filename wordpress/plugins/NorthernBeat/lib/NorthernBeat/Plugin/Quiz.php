<?php

namespace NorthernBeat\Plugin;

class Quiz extends \NorthernBeat\Plugin\CustomPost
{

    public function __construct()
    {
        $this->id       = "quiz";
        $this->prefix   = "quiz-";
        $this->plural   = "Quiz";
        $this->singular = "Quiz";
        $this->slug     = "quiz";
        $this->icon     = "dashicons-forms";

        $this->form = array(
            array("groupQuestions", "Liste over spørsmål og svar",
                  array("content", ["layouts" => ["question"]]
                  ),
                  array("style" => "seamless")
            ),
        );
    }
}
