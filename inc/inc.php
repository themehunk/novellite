<?php
/**
 * all file includeed
 *
 * @param  
 * @return mixed|string
 */ 

	include( trailingslashit( get_template_directory() ) . '/inc/define-template.php' );
	include( trailingslashit( get_template_directory() ) . '/inc/custom-function.php' );
	include( trailingslashit( get_template_directory() ) . '/inc/custom-color.php' );
	// customizer
	include( trailingslashit( get_template_directory() ) . '/inc/custom-customizer.php' );
	include( trailingslashit( get_template_directory() ) . '/inc/customizer.php' );
	include( trailingslashit( get_template_directory() ) . '/inc/pro-button/class-customize.php' );
	include( trailingslashit( get_template_directory() ) . '/inc/th-option/th-option.php' );
	include( trailingslashit( get_template_directory() ) . '/inc/th-option/child-notify.php' );
