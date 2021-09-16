<?php
/**
 * The template for displaying Category pages.
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
<h1><?php printf(CATEGORY_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1>
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
           <?php if (have_posts()) : ?>
                <?php
                $category_description = category_description();
                if (!empty($category_description))
                    echo '' . $category_description . '';
                /* Run the loop for the category page to output the posts.
                 * If you want to overload this in a child theme then include a file
                 * called loop-category.php and that will be used instead.
                 */
                ?>
                <?php get_template_part('loop', 'category'); ?>
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