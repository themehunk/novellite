<?php

/**
 * tgm plugin installation and activation
 *
 * @param  
 * @return mixed|string
 */
require_once( get_template_directory() . '/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'novellite_register_required_plugins' );
function novellite_register_required_plugins()
{
	$wp_version_nr = get_bloginfo('version');
	if( $wp_version_nr < 3.9 ):
		$plugins = array(
            array(
                'name' => 'Lead Form Builder',
                'slug' => 'lead-form-builder', 
                'required' => false 
            ),
             array(
                'name' => 'Recent Tweets Widget',
                'slug' => 'recent-tweets-widget', 
                'required' => false 
            ),
            array(
                'name' => 'MailChimp For WordPress',
                'slug' => 'mailchimp-for-wp', 
                'required' => false 
            ),
            array(
                'name' => 'Pricing Table',
                'slug' => 'Pricing Table', 
                'required' => false 
            )
		);
	else:
		$plugins = array(
            array(
                'name' => 'Lead Form Builder',
                'slug' => 'lead-form-builder', 
                'required' => false 
            ),
            array(
                'name' => 'Recent Tweets Widget',
                'slug' => 'recent-tweets-widget', 
                'required' => false 
            ),
            array(
                'name' => 'Pricing Table',
                'slug' => 'Pricing Table', 
                'required' => false 
            )
	);
	endif;

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'novellite'),
            'menu_title' => __('Install Plugins', 'novellite'),
            'installing' => __('Installing Plugin: %s', 'novellite'),
            'oops' => __('Something went wrong with the plugin API.', 'novellite'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','novellite'),
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','novellite'),
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','novellite'),
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','novellite'),
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','novellite'),
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','novellite'),
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','novellite'),
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','novellite'),
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','novellite'),
            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','novellite'),
            'return' => __('Return to Required Plugins Installer', 'novellite'),
            'plugin_activated' => __('Plugin activated successfully.', 'novellite'),
            'complete' => __('All plugins installed and activated successfully. %s', 'novellite'),
            'nag_type' => 'updated'
        )
    );
    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'novellite_register_required_plugins');

?>