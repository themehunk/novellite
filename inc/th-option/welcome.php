
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('1. Install Recommended Plugins','novellite'); ?></h3>
    <p><?php _e('We highly Recommend to install plugin to get all customization options in NovelLite theme. Also install recommended plugins available in recommended tab.','novellite'); ?></p>
</div>
<div class="theme_link">
    <h3><?php _e('2. Setup Home Page','novellite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
        <p><?php _e('To set up the HomePage in NovelLite theme, Just follow the below given Instructions.','novellite'); ?> </p>
<p><?php _e('Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.','novellite'); ?> </p>
<p><?php _e('Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.','novellite'); ?> </p>
     <p>
        <?php
		if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'novellite');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'novellite');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";


        }
        ?>
        <button style="<?php echo $Bstyle; ?>"; class="button activate-now <?PHP echo $class; ?>"><?php _e($btn_text,'novellite'); ?></button>
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/novellite-theme/#setup-home" class="button"><?php _e('Go to Doc','novellite'); ?></a>
    </p>
</div>

<!--- tab third -->





<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('3. Customize Your Website','novellite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php echo __('NovelLite theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','novellite'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","novellite"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("4. Customizer Links","novellite"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","novellite"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=static_front_page'); ?>" class="components-button is-link"><?php _e("Homepage Settings","novellite"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php _e("Woocommerce","novellite"); ?></a><hr>

                </div>

               <div class="col">

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=nav_menus'); ?>" class="components-button is-link"><?php _e("Menus","novellite"); ?></a><hr>

                <a href="<?php echo admin_url('customize.php?autofocus[section]=custom_css'); ?>" class="components-button is-link"><?php _e("Additional CSS","novellite"); ?></a>
                <hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e("Widgets","novellite"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->