<?php if(!th_checkbox_filter('blog','home_on_off')) : ?>
<?php   
$rdmore = get_theme_mod('read_more_txt','Read More');
$postshow = get_theme_mod('post_cate_count','3');
$postbg = get_theme_mod('post_bg_background','color');
$postprlx = get_theme_mod('post_parallax','on');
$postprlx_class = '';
$postprlx_data_center = '';
$postprlx_top_bottom =''; 
if($postprlx=='on' && $postbg!=='color'){
$postprlx_class = 'parallax-lite';
$postprlx_data_center = 'background-position: 50% 0px';
$postprlx_top_bottom = 'background-position: 50% -100px;';
}else{
$postprlx_class = ''; 
$postprlx_data_center = '';
$postprlx_top_bottom =''; 
}
?>         
<!-- blog Section -->
<section id="section3" class="<?php echo $postprlx_class;?>" data-center="<?php echo $postprlx_data_center;?>"
  data-top-bottom="<?php echo $postprlx_top_bottom;?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php if (get_theme_mod('blog_head_','') != '') { ?>
                <h2 class="section-heading"><?php echo esc_html(get_theme_mod('blog_head_','')); ?></h2>
                <?php } else { ?>
                <h2 class="section-heading"><?php _e('Latest Post','novellite'); ?></h2>
                <?php } ?>
                <?php if (get_theme_mod('blog_desc_','') != '') { ?>
                <h3 class="section-subheading text-muted"><?php echo esc_textarea(get_theme_mod('blog_desc_','')); ?></h3>
                <?php } else { ?>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="home_blog_content gallery wow fadeInLeft" data-wow-duration="2s">
                    <?php
                    global $post;
                    $query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $postshow)); $i = 0;
                    if ($query->have_posts()) {
                    while ($query->have_posts()) : $query->the_post();
                    $i++;
                    $z = .2 * $i;
                    ?>
                    <!--Start post-->
                    <div class="post animated" style="-webkit-animation-delay: <?php echo $z; ?>s;
                        -webkit-animation-delay: <?php echo $z; ?>s; -moz-animation-delay: <?php echo $z; ?>s; -o-animation-delay: <?php echo $z; ?>s; -ms-animation-delay: <?php echo $z; ?>s;">
                        <div class="post_inner">
                            <div class="post_thumbnil">
                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                
                                <a href="<?php get_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_front'); ?></a>
                                <a rel='prettyPhoto[gallery2]' href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID, 'thumbnail')); ?>"><span class="image_link"></span></a>
                                <?php
                                } ?>
                            </div>
                            
                            <div class="post_content">
                                <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h1>
                                <ul class="post_meta">
                                    <li class="posted_by"><span><?php _e('by','novellite'); ?> </span><?php the_author_posts_link(); ?></li>
                                    <li class="posted_on"><span></span><?php echo get_the_time('M, d, Y') ?></li>
                                </ul>
                                <?php echo NovelLite_trim_excerpt(20); ?>
                            </div>
                            <div class="post_content_bottom">
                                <span class="post_comment"><i class="fa fa-comments"></i><?php comments_popup_link(NO_CMNT, ONE_CMNT, '% ' . CMNT); ?></span>
                                <span class="read_more"><a class="read_more" href="<?php the_permalink() ?>"><?php echo $rdmore; ?></a><i class="fa fa-share-square-o"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    } else {
                    ?>
                    <div class="post">
                        <p>
                            <?php _e('sorry no post matched your criteria!', 'novellite'); ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>