<?php

$data = Timber::get_context();
$data["post"] = new \NorthernBeat\Theme\Showcase();

Timber::render("pages/case.twig", $data);

// print_pre_r($data);
// $obj = $data["post"]->getContent();
// print_pre_r($obj);

?>
