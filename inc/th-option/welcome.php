
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('Setup Home Page','novellite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Click button to set theme default home page','novellite'); ?></p>
     <p>
        <?php
        if($this->_check_homepage_setup()){
            $class = "activated disabled";
            $btn_text = "Default Homepage Activated";
        }else{
            $class = "default-home";
             $btn_text = "Setup Default Homepage";
        }
        ?>
        <button class="button activate-now button-primary <?PHP echo $class; ?>"><?php _e('Set Home Page','novellite'); ?></button>
         </p>
    <p>
        <a target="_blank" href="https://www.youtube.com/watch?v=SMx9KHZr6HQ"><?php _e('Manually Setup','novellite'); ?></a>
    </p>
</div> 
<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('Customize Your Website','novellite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Novellite theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','novellite'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e('Start Customize','novellite'); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e('Customizer Links','novellite'); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e('Upload Logo','novellite'); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=site_color'); ?>" class="components-button is-link"><?php _e('Site Colors','novellite'); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=global_set'); ?>" class="components-button is-link"><?php _e('Global Options','novellite'); ?></a>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=header_setting'); ?>" class="components-button is-link"><?php _e('Header Options','novellite'); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=home_page_slider'); ?>" class="components-button is-link"><?php _e('Slider Options','novellite'); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e('Footer Widgets','novellite'); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->

 <div class="theme_link">
    <h3><?php _e('Documentation','novellite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Please check our full documentation for detailed information on how to use Novellite.','novellite'); ?></p>
    <p><a target="_blank" href="https://themehunk.com/docs/novellite-theme/"><?php _e(' Go to docs','novellite'); ?></a></p>
</div>