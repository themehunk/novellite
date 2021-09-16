<?php if(!th_checkbox_filter('team','home_on_off')) : ?>
<?php
$teambg = get_theme_mod('team_bg_background','color');
$teamprlx = get_theme_mod('team_parallax','on');
$teamprlx_class = '';
$teamprlx_data_center = '';
$teamprlx_top_bottom =''; 
if($teamprlx=='on' && $teambg!=='color'){
$teamprlx_class = 'parallax-lite';
$teamprlx_data_center = 'background-position: 50% 0px';
$teamprlx_top_bottom = 'background-position: 50% -100px;';
}else{
$teamprlx_class = ''; 
$teamprlx_data_center = '';
$teamprlx_top_bottom =''; 
}
?>    
<!-- Team Section -->
<section id="section4" class="bg-light-gray <?php echo $teamprlx_class;?>" data-center="<?php echo $teamprlx_data_center;?>"
  data-top-bottom="<?php echo $teamprlx_top_bottom;?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php if (get_theme_mod('team_head_','') != '') { ?>
                <h2 class="section-heading"><?php echo esc_html(get_theme_mod('team_head_','')); ?></h2>
                <?php } else { ?>
                <h2 class="section-heading"><?php esc_html__('Our Amazing Team','novellite'); ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('team_desc_','') != '') { ?>
                <h3 class="section-subheading text-muted" ><?php echo esc_textarea(get_theme_mod('team_desc_','')); ?></h3>
                <?php } else { ?>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                <?php } ?>
                
            </div>
        </div>
        <div class="row wow fadeInRight" data-wow-duration="2s">
            <div class="col-sm-4 th-1">
                <div class="team-member">
                    <?php if (get_theme_mod('our_team_img_first','') != '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod('our_team_link_first','')); ?>"><img src="<?php echo esc_url(get_theme_mod('our_team_img_first','')); ?>" class="img-responsive img-circle" alt="Feature Image 1"/></a>
                    <?php } else { ?>
                    <a href="#"><img src="<?php echo esc_url(get_template_directory_uri().'/images/team/Team-Placeholder.jpg');?>" class="img-responsive img-circle" alt=""></a>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_heading_first','') != '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod('our_team_link_first','')); ?>"><h4><?php echo esc_html(get_theme_mod('our_team_heading_first','')); ?></h4></a>
                    <?php } else { ?>
                    <a href="#"><h4><?php echo esc_html__('Kay Garland','novellite');?></h4></a>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_subhead_first','') != '') { ?>
                    <p class="text-muted"><?php echo esc_html(get_theme_mod('our_team_subhead_first','')); ?></p>
                    <?php } else { ?>
                    <p class="text-muted"><?php echo esc_html__('Lead Designer','novellite'); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_desc_first','') != '') { ?>
                    <p><?php echo esc_textarea(get_theme_mod('our_team_desc_first','')); ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 th-2">
                <div class="team-member">
                    <?php if (get_theme_mod('our_team_img_second','') != '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod('our_team_link_second','')); ?>"><img src="<?php echo esc_url(get_theme_mod('our_team_img_second','')); ?>" class="img-responsive img-circle" alt="Feature Image 1"/></a>
                    <?php } else { ?>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/team/Team-Placeholder.jpg');?>" class="img-responsive img-circle" alt="">
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_heading_second','') != '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod('our_team_link_second','')); ?>"><h4><?php echo esc_html(get_theme_mod('our_team_heading_second','')); ?></h4></a>
                    <?php } else { ?>
                    <a href="#"><h4><?php echo esc_html__('Larry Parker','novellite'); ?></h4></a>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_subhead_second','') != '') { ?>
                    <p class="text-muted"><?php echo esc_html(get_theme_mod('our_team_subhead_second','')); ?></p>
                    <?php } else { ?>
                    <p class="text-muted"><?php echo esc_html__('Lead Marketer','novellite');  ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_desc_second','') != '') { ?>
                    <p><?php echo esc_html(get_theme_mod('our_team_desc_second','')); ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 th-3">
                <div class="team-member">
                    <?php if (get_theme_mod('our_team_img_third','') != '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod('our_team_link_third','')); ?>"><img src="<?php echo esc_url(get_theme_mod('our_team_img_third','')); ?>" class="img-responsive img-circle" alt="Feature Image 3"/></a>
                    <?php } else { ?>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/team/Team-Placeholder.jpg');?>" class="img-responsive img-circle" alt="">
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_heading_third','') != '') { ?>
                    <a href="<?php echo esc_url(get_theme_mod('our_team_link_third','')); ?>"><h4><?php echo esc_html(get_theme_mod('our_team_heading_third','')); ?></h4></a>
                    <?php } else { ?>
                    <a href="#"><h4><?php echo esc_html__('Diana Pertersen','novellite');?></h4></a>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_subhead_third','') != '') { ?>
                    <p class="text-muted"><?php echo esc_textarea(get_theme_mod('our_team_subhead_third','')); ?></p>
                    <?php } else { ?>
                    <p class="text-muted"><?php echo esc_html__('Lead Developer','novellite'); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod('our_team_desc_third','') != '') { ?>
                    <p><?php echo esc_textarea(get_theme_mod('our_team_desc_third','')); ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>