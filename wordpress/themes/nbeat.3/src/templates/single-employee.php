<?php

$args          = array("post_type" => "case");
$data          = Timber::get_context();
$data["posts"] = Timber::get_posts($args);

echo "<pre>";
print_r($data);
echo "</pre>";

Timber::render("case/archive.twig", $data);

?>
