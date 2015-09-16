<?php

$data = Timber::get_context();
Timber::render("pages/404.twig", $data);
