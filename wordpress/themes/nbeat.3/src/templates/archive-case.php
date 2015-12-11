<?php

$args          = array("post_type"   => "case",
                       "numberposts" => 50);
$data          = Timber::get_context();
$data["posts"] = Timber::get_posts($args, "\\NorthernBeat\\Theme\\Showcase");

Timber::render("pages/cases.twig", $data, $timberCacheTime);
