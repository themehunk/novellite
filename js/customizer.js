jQuery(document).ready(function() {

// home page settings
    jQuery( '.default-home' ).on('click',function() {
        jQuery('.default-home-wrap .spinner').css('visibility','visible');

        var data = {
            'action': 'novellite_default_home',
            'home': 'saved'
        };
        jQuery.post(ajaxurl, data, function(response) {
            setTimeout(function() {
                jQuery('.default-home-wrap .spinner').css('visibility','hidden');
                            location.reload(true);
            }, 1000);

        });
        }
    ); 
/* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    ); 
// customizer-option-hide-show
// services option
wp.customize('services_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-services_bg_image' ).css('display','none' );
             jQuery( '#customize-control-services_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-services_bg_image' ).css('display','block' );
                jQuery( '#customize-control-services_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery( '#customize-control-services_bg_image' ).css('display','none' );
                jQuery( '#customize-control-services_parallax' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-services_bg_image' ).css('display','block' );
                jQuery( '#customize-control-services_parallax' ).css('display','block' );

            }   

    } );
// Testimonial option
wp.customize('testimonial_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-testimonial_parallax_image' ).css('display','none' );
             jQuery( '#customize-control-testimonial_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-testimonial_parallax_image' ).css('display','block' );
                jQuery( '#customize-control-testimonial_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery( '#customize-control-testimonial_parallax_image' ).css('display','none' );
                jQuery( '#customize-control-testimonial_parallax' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-testimonial_parallax_image' ).css('display','block' );
                jQuery( '#customize-control-testimonial_parallax' ).css('display','block' );

            }   

    } );
// woo option
wp.customize('woo_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-woo_bg_image' ).css('display','none' );
             jQuery( '#customize-control-woo_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-woo_bg_image' ).css('display','block' );
                jQuery( '#customize-control-woo_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery( '#customize-control-woo_bg_image' ).css('display','none' );
                jQuery( '#customize-control-woo_parallax' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-woo_bg_image' ).css('display','block' );
                jQuery( '#customize-control-woo_parallax' ).css('display','block' );

            }   

    } );
// post
wp.customize('post_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-post_bg_image' ).css('display','none' );
             jQuery( '#customize-control-post_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-post_bg_image' ).css('display','block' );
                jQuery( '#customize-control-post_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery( '#customize-control-post_bg_image' ).css('display','none' );
                jQuery( '#customize-control-post_parallax' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-post_bg_image' ).css('display','block' );
                jQuery( '#customize-control-post_parallax' ).css('display','block' );

            }   

    } );
// team
wp.customize('team_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-team_bg_image' ).css('display','none' );
             jQuery( '#customize-control-team_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-team_bg_image' ).css('display','block' );
                jQuery( '#customize-control-team_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery( '#customize-control-team_bg_image' ).css('display','none' );
                jQuery( '#customize-control-team_parallax' ).css('display','none' );
            } else if(filter_type()=='image'){
                jQuery( '#customize-control-team_bg_image' ).css('display','block' );
                jQuery( '#customize-control-team_parallax' ).css('display','block' );

            }   

    } );
// contact 
wp.customize('cf_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-cf_image' ).css('display','none' );
             jQuery( '#customize-control-cf_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-cf_image' ).css('display','block' );
                jQuery( '#customize-control-cf_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery('#customize-control-cf_image').css('display','none' );
                jQuery('#customize-control-cf_parallax').css('display','none' );
            } else if(filter_type()=='image'){
                jQuery('#customize-control-cf_image').css('display','block' );
                jQuery('#customize-control-cf_parallax').css('display','block' );

            }   

    } );
// price
wp.customize('pricing_bg_background', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='color'){
             jQuery( '#customize-control-pricing_img_first' ).css('display','none' );
             jQuery( '#customize-control-pricing_parallax' ).css('display','none' );
            } else if(to=='image'){
                jQuery( '#customize-control-pricing_img_first' ).css('display','block' );
                jQuery( '#customize-control-pricing_parallax' ).css('display','block' );
            }
        } );
        if(filter_type()=='color'){
                jQuery('#customize-control-pricing_img_first').css('display','none' );
                jQuery('#customize-control-pricing_parallax').css('display','none' );
            } else if(filter_type()=='image'){
                jQuery('#customize-control-pricing_img_first').css('display','block' );
                jQuery('#customize-control-pricing_parallax').css('display','block' );

            }   

    } );
});