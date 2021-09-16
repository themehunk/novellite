<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('open_shop_mobile_header_clr','#fff')); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body id="page-top" <?php body_class('index'); ?>>
<?php wp_body_open();?> 
<div class="overlayloader">
<div class="loader">&nbsp;</div>
</div>		
<!-- Navigation -->
<?php if(get_theme_mod('novellite_sticky_header_disable')=='1'){
    $stickyhdr = 'static '; 
    }else{
    $stickyhdr ='';
    }
    if(get_theme_mod('header_layout')=='center'){
    $cntralign_menu = 'align-center';
    }else{
    $cntralign_menu='';
    }
    if(get_theme_mod('header_layout')=='split'){
    $split_menu ='align-center split-menu';
    }else{
    $split_menu ='';
    }
    if(get_theme_mod('header_layout')=='default'){
    $split_menu ='';
    $cntralign_menu='';
    }
    if(get_theme_mod('hdr_bg_trnsparent_active')=='1'){
    $hdr_trnsprnt ='hdr-transparent';
    }else{
    $hdr_trnsprnt ='';
    }
    if(get_theme_mod('last_menu_btn')=='1'){
    $last_btn ='last-btn';
    }else{
    $last_btn ='';
    }
    ?>
    <!-- script to split menu -->
 <?php 
if (get_theme_mod('header_layout')=='split') { ?>  
  <script>
    jQuery(document).ready(function() {
    // hides home from navigation
     var position = jQuery("ul.sf-menu > li").length;
     var middle = Math.round(position/2);
     var i = 0;
     jQuery('ul.sf-menu > li').each(function() {
         if(i == middle) {
                <?php
        if(get_theme_mod('title_disable')!==''){?>
          jQuery(this).before("<li class='logo-cent'><h1><a href='<?php echo esc_url( home_url( '/' ) ); ?>'><?php bloginfo( 'name' ); ?></a></h1><p><?php bloginfo('description');?></p></li>");
            <?php } else { ?>
      jQuery(this).before('<li class="logo-cent"><?php NovelLite_the_custom_logo();?></li>');
            <?php } ?>
        }
         i++;
     });
 });
</script>
<?php } ?>  
<!-- script to split menu -->  
<nav class="navbar navbar-default navbar-fixed-top <?php echo $stickyhdr;?> <?php echo $cntralign_menu;?> <?php echo $split_menu; ?> <?php echo $hdr_trnsprnt; ?> <?php echo $last_btn; ?> <?php if (!is_front_page()) { echo "not_home"; }?>">
	<div class="header_container">
        <div class="container">		
		<div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
			 <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
            <div class="navbar-header page-scroll">
            <?php
        if(get_theme_mod('title_disable')!==''){?>
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <p><?php bloginfo('description');?></p>         
				 <?php }else{ 
            NovelLite_the_custom_logo();
          } ?>
				</div>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				</div>
				 <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
				<?php if (is_front_page()) { ?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php NovelLite_menu_frontpage_nav() ?>
				</div>
				<?php } else { ?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php NovelLite_menu_nav(); ?>
				</div>
				<?php } ?>
				</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
			</div>
        </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
		</div>
    </nav>
	 <?php if (current_user_can('manage_options')) { ?>
	<style>
	.navbar-default {
	margin-top: 32px;
	}
	</style>
	<?php } ?>