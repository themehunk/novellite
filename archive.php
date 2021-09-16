<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeHunk
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
<h1><?php if (is_day()) : ?>
                        <?php printf(DAILY_ARCHIVES, get_the_date()); ?>
                    <?php elseif (is_month()) : ?>
                        <?php printf(MONTHLY_ARCHIVES, get_the_date('F Y')); ?>
                    <?php elseif (is_year()) : ?>
                        <?php printf(YEARLY_ARCHIVES, get_the_date('Y')); ?>
                    <?php else : ?>
                        <?php echo BLOG_ARCHIVES; ?>
                    <?php endif; ?></h1>
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
            <?php if (have_posts()): ?>
              
                <?php
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();
                /* Run the loop for the archives page to output the posts.
                 * If you want to overload this in a child theme then include a file
                 * called loop-archives.php and that will be used instead.
                 */
                get_template_part('loop', 'archive');
                ?>
                <div class="clear"></div>
                <nav id="nav-single"> <span class="nav-previous">
		<?php next_posts_link(NEWER_POSTS); ?>
	</span> <span class="nav-next">
		<?php previous_posts_link(OLDER_POSTS); ?>
	</span> </nav>
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