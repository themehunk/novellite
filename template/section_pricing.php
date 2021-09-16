<?php if(!th_checkbox_filter('pricing','home_on_off')) : ?>
<?php if(get_theme_mod('txt_desc_','')!==''):?>
<?php $pricetext = get_theme_mod('txt_desc_','');
$pricingbg = get_theme_mod('pricing_bg_background','image');
$pricingprlx = get_theme_mod('pricing_parallax','on');
$pricingprlx_class = '';
$pricingprlx_data_center = '';
$pricingprlx_top_bottom =''; 
if($pricingprlx=='on' && $pricingbg!=='color'){
$pricingprlx_class = 'parallax-lite';
$pricingprlx_data_center = 'background-position: 50% 0px';
$pricingprlx_top_bottom = 'background-position: 50% -100px;';
}else{
$pricingprlx_class = ''; 
$pricingprlx_data_center = '';
$pricingprlx_top_bottom =''; 
}
?>
<section id="price-package" class="<?php echo $pricingprlx_class;?>" data-center="<?php echo $pricingprlx_data_center;?>"
  data-top-bottom="<?php echo $pricingprlx_top_bottom;?>">
  <div class="container">
    <div class="price-page">
      <div class="post-title">
        <?php if (get_theme_mod('pricing_head_') != '') { ?>
        <h1><?php echo esc_html(get_theme_mod('pricing_head_')); ?></h1>
        <?php }else { ?>
        <h1><?php  _e('Price and Packages','novellite'); ?></h1>
        <?php } ?>
        <?php if (get_theme_mod('pricing_desc_') != '') { ?>
        <p><?php echo esc_textarea(get_theme_mod('pricing_desc_')); ?></p>
        <?php } else { ?>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <?php } ?>
      </div>
      <div class="price-block">
        <div class="price-class">
          <?php   echo do_shortcode($pricetext); ?>
          </div><!--price-class-->
          </div><!-- price-block -->
          </div><!-- price-page -->
          </div><!-- container -->
        </section>
        <?php endif ?>
         <?php endif ?>