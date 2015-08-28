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
    add_action("plugins_loaded", array($this, "registerCustomFields"));
    add_filter('upload_mimes', array($this, 'cc_mime_types'));
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
        register_post_type("case",
                           array(
                               "labels" => array(
                                   "name" => __("Case"),
                                   "singular_name" => __("Case")
                               ),
                               "public" => true,
                               "has_archive" => true,
                               "rewrite" => array("slug" => "case"),
                               "supports" => array("title"),
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
                               "supports" => array("title"),
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

        register_post_type("customer",
                           array(
                               "labels" => array(
                                   "name" => __("Kunder"),
                                   "singular_name" => __("Kunde")
                               ),
                               "public" => true,
                               "has_archive" => false,
                               "supports" => array("title"),
                               "rewrite" => array("slug" => "kunder"),
                               "menu_icon" => "dashicons-heart"
                           )
        );
    }

    function registerCustomFields()
    {
        if (function_exists('acf_add_local_field_group')) {
            $this->registerFancyThumbnailGroup();
        }

        // acf_add_local_field_group(array (
        //     'key' => 'group_55df1190d0d71',
        //     'title' => 'Fleksibelt innhold',
        //     'fields' => array (
        //         array (
        //             'key' => 'field_55df11af5ccf1',
        //             'label' => 'Innhold',
        //             'name' => 'content',
        //             'type' => 'flexible_content',
        //             'instructions' => '',
        //             'required' => 0,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'button_label' => 'Add Row',
        //             'min' => '',
        //             'max' => '',
        //             'layouts' => array (
        //                 array (
        //                     'key' => '55df11be603a8',
        //                     'name' => 'quote',
        //                     'label' => 'Sitat',
        //                     'display' => 'block',
        //                     'sub_fields' => array (
        //                         array (
        //                             'key' => 'field_55df11d15ccf2',
        //                             'label' => 'Tekst',
        //                             'name' => 'text',
        //                             'type' => 'text',
        //                             'instructions' => '',
        //                             'required' => 0,
        //                             'conditional_logic' => 0,
        //                             'wrapper' => array (
        //                                 'width' => '',
        //                                 'class' => '',
        //                                 'id' => '',
        //                             ),
        //                             'default_value' => '',
        //                             'placeholder' => '',
        //                             'prepend' => '',
        //                             'append' => '',
        //                             'maxlength' => '',
        //                             'readonly' => 0,
        //                             'disabled' => 0,
        //                         ),
        //                         array (
        //                             'key' => 'field_55df11db5ccf3',
        //                             'label' => 'Person',
        //                             'name' => 'person',
        //                             'type' => 'text',
        //                             'instructions' => '',
        //                             'required' => 0,
        //                             'conditional_logic' => 0,
        //                             'wrapper' => array (
        //                                 'width' => '',
        //                                 'class' => '',
        //                                 'id' => '',
        //                             ),
        //                             'default_value' => '',
        //                             'placeholder' => '',
        //                             'prepend' => '',
        //                             'append' => '',
        //                             'maxlength' => '',
        //                             'readonly' => 0,
        //                             'disabled' => 0,
        //                         ),
        //                         array (
        //                             'key' => 'field_55df12efd0829',
        //                             'label' => 'Firma',
        //                             'name' => 'company',
        //                             'type' => 'text',
        //                             'instructions' => '',
        //                             'required' => 0,
        //                             'conditional_logic' => 0,
        //                             'wrapper' => array (
        //                                 'width' => '',
        //                                 'class' => '',
        //                                 'id' => '',
        //                             ),
        //                             'default_value' => '',
        //                             'placeholder' => '',
        //                             'prepend' => '',
        //                             'append' => '',
        //                             'maxlength' => '',
        //                             'readonly' => 0,
        //                             'disabled' => 0,
        //                         ),
        //                     ),
        //                     'min' => '',
        //                     'max' => '',
        //                 ),
        //             ),
        //         ),
        //     ),
        //     'location' => array (
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'case',
        //             ),
        //         ),
        //     ),
        //     'menu_order' => 0,
        //     'position' => 'acf_after_title',
        //     'style' => 'seamless',
        //     'label_placement' => 'top',
        //     'instruction_placement' => 'label',
        //     'hide_on_screen' => '',
        //     'active' => 1,
        //     'description' => '',
        // ));

        // acf_add_local_field_group(array (
        //     'key' => 'group_55df14910fcff',
        //     'title' => 'Kontakt oss',
        //     'fields' => array (
        //         array (
        //             'key' => 'field_55df14a09f8ee',
        //             'label' => 'Overskrift',
        //             'name' => 'title',
        //             'type' => 'text',
        //             'instructions' => '',
        //             'required' => 1,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => 'Kontakt oss',
        //             'placeholder' => '',
        //             'prepend' => '',
        //             'append' => '',
        //             'maxlength' => '',
        //             'readonly' => 0,
        //             'disabled' => 0,
        //         ),
        //         array (
        //             'key' => 'field_55df14f29f8ef',
        //             'label' => 'Ingress',
        //             'name' => 'ingress',
        //             'type' => 'textarea',
        //             'instructions' => '',
        //             'required' => 0,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => '',
        //             'placeholder' => '',
        //             'maxlength' => '',
        //             'rows' => '',
        //             'new_lines' => 'wpautop',
        //             'readonly' => 0,
        //             'disabled' => 0,
        //         ),
        //         array (
        //             'key' => 'field_55df15029f8f0',
        //             'label' => 'Personer',
        //             'name' => 'people',
        //             'type' => 'post_object',
        //             'instructions' => '',
        //             'required' => 0,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'post_type' => array (
        //                 0 => 'employee',
        //             ),
        //             'taxonomy' => array (
        //             ),
        //             'allow_null' => 0,
        //             'multiple' => 1,
        //             'return_format' => 'id',
        //             'ui' => 1,
        //         ),
        //     ),
        //     'location' => array (
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'post',
        //             ),
        //         ),
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'page',
        //             ),
        //         ),
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'case',
        //             ),
        //         ),
        //     ),
        //     'menu_order' => 0,
        //     'position' => 'normal',
        //     'style' => 'default',
        //     'label_placement' => 'top',
        //     'instruction_placement' => 'label',
        //     'hide_on_screen' => '',
        //     'active' => 1,
        //     'description' => '',
        // ));

        // acf_add_local_field_group(array (
        //     'key' => 'group_55df4f26c4aaf',
        //     'title' => 'Kundeinformasjon',
        //     'fields' => array (
        //         array (
        //             'key' => 'field_55df4f2ddac64',
        //             'label' => 'URL',
        //             'name' => 'url',
        //             'type' => 'url',
        //             'instructions' => '',
        //             'required' => 0,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => '',
        //             'placeholder' => '',
        //         ),
        //     ),
        //     'location' => array (
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'customer',
        //             ),
        //         ),
        //     ),
        //     'menu_order' => 0,
        //     'position' => 'normal',
        //     'style' => 'default',
        //     'label_placement' => 'top',
        //     'instruction_placement' => 'label',
        //     'hide_on_screen' => '',
        //     'active' => 1,
        //     'description' => '',
        // ));

        // acf_add_local_field_group(array (
        //     'key' => 'group_55df507852961',
        //     'title' => 'Kunder',
        //     'fields' => array (
        //         array (
        //             'key' => 'field_55df508bbb88d',
        //             'label' => 'Kunder',
        //             'name' => 'customers',
        //             'type' => 'post_object',
        //             'instructions' => '',
        //             'required' => 0,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'post_type' => array (
        //                 0 => 'customer',
        //             ),
        //             'taxonomy' => array (
        //             ),
        //             'allow_null' => 1,
        //             'multiple' => 1,
        //             'return_format' => 'id',
        //             'ui' => 1,
        //         ),
        //     ),
        //     'location' => array (
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'post',
        //             ),
        //         ),
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'quote',
        //             ),
        //         ),
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'page',
        //             ),
        //         ),
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'case',
        //             ),
        //         ),
        //     ),
        //     'menu_order' => 0,
        //     'position' => 'normal',
        //     'style' => 'seamless',
        //     'label_placement' => 'top',
        //     'instruction_placement' => 'label',
        //     'hide_on_screen' => '',
        //     'active' => 1,
        //     'description' => '',
        // ));

        // acf_add_local_field_group(array (
        //     'key' => 'group_55ddf4f35280c',
        //     'title' => 'Menneske',
        //     'fields' => array (
        //         array (
        //             'key' => 'field_55ddf50118043',
        //             'label' => 'Bilde',
        //             'name' => 'photo',
        //             'type' => 'image',
        //             'instructions' => '',
        //             'required' => 1,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'return_format' => 'id',
        //             'preview_size' => 'thumbnail',
        //             'library' => 'all',
        //             'min_width' => '',
        //             'min_height' => '',
        //             'min_size' => '',
        //             'max_width' => '',
        //             'max_height' => '',
        //             'max_size' => '',
        //             'mime_types' => '',
        //         ),
        //         array (
        //             'key' => 'field_55ddf51a18044',
        //             'label' => 'Stillingstittel',
        //             'name' => 'role',
        //             'type' => 'text',
        //             'instructions' => '',
        //             'required' => 1,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => '',
        //             'placeholder' => '',
        //             'prepend' => '',
        //             'append' => '',
        //             'maxlength' => '',
        //             'readonly' => 0,
        //             'disabled' => 0,
        //         ),
        //         array (
        //             'key' => 'field_55ddf9de359cd',
        //             'label' => 'Epost',
        //             'name' => 'email',
        //             'type' => 'email',
        //             'instructions' => '',
        //             'required' => 1,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => '',
        //             'placeholder' => '',
        //             'prepend' => '',
        //             'append' => '',
        //         ),
        //         array (
        //             'key' => 'field_55ddf9ed359ce',
        //             'label' => 'Telefon',
        //             'name' => 'phone',
        //             'type' => 'text',
        //             'instructions' => '',
        //             'required' => 1,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => '',
        //             'placeholder' => '',
        //             'prepend' => '',
        //             'append' => '',
        //             'maxlength' => '',
        //             'readonly' => 0,
        //             'disabled' => 0,
        //         ),
        //     ),
        //     'location' => array (
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'employee',
        //             ),
        //         ),
        //     ),
        //     'menu_order' => 0,
        //     'position' => 'normal',
        //     'style' => 'default',
        //     'label_placement' => 'top',
        //     'instruction_placement' => 'label',
        //     'hide_on_screen' => '',
        //     'active' => 0,
        //     'description' => '',
        //     'modified' => 1440610815,
        //     'local' => 'json',
        // ));

        // acf_add_local_field_group(array (
        //     'key' => 'group_55ddf3d99fbd2',
        //     'title' => 'Tjeneste',
        //     'fields' => array (
        //         array (
        //             'key' => 'field_55ddf3e31a1fa',
        //             'label' => 'Ikon',
        //             'name' => 'icon',
        //             'type' => 'image',
        //             'instructions' => '',
        //             'required' => 0,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'return_format' => 'id',
        //             'preview_size' => 'thumbnail',
        //             'library' => 'all',
        //             'min_width' => '',
        //             'min_height' => '',
        //             'min_size' => '',
        //             'max_width' => '',
        //             'max_height' => '',
        //             'max_size' => '',
        //             'mime_types' => '',
        //         ),
        //         array (
        //             'key' => 'field_55ddf4441a1fb',
        //             'label' => 'Ingress',
        //             'name' => 'ingress',
        //             'type' => 'textarea',
        //             'instructions' => '',
        //             'required' => 1,
        //             'conditional_logic' => 0,
        //             'wrapper' => array (
        //                 'width' => '',
        //                 'class' => '',
        //                 'id' => '',
        //             ),
        //             'default_value' => '',
        //             'placeholder' => '',
        //             'maxlength' => '',
        //             'rows' => '',
        //             'new_lines' => 'wpautop',
        //             'readonly' => 0,
        //             'disabled' => 0,
        //         ),
        //     ),
        //     'location' => array (
        //         array (
        //             array (
        //                 'param' => 'post_type',
        //                 'operator' => '==',
        //                 'value' => 'service',
        //             ),
        //         ),
        //     ),
        //     'menu_order' => 0,
        //     'position' => 'normal',
        //     'style' => 'default',
        //     'label_placement' => 'top',
        //     'instruction_placement' => 'label',
        //     'hide_on_screen' => '',
        //     'active' => 0,
        //     'description' => '',
        //     'modified' => 1440609384,
        //     'local' => 'json',
        // ));
    }



    function registerFancyThumbnailGroup()
    {
        acf_add_local_field_group(array (
            'key' => 'fancy-thumbnail',
            'title' => 'Fancy thumbnail',
            'fields' => array (

                // Photo
                array (
                    'key' => 'ft-photo',
                    'label' => 'Bilde',
                    'name' => 'ft-photo',
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

                // Title
                array (
                    'key' => 'ft-title',
                    'label' => 'Tittel',
                    'name' => 'ft-title',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
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

                // Text area
                array (
                    'key' => 'ft-text',
                    'label' => 'Tekst',
                    'name' => 'ft-text',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
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

                // Conditional: Predefined colors or pick yourself?
                array (
                    'key' => 'ft-colors',
                    'label' => 'Farger',
                    'name' => 'ft-colors',
                    'type' => 'radio',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array (
                        'predefined' => 'Forhåndsdefinerte',
                        'user' => 'Velg selv',
                    ),
                    'other_choice' => 0,
                    'save_other_choice' => 0,
                    'default_value' => '',
                    'layout' => 'horizontal',
                ),

                // List of predefined color schemes
                array (
                    'key' => 'ft-colorscheme',
                    'label' => 'Forhåndsdefinert fargeskjema',
                    'name' => 'ft-colorscheme',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array (
                        array (
                            array (
                                'field' => 'ft-colors',
                                'operator' => '==',
                                'value' => 'predefined',
                            ),
                        ),
                    ),
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array (
                        'blue' => 'Blå bakgrunn, hvit tekst',
                        'green' => 'Grønn bakgrunn, hvit tekst',
                        'red' => 'Rød bakgrunn, hvit tekst',
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

                // Background color
                array (
                    'key' => 'ft-background',
                    'label' => 'Bakgrunnsfarge',
                    'name' => 'ft-background',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array (
                        array (
                            array (
                                'field' => 'ft-colors',
                                'operator' => '==',
                                'value' => 'user',
                            ),
                        ),
                    ),
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                ),

                // Foreground color
                array (
                    'key' => 'ft-foreground',
                    'label' => 'Tekstfarge',
                    'name' => 'ft-foreground',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array (
                        array (
                            array (
                                'field' => 'ft-colors',
                                'operator' => '==',
                                'value' => 'user',
                            ),
                        ),
                    ),
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                ),

                // Tinted bakground
                array (
                    'key' => 'ft-tint',
                    'label' => 'Gjennomsiktig bakgrunnsfarge',
                    'name' => 'ft-tint',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array (
                        'yes' => 'Ja',
                        'no' => 'Nei',
                    ),
                    'default_value' => array (
                    ),
                    'layout' => 'horizontal',
                    'toggle' => 0,
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
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));
        
    }


    
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}

$nb = new NorthernBeat();

?>
