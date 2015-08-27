<?php

$data = Timber::get_context();
$tpl  = ['index.twig'];

Timber::render($tpl, $data);

?>
