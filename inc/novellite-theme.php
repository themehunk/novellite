<?php
function NovelLite_tab_config($theme_data){
        $config = array(
        'theme_brand' => __('ThemeHunk','novellite'),
        'theme_brand_url' => esc_url($theme_data->get( 'AuthorURI' )),
        'welcome'=>sprintf(esc_html__('Welcome to %s - Version %1s', 'novellite'), $theme_data->get( 'Name' ),$theme_data->get( 'Version' ) ),
        'welcome_desc' => sprintf(esc_html__( '%s Theme is a wonderful one page multipurpose theme. This theme comes with powerful features which will help you in designing amazing website for any type of niche (Business, Landing page, E-commerce, Local business, Personal website)
', 'novellite' ), $theme_data->get( 'Name' )),
        'tab_one' =>esc_html__( 'Get Started with NovelLite', 'novellite' ),
        'tab_two' =>esc_html__( 'Recommended Actions', 'novellite' ),
        'tab_three' =>esc_html__( 'Free VS Pro', 'novellite' ),
        'tab_four' =>esc_html__( 'Child Themes', 'novellite' ),
        // first tab one
         'plugin_title' => esc_html__( 'Step 1 - Do Recommended Actions', 'novellite' ),
        'plugin_link' => '?page=th_novellite&tab=actions_required',
        'plugin_text' => sprintf(esc_html__('First you have to install recommended plugin.', 'novellite'), $theme_data->get( 'Name' )),
        'plugin_button' => esc_html__('Go To Recommended Action', 'novellite'),
        // first tab two
        'setup_title' => esc_html__( 'Step 2 - Configure Homepage Layout', 'novellite' ),
        'setup_link' => 'https://www.youtube.com/watch?v=SMx9KHZr6HQ',
        
        'setup_button' => esc_html__('Configuration Instructions (with video)', 'novellite'),
        // first tab three
		'customizer_title' => esc_html__( 'Step 3 - Customize Your Website', 'novellite' ),
        'customizer_text' =>  sprintf(esc_html__('%s Theme support live customizer for home page set up. Everything that visible at home page can be changed through customize panel.', 'novellite'), $theme_data->Name),
        'customizer_button' => sprintf( esc_html__('Start Customize', 'novellite')),
        // first tab four
        'support_title' => esc_html__( 'Step 4 - Theme Support', 'novellite' ),
        'support_link' => esc_url('//www.themehunk.com/support/'),
        'theme_doc_link' => esc_url('//www.themehunk.com/docs/novellite-theme/'),
        'doc_link_text' => sprintf(esc_html__('Theme Documentation', 'novellite'), $theme_data->get( 'Name' )),
        'support_link_text' => sprintf(esc_html__('Support Forum', 'novellite'), $theme_data->get( 'Name' )),
        'support_text' => sprintf(esc_html__('If you need any help you can contact to our support team, our team is always ready to help you.', 'novellite'), $theme_data->get( 'Name' )),
        'support_button' => sprintf( esc_html__('Create a support ticket', 'novellite'), $theme_data->get( 'Name' )),
        );
    return $config;
}


if ( ! function_exists( 'NovelLite_admin_scripts' ) ) :
    /**
     * Enqueue scripts for admin page only: Theme info page
     */
    function NovelLite_admin_scripts( $hook ) {
        if ($hook === 'appearance_page_th_novellite'  ) {
            wp_enqueue_style( 'novellite-admin-css', get_template_directory_uri() . '/css/admin.css' );
            // Add recommend plugin css
            wp_enqueue_style( 'plugin-install' );
            wp_enqueue_script( 'plugin-install' );
            wp_enqueue_script( 'updates' );
            add_thickbox();
        }
    }
endif;
add_action( 'admin_enqueue_scripts', 'NovelLite_admin_scripts' );

function online_lite_count_active_plugins() {
   $i = 2;
        if(class_exists( 'woocommerce' )) :
           $i--;
       endif;
       if ( shortcode_exists( 'lead-form' ) ):
           $i--;
       endif;

       return $i;
}

function NovelLite_tab_count(){
   $count = '';
       $number_count = online_lite_count_active_plugins();
           if( $number_count >0):
           $count = "<span class='update-plugins count-".esc_attr( $number_count )."' title='".esc_attr( $number_count )."'><span class='update-count'>" . number_format_i18n($number_count) . "</span></span>";
           endif;
           return $count;
}

 /**
    * Menu tab
    */
function NovelLite_tab() {
               $number_count = online_lite_count_active_plugins();
               $menu_title = esc_html__('Getting Started with NovelLite', 'novellite');
           if( $number_count >0):
           $count = "<span class='update-plugins count-".esc_attr( $number_count )."' title='".esc_attr( $number_count )."'><span class='update-count'>" . number_format_i18n($number_count) . "</span></span>";
               $menu_title = sprintf( esc_html__('Get Started with NovelLite %s', 'novellite'), $count );
           endif;


   add_theme_page( esc_html__( 'NovelLite', 'novellite' ), $menu_title, 'edit_theme_options', 'th_novellite', 'NovelLite_tab_page');
}
add_action('admin_menu', 'NovelLite_tab');


function NovelLite_pro_theme(){ ?>
<div class="freeevspro-img">
<img src="<?php echo esc_url(get_template_directory_uri().'/images/freevspro.png');?>" alt="free vs pro" />
<p>
 <a href="//themehunk.com/product/novelpro-single-page-theme/" target="_blank" class="button button-primary"><?php _e('Check Pro version for more features','novellite'); ?></a>
                           </p></div>
<?php }
function NovelLite_tab_page() {
    $theme_data = wp_get_theme();
    $theme_config = NovelLite_tab_config($theme_data);


    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    }

    $actions_r = NovelLite_get_actions_required();
    $actions = $actions_r['actions'];

    $current_action_link =  admin_url( 'themes.php?page=th_novellite&tab=actions_required' );

    $recommend_plugins = get_theme_support( 'novellite-recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $recommend_plugins = $recommend_plugins[0];
    } else {
        $recommend_plugins[] = array();
    }
    ?>
    <div class="wrap about-wrap theme_info_wrapper">
        <h1><?php  echo $theme_config['welcome']; ?></h1>
        <div class="about-text"><?php echo $theme_config['welcome_desc']; ?></div>

        <a target="_blank" href="<?php echo $theme_config['theme_brand_url']; ?>/?wp=novellite" class="themehunkhemes-badge wp-badge"><span><?php echo $theme_config['theme_brand']; ?></span></a>
        <h2 class="nav-tab-wrapper">
            <a href="?page=th_novellite" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php  echo $theme_config['tab_one']; ?></a>
            <a href="?page=th_novellite&tab=actions_required" class="nav-tab<?php echo $tab == 'actions_required' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_two'];  echo NovelLite_tab_count();?></a>

            <a href="?page=th_novellite&tab=actions_childtheme" class="nav-tab<?php echo $tab == 'actions_childtheme' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_four']; ?></a>

            <a href="?page=th_novellite&tab=theme-pro" class="nav-tab<?php echo $tab == 'theme-pro' ? ' nav-tab-active' : null; ?>"><?php echo $theme_config['tab_three']; ?></span></a>
        </h2>

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                    <!--- Check theme documentation -->
                    <div class="theme_link">
                            <h3><?php echo $theme_config['plugin_title']; ?></h3>
                            <p class="about"><?php echo $theme_config['plugin_text']; ?></p>
                            <p>
                                <a href="<?php echo esc_url($theme_config['plugin_link'] ); ?>" class="button button-secondary"><?php echo $theme_config['plugin_button']; ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php echo $theme_config['setup_title']; ?></h3>
                            <p class="about">
                                <ol>
                                <li><p><?php esc_html_e('Setup Home page -
For setting the home page, do follow the below steps. 
Go to your dashboard. Create a new page and select "Front Page Template" from page attribute.','novellite')?> </p></li>
                                <li><p><?php esc_html_e('After this go to Reading setting and check the radio button of static page. Then select your newly created page as the front page and save your changes.','novellite')?></p></li>
                                </ol>
                            </p>
                            <p>
                                <a target="_blank" href="<?php echo esc_url($theme_config['setup_link'] ); ?>" target="_blank" class="button button-secondary"><?php echo $theme_config['setup_button']; ?></a>
                            </p>
                        </div>
                        
                        <!--Theme Customizer -->
                        <div class="theme_link">
                            <h3><?php echo $theme_config['customizer_title']; ?></h3>
                            <p class="about"><?php  echo $theme_config['customizer_text']; ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php echo $theme_config['customizer_button']; ?></a>
                            </p>
                        </div>
                <div class="theme_link">
            <h3><?php echo $theme_config['support_title']; ?></h3>
            <p class="about"><?php  echo $theme_config['support_text']; ?></p>
            <p>
            <p><a target="_blank" href="<?php echo $theme_config['support_link']; ?>"><?php  echo $theme_config['support_link_text']; ?></a></p>
            <p><a target="_blank" href="<?php echo $theme_config['theme_doc_link']; ?>"><?php  echo $theme_config['doc_link_text']; ?></a></p>
             <a target="_blank" href="<?php echo $theme_config['support_link']; ?>" target="_blank" class="button button-secondary"><?php echo $theme_config['support_button']; ?></a>
                            </p>
                        </div>

              <!-- 5 step -->
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ( $tab == 'actions_required' ) { ?>
            <div class="action-required-tab info-tab-content">

                <?php if ( is_child_theme() ){
                    $child_theme = wp_get_theme();
                    ?>
                    <form method="post" action="<?php echo esc_attr( $current_action_link ); ?>" class="demo-import-boxed copy-settings-form">
                        <p>
                           <strong> <?php printf( esc_html__(  'You\'re using %1$s theme, It\'s a child theme', 'novellite' ) ,  $child_theme->Name ); ?></strong>
                        </p>
                        <p><?php printf( esc_html__(  'Child theme uses it\'s own theme setting name, would you like to copy setting data from parent theme to this child theme?', 'novellite' ) ); ?></p>
                        <p>

                        <?php

                        $select = '<select name="copy_from">';
                        $select .= '<option value="">'.esc_html__( 'From Theme', 'novellite' ).'</option>';
                        $select .= '<option value="novelite">novelite</option>';
                        $select .= '<option value="'.esc_attr( $child_theme->get_stylesheet() ).'">'.( $child_theme->Name ).'</option>';
                        $select .='</select>';

                        $select_2 = '<select name="copy_to">';
                        $select_2 .= '<option value="">'.esc_html__( 'To Theme', 'novellite' ).'</option>';
                        $select_2 .= '<option value="novelite">novelite</option>';
                        $select_2 .= '<option value="'.esc_attr( $child_theme->get_stylesheet() ).'">'.( $child_theme->Name ).'</option>';
                        $select_2 .='</select>';

                        echo $select . ' to '. $select_2;

                        ?>
                        <input type="submit" class="button button-secondary" value="<?php esc_attr_e( 'Copy now', 'novellite' ); ?>">
                        </p>
                        <?php if ( isset( $_GET['copied'] ) && $_GET['copied'] == 1 ) { ?>
                            <p><?php esc_html_e( 'Your settings copied.', 'novellite' ); ?></p>
                        <?php } ?>
                    </form>

                <?php } ?>
      
                    <?php if ( $actions['novelite_recommend_plugins'] == 'active' ) {  ?>
                        <div id="plugin-filter" class="novellite-recommend-plugins action-required">
                        <h3><?php esc_html_e( 'Recommend Plugins', 'novellite' ); ?></h3>
                            <?php 
                            NovelLite_plugin_api(); ?>
                        </div>
                    <?php } ?>                            
            </div>
        <?php
 } ?>

        <?php if ( $tab == 'actions_childtheme' ) { ?>

            <?php NovelLite_child_themes(); ?>

        <?php } ?>

        <?php if ( $tab == 'theme-pro' ) { ?>

            <?php NovelLite_pro_theme(); ?>

        <?php } ?>

    </div> <!-- END .theme_info -->
    <?php

}


function NovelLite_child_themes() {
$child_slugs = array('novelgreen','onedew','novelpink','novelblue','blacky','coffeecafe','novellaw','doctorsline');
$child = '';
foreach($child_slugs as $theme_slug){
$child_theme = themes_api( 'theme_information', array('slug'=>$theme_slug));
$theme_name =  $child_theme->name;
$preview_url =  $child_theme->preview_url;
$author =  $child_theme->author;
$screenshot_url =  $child_theme->screenshot_url;
$homepage =  $child_theme->homepage;

$child .=  '<div class="child-theme">
        <div class="theme-screenshot">
            <img src="'.$screenshot_url.'" alt="'.$theme_name.'">
        </div>
    <div class="child-theme-author">'.$author.'    </div>
    <h3 class="child-theme-name">'.$theme_name.'</h3>
    <div class="child-theme-actions">
    <a class="button button-primary child-theme-install" target="_blank" href="'.$homepage.'">Download</a>
    <a class= "button button-secondary preview right" target="_blank" href="'.$preview_url.'">Live Preview</a>
    </div>
</div>';
}
               echo '<div id="child-themes" class="ti-about-page-tab-pane">
                    '.$child.'
                    </div>';
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


function NovelLite_get_actions_required( ) {

    $actions = array('novelite_recommend_plugins'=>'');

    $recommend_plugins = get_theme_support( 'novellite-recommend-plugins' );
    if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        $recommend_plugins = $recommend_plugins[0];
    } else {
        $recommend_plugins[] = array();
    }


    if ( ! empty( $recommend_plugins ) ) {

        foreach ( $recommend_plugins as $plugin_slug => $plugin_info ) {
            $plugin_info = wp_parse_args( $plugin_info, array(
                'name' => '',
                'active_filename' => '',
            ) );
            if ( $plugin_info['active_filename'] ) {
                  $active_file_name = $plugin_info['active_filename'] ;
            } else {
                 $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
            }
            if ( ! is_plugin_active( $active_file_name ) ) {
                $actions['novelite_recommend_plugins'] = 'active';
            }
        }

    }

    $actions = apply_filters( 'NovelLite_get_actions_required', $actions );

    $return = array(
        'actions' => $actions,
        'number_actions' => count( $actions ),
    );

    return $return;
}

// AJAX.
add_action( 'wp_ajax_novellite-sites-plugin-activate','required_plugin_activate' );
function required_plugin_activate() {

      if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] ) {
        wp_send_json_error(
          array(
            'success' => false,
            'message' => __( 'No plugin specified', 'novellite' ),
          )
        );
      }

      $plugin_init = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';

      $activate = activate_plugin( $plugin_init, '', false, true );

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