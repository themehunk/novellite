<?php if(!th_checkbox_filter('testimonial','home_on_off')) : ?>
 <input type="hidden" id="testimonial_slidespeed" value="<?php if (get_theme_mod('testimonial_slider_speed','') != '') { echo stripslashes(get_theme_mod('testimonial_slider_speed')); } else { ?>3000<?php } ?>"/>   
<?php
$i=0; 
$testimonialbg = get_theme_mod('testimonial_bg_background','image');
$testimonialprlx = get_theme_mod('testimonial_parallax','on');
$testimonialprlx_class = '';
$testimonialprlx_data_center = '';
$testimonialprlx_top_bottom =''; 
if($testimonialprlx =='on' && $testimonialbg!=='color'){
$testimonialprlx_class = 'parallax-lite';
$testimonialprlx_data_center = 'background-position: 50% 0px';
$testimonialprlx_top_bottom = 'background-position: 50% -100px;';
}else{
$testimonialprlx_class = ''; 
$testimonialprlx_data_center = '';
$testimonialprlx_top_bottom =''; 
}
?>        
<!-- *** Testimonial Slider Starts *** -->
 <section id="section2" class="testimonial-wrapper 
 <?php echo $testimonialprlx_class;?>" data-center="<?php echo $testimonialprlx_data_center;?>"
  data-top-bottom="<?php echo $testimonialprlx_top_bottom;?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-inner animated bottom-to-top">
                        <?php if (get_theme_mod('testimonial_heading','') != '') { ?>
                        <h1 class="testimonial-header wow fadeInUp" data-wow-duration="2s"><?php echo esc_html(get_theme_mod('testimonial_heading','')); ?></h1>
                        <?php } else { ?>
                        <h1 class="testimonial-header wow fadeInUp" data-wow-duration="2s"><?php _e('Show Multiple Testimonials.', 'novellite'); ?></h1>
                        <?php } ?>
                        <ul class="bxslider">
                            <!-- *Testimonial 1 Starts* -->
                            <?php if (get_theme_mod('first_author_desc','') != '') { $i++;?>
                            <li>
                                <img src="<?php if (get_theme_mod('first_author_image','') != '') { ?><?php echo esc_url(get_theme_mod('first_author_image','')); } else { echo esc_url(get_template_directory_uri().'/images/testimonial-image.png');} ?>" onMouseOver="javascript: this.title='';" title="<a class='arrow'></a>
                                <?php echo esc_textarea(get_theme_mod('first_author_desc','')); ?>
                                <p><a class='testimonial'><?php echo esc_html(get_theme_mod('first_author_name','')) ; ?></a></p>">
                            </li>
                            <?php } ?>
                            <!-- *Testimonial 2 Starts* -->
                            <?php if (get_theme_mod('second_author_desc','') != '') { $i++;?>
                            <li>
                                <img src="<?php if (get_theme_mod('second_author_image','') != '') { ?><?php echo esc_url(get_theme_mod('second_author_image','')); } else { echo esc_url(get_template_directory_uri().'/images/testimonial-image.png');} ?>" onMouseOver="javascript: this.title='';" title="<a class='arrow'></a>
                                <?php echo esc_html(get_theme_mod('second_author_desc','')); ?>
                                <p><a class='testimonial'><?php echo esc_html(get_theme_mod('second_author_name','')); ?></a></p>">
                            </li>
                            <?php } ?>
                            <!-- *Testimonial 3 Starts* -->
                            <?php if (get_theme_mod('third_author_desc','') != '') { $i++;?>
                            <li>
                                <img src="<?php if (get_theme_mod('third_author_image','') != '') { ?><?php echo esc_url(get_theme_mod('third_author_image','')); } else { echo esc_url(get_template_directory_uri().'/images/testimonial-image.png'); } ?>" onMouseOver="javascript: this.title='';" title="<a class='arrow'></a>
                                <?php echo esc_html(get_theme_mod('third_author_desc','')); ?>
                                <p><a class='testimonial'><?php echo esc_html(get_theme_mod('third_author_name','')); ?></a></p>">
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>