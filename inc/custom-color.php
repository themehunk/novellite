<?php function novellite_custom_color() {
    $output = '';
    $site_style = get_theme_mod('theme_color','#fed136');
// Output styles
$output.=".footer_bg, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce ul.products li.product a.button, .woocommerce.archive ul.products li.product a.button, .woocommerce-page.archive ul.products li.product a.button, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce ul.products li.product a.button:hover, .woocommerce.archive ul.products li.product a.button:hover, .woocommerce-page.archive ul.products li.product a.button:hover .woocommerce-page #respond input#submit, .woocommerce-product-search input[type='submit'], .ui-slider .ui-slider-range{
    background:" . $site_style . ";
} 
.loader {
 border-top: 2px solid " . $site_style . ";    
}
.text-primary {
    color: " . $site_style . ";
}
a {
    color: " . $site_style . ";
}
.btn-primary {
    border-color: " . $site_style . ";
    background-color:" . $site_style . ";
}
.btn-primary.disabled,
.btn-primary[disabled],
fieldset[disabled] .btn-primary,
.btn-primary.disabled:hover,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary:hover,
.btn-primary.disabled:focus,
.btn-primary[disabled]:focus,
fieldset[disabled] .btn-primary:focus,
.btn-primary.disabled:active,
.btn-primary[disabled]:active,
fieldset[disabled] .btn-primary:active,
.btn-primary.disabled.active,
.btn-primary[disabled].active,
fieldset[disabled] .btn-primary.active {
    border-color:" . $site_style . ";
    background-color:" . $site_style . ";
}
.btn-primary .badge {
    color:" . $site_style . ";
    background-color: #fff;
}
.btn-xl {
    border-color: " . $site_style . ";
    background-color: " . $site_style . ";
}
.navbar-default .navbar-brand, .bx-caption span p a {
    color:" . $site_style . ";
}

.navbar-default .navbar-toggle:hover{
 background-color:" . $site_style . ";
 border-color:" . $site_style . ";
}
.navbar-default .navbar-nav>.active>a {
    background-color:" . $site_style . ";
}
.timeline>li .timeline-image {
    background-color:" . $site_style . ";
}
.contact_section .form-control:focus {
    border-color:" . $site_style . ";
}
ul.social-buttons li a:hover,
ul.social-buttons li a:focus,
ul.social-buttons li a:active {
    background-color:" . $site_style . ";
}
::-moz-selection {
    background:" . $site_style . ";
}

::selection {
    background:" . $site_style . ";
}
body {
    webkit-tap-highlight-color:" . $site_style . ";
}
ol.commentlist li.comment .comment-author .avatar {
    border: 3px solid " . $site_style . "; 
}
ol.commentlist li.comment .reply a {
    background: " . $site_style . ";
}
#commentform a {
    color: " . $site_style . ";
}
.home_blog_content .post:hover .post_content_bottom{
    background:" . $site_style . ";
}
#portfolio .portfolio-item .portfolio-link .portfolio-hover{
    background:" . $site_style . ";
}
.navbar .sf-menu ul li {
    background-color:" . $site_style . ";
}
.sf-menu ul ul li {
    background-color:" . $site_style . ";
}
.navbar .sf-menu li:hover,
.navbar .sf-menu li.sfHover,
.navbar li.current_page_item {
    background-color:" . $site_style . ";
}
.home .contact_section .leadform-show-form.leadform-lite input[type='submit']{
  background: " . $site_style . ";
  border: solid " . $site_style . " 1px;  
}
.home .contact_section .leadform-show-form.leadform-lite input:focus,
.home .contact_section .leadform-show-form.leadform-lite textarea:focus{
 border: solid " . $site_style . " 1px;    
}
#move-to-top{
background: " . $site_style . ";  
}
a:hover, a:active, #section1 h4.service-heading:hover{color:".$site_style.";}";
// footer
$footer_bg = get_theme_mod('footer_bg_color','#eee');
$footer_info_bg = get_theme_mod('footer_info_bg_color','#20222b');
$output.=".outer-footer{background:$footer_bg;}
footer{background:$footer_info_bg;}";
// header-menu
$hd_bg_color = get_theme_mod('hd_bg_color');
$hd_shrnk_bg_color  = novellite_hex_to_rgba($hd_bg_color,0.6);
$site_title_color = get_theme_mod('site_title_color','#fff');
$hd_menu_color = get_theme_mod('hd_menu_color','#fff');
$hd_menu_hvr_color = get_theme_mod('hd_menu_hvr_color','#fff');
$hd_menu_hvr_bg_color = get_theme_mod('hd_menu_hvr_bg_color','#fec503');
$mobile_menu_bg_color = get_theme_mod('mobile_menu_bg_color','#fec503');
$output.=".navbar-default{background-color:$hd_bg_color;}
.navbar-default.navbar-shrink, .home .navbar-default.hdr-transparent.navbar-shrink{background-color:$hd_shrnk_bg_color;}
.navbar-header h1 a,.navbar-header p, nav.split-menu .logo-cent h1 a, nav.split-menu .logo-cent p,nav.split-menu .logo-cent h1 a:hover{color:$site_title_color;}
.navbar-default .nav li a,.navbar .sf-menu li li a,.navbar-default .navbar-nav>.active>a{color:$hd_menu_color;}
.navbar-default .nav li a:hover, .navbar-default .nav li a:focus,.navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus{color:$hd_menu_hvr_color;}
.navbar .sf-menu li:hover, .navbar .sf-menu li.sfHover, .navbar li.current_page_item,.navbar .sf-menu ul li,.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus{background:$hd_menu_hvr_bg_color}
.navbar-default .navbar-toggle, 
.navbar-default .navbar-toggle:focus{background:$mobile_menu_bg_color;border-color:$mobile_menu_bg_color;}";
// slider
$ovrly_bg_img_disable = get_theme_mod('ovrly_bg_img_disable');
$sldr_ovly_clr = get_theme_mod('slider_bg_overly','rgba(0, 0, 0, 0.1)');
$sldr_hdng_clr = get_theme_mod('sldr_hdng_clr','#fff');
$sldr_subhdng_clr = get_theme_mod('sldr_subhdng_clr','#fff');

