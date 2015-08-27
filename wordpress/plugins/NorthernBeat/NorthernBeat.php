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
        add_action("plugins_loaded", array($this, "registerAcf"));
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
                                   "name" => __("Ansatte"),
                                   "singular_name" => __("Ansatt")
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

    function registerAcf()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array (
                'key' => 'group_55dde45f05cee',
                'title' => 'Case',
                'fields' => array (
                    array (
                        'key' => 'field_55ddbb9663f2f',
                        'label' => 'Bilde',
                        'name' => 'photo',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'id',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array (
                        'key' => 'field_55ddbc52bc384',
                        'label' => 'Kunde',
                        'name' => 'customer',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_55ddbc7bbc385',
                        'label' => 'Farge',
                        'name' => 'color',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array (
                            'blue' => 'Blå',
                            'green' => 'Grønn',
                            'orange' => 'Oransje',
                            'gray-light' => 'Grå, lys',
                            'gray-dark' => 'Grå, mørk',
                            'gray-darker' => 'Grå, mørkere',
                        ),
                        'default_value' => array (
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'disabled' => 0,
                        'readonly' => 0,
                    ),
                    array (
                        'key' => 'field_55ddbd204d9f5',
                        'label' => 'Ingress',
                        'name' => 'ingress',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'br',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_55ddf5735e438',
                        'label' => 'Kontaktpersoner',
                        'name' => 'people',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array (
                            0 => 'employee',
                        ),
                        'taxonomy' => array (
                        ),
                        'allow_null' => 1,
                        'multiple' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'case',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
                'modified' => 1440609727,
                'local' => 'json',
            ));

            acf_add_local_field_group(array (
                'key' => 'group_55ddf4f35280c',
                'title' => 'Menneske',
                'fields' => array (
                    array (
                        'key' => 'field_55ddf50118043',
                        'label' => 'Bilde',
                        'name' => 'photo',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'id',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array (
                        'key' => 'field_55ddf51a18044',
                        'label' => 'Stillingstittel',
                        'name' => 'role',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_55ddf9de359cd',
                        'label' => 'Epost',
                        'name' => 'email',
                        'type' => 'email',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array (
                        'key' => 'field_55ddf9ed359ce',
                        'label' => 'Telefon',
                        'name' => 'phone',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'employee',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
                'modified' => 1440610815,
                'local' => 'json',
            ));

            acf_add_local_field_group(array (
                'key' => 'group_55ddf3d99fbd2',
                'title' => 'Tjeneste',
                'fields' => array (
                    array (
                        'key' => 'field_55ddf3e31a1fa',
                        'label' => 'Ikon',
                        'name' => 'icon',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'id',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array (
                        'key' => 'field_55ddf4441a1fb',
                        'label' => 'Ingress',
                        'name' => 'ingress',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'wpautop',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'service',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
                'modified' => 1440609384,
                'local' => 'json',
            ));
        } else {
            die("ACF not loaded");
        }
    }
}

$nb = new NorthernBeat();

?>
