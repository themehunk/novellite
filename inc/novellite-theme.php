<?php
class novellite_theme_option{
function __construct(){
add_action( 'admin_enqueue_scripts', array($this,'admin_scripts'));
add_action('admin_menu', array($this,'menu_tab'));
}
function menu_tab() {
$menu_title = esc_html__('Novellite Option', 'novellite');
//add_theme_page( esc_html__( 'NovelLite', 'novellite' ), $menu_title, 'edit_theme_options', 'th_novellite', 'NovelLite_tab_page');
add_theme_page( esc_html__( 'Novellite', 'novellite' ), $menu_title, 'edit_theme_options', 'thunk_started',array($this,'tab_page'));
}


/**
* Enqueue scripts for admin page only: Theme info page
*/
function admin_scripts( $hook ) {
if ($hook === 'appearance_page_thunk_started'  ) {
wp_enqueue_style( 'thunk-started-css', get_template_directory_uri() . '/inc/assets/css/started.css' );
wp_enqueue_script('NovelLite-tab', get_template_directory_uri() . '/inc/assets/js/tab.js', array('jquery'),'4345', true);
}
}
function tab_constant(){
$theme_data = wp_get_theme();
$tab_array = array();
$tab_array['header'] = array('theme_brand' => __('ThemeHunk','novellite'),
'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
'welcome'=>sprintf(esc_html__('Welcome to novellite - Version %1s', 'novellite'), $theme_data->get( 'Version' ) ),
'welcome_desc' => esc_html__($theme_data->get( 'Name' ).' is beautiful one page shopping Woocommerce theme. This theme carries multiple powerful features which will help you in creating an amazing shopping site.You can design any type of shopping site and generate more profit.', 'novellite' )
);
$tab_array['tab'] = array(
'plugin_title' => esc_html__( 'Setup Home Page', 'novellite' ),
'plugin_link' => '?page=thunk_started&tab=actions_required',
'plugin_text' => sprintf(esc_html__('First Add your Homepage, Pages > Add Page and from Page Attributes > Select Homepage Template. Go to the Customize > Homepage Settings and under "Your homepage display" select "A Static page > Your Homepage" . Publish it.', 'novellite'), $theme_data->get( 'Name' )),
'plugin_button' => esc_html__('Go To Recommended Action', 'novellite'),
'docs_title' => esc_html__( 'Import Demo Content', 'novellite' ),
'customizer_title' => esc_html__( 'Customize Your Website', 'novellite' ),
'customizer_text' =>  sprintf(esc_html__('%s theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel', 'novellite'), $theme_data->Name),
'customizer_button' => sprintf( esc_html__('Start Customize', 'novellite')),
'support_title' => esc_html__( 'Theme Support', 'novellite' ),
'support_link' => esc_url('//www.themehunk.com/support/'),
'support_forum' => sprintf(esc_html__('Support Forum', 'novellite'), $theme_data->get( 'Name' )),
'doc_link' => esc_url('//www.themehunk.com/docs/novelpro-theme/'),
'doc_link_text' => sprintf(esc_html__('Theme Documentation', 'novellite'), $theme_data->get( 'Name' )),
'support_text' => sprintf(esc_html__('If you need any help you can contact to our support team, our team is always ready to help you.', 'novellite'), $theme_data->get( 'Name' )),
);
return $tab_array;
}




function NovelLite_plugin_api() {
        include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
                        network_admin_url( 'plugin-install.php' );


        $recommend_plugins = get_theme_support( 'novellite-recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){

        foreach($recommend_plugins[0] as $slug=>$plugin){
            
            $plugin_info = plugins_api( 'plugin_information', array(
                    'slug' => $slug,
                    'fields' => array(
                        'downloaded'        => false,
                        'rating'            => false,
                        'description'       => true,
                        'short_description' => false,
                        'donate_link'       => false,
                        'tags'              => false,
                        'sections'          => true,
                        'homepage'          => true,
                        'added'             => false,
                        'last_updated'      => false,
                        'compatibility'     => false,
                        'tested'            => false,
                        'requires'          => false,
                        'downloadlink'      => false,
                        'icons'             => true,
                    )
                ) );
                //foreach($plugin_info as $plugin_info){
                    $plugin_name = $plugin_info->name;
                    $plugin_slug = $plugin_info->slug;
                    $version = $plugin_info->version;
                    $author = $plugin_info->author;
                    $download_link = $plugin_info->download_link;
                    $icons = (isset($plugin_info->icons['1x']))?$plugin_info->icons['1x']:$plugin_info->icons['default'];
            

            $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_slug );
            $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
            $button_class = 'install-now button';

            if ( ! is_plugin_active( $active_file_name ) ) {
                $button_txt = esc_html__( 'Install Now', 'novellite' );
                if ( ! $status ) {
                    $install_url = wp_nonce_url(
                        add_query_arg(
                            array(
                                'action' => 'install-plugin',
                                'plugin' => $plugin_slug
                            ),
                            network_admin_url( 'update.php' )
                        ),
                        'install-plugin_'.$plugin_slug
                    );

                } else {
                    $install_url = add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode( $active_file_name ),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
                    ), network_admin_url('plugins.php'));
                    $button_class = 'activate-now button-primary';
                    $button_txt = esc_html__( 'Active Now', 'novellite' );
                }


                    $detail_link = add_query_arg(
                    array(
                        'tab' => 'plugin-information',
                        'plugin' => $plugin_slug,
                        'TB_iframe' => 'true',
                        'width' => '772',
                        'height' => '349',

                    ),
                    network_admin_url( 'plugin-install.php' )
                );
                $detail = '';
                echo '<div class="rcp">';
                echo '<h4 class="rcp-name">';
                echo esc_html( $plugin_name );
                echo '</h4>';
                echo '<img src="'.$icons.'" />';
                if($plugin_slug=='lead-form-builder'){
        $detail='Lead form builder is a contact form as well as lead generator plugin. This plugin will allow you create
unlimited contact forms and to generate unlimited leads on your site.';
} elseif($plugin_slug=='themehunk-customizer'){
        $detail= 'ThemeHunk customizer -
ThemeHunk customizer plugin will allow you to add  unlimited number of columns for services, Testimonial, and Team with widget support. It will add slider section, Ribbon section, latest post, Contact us and Woocommerce section. These will be visible on front page of your site.';

} elseif($plugin_slug=='woocommerce'){
$detail='WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully. Built to integrate seamlessly with WordPress, WooCommerce is the eCommerce solution that gives both store owners and developers complete control.';
}
            echo '<p class="rcp-detail">'.$detail.' </p>';

                echo '<p class="action-btn plugin-card-'.esc_attr( $plugin_slug ).'">
                        <span>Version:'.$version.'</span>
                        '.$author.'
                <a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_slug ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a>
                </p>';
                echo '<a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details', 'novellite' ).'</a>';
                echo '</div>';


            }

        }
    }
}

function tab_page() {
$text_array = $this->tab_constant();
$theme_header =$text_array['header'];
$theme_config =$text_array['tab'];

    include( trailingslashit( get_template_directory() ) . '/inc/tab-html.php' );

}
}
$boj = new novellite_theme_option(); ?>