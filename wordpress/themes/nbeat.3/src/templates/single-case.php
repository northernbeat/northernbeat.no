<?php

$data = Timber::get_context();
$data["post"] = new \NorthernBeat\Theme\Showcase();

Timber::render("pages/case.twig", $data, 600);
