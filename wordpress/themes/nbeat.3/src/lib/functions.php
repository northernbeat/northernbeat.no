<?php

require_once("vendor/autoload.php");

if (!class_exists("Timber")) {
    require_once("vendor/jarednova/timber/timber.php");
}

new NorthernBeat\Site();
