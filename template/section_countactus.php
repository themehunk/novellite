<?php if(!th_checkbox_filter('countactus','home_on_off')) : ?>
<?php
$contactus_shortcode = get_theme_mod('cf_shtcd_','[lead-form form-id=1 title=Contact Us]');
$cfbg = get_theme_mod('cf_bg_background','image');
$cfprlx = get_theme_mod('cf_parallax','on');
$cfprlx_class = '';
$cfprlx_data_center = '';
$cfprlx_top_bottom =''; 
if($cfprlx=='on' && $cfbg!=='color'){
$cfprlx_class = 'parallax-lite';
$cfprlx_data_center = 'background-position: 50% 0px';
$cfprlx_top_bottom = 'background-position: 50% -100px;';
}else{
$cfprlx_class = ''; 
$cfprlx_data_center = '';
$cfprlx_top_bottom =''; 
}
?>    
<section id="section5" class="contact_section <?php echo $cfprlx_class;?>" id="section2" data-center="<?php echo $cfprlx_data_center;?>"
  data-top-bottom="<?php echo $cfprlx_top_bottom;?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php if (get_theme_mod('cf_head_','') != '') { ?>
                    <h2 class="section-heading"><?php echo esc_html(get_theme_mod('cf_head_','')); ?></h2>
                    <?php } else { ?>
                    <h2 class="section-heading"><?php _e('Contact Us','novellite'); ?></h2>
                    <?php } ?>
                    <?php if (get_theme_mod('cf_desc_','') != '') { ?>
                    <h3 class="section-subheading text-muted contact"><?php echo esc_textarea(get_theme_mod('cf_desc_','')); ?></h3>
                    <?php } else { ?>
                <h3 class="section-subheading text-muted contact">Lorem ipsum dolor sit amet consectetur.</h3>
                <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="cnt-div  wow fadeInRight" data-wow-delay="0s">
                    <?php 
                    if ($contactus_shortcode !='') {
                    echo do_shortcode($contactus_shortcode);

                    }
                     ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>