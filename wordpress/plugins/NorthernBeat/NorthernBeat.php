<?php
/**
 * Plugin Name: Northern Beat
 * Description: Northern Beat website plugin. Sets up custom post and
 *              page types, adds smart links and custom dashboard pages.
 * Author: eirikref
 * Version: 1.0.0
 */

require_once("vendor/autoload.php");

class NorthernBeat
{

    function __construct()
    {
        // add_action("admin_menu", array($this, "addAdminMenus"));
        add_action("init", array($this, "registerPostTypes"));
        // add_action("plugins_loaded", array($this, "registerCustomFields"));
        // add_filter("upload_mimes", array($this, "cc_mime_types"));
    }

    function addAdminMenus()
    {
        // add_menu_page("Northern Beat",
        //               "Northern Beat",
        //               "manage_options"
        // );
    }

    function registerPostTypes()
    {
        $post = new \NorthernBeat\Employee();
        $post->register();
        $post->buildForm();

        // register_post_type("case",
        //                    array(
        //                        "labels" => array(
        //                            "name" => __("Case"),
        //                            "singular_name" => __("Case")
        //                        ),
        //                        "public" => true,
        //                        "has_archive" => true,
        //                        "rewrite" => array("slug" => "case"),
        //                        "supports" => array("title"),
        //                        "menu_icon" => "dashicons-format-gallery"
        //                    )
        // );

        // register_post_type("employee",
        //                    array(
        //                        "labels" => array(
        //                            "name" => __("Ansatte"),
        //                            "singular_name" => __("Ansatt")
        //                        ),
        //                        "public" => true,
        //                        "has_archive" => true,
        //                        "rewrite" => array("slug" => "menneskene"),
        //                        "supports" => array("title"),
        //                        "menu_icon" => "dashicons-groups"

        //                    )
        // );

        // register_post_type("service",
        //                    array(
        //                        "labels" => array(
        //                            "name" => __("Tjenester"),
        //                            "singular_name" => __("Tjeneste")
        //                        ),
        //                        "public" => true,
        //                        "has_archive" => true,
        //                        "rewrite" => array("slug" => "tjenester"),
        //                        "menu_icon" => "dashicons-screenoptions"
        //                    )
        // );

        // register_post_type("quote",
        //                    array(
        //                        "labels" => array(
        //                            "name" => __("Sitater"),
        //                            "singular_name" => __("Sitat")
        //                        ),
        //                        "public" => true,
        //                        "supports" => array("title"),
        //                        "menu_icon" => "dashicons-format-quote"
        //                    )
        // );

        // register_post_type("customer",
        //                    array(
        //                        "labels" => array(
        //                            "name" => __("Kunder"),
        //                            "singular_name" => __("Kunde")
        //                        ),
        //                        "public" => true,
        //                        "has_archive" => false,
        //                        "supports" => array("title"),
        //                        "rewrite" => array("slug" => "kunder"),
        //                        "menu_icon" => "dashicons-heart"
        //                    )
        // );
    }

    // function registerCustomFields()
    // {
    //     if (function_exists("acf_add_local_field_group")) {
    //         $this->registerGroupFancyThumbnail();
    //         $this->registerGroupPlainContent();

    //         $this->registerGroupContactInformation();
    //         $this->registerGroupPhoto();

    //         $this->registerGroupCompanyInformation();
    //         $this->registerGroupLogo();

    //         $this->registerGroupSelectCustomers();
    //         $this->registerGroupContactAtCustomer();

    //         $this->registerGroupContactUs();
    //     }
    // }



    // function registerGroupFancyThumbnail()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "fancy-thumbnail",
    //         "title" => "Fancy thumbnail",
    //         "fields" => array (

    //             // Photo
    //             array (
    //                 "key" => "ft-photo",
    //                 "label" => "Bilde",
    //                 "name" => "ft-photo",
    //                 "type" => "image",
    //                 "instructions" => "",
    //                 "required" => 1,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "return_format" => "id",
    //                 "preview_size" => "thumbnail",
    //                 "library" => "all",
    //                 "min_width" => "",
    //                 "min_height" => "",
    //                 "min_size" => "",
    //                 "max_width" => "",
    //                 "max_height" => "",
    //                 "max_size" => "",
    //                 "mime_types" => "",
    //             ),

    //             // Title
    //             array (
    //                 "key" => "ft-title",
    //                 "label" => "Tittel",
    //                 "name" => "ft-title",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Text area
    //             array (
    //                 "key" => "ft-text",
    //                 "label" => "Tekst",
    //                 "name" => "ft-text",
    //                 "type" => "textarea",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Conditional: Predefined colors or pick yourself?
    //             array (
    //                 "key" => "ft-colors",
    //                 "label" => "Farger",
    //                 "name" => "ft-colors",
    //                 "type" => "radio",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "choices" => array (
    //                     "predefined" => "Forhåndsdefinerte",
    //                     "user" => "Velg selv",
    //                 ),
    //                 "other_choice" => 0,
    //                 "save_other_choice" => 0,
    //                 "default_value" => "",
    //                 "layout" => "horizontal",
    //             ),

