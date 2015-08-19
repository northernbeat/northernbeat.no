<?php
/**
 * Plugin Name: Northern Beat
 * Description: Northern Beat website plugin. Sets up custom post and
 *              page types, adds smart links and custom dashboard pages.
 * Author: eirikref
 * Version: 1.0.0
 */

class NorthernBeat
{

    function __construct()
    {
        // add_action("admin_menu", array($this, "addAdminMenus"));
        add_action("init", array($this, "registerPostTypes"));
    }

    function addAdminMenus()
    {
        add_menu_page("Northern Beat",
                      "Northern Beat",
                      "manage_options"
        );
    }

    function registerPostTypes()
    {
        register_post_type("cases",
                            array(
                                "labels" => array(
                                    "name" => __("Case"),
                                    "singular_name" => __("Case")
                                ),
                                "public" => true,
                                "has_archive" => true,
                                "rewrite" => array("slug" => "case")
                            )
        );
        
    }
}

$nb = new NorthernBeat();

?>
