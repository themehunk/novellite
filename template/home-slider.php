<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('NovelLite_slider_speed','') != '') { echo esc_html((get_theme_mod('NovelLite_slider_speed'))); } else { ?>3000<?php } ?>"/>
<?php $i=0; 
$bnt_style = get_theme_mod('slidr_button','default');
$prlx = get_theme_mod('slider_parallax_option','on');
$prlx_class = '';
$prlx_data_center = '';
$prlx_top_bottom =''; 
if($prlx=='on'){
$prlx_class = 'parallax-lite';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = ''; 
$prlx_data_center = '';
$prlx_top_bottom =''; 
}
?>
<div id="slides_full" class="NovelLite_slider">
<div class="flexslider novelpro_slider <?php echo $prlx_class;?> <?php echo $bnt_style;?>">
<ul class="slides slides-container">
<!-- first-slide -->
<?php if (get_theme_mod('first_slider_image','') != '') { $i++; ?>     
<li data-center="<?php echo esc_attr($prlx_data_center);?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background:url('<?php echo esc_url(get_theme_mod('first_slider_image')); ?>')">
<?php } else { ?>
<li data-center="<?php echo esc_attr($prlx_data_center);?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background:url('<?php echo esc_url(get_template_directory_uri().'/images/slider1.jpg');?>">
    <?php } ?>     
    <div class="slider_overlay"></div>
            <div class="container slider1 container_caption wow fadeInDown" data-wow-duration="2s">
                <?php if (get_theme_mod('first_slider_heading','') != '') { ?>
                    <h1><a href="<?php
                        if (get_theme_mod('first_slider_link','') != '') {
                            echo esc_html(get_theme_mod('first_slider_link'));
                        }
                        ?>"><?php echo esc_html(get_theme_mod('first_slider_heading')); ?></a></h1>
                    <?php } else { ?>
                    <h1><?php _e('Business Theme','novellite');?></h1>
                <?php } ?> 
                <div class="clearfix"></div>
                <?php if (get_theme_mod('first_slider_desc') != '') { ?>
                    <p>                    
                        <?php echo esc_html(get_theme_mod('first_slider_desc')); ?>
                    </p>
                <?php } else { ?>
                    <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipisicing elit.','novellite');?></p>
                <?php } ?>
                
                
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('first_button_text','') != '') { ?>
                <a href="<?php
                                if (get_theme_mod('first_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('first_button_link'));
                                } else {
                                    echo "#";
                                }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('first_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>  
            </div>
        </li> 
 <!-- second-slide-->
 <?php if (get_theme_mod('second_slider_image','')) { $i++; ?>
              <li data-center="<?php echo $prlx_data_center;?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background:url('<?php echo esc_url(get_theme_mod('second_slider_image')); ?>')">
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                    <div class="container slider2 container_caption">
                        <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('second_slider_link','') != '') {
                                    echo esc_html(get_theme_mod('second_slider_link'));
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('second_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php } ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('second_slider_desc')); ?>
                            </p>
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('second_button_text','') != '') { ?>
                <a href="<?php  if (get_theme_mod('second_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('second_button_link'));
                                } else { echo "#"; }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('second_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
                </div>
                <?php } ?>
            </li>
        <?php } ?>
<!-- Third Slider -->
<?php if (get_theme_mod('third_slider_image','') != '') { $i++; ?>
<li data-center="<?php echo esc_attr($prlx_data_center);?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background:url('<?php echo esc_url(get_theme_mod('third_slider_image')); ?>')"> 
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('third_slider_heading','') != '') { ?>
                    <div class="container slider3 container_caption" >
                        <?php if (get_theme_mod('third_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('third_slider_link','') != '') {
                                    echo esc_attr(get_theme_mod('third_slider_link'));
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('third_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php } ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('third_slider_desc')); ?>
                            </p>
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('third_button_text','') != '') { ?>
                <a href="<?php  if (get_theme_mod('third_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('third_button_link'));
                                } else { echo "#"; }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('third_button_text')); ?>
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
                </div>
                <?php } ?>
            </li>
        <?php } ?>
</ul> 
</div>
</div>