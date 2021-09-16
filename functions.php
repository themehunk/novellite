<?php

load_theme_textdomain('novellite', get_template_directory() . '/languages');

function NovelLite_setup(){
/**
 * Intialize language files 
 */
    /** Tag title **/
    add_theme_support('title-tag');

    /**
     * Post format support
     */
    add_theme_support('post-formats', array('image', 'gallery', 'video', 'link', 'quote'));

    /**
     * Automatic feed links support
     */
    add_theme_support('automatic-feed-links');

    /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
    // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
    // custom header
    $defaults = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => false,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults ); 

        //custom logo
   add_theme_support( 'custom-logo', array(
    'height'      => 60,
    'width'       => 225,
    'flex-height' => true,
  ) );

    /**
     * Custom editor style initialize
     */
    add_editor_style();
    register_nav_menus(array(
        'home-menu' => HOME_MENU,
        'frontpage-menu' => FRONT_MENU
    ));

// on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }

    // Recommend plugins
        add_theme_support( 'novellite-recommend-plugins', array(
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'novellite' ),
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'novellite' ),
                'active_filename' => 'woocommerce/woocommerce.php',
            )
        ) );

}
add_action('after_setup_theme', 'NovelLite_setup');


require_once (get_template_directory() . '/inc/inc.php'); 
/* ----------------------------------------------------------------------------------- */
/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */
function NovelLite_add_stylesheet() {
$novellite_animation = get_theme_mod('novellite_animation_disable');
	if (!is_admin()) {
    wp_enqueue_style( 'NovelLite_font', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    wp_enqueue_style('NovelLite_bootstrap', get_template_directory_uri() . "/css/bootstrap.css", '', '', 'all');
    wp_enqueue_style('font_awesome', get_template_directory_uri() . "/font-awesome/css/font-awesome.min.css", '', '', 'all');
    if($novellite_animation =='' || $novellite_animation =='0'){
    wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.css", '', '', 'all');
    }
	wp_enqueue_style('bxslider', get_template_directory_uri() . "/css/jquery.bxslider.css", '', '', 'all');
    wp_enqueue_style('flexslider', get_template_directory_uri() . "/css/flexslider.css", '', '', 'all');
    wp_enqueue_style('NovelLite_prettyPhoto', get_template_directory_uri() . "/css/prettyPhoto.css", '', '', 'all');
	    wp_enqueue_style( 'NovelLite_style', get_stylesheet_uri() );
	}
}
add_action('wp_enqueue_scripts', 'NovelLite_add_stylesheet');
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */
function NovelLite_wp_enqueue_scripts() {
    if (!is_admin()) {
    wp_enqueue_script('NovelLite-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-jqBootstrapValidation', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array('jquery'),'21032016', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-hammer', get_template_directory_uri() . '/js/hammer.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'),'21032016', true);
    wp_enqueue_script('jcarousellite', get_template_directory_uri() . '/js/jquery.jcarousellite.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-scrollSpeed', get_template_directory_uri() . '/js/jQuery.scrollSpeed.js', array('jquery'),'21032016', true);
    wp_enqueue_script('NovelLite-buxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'),'21032016', true);
    wp_enqueue_script( 'novelite-parallax', get_template_directory_uri() . '/js/parallax.js', array( 'jquery' ), '', true );
    wp_enqueue_script('NovelLite-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array('jquery'),'21032016', true);
    wp_enqueue_script('novelpro-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'),'21032016', true);
    
     wp_enqueue_script( 'novelpro-jquery.poptrox', get_template_directory_uri() . '/js/jquery.poptrox.js', array( 'jquery' ), '', true );
    wp_enqueue_script('NovelLite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),'21032016', true);
    }
}
add_action('wp_enqueue_scripts', 'NovelLite_wp_enqueue_scripts');


function NovelLite_menu_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'NovelLite_menu_add_menuclass');


//main nav
function NovelLite_menu_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'menu_class' => 'sf-menu nav navbar-nav navbar-right', 'menu_id' => '','container' => '', 'fallback_cb' => 'NovelLite_menu_nav_fallback'));
    else
        NovelLite_menu_nav_fallback();
}
function NovelLite_menu_nav_fallback() {
    ?>

    <ul class="sf-menu nav navbar-nav navbar-right">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}
//Frontpage nav
function NovelLite_menu_frontpage_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'menu_class' => 'nav navbar-nav navbar-right sf-menu', 'menu_id' => '', 'container' => '', 'fallback_cb' => 'NovelLite_menu_frontpage_nav_fallback'));
    else
        NovelLite_menu_frontpage_nav_fallback();
}
function NovelLite_menu_frontpage_nav_fallback() {
    ?>
    <ul class="sf-menu nav navbar-nav navbar-right">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function NovelLite_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'NovelLite_add_menuclass');

