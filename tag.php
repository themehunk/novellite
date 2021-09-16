<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package ThemeHunk
 * 
 */
?>
<?php get_header(); ?>
<?php $layout = novellite_get_layout(); ?>
<div class="page_heading_container">
  <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<?php printf(TAG_ARCHIVES, '' . single_cat_title('', false) . ''); ?></h1>
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
            <?php get_template_part('loop', 'index'); ?> 
			<div class="clear"></div>
<nav id="nav-single"> <span class="nav-previous">
		<?php next_posts_link(NEWER_POSTS); ?>
	</span> <span class="nav-next">
		<?php previous_posts_link(OLDER_POSTS); ?>
	</span> </nav>
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