    //             // List of predefined color schemes
    //             array (
    //                 "key" => "ft-colorscheme",
    //                 "label" => "Forhåndsdefinert fargeskjema",
    //                 "name" => "ft-colorscheme",
    //                 "type" => "select",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => array (
    //                     array (
    //                         array (
    //                             "field" => "ft-colors",
    //                             "operator" => "==",
    //                             "value" => "predefined",
    //                         ),
    //                     ),
    //                 ),
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "choices" => array (
    //                     "blue" => "Blå bakgrunn, hvit tekst",
    //                     "green" => "Grønn bakgrunn, hvit tekst",
    //                     "red" => "Rød bakgrunn, hvit tekst",
    //                 ),
    //                 "default_value" => array (
    //                 ),
    //                 "allow_null" => 0,
    //                 "multiple" => 0,
    //                 "ui" => 0,
    //                 "ajax" => 0,
    //                 "placeholder" => "",
    //                 "disabled" => 0,
    //                 "readonly" => 0,
    //             ),

    //             // Background color
    //             array (
    //                 "key" => "ft-background",
    //                 "label" => "Bakgrunnsfarge",
    //                 "name" => "ft-background",
    //                 "type" => "color_picker",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => array (
    //                     array (
    //                         array (
    //                             "field" => "ft-colors",
    //                             "operator" => "==",
    //                             "value" => "user",
    //                         ),
    //                     ),
    //                 ),
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //             ),

    //             // Foreground color
    //             array (
    //                 "key" => "ft-foreground",
    //                 "label" => "Tekstfarge",
    //                 "name" => "ft-foreground",
    //                 "type" => "color_picker",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => array (
    //                     array (
    //                         array (
    //                             "field" => "ft-colors",
    //                             "operator" => "==",
    //                             "value" => "user",
    //                         ),
    //                     ),
    //                 ),
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //             ),

    //             // Tinted bakground
    //             array (
    //                 "key" => "ft-tint",
    //                 "label" => "Gjennomsiktig bakgrunnsfarge",
    //                 "name" => "ft-tint",
    //                 "type" => "radio",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "choices" => array (
    //                     "yes" => "Ja",
    //                     "no" => "Nei",
    //                 ),
    //                 "default_value" => array (
    //                 ),
    //                 "layout" => "horizontal",
    //                 "toggle" => 0,
    //             ),

    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "case",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 0,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupContactInformation()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "contact-information",
    //         "title" => "Kontaktinformasjon",
    //         "fields" => array (

    //             // Firstname
    //             array (
    //                 "key" => "ci-firstname",
    //                 "label" => "Fornavn",
    //                 "name" => "ci-firstname",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 1,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Lastname
    //             array (
    //                 "key" => "ci-lastname",
    //                 "label" => "Etternavn",
    //                 "name" => "ci-lastname",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Title
    //             array (
    //                 "key" => "ci-title",
    //                 "label" => "Tittel",
    //                 "name" => "ci-title",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Email
    //             array (
    //                 "key" => "ci-email",
    //                 "label" => "Epost",
    //                 "name" => "ci-email",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "@northernbeat.no",
    //             ),

    //             // Phone
    //             array (
    //                 "key" => "ci-phone",
    //                 "label" => "Telefon",
    //                 "name" => "ci-phone",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "+47",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "employee",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 0,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupCompanyInformation()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "company-information",
    //         "title" => "Kontaktinformasjon",
    //         "fields" => array (

    //             // URL
    //             array (
    //                 "key" => "co-url",
    //                 "label" => "Web",
    //                 "name" => "co-url",
    //                 "type" => "url",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Facebook
    //             array (
    //                 "key" => "co-facebook",
    //                 "label" => "Facebook",
    //                 "name" => "co-facebook",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "https://www.facebook.com/",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Instagram
    //             array (
    //                 "key" => "co-instagram",
    //                 "label" => "Instagram",
    //                 "name" => "co-instagram",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "https://instagram.com/",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //             // Twitter
    //             array (
    //                 "key" => "co-twitter",
    //                 "label" => "Twitter",
    //                 "name" => "co-twitter",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "https://twitter.com/",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),

    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "customer",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 0,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupPlainContent()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "plaintext-description",
    //         "title" => "Tekst",
    //         "fields" => array (
    //             array (
    //                 "key" => "pt-description",
    //                 "label" => "Tekst",
    //                 "name" => "pt-text",
    //                 "type" => "textarea",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "maxlength" => "",
    //                 "rows" => "",
    //                 "new_lines" => "wpautop",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "employee",
    //                 ),
    //             ),
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "customer",
    //                 ),
    //             ),
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "quote",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 10,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupPhoto()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "photo",
    //         "title" => "Bilde",
    //         "fields" => array (

    //             // Photo
    //             array (
    //                 "key" => "photo",
    //                 "label" => "Bilde",
    //                 "name" => "entity-photo",
    //                 "type" => "image",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "return_format" => "id",
    //                 "preview_size" => "thumbnail",
    //                 "library" => "all",
    //                 "min_width" => "",
    //                 "min_height" => "",
    //                 "min_size" => "",
    //                 "max_width" => "",
    //                 "max_height" => "",
    //                 "max_size" => "",
    //                 "mime_types" => "",
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "employee",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 20,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupLogo()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "logo",
    //         "title" => "Logo",
    //         "fields" => array (

    //             // Logo
    //             array (
    //                 "key" => "logo",
    //                 "label" => "Logo",
    //                 "name" => "entity-logo",
    //                 "type" => "image",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "return_format" => "id",
    //                 "preview_size" => "thumbnail",
    //                 "library" => "all",
    //                 "min_width" => "",
    //                 "min_height" => "",
    //                 "min_size" => "",
    //                 "max_width" => "",
    //                 "max_height" => "",
    //                 "max_size" => "",
    //                 "mime_types" => "",
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "customer",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 20,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupSelectCustomers()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "select-customers",
    //         "title" => "Kunder",
    //         "fields" => array (
    //             array (
    //                 "key" => "sc-customers",
    //                 "label" => "Kunder",
    //                 "name" => "sc-customers",
    //                 "type" => "post_object",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "post_type" => array (
    //                     0 => "customer",
    //                 ),
    //                 "taxonomy" => array (
    //                 ),
    //                 "allow_null" => 1,
    //                 "multiple" => 1,
    //                 "return_format" => "id",
    //                 "ui" => 1,
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "case",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 0,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }



