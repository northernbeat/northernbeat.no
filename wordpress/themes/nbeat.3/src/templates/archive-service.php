<?php

$args          = array("post_type" => "service");
$data          = Timber::get_context();
$data["posts"] = Timber::get_posts($args);

Timber::render("service/archive.twig", $data);

?>
