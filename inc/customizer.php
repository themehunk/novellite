<?php
     //  =============================
     //  = Default Theme Customizer Settings  =
     //  @ NovelLite Theme
     //  =============================
/*theme customizer*/
function NovelLite_customize_register( $wp_customize ) {
// color-picker-added    
require_once( get_template_directory() . '/inc/color-picker/color-picker.php' ); 
$palette = array('rgb(0, 0, 0, 0)',);

// Home Page Settings
 $wp_customize->add_section('section_default_home', array(
        'title'    => __('One click Homepage Setup', 'novellite'),
        'priority' => 2,
    ));
   $wp_customize->add_setting('default_home', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, 'default_home',
            array(
        'section'  => 'section_default_home',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Click button to set theme default home page. You can modify this page from customize panel. Check this doc : <a target="_blank" href="https://themehunk.com/docs/novellite-theme/"> View Documentation</a>. <div class="default-home-wrap"><span class="spinner"></span> <a class="default-home" href="#">Set Home Page</a></div>','novellite' )
    )));
     //  =============================
     //  = Genral Settings     =
   	 //  =============================
$wp_customize->get_section('title_tagline')->title = esc_html__('General Setting', 'novellite');
$wp_customize->get_section('title_tagline')->priority = 3;
$wp_customize->add_setting('title_disable', array(
        'default'           => 'enable',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('title_disable', array(
        'label'    => __('Display Site Title & Tagline', 'novellite'),
        'section'  => 'title_tagline',
        'settings' => 'title_disable',
         'type'       => 'checkbox',
        'choices'    => array(
            'enable' => 'Display Site Title & Tagline',
        ),
    ));
     //  =============================
     //  = Home section sorting       =
     //  =============================
$pageTemplate = get_page_template_slug(get_option('page_on_front'));
if($pageTemplate == 'template-frontpage.php'):
 $wp_customize->add_section('section_home_on_off', array(
        'title'    => __('Home Page Section Ordering', 'novellite'),
        'priority' => 4,
    ));
      
//=============================
//= Theme option =
//=============================
$wp_customize->add_panel( 'theme_optn', array(
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Theme Option', 'novellite'),
    'description'    => '',
) );
$wp_customize->add_section('global_set', array(
        'title'    => __('Global Setting', 'novellite'),
        'priority' => 1,
        'panel'  => 'theme_optn',
));
 // Sidebar settings
$wp_customize->add_setting( 'novellite_layout',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'right',
                    //'transport'           => 'postMessage'
              )
         );
$wp_customize->add_control( 'novellite_layout',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Site Layout', 'novellite'),
        'description'       => esc_html__('Site layout is applied for all page templates', 'novellite'),
        'section'     => 'global_set',
        'choices' => array(
        'right' => esc_html__('Right sidebar', 'novellite'),
        'left' => esc_html__('Left sidebar', 'novellite'),
        'no-sidebar' => esc_html__('No sidebar', 'novellite'),
                    )
                )
            );
// Disable Sticky Header
            $wp_customize->add_setting( 'novellite_sticky_header_disable',
                array(
                    'sanitize_callback' => 'NovelLite_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control( 'novellite_sticky_header_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable Fixed Header?', 'novellite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Fixed header and activate Normal header.', 'novellite')
                )
            );
// Disable Animation
            $wp_customize->add_setting( 'novellite_animation_disable',
                array(
                    'sanitize_callback' => 'NovelLite_sanitize_checkbox',
                    'default'           => '',
                )
            );
            $wp_customize->add_control( 'novellite_animation_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Disable animation effect?', 'novellite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable homepage section animation.', 'novellite')
                )
            );
 // Disable back to top button
            $wp_customize->add_setting( 'novellite_backtotop_disable',
                array(
                    'sanitize_callback' => 'NovelLite_sanitize_checkbox',
                    'default' => '',
                )
            );
            $wp_customize->add_control( 'novellite_backtotop_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Hide back to top button ?', 'novellite'),
                    'section'     => 'global_set',
                    'description' => esc_html__('Check here to disable Back To Top button.', 'novellite')
                )
            );   
// site-color
$wp_customize->add_section('site_color', array(
        'title'    => __('Site Colors', 'novellite'),
        'priority' => 2,
        'panel'  => 'theme_optn',
));
$wp_customize->add_setting('theme_color', array(
        'default'        => '#fed136',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'theme_color', 
    array(
        'label'      => __( 'Theme Color', 'novellite' ),
        'section'    => 'site_color',
        'settings'   => 'theme_color',
    ) ) ); 
// footer-bg-color
$wp_customize->add_setting('footer_bg_color', array(
        'default'        => '#eee',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'footer_bg_color', 
    array(
        'label'      => __('Footer Background Color', 'novellite' ),
        'section'    => 'site_color',
        'settings'   => 'footer_bg_color',
    ) ) );  
// footer-info-color
$wp_customize->add_setting('footer_info_bg_color', array(
        'default'        => '#20222b',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'footer_info_bg_color', 
    array(
        'label'      => __( 'Copyright Background Color', 'novellite' ),
        'section'    => 'site_color',
        'settings'   => 'footer_info_bg_color',
    ) ) );  
// header-setting
$wp_customize->add_section('header_setting', array(
        'title'    => __('Header Setting', 'novellite'),
        'priority' => 3,
        'panel'  => 'theme_optn',
));
// header layout option
$wp_customize->add_setting('header_layout', array(
        'default'        =>'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'header_layout', array(
        'settings' => 'header_layout',
        'label'   => __('Header Layout Option','novellite'),
        'section' => 'header_setting',
        'type'    => 'radio',
        'choices'    => array(
            'default'        => 'Default Menu',
            'center'        => 'Center Menu',
            'split'      => 'Split Menu',
        ),
    ));
//header transparent
    $wp_customize->add_setting( 'hdr_bg_trnsparent_active',
              array(
            'sanitize_callback' => 'NovelLite_sanitize_checkbox',
            'default'           => '1',
                )
            );
    $wp_customize->add_control( 'hdr_bg_trnsparent_active',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Header Transparent', 'novellite'),
                'section'     => 'header_setting',
                'description' => esc_html__('(Only applied for front page template.)', 'novellite')
                )
            ); 
