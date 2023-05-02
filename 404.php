<?php
/**
 * The template for displaying 404 pages (Not Found).
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
  <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<h1><?php echo __('This is somewhat embarrassing, isn&rsquo;t it?','novellite'); ?></h1>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
                <div class="col-md-9">
                    <div class="content-bar">
            <p>
             <?php echo __('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'novellite'); ?>
            </p>
            <?php get_search_form(); ?>
            <?php the_widget('WP_Widget_Recent_Posts', array('number' => 10), array('widget_id' => '404')); ?>
            <div class="widget">
                <h2 class="widgettitle">
                     <?php echo __('Most Used Categories', 'novellite'); ?>
                </h2>
                <ul>
                    <?php wp_list_categories(array('orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10)); ?>
                </ul>
            </div>
            <?php
			/* translators: %1$s: smilie */
            $archive_content = '<p>' . sprintf(NOVELLITE_MONTHLY_ARCHIVES, convert_smilies(':)')) . '</p>';
            the_widget('WP_Widget_Archives', array('count' => 0, 'dropdown' => 1), array('after_title' => '</h2>' . $archive_content));
            ?>
            <?php the_widget('WP_Widget_Tag_Cloud'); ?>
          </div>
                </div>
				<div class="col-md-3">
		<!--Start Sidebar-->
		<?php get_sidebar(); ?>
		<!--End Sidebar-->
		</div> 
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>