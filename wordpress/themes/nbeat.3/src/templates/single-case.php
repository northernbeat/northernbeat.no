<?php

$data = Timber::get_context();
$data["post"] = new TimberPost();

$people = array();
foreach ($data["post"]->get_field("people") as $key => $val) {
    $id = $val->ID;
    $people[$id] = get_field_objects($val->ID);
}
// $data["people-acf"] = $people;

// print_r($data["post"]);

Timber::render("case/single.twig", $data);

?>
