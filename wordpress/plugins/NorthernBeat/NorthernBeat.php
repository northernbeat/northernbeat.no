<?php
/**
 * Plugin Name: Northern Beat
 * Description: Northern Beat website plugin. Sets up custom post and page types, advanced post edit pages, etc.
 * Author: Northern Beat
 * Version: 1.0.0
 */

require_once("vendor/autoload.php");

class NorthernBeat
{

    private $postTypes = array("employee", "customer", "quote", "showcase");



    function __construct()
    {
        add_action("init", array($this, "registerPostTypes"));
        add_filter("upload_mimes", array($this, "registerMimeTypes"));
    }



    function registerPostTypes()
    {
        foreach ($this->postTypes as $p) {
            $class = "\\NorthernBeat\\Plugin\\" . ucfirst($p);
            $post  = new $class();

            $post->register();
            $post->buildForm();
        }
    }



    function registerMimeTypes($mimes)
    {
        $mimes["svg"] = "image/svg+xml";
        return $mimes;
    }
}

$nb = new NorthernBeat();

?>
