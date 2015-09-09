<?php

$data = Timber::get_context();

// Set data related to header and UI
$data["header"] = array("classes" => "no-nbeat-bg-blue no-nbeat-fp",
                        "logo"    => "logo-white",
                        "slogan"  => Timber::compile("modules/slogan.twig"));

// Fetch cases
$args = array("post_type" => "case",
              "numberposts" => 3,
              "orderby" => "id",
              "order" => "asc");
$data["cases"] = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Showcase");

// Fetch serivces
$args = array("post_type" => "service",
              "orderby" => "id",
              "order" => "asc");
$data["servicesListClasses"] = "list-of-three";
$data["services"] = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Service");

// Fetch quote
$args = array("post_type" => "quote",
              "orderby" => "rand");
$data["quote"] = Timber::get_post($args, "\\NorthernBeat\\Theme\\Quote");

// print_pre_r($data["cases"]);

// Render page
Timber::render("pages/frontpage.twig", $data);

?>
