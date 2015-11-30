<?php

$args            = array("post_type"   => "employee",
                         "numberposts" => 50);
$data            = Timber::get_context();
$data["posts"]   = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Employee");
$data["classes"] = "list-of-three";

// If set and valid, display the lightbox
$current = new \NorthernBeat\Theme\Employee();
$slug    = $current->getSlug();

if (is_string($slug) && strlen($slug) > 0) {
    $data["autoopen"] = $slug;
}

Timber::render("pages/employees.twig", $data, $timberCacheTime);