    // function registerGroupContactAtCustomer()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "customer-and-contact",
    //         "title" => "Kunde og kontaktperson",
    //         "fields" => array (
    //             array (
    //                 "key" => "cc-customer",
    //                 "label" => "Kunde",
    //                 "name" => "cc-customer",
    //                 "type" => "post_object",
    //                 "instructions" => "",
    //                 "required" => 1,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "post_type" => array (
    //                     0 => "customer",
    //                 ),
    //                 "taxonomy" => array (
    //                 ),
    //                 "allow_null" => 0,
    //                 "multiple" => 0,
    //                 "return_format" => "id",
    //                 "ui" => 1,
    //             ),
    //             array (
    //                 "key" => "cc-name",
    //                 "label" => "Navn",
    //                 "name" => "cc-name",
    //                 "type" => "text",
    //                 "instructions" => "Navn på kontaktperson hos kunden",
    //                 "required" => 1,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),
    //             array (
    //                 "key" => "cc-title",
    //                 "label" => "Tittel/Rolle",
    //                 "name" => "cc-title",
    //                 "type" => "text",
    //                 "instructions" => "Personens tittel/rolle",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "quote",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 0,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "field",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }
    
    
    
    // function registerGroupContactUs()
    // {
    //     acf_add_local_field_group(array (
    //         "key" => "contact-us",
    //         "title" => "Kontakt oss",
    //         "fields" => array (
    //             array (
    //                 "key" => "cu-title",
    //                 "label" => "Overskrift",
    //                 "name" => "cu-title",
    //                 "type" => "text",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "prepend" => "",
    //                 "append" => "",
    //                 "maxlength" => "",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),
    //             array (
    //                 "key" => "cu-text",
    //                 "label" => "Tekst",
    //                 "name" => "cu-text",
    //                 "type" => "textarea",
    //                 "instructions" => "",
    //                 "required" => 0,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "default_value" => "",
    //                 "placeholder" => "",
    //                 "maxlength" => "",
    //                 "rows" => "",
    //                 "new_lines" => "wpautop",
    //                 "readonly" => 0,
    //                 "disabled" => 0,
    //             ),
    //             array (
    //                 "key" => "cu-people",
    //                 "label" => "Kontaktpersoner",
    //                 "name" => "cu-people",
    //                 "type" => "post_object",
    //                 "instructions" => "",
    //                 "required" => 1,
    //                 "conditional_logic" => 0,
    //                 "wrapper" => array (
    //                     "width" => "",
    //                     "class" => "",
    //                     "id" => "",
    //                 ),
    //                 "post_type" => array (
    //                     0 => "employee",
    //                 ),
    //                 "taxonomy" => array (
    //                 ),
    //                 "allow_null" => 0,
    //                 "multiple" => 1,
    //                 "return_format" => "id",
    //                 "ui" => 1,
    //             ),
    //         ),
    //         "location" => array (
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "post",
    //                 ),
    //             ),
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "page",
    //                 ),
    //             ),
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "case",
    //                 ),
    //             ),
    //             array (
    //                 array (
    //                     "param" => "post_type",
    //                     "operator" => "==",
    //                     "value" => "service",
    //                 ),
    //             ),
    //         ),
    //         "menu_order" => 0,
    //         "position" => "normal",
    //         "style" => "default",
    //         "label_placement" => "left",
    //         "instruction_placement" => "label",
    //         "hide_on_screen" => "",
    //         "active" => 1,
    //         "description" => "",
    //     ));
    // }
    
    
    
    function cc_mime_types($mimes)
    {
        $mimes["svg"] = "image/svg+xml";
        return $mimes;
    }
}

$nb = new NorthernBeat();

?>