//main nav
function NovelLite_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'NovelLite_nav_fallback'));
    else
        NovelLite_nav_fallback();
}

function NovelLite_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
    <?php
    wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
    ?>
        </ul>
    </div>
    <?php
}

function NovelLite_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . HOME_TEXT . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . HOME_TEXT . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'NovelLite_nav_menu_items');

//Frontpage nav
function NovelLite_frontpage_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'NovelLite_frontpage_nav_fallback'));
    else
        NovelLite_frontpage_nav_fallback();
}

function NovelLite_frontpage_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
    <?php
    wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
    ?>
        </ul>
    </div>
    <?php
}
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function NovelLite_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function NovelLite_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3><span class="line"></span>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3><span class="line"></span>',
        'after_title' => '</h3>',
    ));
	// Footer Area 1,  Empty by default.
    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'novellite'),
        'id' => 'first-footer-widget-area',
        'description' => __('First Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	// Footer Area 2, Empty by default.
    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'novellite'),
        'id' => 'second-footer-widget-area',
        'description' => __('Second Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	// Footer Area 3, Empty by default.
    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'novellite'),
        'id' => 'third-footer-widget-area',
        'description' => __('Third Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	// Footer Area 4, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => __('Fourth Footer Widget Area', 'novellite'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('Fourth Footer Widget', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
        'name' => __('Woocommerce widget area', 'novellite'),
        'id' => 'th-woo-widget-area',
        'description' => __('Woocommerce page display', 'novellite'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    )); 
	
}

/** Register sidebars by running NovelLite_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'NovelLite_widgets_init');
/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */
add_action('wp_head', 'NovelLite_of_head_css');

function NovelLite_of_head_css() {
    $output = '';
    $custom_css = get_theme_mod('custom_css_text','');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
}

//Trm excerpt
function NovelLite_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

function NovelLite_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

//Trm post title
function NovelLite_the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('NovelLite_the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}
/**
 * Enqueues the javascript for comment replys 
 * 
 * */
function NovelLite_enqueue_scripts() {
    if (is_singular() and get_site_option('thread_comments')) {
        wp_print_scripts('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'NovelLite_enqueue_scripts');

// Set up the WordPress core custom background feature.
add_theme_support('custom-background',apply_filters( 'novellite_background_args', array(
        'default-repeat'         => 'no-repeat',
        'default-position-x'     => 'center',
        'default-attachment'     => 'fixed',
         'default-color'          => '#f8f8f8',
    )));
/* woocommerce support */
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if ( ! function_exists( 'NovelLite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function NovelLite_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;

// ----------------------------//
// layout choose function
//-----------------------------//
if (!function_exists( 'novellite_layout' ) ) {
    function novellite_get_layout( $default = 'right' ) {
    $layout = get_theme_mod( 'novellite_layout', $default );
    return apply_filters( 'novellite_get_layout', $layout, $default );
    }
}

if ( ! function_exists( 'novellite_hex_to_rgba' ) ) {
    function novellite_hex_to_rgba( $color, $alpha = 1)
    {
        $color = str_replace('#', '', $color);
        if ('' === $color) {
            return '';
        }

        if ( strpos(trim($color), 'rgb') !== false ) {
            return $color;
        }

        // 3 or 6 hex digits, or the empty string.
        if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', '#' . $color)) {
            // convert to rgb
            $colour = $color;
            if (strlen($colour) == 6) {
                list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
            } elseif (strlen($colour) == 3) {
                list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
            } else {
                return false;
            }
            $r = hexdec($r);
            $g = hexdec($g);
            $b = hexdec($b);
            return 'rgba(' . join(',', array('r' => $r, 'g' => $g, 'b' => $b, 'a' => $alpha ) ) . ')';
        }

        return false;

    }
}
add_action( 'admin_enqueue_scripts', 'novellite_admin_script' );
function novellite_admin_script(){
wp_enqueue_script( 'novellite-admin-settings', get_template_directory_uri()  . '/js/oneclick-demo-import.js', array( 'jquery', 'wp-util', 'updates' ), '');

      $localize = array(
        'ajaxUrl'             => admin_url( 'admin-ajax.php' ),
        'btnActivating'       => __( 'Activating Importer Plugin ', 'novellite' ) . '&hellip;',
        'novelliteSitesLink'      => admin_url( 'themes.php?page=pt-one-click-demo-import' ),
        'novelliteSitesLinkTitle' => __( 'See Library', 'novellite' ),
      );
      wp_localize_script( 'novellite-admin-settings', 'novellite', apply_filters( 'novellite_theme_js_localize', $localize ) );
}

if ( ! function_exists( 'wp_body_open' ) ) {

    /**
     * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}