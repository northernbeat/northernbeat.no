<?php

$args            = array("post_type" => "employee");
$data            = Timber::get_context();
$data["posts"]   = Timber::get_posts($args);
$data["classes"] = "list-of-three";

Timber::render("pages/employees.twig", $data);

?>
