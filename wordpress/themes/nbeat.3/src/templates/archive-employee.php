<?php

$args            = array("post_type"   => "employee",
                         "numberposts" => 50);
$data            = Timber::get_context();
$data["posts"]   = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Employee");
$data["classes"] = "list-of-three";
$data["post"]->title = "Menneskene";

// print_pre_r($data["posts"]);

Timber::render("pages/employees.twig", $data, $timberCacheTime);
