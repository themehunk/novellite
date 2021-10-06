<?php
class novellite_theme_option{
function __construct(){
add_action( 'admin_enqueue_scripts', array($this,'admin_scripts'));
add_action('admin_menu', array($this,'menu_tab'));

    // AJAX.
    add_action( 'wp_ajax_th_activeplugin',array($this,'th_activeplugin') );
    add_action( 'wp_ajax_default_home',array($this, 'default_home') );
}
function menu_tab() {
    $menu_title = esc_html__('Novellite Options', 'novellite');
    add_theme_page( esc_html__( 'Novellite', 'novellite' ), $menu_title, 'edit_theme_options', 'thunk_started',array($this,'tab_page'));

}


/**
* Enqueue scripts for admin page only: Theme info page
*/
function admin_scripts( $hook ) {
if ($hook === 'appearance_page_thunk_started'  ) {
wp_enqueue_style( 'thunk-started-css', get_template_directory_uri() . '/inc/th-option/assets/css/started.css' );wp_enqueue_script('NovelLite-admin-load', get_template_directory_uri() . '/inc/th-option/assets/js/th-options.js',array( 'jquery', 'updates' ),'1', true);
}
}
function tab_constant(){
    $theme_data = wp_get_theme();
    $tab_array = array();
    $tab_array['header'] = array('theme_brand' => __('ThemeHunk','novellite'),
    'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
    'welcome'=>sprintf(esc_html__('Welcome to %1s - Version %2s', 'novellite'), esc_html__($theme_data->get( 'Name' )), $theme_data->get( 'Version' ) ),
    'welcome_desc' => esc_html__($theme_data->get( 'Name' ).' is beautiful one page shopping Woocommerce theme. This theme carries multiple powerful features which will help you in creating an amazing shopping site.You can design any type of shopping site and generate more profit.', 'novellite' )
    );
    return $tab_array;
}


function tab_page() {
    $text_array = $this->tab_constant();
    $theme_header =$text_array['header'];
    include('tab-html.php' ); 
}


// Home Page Setup

function default_home() {
$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-frontpage.php'
));
  $post_id = isset($pages[0]->ID)?$pages[0]->ID:false;
if(empty($pages)){
      $post_id = wp_insert_post(array (
       'post_type' => 'page',
       'post_title' => __('Home Page','novellite'),
       'post_content' => '',
       'post_status' => 'publish',
       'comment_status' => 'closed',   // if you prefer
       'ping_status' => 'closed',      // if you prefer
       'page_template' =>'template-frontpage.php', //Sets the template for the page.
    ));
  }
      if($post_id){
        update_option( 'page_on_front', $post_id );
        update_option( 'show_on_front', 'page' );
    }
    wp_die(); // this is required to terminate immediately and return a proper response
}


function _check_homepage_setup(){

    $fid =  get_option( 'page_on_front');

    $pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-frontpage.php'
));
   $post_id = isset($pages[0]->ID)?$pages[0]->ID:false;


  return ($fid == $post_id)?true:false;
}
     /*
          * Plugin install
          * Active plugin
          * Setup Homepage
          */
        public function th_activeplugin(){
      if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => __( 'No plugin specified', 'novellite' ),
          )
        );
      }

      $plugin_init = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';

      $activate = activate_plugin( $plugin_init);

      if ( is_wp_error( $activate ) ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => $activate->get_error_message(),
          )
        );
      }

      wp_send_json_success(
        array(
          'success' => true,
          'message' => __( 'Plugin Successfully Activated', 'novellite' ),
        )
      );

        }
        


/**
 * Include Welcome page content
 */
       static public  function plugin_setup_api(){
       include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
       network_admin_url( 'plugin-install.php' );



       $recommend_plugins = get_theme_support( 'recommend-plugins' );


       if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $plugin_add ="";
        foreach($recommend_plugins[0] as $slug=>$plugin){
                   
                       $thumb = "https://ps.w.org/". $slug."/assets/".$plugin['img'];
                       $plugin_init = $plugin['active_filename'];
                       $plugin_name = $plugin['name'];


            $status = is_dir( WP_PLUGIN_DIR . '/' . $slug );

            
            $button_class = 'install-now button '.$slug;

             if ( is_plugin_active( $plugin_init ) ) {
                   $button_class = 'button disabled '.$slug;
                   $button_txt = esc_html__( 'Plugin Activated', 'novellite' );
                   $detail_link = $install_url = '';

        }

            if ( ! is_plugin_active( $plugin_init ) ){
                    $button_txt = esc_html__( 'Install Now', 'novellite' );
                    if ( ! $status ) {
                        $install_url = wp_nonce_url(
                            add_query_arg(
                                array(
                                    'action' => 'install-plugin',
                                    'plugin' => $slug
                                ),
                                network_admin_url( 'update.php' )
                            ),
                            'install-plugin_'.$slug
                        );

                    } else {
                        $install_url = add_query_arg(array(
                            'action' => 'activate',
                            'plugin' => rawurlencode( $plugin_init ),
                            'plugin_status' => 'all',
                            'paged' => '1',
                            '_wpnonce' => wp_create_nonce('activate-plugin_' . $plugin_init ),
                        ), network_admin_url('plugins.php'));
                        $button_class = 'activate-now button-primary '.$slug;
                        $button_txt = esc_html__( 'Activate Now', 'novellite' );
                    }
                        

                }

                $detail_link = add_query_arg(
                        array(
                            'tab' => 'plugin-information',
                            'plugin' => $slug,
                            'TB_iframe' => 'true',
                            'width' => '772',
                            'height' => '500',

                        ),
                        network_admin_url( 'plugin-install.php' )
                    );


                $plugin_add .= '<div class="rcp theme_link th-row">';
                $plugin_add .= ' <div class="th-column"><img src="'.esc_url( $thumb ).'" /> </div>';
                 $plugin_add .= '<div class="th-column">';

                $plugin_add .= '<div class="title-plugin">
                <h4>'.esc_html( $plugin_name ). ' </h4><a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details & Version', 'novellite' ).'</a>
                </div>';
                 $plugin_add .='<button data-activated="Plugin Activated" data-msg="Activating Plugin" data-init="'.esc_attr($plugin_init).'" data-slug="'.esc_attr( $slug ).'" class="button '.esc_attr( $button_class ).'">'.esc_html($button_txt).'</button>';

                $plugin_add .= '</div></div>';
        }
    echo  $plugin_add;

    }
}

 
} // class end
$boj = new novellite_theme_option(); ?>