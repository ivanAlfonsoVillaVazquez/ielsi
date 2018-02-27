<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2013, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 */


/**
 * Helper function that holds array of theme options.
 *
 * @return	array	$options	Array of theme options
 * @uses	thsp_get_theme_customizer_fields()	defined in customizer/helpers.php
 */
function encrypted_lite_get_fields()
{

    /*
    * Using helper function to get default required capability
    */
    $encrypted_option_cat = "";
    // Pull all categories
    $encrypted_options_categories = array();
    $encrypted_options_categories_obj = get_categories();


    $encrypted_options_categories = array();
    $encrypted_options_categories_obj = get_categories();
    $encrypted_options_categories[''] = array('label' => __('Select Category:', 'encrypted-lite'));
    foreach ($encrypted_options_categories_obj as $category) {
        //$options_categories[$category->cat_ID] = $category->cat_name;
        $encrypted_options_categories[$category->cat_ID] = array('label' => $category->cat_name);
    }

    // Pull all the pages into an array
    //$options_pages = array();
    $encrypted_select_lists = array();
    $encrypted_options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $encrypted_options_pages[''] = array('label' => __('Select a page:', 'encrypted-lite'));
    foreach ($encrypted_options_pages_obj as $page) {
        $encrypted_options_pages[$page->ID] = array('label' => $page->post_title);
        //$options_pages[$page->ID] = $page->post_title;
    }


    $encrypted_lite_capability = encrypted_lite_capability();

    $options = array(

        /**
         * General Settings starts here
         */
         
         
         
         
         

        'general_setting_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('General Settings', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'general_settings_panel'),

            'fields' => array('enable_responsive' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Responsive', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 10)),
                        
                        'page_layout' => array('setting_args' => array(
                        'default' =>1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_site_layout_sanitize'), 'control_args' =>
                        array(
                        'label' => __('Page Layout', 'encrypted-lite'),
                        'type' => 'radio', // Text field control
                        'priority' => 11,
                        'choices' => array('fullwidth' => array('label' => __('Fullwidth', 'encrypted-lite')), 
                        'boxed' => array('label' => __('Boxed', 'encrypted-lite'))),
                        )),
                        
                        'copyright_footer' => array('setting_args' => array(
                        //'default'=> __('Upload Logo','encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Copyright Footer Text','encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 12)),
                        
                        'custom_css' => array('setting_args' => array(
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array( 'label' => __('Custom Css', 'encrypted-lite'),
                            'type' => 'textarea', 'priority' => 13))
                        
                        
                                                
                        ),

            ),

        /**
         * General Settings ends here
         */

        /**
         * Header Settings Starts here
         */


        'header_social_mail_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Header Settings', 'encrypted-lite'),
                'description' => __('', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'header_settings_panel'
                ),
            'fields' => array('header_social_mail' => array('setting_args' => array(
                        'default' =>1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Show/hide top header', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)), 
                        
                        'header_phone' => array('setting_args' => array(
                        'default' => __('+977 XXXXXXXXXX', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' =>
                        array(
                        'label' => __('Header Phone','encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11)),
                        
                        'header_email' => array('setting_args' => array(
                        'default' => __('email@email.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' =>
                        array(
                        'label' => __('Header Email', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 12)),
                        
                        'show_search_header' => array('setting_args' => array(
                        'default' =>1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Show Hide Search in header', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 13)),
                        
                        'search_placeholder_text' => array('setting_args' => array(
                        'default' => __('Search...', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Search Place Holder Text', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 14)),
                        
                        
                        ),
                        
                        
                        
            ),
            
        'header_image' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Upload Logo of Website', 'encrypted-lite'),
                'description' => __('Edit Logo', 'encrypted-lite'),
                'priority' => 7,
                'theme_supports' => 'custom-header',
                'panel' => 'header_settings_panel'),

            'fields' => array('upload_logo' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => '',
                        'type' => 'image', // Text field control
                        'priority' => 10))),

            ),


        /**
         * Header Settings ends here
         */


        /**
         * Slider Settings starts here
         */


        'slider_settings_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Slider Settings', 'encrypted-lite'),
                'description' => '',
                'priority' => 13,
                //'panel' => 'slider_settings_panel',
                ),
            'fields' => array('enable_slider' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Slider', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                        
                        'category_as_slider' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Choose the slider category', 'encrypted-lite'),
                        'type' => 'select',
                        'priority' => 11,
                        'choices' => $encrypted_options_categories)),
                        
                        'slider_button_text' => array('setting_args' => array(
                        'default' => __('Details', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Slider Button text', 'encrypted-lite'),
                        'description' => __('Type to change the slider button text', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 12,
                        )),
                        
                        'show_pager' => array('setting_args' => array(
                        'default' => __('yes', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_radio_yes_no'), 'control_args' => array(
                        'label' => __('Show Pager', 'encrypted-lite'),
                        'description' => __('Show Hide Navigation Dot', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 13,
                        'choices' => array(
                            'yes' => array('label' => __('Yes', 'encrypted-lite')),
                            'no' => array('label' => __('No', 'encrypted-lite')),
                            ))),
                            
                        'show_controls' => array('setting_args' => array(
                        'default' => __('yes', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_radio_yes_no'), 'control_args' => array(
                        'label' => __('Show Controls', 'encrypted-lite'),
                        'description' => __('Show hide slider controls', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 14,
                        'choices' => array(
                            'yes' => array('label' => __('Yes', 'encrypted-lite')),
                            'no' => array('label' => __('No', 'encrypted-lite')),
                            ))),
                        
                        'slider_transition' => array('setting_args' => array(
                        'default' => __('fade', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_slider_transition'), 'control_args' =>
                        array(
                        'label' => __('Choose the slider transition', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 15,
                        'choices' => array(
                            'fade' => array('label' => __('Fade', 'encrypted-lite')),
                            'slide horizontal' => array('label' => __('Slide Horizontal', 'encrypted-lite')),
                            'slide vertical' => array('label' => __('Slide Vertical', 'encrypted-lite'))))),
                        
                        'slider_auto_transition' => array('setting_args' => array(
                        'default' => __('yes', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_radio_yes_no'), 'control_args' => array(
                        'label' => __('Select slider auto transition', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 16,
                        'choices' => array('yes' => array('label' => __('Yes', 'encrypted-lite')), 'no' =>
                                array('label' => __('No', 'encrypted-lite'))))),
                                
                        'slider_speed' => array('setting_args' => array(
                        'default' => 5000,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Slider Speed', 'encrypted-lite'),
                        'description' => __('Type the slider speed in milliseconds (ms)', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 17,
                        )),
                        
                        'slider_pause' => array('setting_args' => array(
                        'default' => 5000,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Slider Pause', 'encrypted-lite'),
                        'description' => __('Type the slider pause time in millisecond (ms)', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 18,
                        )),
                        
                        'show_slider_caption' => array('setting_args' => array(
                        'default' => __('show', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_slider_caption'), 'control_args' => array
                        (
                        'label' => __('Show hide slider caption', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 19,
                        'choices' => array('show' => array('label' => __('Show', 'encrypted-lite')),
                                'hide' => array('label' => __('Hide', 'encrypted-lite'))))),
                                
                        'slider_content_text' => array('setting_args' => array(
                        'default' =>150,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('No. of slider content Character', 'encrypted-lite'),
                        'description' => __('Type to change the number of  slider content character to show. Leave Empty to show full content which will disable Read More button', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 20,
                        ))
                        
                        ),
                        
                        
            ),

        /**
         * Slider Settings ends here
         */


        /**
         * Home Page Settings starts here
         */

        'call_to_action_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Call To Action Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 1,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'call_to_action' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Call to Action Section', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'call_to_action_post' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post to Display as Call to Action', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 11)),
                'enter_number_of_character_show_call_to_action' => array('setting_args' => array
                        (
                        'default' => 250,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Enter the Number of Characters to show in Call to Action', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 12,
                        )),
                'read_more_text' => array('setting_args' => array(
                        'default' => __('Read More', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Read More Text for Call to Action', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 13,
                        )),

                ),
            ),

        'feature_post_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Feature Page Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 2,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'feature_post' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Feature Page', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'title_feature_post_section' => array('setting_args' => array(
                        'default' => __('Feature Page', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Title for Feature Section', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),
                'select_post_feature_post_1' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 1', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 12)),
                'select_post_feature_post_2' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 2', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 13)),
                'select_post_feature_post_3' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 3', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 14)),
                'select_post_feature_post_4' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 4', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 14)),
                'select_post_feature_post_5' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 5', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 14)),
                'select_post_feature_post_6' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 6', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 14)),
                'numbwe_character_feature_post' => array('setting_args' => array(
                        'default' => 250,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Number of Characters to show in Feature Post', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                

                )),


        'portfolio_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Portfolio Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 3,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_portfolio' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Portfolio', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'portfolio_section_title' => array('setting_args' => array(
                        'default' => __('Portfolio', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Portfolio Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'portfolio_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Portfolio Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_portfolio_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Portfolio Category', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'numbwe_character_portfolio' => array('setting_args' => array(
                        'default' => 150,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Number of Characters to show in Portfolio', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 14,
                        )),
                

                )),

        
        'horizontal_sidebar_1' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Horizontal Sidebar 1', 'encrypted-lite'),
                'description' => __('Edit Horizontal sidebar 1 settings (Displayed below Services Section)', 'encrypted-lite'),
                'priority' => 3,
                'panel' => 'home_page_settings_panel'
                ),

            'fields' => array('horizontal_sidebar_1_enable' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Horizontal Sidebar 1', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 10,
                        
                        )),
                        'horizontal_sidebar_1_title' => array('setting_args' => array(
                        'default' => __('Horizontal Sidebar One', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' =>
                        array(
                        'label' => __('Horizontal Sidebar 1 Title', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 11,
                        
                        )),
                        'horizontal_sidebar_title_1_desc' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Horizontal Sidebar 1 Description', 'encrypted-lite'),
                        'type' => 'textarea', // Text field control
                        'priority' => 11,
                        
                        )),
                        
                        ),

            ),
        

        'blog_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Blog Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 4,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_blog' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Blog', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'blog_section_title' => array('setting_args' => array(
                        'default' => __('Blog', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Blog Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'blog_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Blog Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_blog_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Category for the Blog', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'enable_date_over_blog_image' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Date Over Blog Image', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 14)),
                'number_character_blog_content' => array('setting_args' => array(
                        'default' => 250,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Number of Character to show in the blog content', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                )),

        'testimonial_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Testimonial Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 5,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_testimonial' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Testimonial', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'testimonial_section_title' => array('setting_args' => array(
                        'default' => __('Testimonial', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Testimonial Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'testimonial_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Testimonial Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_testimonial_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Testimonial Category', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'number_character_testimonail_content' => array('setting_args' => array(
                        'default' => 250,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Number of Characters to show in the Testimonial content', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                )),

        'team_member_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Team Member Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 6,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_team_member' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Team Member', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'team_member_section_title' => array('setting_args' => array(
                        'default' => __('Team Member', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Team Member Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'team_member_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Team Member Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_team_member_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Team Member Category', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'number_character_team_member_content' => array('setting_args' => array(
                        'default' => 250,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Number of Character to show in the Team Member content', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                )),

        'client_logo_slider_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Client Logo Slider', 'encrypted-lite'),
                'description' => '',
                'priority' => 7,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_client_logo_slider_section' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable/Disable Client Logo Slider', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'client_section_title' => array('setting_args' => array(
                        'default' => __('Client', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Client/Associates Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'client_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Client/Associates Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_client_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field'), 'control_args' => array(
                        'label' => __('Select Category for the Client/Associates', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)))),

        'google_map_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Google Map', 'encrypted-lite'),
                'description' => '',
                'priority' => 8,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_google_map_section' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable or Disable Google Map Section', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'google_map_iframe' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_googlemaps'), 
                'control_args' =>
                        array(
                        'label' => __('Google map iframe', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                
                'map_info_adderss' => array(
                    'setting_args' => array(
                        'default' => __('Pepsicola, Kathmandu', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Address', 'encrypted-lite'),
                            'type' => 'textarea',
                            'priority' => 14
                        )
                    ),
                'map_info_phone' => array(
                    'setting_args' => array(
                        'default' => __('+9779841762231', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Phone', 'encrypted-lite'),
                            'type' => 'text',
                            'priority' => 15
                        )
                    ),
                'map_info_email' => array(
                    'setting_args' => array(
                        'default' => __('email@email.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'postMessage',
                        'sanitize_callback' => 'sanitize_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Email', 'encrypted-lite'),
                            'type' => 'text',
                            'priority' => 16
                        )
                    ),

                )),


               


        /**
         * Home Page Settings ends here
         */


        /**
         * Single Page Post Settings starts here
         */


        'single_page_post_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Single Page Post Settings', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 15,
                //'panel' => 'single_page_post_section_settings_panel'
                ),

            'fields' => array('enable_feature_image' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Disable Featured Image', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 10)),
                        
                        'enable_posted_date_in_post' => array('setting_args' => array
                        (
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable disable posted dates in Posts', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 11)),
                        
                        'enable_tags_category' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable disable tags and category in posts', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 12)),
                        
                        'enable_pagination' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Disable post pagination', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 13))
                        
                        ),

            ),

        /**
         * Single Page Post Settings ends here
         */

        

        /**
         * Social Media Settings starts here
         */


        'enable_disable_social_links_settings`' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable or Disable Social links', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'social_media_settings_panel'),

            'fields' => array('enable_disable_social_links_header' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Disable Social links in header','encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 13)),
                        
                        'enable_disable_social_links_footer' => array('setting_args' => array(
                        'default' => 1,
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable or Disable Social links in Footer','encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 14))
                        
                        ),

            ),

        'social_media_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Social Media Settings', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 3,
                'panel' => 'social_media_settings_panel'),

            'fields' => array(
                'facebook' => array('setting_args' => array(
                        'default' => __('http://www.facebook.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Facebook', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 10)),
                'twitter' => array('setting_args' => array(
                        'default' => __('http://www.twitter.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Twitter', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 11)),
                'google_plus' => array('setting_args' => array(
                        'default' => __('http://www.plus.google.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Google Plus', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 12)),
                'youtube' => array('setting_args' => array(
                        'default' => __('http://www.youtube.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Youtube', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 13)),
                'pinterest' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Pinterest', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 14)),
                'linkedin' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Linkedin', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 15)),
                'flicker' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Flicker', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 16)),
                'vimeo' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Vimeo', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 17)),
                'stumbleupon' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Stumbleupon', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 18)),
                'instagram' => array('setting_args' => array(
                        'default' => __('http://www.instagram.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Instagram', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 19)),
                'sound_cloud' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Sound Cloud', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 20)),
                'github' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('GitHub', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 21)),
                'skype' => array('setting_args' => array(
                        'default' => __('http://www.skype.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Skype', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 22)),
                'tumbler' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('Tumbler', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 23)),
                'rss' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'esc_raw_url'), 'control_args' => array(
                        'label' => __('RSS', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 24)),

                ),

            ),

        'encrypted_lite_important_links_section' => array(
                    'existing_section' => false,
                    'args' => array(
                    'title' => __('Set Up Info and Important Links', 'encrypted-lite'),
                    //'description' => __('Edit General Settings', 'encrypted-lite'),
                    'priority' => 1,
                    //'panel' => 'archive_page_settings_panel'
                    ),

                    'fields' => array(
                        'important_links' => array('setting_args' => array(
                            'default' => '',
                            'type' => 'option',
                            'capability' => $encrypted_lite_capability,
                            'transport' => 'refresh',
                            'sanitize_callback' => 'esc_url_raw'
                            ), 
                        'control_args' => array(
                            'label' => '',
                            'type' => 'encrypted-lite-important-links', // Text field control
                            'priority' => 1))),            )


        /**
         * Social Media Settings ends here
         */
        

        );


    /**
     * insert slider categories in array starts here
     *
     * foreach ($options_categories_obj as $category) {
     * $options['category_slider_setting']['fields']['enable_slider']['control_args']['choices'][$category->cat_ID] = array(
     * 'label'=>__($category->cat_name,'encrypted-lite')
     * );
     * 
     * //$options_categories[$category->cat_ID] = $category->cat_name;
     * }

     * /**
     * insert slider categories in array ends here
     */
    /*
    * 'encrypted_lite_options_array' filter hook will allow you to 
    * add/remove some of these options from a child theme
    */
    return apply_filters('encrypted_lite_options_array', $options);

}
