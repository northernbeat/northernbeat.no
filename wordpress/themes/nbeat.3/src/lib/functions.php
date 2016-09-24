<?php

require_once("vendor/autoload.php");

// if (!class_exists("Timber")) {
//     require_once("vendor/jarednova/timber/timber.php");
// }

function print_pre_r($in)
{
    print "<pre>";
    print_r($in);
    print "</pre>";
}

if (class_exists("TimberSite") && class_exists("\NorthernBeat\Theme\Site")) {
    new \NorthernBeat\Theme\Site();
} else {
    echo "Missing plugins: Timber and/or NorthernBeat. Please go to admin page and resolve the issues.";
    error_log("*** Missing plugins: Timber and/or NorthernBeat");
}

$timberCacheTime = 86400;
// $loader = new TimberLoader();
// $loader->clear_cache_timber();
