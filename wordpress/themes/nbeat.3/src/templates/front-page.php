<?php

$data = Timber::get_context();

// Set data related to header and UI
$data["header"] = array("classes" => "no-nbeat-bg-blue no-nbeat-fp",
                        "logo"    => "logo-white",
                        "slogan"  => Timber::compile("modules/slogan.twig"));

$data["post"] = new \NorthernBeat\Theme\Page();
$data["page"]["noHeader"] = true;

Timber::render("pages/page.twig", $data, 86400);