//header transparent
    $wp_customize->add_setting( 'last_menu_btn',
              array(
                    'sanitize_callback' => 'NovelLite_sanitize_checkbox',
                    'default'           => '',
                )
            );
    $wp_customize->add_control( 'last_menu_btn',
                array(
                'type'        => 'checkbox',
                'label'       => esc_html__('Custom Button', 'novellite'),
                'description' => esc_html__('(Check here to style last Menu Item as a Custom Button)', 'novellite'),
                'section'     => 'header_setting',
                
                )
            );                  
// background-color
$wp_customize->add_setting('hd_bg_color',
        array(
            'default'     => '',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

$wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'hd_bg_color',
            array(
                'label'     => __('Header Background Color','novellite'),
                'section'   => 'header_setting',
                'settings'  => 'hd_bg_color',
                'palette'   => $palette
            )
        )
    );
// title
$wp_customize->add_setting('site_title_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'site_title_color', 
    array(
    'label' => __('Site Title Color','novellite'),
        'section'    => 'header_setting',
        'settings'   => 'site_title_color',
    ) ) );
 // menu   
$wp_customize->add_setting('hd_menu_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_color', 
    array(
    'label' => __('Menu Link Color','novellite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_color',
    ) ) );
 // hover 
$wp_customize->add_setting('hd_menu_hvr_color', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_hvr_color', 
    array(
    'label' => __('Menu Link Hover/Active Color','novellite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_hvr_color',
    ) ) );
 // hover-bg-color
$wp_customize->add_setting('hd_menu_hvr_bg_color', array(
        'default'        => '#fec503',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'hd_menu_hvr_bg_color', 
    array(
    'label' => __('Menu Link Hover Background/Active Color','novellite'),
        'section'    => 'header_setting',
        'settings'   => 'hd_menu_hvr_bg_color',
    ) ) );
