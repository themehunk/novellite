<?php if(!th_checkbox_filter('woo_commerce','home_on_off')) : ?>    
<?php if ( class_exists( 'WooCommerce' ) ): ?>
<?php
$woobg = get_theme_mod('woo_bg_background','color');
$wooprlx = get_theme_mod('woo_parallax','on');
$wooprlx_class = '';
$wooprlx_data_center = '';
$wooprlx_top_bottom =''; 
if($wooprlx=='on' && $woobg!=='color'){
$wooprlx_class = 'parallax-lite';
$wooprlx_data_center = 'background-position: 50% 0px';
$wooprlx_top_bottom = 'background-position: 50% -100px;';
}else{
$wooprlx_class = ''; 
$wooprlx_data_center = '';
$wooprlx_top_bottom =''; 
}
?>        
<section id="section8" class="woo-wrapper <?php echo $wooprlx_class;?>" data-center="<?php echo $wooprlx_data_center;?>"
  data-top-bottom="<?php echo $wooprlx_top_bottom;?>" >
    <?php $woo_product = get_theme_mod('woo_shortcode','[recent_products]');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php if (get_theme_mod('woo_head_') != '') { ?>
                <h2 class="section-heading"><?php echo esc_html(get_theme_mod('woo_head_','')); ?></h2>
                <?php } else { ?>
                <h2 class="section-heading"><?php _e('Latest Woo Commerce Product','novellite'); ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('woo_desc_') != '') { ?>
                <h3 class="section-subheading text-muted"><?php echo esc_textarea(get_theme_mod('woo_desc_','')); ?></h3>
                <?php } else { ?>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 wow fadeInLeft" data-wow-duration="2s">
                <div class="woo_content">
                    <?php  
                    if ( shortcode_exists( 'recent_products' ) ) {
                     echo do_shortcode($woo_product);
                 }
                      ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
     <?php endif; ?>