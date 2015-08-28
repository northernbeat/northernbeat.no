<?php

$data = Timber::get_context();
$data["post"] = new \NorthernBeat\Post();
$data["post"]->populatePeopleList();

Timber::render("pages/single.twig", $data);

?>
