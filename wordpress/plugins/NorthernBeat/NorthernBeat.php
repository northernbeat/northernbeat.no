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
        register_post_type("case",
                           array(
                               "labels" => array(
                                   "name" => __("Case"),
                                   "singular_name" => __("Case")
                               ),
                               "public" => true,
                               "has_archive" => true,
                               "rewrite" => array("slug" => "case"),
                               "menu_icon" => "dashicons-format-gallery"
                           )
        );

        register_post_type("employee",
                           array(
                               "labels" => array(
                                   "name" => __("Menneskene"),
                                   "singular_name" => __("Menneske")
                               ),
                               "public" => true,
                               "has_archive" => true,
                               "rewrite" => array("slug" => "menneskene"),
                               "menu_icon" => "dashicons-groups"

                           )
        );

        register_post_type("service",
                           array(
                               "labels" => array(
                                   "name" => __("Tjenester"),
                                   "singular_name" => __("Tjeneste")
                               ),
                               "public" => true,
                               "has_archive" => true,
                               "rewrite" => array("slug" => "tjenester"),
                               "menu_icon" => "dashicons-screenoptions"
                           )
        );

        register_post_type("quote",
                           array(
                               "labels" => array(
                                   "name" => __("Sitater"),
                                   "singular_name" => __("Sitat")
                               ),
                               "public" => true,
                               "menu_icon" => "dashicons-format-quote"
                           )
        );
        
        
    }
}

$nb = new NorthernBeat();

?>
