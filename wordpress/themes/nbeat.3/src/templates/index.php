<?php

$data = Timber::get_context();
$tpl  = ['index.twig'];

$data['posts'] = Timber::get_posts();

// if (is_home()) {
//     array_unshift($tpl, 'home.twig');
// }

Timber::render($tpl, $data);

?>
