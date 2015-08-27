<?php

$args          = array("post_type" => "employee");
$data          = Timber::get_context();
$data["posts"] = Timber::get_posts($args);

Timber::render("employee/archive.twig", $data);

?>
