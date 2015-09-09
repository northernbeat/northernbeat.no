<?php

$data = Timber::get_context();
$data["post"] = new \NorthernBeat\Theme\Employee();

Timber::render("pages/employee.twig", $data);

?>
