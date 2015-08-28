<?php

$args          = array("post_type" => "case");
$data          = Timber::get_context();
$data["posts"] = Timber::get_posts($args);

Timber::render("pages/cases.twig", $data);

?>
