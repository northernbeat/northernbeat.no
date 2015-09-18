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

if (class_exists("TimberSite")) {
    new NorthernBeat\Theme\Site();
}