// responsive menu button color 
   $wp_customize->add_setting('mobile_menu_bg_color', array(
        'default'        => '#fec503',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
     
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'mobile_menu_bg_color', 
    array(
    'label' => __('Responsive Menu Icon Color','novellite'),
        'section'    => 'header_setting',
        'settings'   => 'mobile_menu_bg_color',
    ) ) ); 
 //footer-text   

     //  =======================================
    //  = Home Page section hide/show  option =
    //  =======================================
    $wp_customize->add_section('section_home_on_off', array(
        'title'    => __('Section On/Off', 'novellite'),
        'priority' => 5,
    ));
     $wp_customize->add_setting('home_on_off', array(
        'default'        =>array(),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' =>'NovelLite_checkbox_explode',
    ));
     $wp_customize->add_control(new TH_Customize_Control_Checkbox_Multiple(
            $wp_customize,'home_on_off', array(
        'settings' => 'home_on_off',
        'label'   => __( 'Section On/Off', 'novellite' ),
        'description'   => __( '(check to Hide section from frontpage.)', 'novellite' ),
        'section' => 'section_home_on_off',
        'choices' => array(
                'three_column' => __( 'Service Section','novellite' ),
                'testimonial' => __( 'Testimonial Section' ,'novellite' ),
                'woo_commerce'=> __( 'Woocommerce Section','novellite' ),
                'blog' => __( 'Blog Section','novellite' ),
                'team' => __( 'Team Section ','novellite' ),
                'pricing'=> __( 'Pricing Section','novellite' ),
                'countactus' => __( 'Contact-Us Section','novellite' ),
                           
            )
        ) 
    )
);
     //===============================
     //  = section ordering pro feature Settings =
     //  =============================
   $wp_customize->add_section('section_home_ordering', array(
        'title'    => __('Section Ordering', 'novellite'),
        'priority' => 6,
    ));
   $wp_customize->add_setting('section_order', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, 'section_order',
            array(
        'section'  => 'section_home_ordering',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/novelpro-single-page-theme/">Novelpro</a> for full control over <strong>section ordering</strong>!','novellite' )
    )));
     //  =============================
     //  = Home Page Slider Settings =
   	 //  =============================
     $wp_customize->add_panel( 'home_page_slider', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Slider Setting', 'novellite'),
    'description'    => '',
) );    
//First slider image
     $wp_customize->add_section('section_slider_first', array(
        'title'    => __('First Slide Setting', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_page_slider',
    ));
    $wp_customize->add_setting('first_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
        'label'    => __('Slide Image', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_image',
    )));
    $wp_customize->add_setting('first_slider_heading', array(
        'default'           => __('Slider Heading','novellite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_slider_heading', array(
        'label'    => __('Heading', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_heading',
         'type'       => 'text',
    ));
 
    $wp_customize->add_setting('first_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'

    ));
    $wp_customize->add_control('first_slider_desc', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_desc',
         'type'       => 'textarea',
    ));
       $wp_customize->add_setting('first_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('first_slider_link', array(
        'label'    => __('Link', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_slider_link',
         'type'       => 'text',
    ));

         $wp_customize->add_setting('first_button_text', array(
        'default'           => __('Read More', 'novellite'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_button_text', array(
        'label'    => __('Button Text', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('first_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('first_button_link', array(
        'label'    => __('Link For Button', 'novellite'),
        'section'  => 'section_slider_first',
        'settings' => 'first_button_link',
         'type'       => 'text',
    ));

    //Second slider image
     $wp_customize->add_section('section_slider_second', array(
        'title'    => __('Second Slide Setting', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_page_slider',
    ));
    $wp_customize->add_setting('second_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
        'label'    => __('Slide Image', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_image',
    )));
    $wp_customize->add_setting('second_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_slider_heading', array(
        'label'    => __('Heading', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_heading',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('second_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_slider_desc', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('second_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('second_slider_link', array(
        'label'    => __('Link', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_slider_link',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('second_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_button_text', array(
        'label'    => __('Button Text', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_button_text',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('second_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('second_button_link', array(
        'label'    => __('Link for button', 'novellite'),
        'section'  => 'section_slider_second',
        'settings' => 'second_button_link',
         'type'       => 'text',
    ));
    //third slider image
     $wp_customize->add_section('section_slider_third', array(
        'title'    => __('Third Slide Setting', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_page_slider',
    ));
    $wp_customize->add_setting('third_slider_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_slider_image', array(
        'label'    => __('Slide Image', 'novellite'),
        'section'  => 'section_slider_third',
        'settings' => 'third_slider_image',
    )));
    $wp_customize->add_setting('third_slider_heading', array(
        'default'           => 'Heading 1',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('third_slider_heading', array(
        'label'    => __('Heading', 'novellite'),
        'section'  => 'section_slider_third',
        'settings' => 'third_slider_heading',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('third_slider_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('third_slider_desc', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'section_slider_third',
        'settings' => 'third_slider_desc',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('third_slider_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('third_slider_link', array(
        'label'    => __('Link', 'novellite'),
        'section'  => 'section_slider_third',
        'settings' => 'third_slider_link',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('third_button_text', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('third_button_text', array(
        'label'    => __('Button Text', 'novellite'),
        'section'  => 'section_slider_third',
        'settings' => 'third_button_text',
         'type'       => 'text',
    ));
     $wp_customize->add_setting('third_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('third_button_link', array(
        'label'    => __('Link for button', 'novellite'),
        'section'  => 'section_slider_third',
        'settings' => 'third_button_link',
        'type'       => 'text',
    ));
    // Background  &  parallax option
    $wp_customize->add_section('slider_bg_setting', array(
        'title'    => __('Slider Setting', 'novellite'),
        'priority' => 5,
        'panel'    => 'home_page_slider' 
    ));
     $wp_customize->add_setting('slider_parallax_option', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'slider_parallax_option', array(
        'settings' => 'slider_parallax_option',
        'label'   => __('Parallax On/Off','novellite'),
        'section' => 'slider_bg_setting',
        'type'    => 'radio',
        'choices'    => array(
            'on'        => 'On',
            'off'      => 'Off',
        ),
    ));
//slider speed
    $wp_customize->add_setting('NovelLite_slider_speed', array(
        'default'           => 3000,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_int'
    ));
    $wp_customize->add_control('NovelLite_slider_speed', array(
        'label'    => __('Slider Speed', 'novellite'),
        'description'    => __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'novellite'),
        'section'  => 'slider_bg_setting',
        'settings' => 'NovelLite_slider_speed',
         'type'       => 'text',
    ));
// overlay-bg-image
     $wp_customize->add_setting( 'ovrly_bg_img_disable',
                array(
                    'sanitize_callback' => 'NovelLite_sanitize_checkbox',
                    'default'  => '',
                )
            );
            $wp_customize->add_control('ovrly_bg_img_disable',
                array(
                    'type'        => 'checkbox',
                    'label'       => esc_html__('Check here to disable overlay mask image.', 'novellite'),
                    'section'     => 'slider_bg_setting',
                    
                )
            );    
// color-option
// slider-overlay  
 $wp_customize->add_setting(
                'slider_bg_overly',
                array(
                    'default'     => 'rgba(0, 0, 0, 0.1)',
                    'type'        => 'theme_mod',
                    'capability'  => 'edit_theme_options',
                'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
                    
                 )       
            );
 $wp_customize->add_control(
                new Customize_Alpha_Color_Control(
                    $wp_customize,
                    'slider_bg_overly',
                    array(
                        'label'         => __('Overlay Color', 'novellite'),
                        'section'       => 'slider_bg_setting',
                        'settings'      => 'slider_bg_overly',
                        'show_opacity'  => true, // Optional.
                        'palette'   => $palette
                    )
                )
            ); 
    $wp_customize->add_setting('sldr_hdng_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'sldr_hdng_clr', 
    array(
    'label' => __('Heading Color','novellite'),
        'section'    => 'slider_bg_setting',
        'settings'   => 'sldr_hdng_clr',
    ) ) ); 
    $wp_customize->add_setting('sldr_subhdng_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'Novellite_hex_color', 
        
    ));
    $wp_customize->add_control( 
    new WP_Customize_Color_Control(
    $wp_customize, 
    'sldr_subhdng_clr', 
    array(
    'label' => __('Description Color','novellite'),
        'section'    => 'slider_bg_setting',
        'settings'   => 'sldr_subhdng_clr',
    ) ) ); 
// slider-butoon-style
$wp_customize->add_setting( 'slidr_button',
    array(
              'sanitize_callback' => 'sanitize_text_field',
              'default'           => 'default',
              )
         );
$wp_customize->add_control('slidr_button',
        array(
        'type'        => 'select',
        'label'       => esc_html__('Button', 'novellite'),
        'description'       => esc_html__('Choose button style for slider.', 'novellite'),
        'section'     => 'slider_bg_setting',
        'choices' => array(
        'default' => esc_html__('Button style 1', 'novellite'),
        'button-one' => esc_html__('Button style 2', 'novellite'),
        'button-two' => esc_html__('Button style 3', 'novellite'),
        'button-three' => esc_html__('Button style 4', 'novellite'),
        'button-four' => esc_html__('Button style 5', 'novellite'),
        'button-five' => esc_html__('Button style 6', 'novellite'),
             )
           )
        );
       //===============================
      //  = section slider pro feature Settings =
      //  =============================
   $wp_customize->add_section('pro_slider_feature', array(
        'title'    => __('For More Slides', 'novellite'),
        'priority' => 20,
        'panel'    => 'home_page_slider',
    ));
   $wp_customize->add_setting('_sldpro_feature', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, '_sldpro_feature',
            array(
        'section'  => 'pro_slider_feature',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/novelpro-single-page-theme/">Novelpro</a> for multiple slides with advance settings!','novellite' )
    )));
//------------------End Sldier Panel--------------------//


                //  =============================
                 //  = Services Settings       =
                 //  =============================

    $wp_customize->add_panel( 'home_three_col', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Service Section', 'novellite'),
    'description'    => '',
) );


 $wp_customize->add_section('section_three_col_heading', array(
        'title'    => __('Setting', 'novellite'),
        'priority' => 1,
        'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('col_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('col_heading', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'section_three_col_heading',
        'settings' => 'col_heading',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('col_sub', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('col_sub', array(
        'label'    => __('Sub Heading', 'novellite'),
        'section'  => 'section_three_col_heading',
        'settings' => 'col_sub',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('services_bg_background', array(
        'default'        => 'color',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'services_bg_background', array(
        'settings' => 'services_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'section_three_col_heading',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
//images
    $wp_customize->add_setting('services_bg_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'services_bg_image', array(
        'label'    => __('Upload Background Image', 'novellite'),
        'section'  => 'section_three_col_heading',
        'settings' => 'services_bg_image',
    )));
//parallax/on/off
$wp_customize->add_setting('services_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( 'services_parallax', array(
        'settings' => 'services_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'section_three_col_heading',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
    $wp_customize->add_setting(
        'service_img_overly_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

    $wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'service_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'section'   => 'section_three_col_heading',
                'settings'  => 'service_img_overly_color',
                'palette'   => $palette,
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)','novellite'),
            )
        )
    );
// heading & subheading-color
 $wp_customize->add_setting('service_heading_color', array(
            'default'        => '#333',
            'sanitize_callback' => 'Novellite_hex_color', 
           
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'service_heading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'section_three_col_heading',
            'settings'   => 'service_heading_color',
        ) ) );

        $wp_customize->add_setting('service_subheading_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'service_subheading_color', array(
            'label'      => __('Sub Heading Color', 'novellite' ),
            'section'    => 'section_three_col_heading',
            'settings'   => 'service_subheading_color',
        ) ) );
        // title-color
        $wp_customize->add_setting('service_title_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'service_title_color', array(
            'label'      => __('Column Title Color', 'novellite' ),
            'section'    => 'section_three_col_heading',
            'settings'   => 'service_title_color',
        ) ) );
        // text-color
        $wp_customize->add_setting('service_text_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'service_text_color', array(
            'label'      => __('Column Description Color', 'novellite' ),
            'section'    => 'section_three_col_heading',
            'settings'   => 'service_text_color',
        ) ) );
       //===============================
      //  = section service pro feature Settings =
      //  =============================
   $wp_customize->add_section('pro_service_feature', array(
        'title'    => __('For Unlimited Service Column', 'novellite'),
        'priority' => 50,
        'panel'    => 'home_three_col',
    ));
   $wp_customize->add_setting('_servicepro_feature', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, '_servicepro_feature',
            array(
        'section'  => 'pro_service_feature',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/novelpro-single-page-theme/">Novelpro</a> for unlimited service column with advance settings!','novellite' )
    )));  
// Feature First Block
     $wp_customize->add_section('first_feature_block', array(
        'title'    => __('First Column', 'novellite'),
        'priority' => 20,
        'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('first_feature_font_icon', array(
        'default'           => 'fa-microphone fa-stack-1x fa-inverse',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea',

    ));
    $wp_customize->add_control('first_feature_font_icon', array(
        'label'    => __('Icon', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_font_icon',
        'type'       => 'text',
        'description' => __( 'Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','novellite' ),
    ));

       $wp_customize->add_setting('first_feature_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',

    ));
    $wp_customize->add_control('first_feature_heading', array(
        'label'    => __('Heading', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_heading',
         'type'       => 'text',
    ));

        $wp_customize->add_setting('first_feature_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('first_feature_link', array(
        'label'    => __('Heading Link', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('first_feature_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('first_feature_desc', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'first_feature_block',
        'settings' => 'first_feature_desc',
         'type'       => 'textarea',
    ));


    // Feature Second Block
     $wp_customize->add_section('second_feature_block', array(
        'title'    => __('Second Column', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('second_feature_font_icon', array(
        'default'           => 'fa-rocket fa-stack-1x fa-inverse',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_feature_font_icon', array(
        'label'    => __('Icon', 'novellite'),
        'description' => __( 'Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','novellite' ),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('second_feature_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_feature_heading', array(
        'label'    => __('Heading', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('second_feature_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('second_feature_link', array(
        'label'    => __('Heading Link', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('second_feature_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_feature_desc', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'second_feature_block',
        'settings' => 'second_feature_desc',
         'type'       => 'textarea',
    ));

    // Feature Third Block
     $wp_customize->add_section('third_feature_block', array(
        'title'    => __('Third Column', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_three_col',
    ));
    $wp_customize->add_setting('third_feature_font_icon', array(
        'default'           => 'fa-rocket fa-stack-1x fa-inverse',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('third_feature_font_icon', array(
        'label'    => __('Icon', 'novellite'),
        'description' => __( 'Go to this link for <a target="_blank" href="//fontawesome.io/icons/">Fontawesome icons</a> and copy the class of icon that you need & paste it below.','novellite' ),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_font_icon',
         'type'       => 'text',
    ));

       $wp_customize->add_setting('third_feature_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('third_feature_heading', array(
        'label'    => __('Heading', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_heading',
         'type'       => 'text',
    ));

          $wp_customize->add_setting('third_feature_link', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('third_feature_link', array(
        'label'    => __('Heading Link', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_link',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('third_feature_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('third_feature_desc', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'third_feature_block',
        'settings' => 'third_feature_desc',
         'type'       => 'textarea',
    ));

//-------End services Panel--------//
                 //  =============================
                //  = Testimonial Settings=
                //  ==============================

$wp_customize->add_panel( 'home_testimonial', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Testimonial Section', 'novellite'),
    'description'    => '',
) );

 $wp_customize->add_section('testimonial_bg_heading', array(
        'title'    => __('Setting', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));

// main heading
$wp_customize->add_setting('testimonial_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('testimonial_heading', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'testimonial_bg_heading',
        'settings' => 'testimonial_heading',
         'type'       => 'text',
    ));
 //testimonial slider speed
    $wp_customize->add_setting('testimonial_slider_speed', array(
        'default'           => 3000,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_int'
    ));
    $wp_customize->add_control('testimonial_slider_speed', array(
        'label'    => __('Slider Speed', 'novellite'),
        'description'    => __('(Increase or decrease the value in multiple of thousand to change slide speed. For example 3000 equals to 3 second. )', 'novellite'),
        'section'  => 'testimonial_bg_heading',
        'settings' => 'testimonial_slider_speed',
         'type'       => 'text',
    ));   
$wp_customize->add_setting('testimonial_bg_background', array(
        'default'        => 'image',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'testimonial_bg_background', array(
        'settings' => 'testimonial_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'testimonial_bg_heading',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
    $wp_customize->add_setting('testimonial_parallax_image', array(
        'default'           => TESTIMONIAL_BG_IMAGE,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'testimonial_parallax_image', array(
        'label'    => __('Testimonial Background Image', 'novellite'),
        'section'  => 'testimonial_bg_heading',
        'settings' => 'testimonial_parallax_image',
    )));
//parallax/on/off
$wp_customize->add_setting('testimonial_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( 'testimonial_parallax', array(
        'settings' => 'testimonial_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'testimonial_bg_heading',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
$wp_customize->add_setting('testimonial_img_overly_color',
        array(
            'default'     => 'rgba(0, 0,0, 0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

$wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'testimonial_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)', 'novellite' ),
                'section'   => 'testimonial_bg_heading',
                'settings'  => 'testimonial_img_overly_color',
                'palette'   => $palette
            )
        )
    );
// heading & subheading-color
 $wp_customize->add_setting('testimonial_heading_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'testimonial_heading_color', array(
           'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'testimonial_bg_heading',
            'settings'   => 'testimonial_heading_color',
        ) ) );
// testmonial background color
$wp_customize->add_setting('testimonial_cont_bg_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

$wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'testimonial_cont_bg_color',
            array(
                'label'     => __('Content Background Color','novellite'),
                'section'   => 'testimonial_bg_heading',
                'settings'  => 'testimonial_cont_bg_color',
                'palette'   => $palette
            )
        )
    );
// testmonial text color        
 $wp_customize->add_setting('testimonial_cont_txt_color', array(
            'default'        => '#000',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'testimonial_cont_txt_color', array(
            'label'      => __('Content Text Color', 'novellite' ),
            'section'    => 'testimonial_bg_heading',
            'settings'   => 'testimonial_cont_txt_color',
        ) ) ); 
   //===============================
      //  = section testimonial pro feature Settings =
      //  =============================
   $wp_customize->add_section('pro_testimonial_feature', array(
        'title'    => __('For Unlimited Testimonial', 'novellite'),
        'priority' => 50,
        'panel'    => 'home_testimonial',
    ));
   $wp_customize->add_setting('_testimonialpro_feature', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, '_testimonialpro_feature',
            array(
        'section'  => 'pro_testimonial_feature',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/novelpro-single-page-theme/">Novelpro</a> for unlimited testimonial with advance settings!','novellite' )
    )));                    
    // Testimonial first 1 
     $wp_customize->add_section('section_testimonial_first', array(
        'title'    => __('First Testimonial', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));
    $wp_customize->add_setting('first_author_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_author_image', array(
        'label'    => __('Author Image', 'novellite'),
        'section'  => 'section_testimonial_first',
        'settings' => 'first_author_image',
    )));

    $wp_customize->add_setting('first_author_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('first_author_desc', array(
        'label'    => __('Testimonial Text', 'novellite'),
        'section'  => 'section_testimonial_first',
        'settings' => 'first_author_desc',
         'type'       => 'textarea',
    ));

      $wp_customize->add_setting('first_author_name', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('first_author_name', array(
        'label'    => __('Author Name', 'novellite'),
        'section'  => 'section_testimonial_first',
        'settings' => 'first_author_name',
         'type'       => 'text',
    ));
    // Testimonial first 2
     $wp_customize->add_section('section_testimonial_second', array(
        'title'    => __('Second Testimonial', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));
    $wp_customize->add_setting('second_author_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_author_image', array(
        'label'    => __('Author Image', 'novellite'),
        'section'  => 'section_testimonial_second',
        'settings' => 'second_author_image',
    )));

    $wp_customize->add_setting('second_author_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('second_author_desc', array(
        'label'    => __('Testimonial Text', 'novellite'),
        'section'  => 'section_testimonial_second',
        'settings' => 'second_author_desc',
         'type'       => 'textarea',
    ));

      $wp_customize->add_setting('second_author_name', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('second_author_name', array(
        'label'    => __('Author Name', 'novellite'),
        'section'  => 'section_testimonial_second',
        'settings' => 'second_author_name',
         'type'       => 'text',
    ));
// Testimonial first 3
     $wp_customize->add_section('section_testimonial_third', array(
        'title'    => __('Third Testimonial', 'novellite'),
        'priority' => 20,
         'panel'  => 'home_testimonial',
    ));
    $wp_customize->add_setting('third_author_image', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_author_image', array(
        'label'    => __('Author Image', 'novellite'),
        'section'  => 'section_testimonial_third',
        'settings' => 'third_author_image',
    )));

    $wp_customize->add_setting('third_author_desc', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('third_author_desc', array(
        'label'    => __('Testimonial Text', 'novellite'),
        'section'  => 'section_testimonial_third',
        'settings' => 'third_author_desc',
         'type'       => 'textarea',
    ));

      $wp_customize->add_setting('third_author_name', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('third_author_name', array(
        'label'    => __('Author Name', 'novellite'),
        'section'  => 'section_testimonial_third',
        'settings' => 'third_author_name',
         'type'       => 'text',
    ));
//Home Page Blog heading and sub heading 
$wp_customize->add_panel('blog_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Blog Section', 'novellite'),
    'description'    => '',
) );
$wp_customize->add_section( 'blog_head_desc', array(
     'title'          => __('Setting','novellite' ),
     'priority'       => 1,
     'panel'          => 'blog_section',
) );
    $wp_customize->add_setting('blog_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('blog_head_', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'blog_head_desc',
        'settings' => 'blog_head_',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('blog_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('blog_desc_', array(
        'label'    => __('Sub Heading', 'novellite'),
        'section'  => 'blog_head_desc',
        'settings' => 'blog_desc_',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('post_bg_background', array(
        'default'        => 'color',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('post_bg_background', array(
        'settings' => 'post_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'blog_head_desc',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
    //images
    $wp_customize->add_setting('post_bg_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'post_bg_image', array(
        'label'    => __('Upload Background Image', 'novellite'),
        'section'  => 'blog_head_desc',
        'settings' => 'post_bg_image',
    )));
//parallax/on/off
$wp_customize->add_setting('post_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control('post_parallax', array(
        'settings' => 'post_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'blog_head_desc',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
    $wp_customize->add_setting(
        'post_img_overly_color',
        array(
            'default'     => '#fff',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

    $wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'post_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)','novellite'),
                'section'   => 'blog_head_desc',
                'settings'  => 'post_img_overly_color',
                'palette'   => $palette
            )
        )
    );
 // heading & subheading-color
 $wp_customize->add_setting('post_heading_color', array(
            'default'        => '#333',
            'sanitize_callback' => 'Novellite_hex_color', 
          
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'post_heading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'blog_head_desc',
            'settings'   => 'post_heading_color',
        ) ) );

        $wp_customize->add_setting('post_subheading_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'post_subheading_color', array(
            'label'      => __('Sub Heading Color', 'novellite' ),
            'section'    => 'blog_head_desc',
            'settings'   => 'post_subheading_color',
        ) ) );   
$wp_customize->add_section( 'post_setting', array(
     'title'          => __('Post Setting','novellite' ),
     'priority'       => 2,
     'panel'          => 'blog_section',
) );
$wp_customize->add_setting('post_cate_count', array(
        'default'        => 3,
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('post_cate_count', array(
        'settings'  => 'post_cate_count',
        'label'     => __('Number of Post','novellite'),
        'description' => __('(Enter number of post which you want to show.)','novellite'),
        'section'   => 'post_setting',
        'type'      => 'number',
       'input_attrs' => array('min' => 1,'max' => 6)
    ) );
$wp_customize->add_setting('read_more_txt', array(
        'default'        => 'Read More',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('read_more_txt', array(
        'settings'  => 'read_more_txt',
        'label'     => __('Change Read More Text','novellite'),
        'description'=> __('Enter a text below that you want to show instead of Read More','novellite'),
        'section'   => 'post_setting',
        'type'      => 'text',
       
    ) );
//--------End Blog Heading and SubHeading---------//


     //=============================
     //  = woo Commerce Section   =
     //  =============================
     // woo panel
    $wp_customize->add_section( 'woo_section', array(
        'title'          => __( 'WooCommerce Section','novellite' ),
            'priority'       => 20,
        ));

    $wp_customize->add_setting('woo_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
     ));
    $wp_customize->add_control('woo_head_', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'woo_section',
        'settings' => 'woo_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('woo_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('woo_desc_', array(
        'label'    => __('Sub Heading', 'novellite'),
        'section'  => 'woo_section',
        'settings' => 'woo_desc_',
         'type'       => 'textarea',
    ));

  $wp_customize->add_setting('woo_shortcode', array(
        'default'        => '[recent_products]',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('woo_shortcode', array(
        'settings' => 'woo_shortcode',
        'label'     => 'Woo Commerce ShortCode',
        'section' => 'woo_section',
        'type'    => 'textarea',
    ) );
    $wp_customize->add_setting('woo_bg_background', array(
        'default'        => 'color',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'woo_bg_background', array(
        'settings' => 'woo_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'woo_section',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
    //images
    $wp_customize->add_setting('woo_bg_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'woo_bg_image', array(
        'label'    => __('Upload Background Image', 'novellite'),
        'section'  => 'woo_section',
        'settings' => 'woo_bg_image',
    )));
//parallax/on/off
$wp_customize->add_setting('woo_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( 'woo_parallax', array(
        'settings' => 'woo_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'woo_section',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
    $wp_customize->add_setting(
        'woo_img_overly_color',
        array(
            'default'     => '#F7F7F7',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

    $wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'woo_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)','novellite'),
                'section'   => 'woo_section',
                'settings'  => 'woo_img_overly_color',
                'palette'   => $palette
            )
        )
    );
 // heading & subheading-color
 $wp_customize->add_setting('woo_heading_color', array(
            'default'        => '#333',
            'sanitize_callback' => 'Novellite_hex_color', 
           
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_heading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'woo_section',
            'settings'   => 'woo_heading_color',
        ) ) );

        $wp_customize->add_setting('woo_subheading_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'woo_subheading_color', array(
            'label'      => __('Sub Heading Color', 'novellite' ),
            'section'    => 'woo_section',
            'settings'   => 'woo_subheading_color',
        ) ) );   
    // End woo section
    //  =============================
        //  = Our Team Settings       =
        //  =============================
    // team panel
$wp_customize->add_panel( 'our_team', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Team Section', 'novellite'),
    'description'    => '',
) );

// team head and sub heading
    $wp_customize->add_section( 'team_head_desc', array(
     'title'          => __( 'Setting','novellite' ),
     'theme_supports' => 'custom-background',
     'panel'  => 'our_team',
     'priority' => 1,
) );
       $wp_customize->add_setting('team_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('team_head_', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'team_head_desc',
        'settings' => 'team_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('team_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('team_desc_', array(
        'label'    => __('Sub Heading', 'novellite'),
        'section'  => 'team_head_desc',
        'settings' => 'team_desc_',
         'type'       => 'textarea',
    ));
$wp_customize->add_setting('team_bg_background', array(
        'default'        => 'color',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('team_bg_background', array(
        'settings' => 'team_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'team_head_desc',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
    //images
    $wp_customize->add_setting('team_bg_image', array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'team_bg_image', array(
        'label'    => __('Upload Background Image', 'novellite'),
        'section'  => 'team_head_desc',
        'settings' => 'team_bg_image',
    )));
//parallax/on/off
$wp_customize->add_setting('team_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control('team_parallax', array(
        'settings' => 'team_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'team_head_desc',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
    $wp_customize->add_setting(
        'team_img_overly_color',
        array(
            'default'     => '#f7f7f7',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

    $wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'team_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)','novellite'),
                'section'   => 'team_head_desc',
                'settings'  => 'team_img_overly_color',
                'palette'   => $palette
            )
        )
    );
 // heading & subheading-color
 $wp_customize->add_setting('team_heading_color', array(
            'default'        => '#333',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'team_heading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'team_head_desc',
            'settings'   => 'team_heading_color',
        ) ) );

        $wp_customize->add_setting('team_subheading_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'team_subheading_color', array(
            'label'      => __('Sub Heading Color', 'novellite' ),
            'section'    => 'team_head_desc',
            'settings'   => 'team_subheading_color',
        ) ) );   
// title-color
        $wp_customize->add_setting('team_title_color', array(
            'default'        => '#222',
            'sanitize_callback' => 'Novellite_hex_color', 
          
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'team_title_color', array(
            'label'      => __('Member Title Color', 'novellite' ),
            'section'    => 'team_head_desc',
            'settings'   => 'team_title_color',
        ) ) );
        // text-color
        $wp_customize->add_setting('team_desig_color', array(
            'default'        => '#777',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'team_desig_color', array(
            'label'      => __('Member Designation Color', 'novellite' ),
            'section'    => 'team_head_desc',
            'settings'   => 'team_desig_color',
        ) ) );
        // text-color
        $wp_customize->add_setting('team_text_color', array(
            'default'        => '#333',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'team_text_color', array(
            'label'      => __('Member Description Color', 'novellite' ),
            'section'    => 'team_head_desc',
            'settings'   => 'team_text_color',
        ) ) );
       //===============================
      //  = section team pro feature Settings =
      //  =============================
   $wp_customize->add_section('pro_team_feature', array(
    'title'    => __('For Unlimited Team Member', 'novellite'),
    'priority' => 30,
    'panel'    => 'our_team',
    ));
   $wp_customize->add_setting('_teampro_feature', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, '_teampro_feature',
            array(
        'section'  => 'pro_team_feature',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/novelpro-single-page-theme/">Novelpro</a> for unlimited team member with advance settings!','novellite' )
    )));     
//our team first section

     $wp_customize->add_section('our_team_first', array(
        'title'    => __('First Member Setting', 'novellite'),
        'priority' => 2,
         'panel'  => 'our_team',
    ));
    $wp_customize->add_setting('our_team_img_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_team_img_first', array(
        'label'    => __('Member Image', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_img_first',
    )));
    $wp_customize->add_setting('our_team_heading_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_heading_first', array(
        'label'    => __('Member Name', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_heading_first',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('our_team_subhead_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_subhead_first', array(
        'label'    => __('Designation', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_subhead_first',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('our_team_desc_first', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('our_team_desc_first', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_desc_first',
         'type'       => 'textarea',
    ));

       $wp_customize->add_setting('our_team_link_first', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('our_team_link_first', array(
        'label'    => __('Link', 'novellite'),
        'section'  => 'our_team_first',
        'settings' => 'our_team_link_first',
         'type'       => 'text',
    ));


//our team second section

     $wp_customize->add_section('our_team_second', array(
        'title'    => __('Second Member Setting', 'novellite'),
         'panel'  => 'our_team',
         'priority' => 3,
    ));
    $wp_customize->add_setting('our_team_img_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_team_img_second', array(
        'label'    => __('Member Image', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_img_second',
    )));
    $wp_customize->add_setting('our_team_heading_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_heading_second', array(
        'label'    => __('Member Name', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_heading_second',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('our_team_subhead_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_subhead_second', array(
        'label'    => __('Designation', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_subhead_second',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('our_team_desc_second', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('our_team_desc_second', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_desc_second',
         'type'       => 'textarea',
    ));

       $wp_customize->add_setting('our_team_link_second', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('our_team_link_second', array(
        'label'    => __('Link', 'novellite'),
        'section'  => 'our_team_second',
        'settings' => 'our_team_link_second',
         'type'       => 'text',
    ));

//our team third section

     $wp_customize->add_section('our_team_third', array(
        'title'    => __('Third Member Setting', 'novellite'),
         'panel'  => 'our_team',
         'priority' => 4,
    ));
    $wp_customize->add_setting('our_team_img_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_team_img_third', array(
        'label'    => __('Member Image', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_img_third',
    )));
    $wp_customize->add_setting('our_team_heading_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_heading_third', array(
        'label'    => __('Member Name', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_heading_third',
         'type'       => 'text',
    ));

    $wp_customize->add_setting('our_team_subhead_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('our_team_subhead_third', array(
        'label'    => __('Designation', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_subhead_third',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('our_team_desc_third', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'

    ));
    $wp_customize->add_control('our_team_desc_third', array(
        'label'    => __('Description', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_desc_third',
         'type'       => 'textarea',
    ));

       $wp_customize->add_setting('our_team_link_third', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('our_team_link_third', array(
        'label'    => __('Link', 'novellite'),
        'section'  => 'our_team_third',
        'settings' => 'our_team_link_third',
         'type'       => 'text',
    ));

    //  =============================
    //      = Pricing Section   =
    //  =============================

    //panal settings
    $wp_customize->add_section( 'pricing_head', array(
     'title'          => __( 'Pricing Section', 'novellite' ),
     'priority'       => 20,
) );

// section setings
    // heding and subheading (text & textarwa , uploadas)
     $wp_customize->add_setting('pricing_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pricing_head_', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'pricing_head',
        'settings' => 'pricing_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('pricing_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('pricing_desc_', array(
        'label'    => __('Sub Heading', 'novellite'),
        'section'  => 'pricing_head',
        'settings' => 'pricing_desc_',
         'type'       => 'textarea',
    ));

 // TEXTAREA   
$wp_customize->add_setting('txt_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_textarea'
    ));
    $wp_customize->add_control('txt_desc_', array(
    'label'    => __('Textarea or Shortcode', 'novellite'),
    'description'    => __('For pricing table go to <a target="_blank" href="//wordpress.org">wordpress.org</a>. Download your favourite pricing plugin and put the shortcode below', 'novellite'),
    'section'  => 'pricing_head',
    'settings' => 'txt_desc_',
    'type'       => 'textarea',
    ));
    $wp_customize->add_setting('pricing_bg_background', array(
        'default'        => 'image',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'pricing_bg_background', array(
        'settings' => 'pricing_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'pricing_head',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
$wp_customize->add_setting('pricing_img_first', array(
         'default' => PRICING_BG_IMAGE,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'novellite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'pricing_img_first', array(
        'label'    => __('Background Image Upload', 'novellite'),
        'section'  => 'pricing_head',
        'settings' => 'pricing_img_first',
    )));    
 //parallax/on/off
$wp_customize->add_setting('pricing_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control( 'pricing_parallax', array(
        'settings' => 'pricing_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'pricing_head',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
$wp_customize->add_setting('pricing_img_overly_color',
        array(
            'default'     => 'rgba(0, 0,0, 0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

$wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'pricing_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)','novellite'),
                'section'   => 'pricing_head',
                'settings'  => 'pricing_img_overly_color',
                'palette'   => $palette
            )
        )
    );
// heading & subheading-color
 $wp_customize->add_setting('pricing_heading_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'Novellite_hex_color', 
       
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'pricing_heading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'pricing_head',
            'settings'   => 'pricing_heading_color',
        ) ) );   
   $wp_customize->add_setting('pricing_subheading_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'pricing_subheading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'pricing_head',
            'settings'   => 'pricing_subheading_color',
        ) ) );  
  // pricing-pro-feature
   $wp_customize->add_setting('_pricepro_feature', array(
        'sanitize_callback' => 'NovelLite_sanitize_text',
    ));
   $wp_customize->add_control( new NovelLite_Misc_Control( $wp_customize, '_pricepro_feature',
            array(
        'section'  => 'pricing_head',
        'type'        => 'custom_message',
        'description' => wp_kses_post( 'Check out <a target="_blank" href="//themehunk.com/product/novelpro-single-page-theme/">Novelpro</a> for inbuilt pricing table with unlimited number of column!','novellite' )
    )));            
 //  =============================
//  = contact & lead detail Settings =
//  ==============================

    $wp_customize->add_section( 'lead_form', array(
     'title'          => __( 'Contact Section', 'novellite' ),
     'priority'       => 20,
) );

       $wp_customize->add_setting('cf_head_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cf_head_', array(
        'label'    => __('Main Heading', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_head_',
         'type'       => 'text',
    ));

     $wp_customize->add_setting('cf_desc_', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('cf_desc_', array(
        'label'    => __('Sub Heading', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_desc_',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('cf_shtcd_', array(
        'default'           => '[lead-form form-id=1 title=Contact Us]',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_textarea'
    ));
    $wp_customize->add_control('cf_shtcd_', array(
        'label'    => __('Shortcode', 'novellite'),
        'description'    => __('Install recommended <a target="_blank" href="//wordpress.org/plugins/lead-form-builder/">Contact Form & Lead Form Builder</a> Plugin for Contact Us form.', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_shtcd_',
         'type'       => 'textarea',
    ));
    $wp_customize->add_setting('cf_bg_background', array(
        'default'        => 'image',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'cf_bg_background', array(
        'settings' => 'cf_bg_background',
        'label'   => __('Background Option','novellite'),
        'section' => 'lead_form',
        'type'    => 'radio',
        'choices'    => array(
        'color'    => 'Background Color',
        'image'    => 'Background Image',  
        ),
    ));
    $wp_customize->add_setting('cf_image', array(
        'default'           => CONTACT_BG_IMAGE,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'NovelLite_sanitize_upload'
    ));
   $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'cf_image', array(
        'label'    => __('Contact Form Background Image', 'novellite'),
        'section'  => 'lead_form',
        'settings' => 'cf_image',
    )));
//parallax/on/off
$wp_customize->add_setting('cf_parallax', array(
        'default'        =>'on',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ));
$wp_customize->add_control('cf_parallax', array(
        'settings' => 'cf_parallax',
        'label'    => __('Parallax On/Off Option','novellite'),
        'section'  => 'lead_form',
        'type'     => 'radio',
        'choices'  => array(
            'on'   => 'On',
            'off'  => 'Off',
        ),
    ));
//overlay and background color
$wp_customize->add_setting('cf_img_overly_color',
        array(
            'default'     => 'rgba(0, 0,0, 0)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'sanitize_callback' => 'NovelLite_sanitize_color_alpha',
        ) );

$wp_customize->add_control(
        new Customize_Alpha_Color_Control($wp_customize,
            'cf_img_overly_color',
            array(
                'label'     => __('Background Color','novellite'),
                'description'=>__('(Select Background Color for section. And if you are using background image for section then set color transparency and use this option for section Overlay.)','novellite'),
                'section'   => 'lead_form',
                'settings'  => 'cf_img_overly_color',
                'palette'   => $palette
            )
        )
    );
// heading & subheading-color
 $wp_customize->add_setting('cf_heading_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'cf_heading_color', array(
            'label'      => __('Main Heading Color', 'novellite' ),
            'section'    => 'lead_form',
            'settings'   => 'cf_heading_color',
        ) ) );
 $wp_customize->add_setting('cf_subheading_color', array(
            'default'        => '#fff',
            'sanitize_callback' => 'Novellite_hex_color', 
            
        ));
        $wp_customize->add_control( 
            new WP_Customize_Color_Control($wp_customize,'cf_subheading_color', array(
            'label'   => __('Sub Heading Color', 'novellite' ),
            'section'    => 'lead_form',
            'settings'   => 'cf_subheading_color',
        ) ) );
endif;
$wp_customize->add_section( 'header_image', array(
  'title'          => __( 'Header Background Image', 'novellite' ),
  'theme_supports' => 'custom-header',
  'priority'       => 40,
  'panel' =>'theme_optn',
) );
// custom color
    $wp_customize->get_section('colors')->title = esc_html__('Body Background Color', 'novellite');
    $wp_customize->get_section('colors')->priority = 60;
    $wp_customize->get_section('colors')->panel = 'theme_optn';
// custom background
$wp_customize->add_section( 'background_image', array(
  'title'          => __( 'Body Background Image', 'novellite' ),
  'theme_supports' => 'custom-background',
  'priority'       => 80,
  'panel' =>'theme_optn',
) );   
// selective-refresh option added
$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.navbar-header h1 a'
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.navbar-header p'
) );
// slider
$wp_customize->selective_refresh->add_partial( 'first_slider_heading', array(
        'selector' => '#slides_full h1 a',
) );
$wp_customize->selective_refresh->add_partial( 'first_slider_desc', array(
        'selector' => '#slides_full p',
) );
$wp_customize->selective_refresh->add_partial( 'first_button_text', array(
        'selector' => '#slides_full .main-slider-button',
) );
// services
$wp_customize->selective_refresh->add_partial( 'col_heading', array(
        'selector' => '#section1 h2.section-heading',
) );
$wp_customize->selective_refresh->add_partial( 'first_feature_heading', array(
        'selector' => '#section1 .th-1',
) );
$wp_customize->selective_refresh->add_partial( 'second_feature_heading', array(
        'selector' => '#section1 .th-2',
) );
$wp_customize->selective_refresh->add_partial( 'third_feature_heading', array(
        'selector' => '#section1 .th-3',
) );

// testimonial
$wp_customize->selective_refresh->add_partial( 'testimonial_heading', array(
        'selector' => '#section2 h1.testimonial-header',
) );

// woocommerce
$wp_customize->selective_refresh->add_partial('woo_head_', array(
        'selector' => '#section8 h2.section-heading',
) );
//blog
$wp_customize->selective_refresh->add_partial('blog_head_', array(
        'selector' => '#section3 h2.section-heading',
) );
$wp_customize->selective_refresh->add_partial('blog_desc_', array(
        'selector' => '#section3 h3.section-subheading',
) );
// team
$wp_customize->selective_refresh->add_partial('team_head_', array(
        'selector' => '#section4 h2.section-heading',
) );
$wp_customize->selective_refresh->add_partial('our_team_img_first', array(
        'selector' => '#section4 .th-1 .team-member',
) );
$wp_customize->selective_refresh->add_partial('our_team_img_second', array(
        'selector' => '#section4 .th-2 .team-member',
) );
$wp_customize->selective_refresh->add_partial('our_team_img_third', array(
        'selector' => '#section4 .th-3 .team-member',
) );
// Contact
$wp_customize->selective_refresh->add_partial('cf_head_', array(
        'selector' => '#section5 h2.section-heading',
) );
$wp_customize->selective_refresh->add_partial('cf_shtcd_', array(
        'selector' => '#section5 .cnt-div',
) );
}
add_action('customize_register','NovelLite_customize_register');