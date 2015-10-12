<?php

$data = Timber::get_context();
$data["post"] = new \NorthernBeat\Theme\Service();

Timber::render("pages/service.twig", $data, 86400);
