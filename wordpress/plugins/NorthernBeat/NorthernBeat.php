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

    private $postTypes = array("employee", "customer", "quote", "showcase", "service", "quiz");



    function __construct()
    {
        add_action("init", array($this, "registerPostTypes"));
        add_action("init", array($this, "registerPageDatatypes"));
        add_action("admin_menu", array($this, "removeMetaBoxes"));
        add_filter("upload_mimes", array($this, "registerMimeTypes"));
        add_action("admin_enqueue_scripts", array($this, "addAdminCss"));
        add_action("login_enqueue_scripts", array($this, "addAdminCss"));
        add_filter("upload_size_limit", array($this, "setUploadSize"));
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


    
    function registerPageDatatypes()
    {
        $form = array(
            array("page", "pagecontent",
                  array("ingress",
                        "content", ["layouts" => ["text", "photo", "listview",
                                                  "quote", "contact"]],
                  ),
                  array("style" => "seamless")
            ),
        );

        $form = new \NorthernBeat\Plugin\FormBuilder($form, "page");
        $form->parse();
    }


    
    function removeMetaBoxes()
    {
        remove_meta_box("commentstatusdiv", "page", "normal");
        remove_meta_box("revisionsdiv", "page", "normal");
    }

    

    function registerMimeTypes($mimes)
    {
        $mimes["svg"] = "image/svg+xml";
        return $mimes;
    }



    function addAdminCss()
    {
        wp_enqueue_style("my-admin-theme", plugins_url("nbeat-admin-overrides.css", __FILE__));
    }



    function setUploadSize()
    {
        return 1024 * 1024 * 10;
    }

}

$nb = new NorthernBeat();

?>