$output.=".NovelLite_slider .container h1 a{color:$sldr_hdng_clr;}
.NovelLite_slider .container p{color:$sldr_subhdng_clr;}";
if($ovrly_bg_img_disable =='1'){
$output.=".NovelLite_slider .slider_overlay{background:$sldr_ovly_clr url();}";
}else{
 $output.=".NovelLite_slider .slider_overlay{background-color:$sldr_ovly_clr;}";  
}
// services-section
$services_bg_option = get_theme_mod('services_bg_background','color');
$services_bg_image = get_theme_mod('services_bg_image');
$services_bg_ovrly = get_theme_mod('service_img_overly_color','#fff');
$services_heading = get_theme_mod('service_heading_color','#333');
$services_subheading=get_theme_mod('service_subheading_color','#777');
$service_title_color=get_theme_mod('service_title_color','#777');
$service_text_color=get_theme_mod('service_text_color','#777');
$output.="#section1 h2.section-heading{color:$services_heading;}
#section1 h3.section-subheading{color:$services_subheading;} #section1 h4.service-heading{color:$service_title_color;}
#section1 p.text-muted{color:$service_text_color;}";
if($services_bg_option=='color'){
$output.="#section1{background:$services_bg_ovrly;}";
}else{
$output.="#section1{background-image:url($services_bg_image);}";
$output.="#section1:before{background:$services_bg_ovrly;}";
};
// testimonial-section
$testimonial_bg_option = get_theme_mod('testimonial_bg_background','image');
$testimonial_bg_image = get_theme_mod('testimonial_parallax_image',TESTIMONIAL_BG_IMAGE);
$testimonial_bg_ovrly = get_theme_mod('testimonial_img_overly_color','rgba(0, 0,0, 0)');
$testimonial_heading = get_theme_mod('testimonial_heading_color','#fff');
$testimonial_cont_bg_color = get_theme_mod('testimonial_cont_bg_color','#fff');
$testimonial_cont_txt_color = get_theme_mod('testimonial_cont_txt_color','#000');
$output.="#section2 .testimonial-inner .testimonial-header{color:$testimonial_heading;}.bx-wrapper .bx-caption span{background:$testimonial_cont_bg_color; color:$testimonial_cont_txt_color}";
if($testimonial_bg_option=='color'){
$output.="#section2{background:$testimonial_bg_ovrly;}";
}else{
$output.="#section2{background-image:url($testimonial_bg_image);}";
$output.="#section2:before{background:$testimonial_bg_ovrly;}";    
}
// woo-section
$woo_bg_option = get_theme_mod('woo_bg_background','color');
$woo_bg_image = get_theme_mod('woo_bg_image');
$woo_bg_ovrly = get_theme_mod('woo_img_overly_color','#F7F7F7');
$woo_heading = get_theme_mod('woo_heading_color','#333');
$woo_subheading=get_theme_mod('woo_subheading_color','#777');
$output.="#section8 h2.section-heading{color:$woo_heading;}
#section8 h3.section-subheading{color:$woo_subheading;}";
if($woo_bg_option=='color'){
$output.="#section8{background:$woo_bg_ovrly;}";
}else{
$output.="#section8{background-image:url($woo_bg_image);}";
$output.="#section8:before{background:$woo_bg_ovrly;}";
};
// latest-post
$post_bg_option = get_theme_mod('post_bg_background','color');
$post_bg_image = get_theme_mod('post_bg_image');
$post_bg_ovrly = get_theme_mod('post_img_overly_color','#fff');
$post_heading = get_theme_mod('post_heading_color','#333');
$post_subheading=get_theme_mod('post_subheading_color','#777');
$output.="#section3 h2.section-heading{color:$post_heading;}
#section3 h3.section-subheading{color:$post_subheading;}";
if($post_bg_option=='color'){
$output.="#section3{background:$post_bg_ovrly;}";
}else{
$output.="#section3{background-image:url($post_bg_image);}";
$output.="#section3:before{background:$post_bg_ovrly;}";
};
//team
$team_bg_option = get_theme_mod('team_bg_background','color');
$team_bg_image  = get_theme_mod('team_bg_image');
$team_bg_ovrly  = get_theme_mod('team_img_overly_color','#f7f7f7');
$team_heading   = get_theme_mod('team_heading_color','#333');
$team_subheading=get_theme_mod('team_subheading_color','#777');
$team_title_color=get_theme_mod('team_title_color','#222');
$team_text_color=get_theme_mod('team_text_color','#333');
$team_desig_color=get_theme_mod('team_desig_color','#777');
$output.="#section4 h2.section-heading{color:$team_heading;}
#section4 h3.section-subheading{color:$team_subheading;}
#section4 .team-member h4{color:$team_title_color;}
#section4 .team-member p.text-muted{color:$team_desig_color;}
#section4 .team-member p{color:$team_text_color;}";
if($team_bg_option=='color'){
$output.="#section4{background:$team_bg_ovrly;}";
}else{
$output.="#section4{background-image:url($team_bg_image);}";
$output.="#section4:before{background:$team_bg_ovrly;}";
};
// contact_section
$cf_bg_background = get_theme_mod('cf_bg_background','image');
$cf_parallax_image = get_theme_mod('cf_image',CONTACT_BG_IMAGE);
$cf_img_overly_color = get_theme_mod('cf_img_overly_color','rgba(0, 0,0, 0)');
$cf_heading_color = get_theme_mod('cf_heading_color','#fff');
$cf_subheading_color = get_theme_mod('cf_subheading_color','#fff');
$output.="#section5 .section-heading{color:$cf_heading_color;}
#section5 h3.section-subheading.contact{color:$cf_subheading_color;}";
if($cf_bg_background=='color'){
$output.="#section5{background:$cf_img_overly_color;}";
}else{
$output.="#section5{background-image:url($cf_parallax_image);}";
$output.="#section5:before{background:$cf_img_overly_color;}";    
}
//pricing
$pricing_bg_background = get_theme_mod('pricing_bg_background','image');
$pricing_parallax_image = get_theme_mod('pricing_img_first',PRICING_BG_IMAGE);
$pricing_img_overly_color = get_theme_mod('pricing_img_overly_color','rgba(0, 0,0, 0)');
$pricing_heading_color = get_theme_mod('pricing_heading_color','#fff');
$pricing_subheading_color = get_theme_mod('pricing_subheading_color','#fff');
$output.="#price-package .post-title h1{color:$pricing_heading_color;}
#price-package .post-title p{color:$pricing_subheading_color;}";
if($pricing_bg_background=='color'){
$output.="#price-package{background:$pricing_img_overly_color;}";
}else{
$output.="#price-package{background-image:url($pricing_parallax_image);}";
$output.="#price-package:before{background:$pricing_img_overly_color;}";    
}

echo "<style type='text/css'>".$output."</style>";
}
add_action('wp_head', 'novellite_custom_color');?>