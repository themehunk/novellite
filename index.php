<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query. 
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
*/
?>
<?php get_header(); ?>
<div class="page_heading_container" <?php if (get_theme_mod('header_image','') != '') { ?>
 style="background: url(<?php echo esc_url(get_theme_mod('header_image','')); ?>);"
 <?php }?> >
  <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<h1 style='visibility: hidden;'><?php the_title(); ?></h1>
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
                    <div class="content-bar gallery"> 
                        <?php
                        $limit = get_option('posts_per_page');
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        query_posts('showposts=' . $limit . '&paged=' . $paged);
                        $wp_query->is_archive = true;
                        $wp_query->is_home = false;
                        ?>
                        <!--Start Post-->
                        <?php get_template_part('loop', 'blog'); ?>   
                        <div class="clear"></div>
                        <?php NovelLite_pagination(); ?> 
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