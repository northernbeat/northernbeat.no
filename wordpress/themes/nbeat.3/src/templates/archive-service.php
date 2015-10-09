<?php

$args          = array("post_type" => "service");
$data          = Timber::get_context();
$data["posts"] = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Service");

Timber::render("pages/services.twig", $data, 600);
