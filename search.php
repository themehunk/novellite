<?php
/**
 * The template for displaying Search Results pages.
 * 
 */
?>
<?php get_header(); ?>
<?php $layout = novellite_get_layout(); ?>
<div class="page_heading_container" <?php if (get_theme_mod('header_image','') != '') { ?>
 style="background: url(<?php echo esc_url(get_theme_mod('header_image','')); ?>);"
 <?php }?> >
  <div class="container">
        <div class="row">
        <div class="col-md-12">
<div class="page_heading_content">
<h1><?php printf( __( 'Search Results for: %s', 'novellite' ), get_search_query() ); ?></h1>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="page-content <?php echo $layout; ?>">
                <?php if ( $layout != 'no-sidebar' ) { ?>
    <div class="col-md-9">
<?php } else { ?>
    <div class="col-md-12">
<?php } ?>
                 <div class="content-bar gallery">
            <?php if (have_posts()) : the_post(); ?>
                <?php
// If a user has filled out their description, show a bio on their entries.
                if (get_the_author_meta('description')) :
                    ?>
                    <div id="entry-author-info">
                        <div id="author-avatar"> <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('NovelLite_author_bio_avatar_size', 60)); ?> </div>
                        <!-- #author-avatar -->
                        <div id="author-description">
                        <h2><?php printf(ABOUT, get_the_author()); ?></h2>
                            <?php the_author_meta('description'); ?>
                        </div>
                        <!-- #author-description    -->
                    </div>
                    <!-- #entry-author-info -->
                <?php endif; ?>
                <?php
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();
                /* Run the loop for the author archive page to output the authors posts
                 * If you want to overload this in a child theme then include a file
                 * called loop-author.php and that will be used instead.
                 */
                get_template_part('loop', 'author');
                ?>
                <div class="clear"></div>
                <nav id="nav-single"> <span class="nav-previous">
                  <?php next_posts_link(NEWER_POSTS); ?>
                </span> <span class="nav-next">
                <?php previous_posts_link(OLDER_POSTS); ?>
                </span> </nav>
                <?php else: ?>
                <div class="post">
                <p>
                <?php _e('Sorry no post matched your criteria!', 'novellite'); ?>
                </p>  
                </div>
            <?php endif; ?> 
          </div>
                </div>
        <?php if ( $layout != 'no-sidebar' ) { ?>
        <div class="col-md-3">
        <!--Start Sidebar-->
        <?php get_sidebar(); ?>
        <!--End Sidebar-->
        </div>
        <?php } ?> 
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>