<?php

$data = Timber::get_context();
// $tpl  = ['layout/header.twig'];

// Timber::render($tpl, $data);

echo "<h1>404</h1>";

echo "<pre>";
print_r($data);
echo "</pre>";


?>
