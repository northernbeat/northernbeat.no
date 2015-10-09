<?php

$data = Timber::get_context();
$data["post"] = new \NorthernBeat\Theme\Page();

Timber::render("pages/page.twig", $data, 600);
