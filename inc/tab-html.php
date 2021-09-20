<div class="wrap about-wrap theme_info_wrapper">
    <div class="header">
        <h1><?php  echo $theme_header['welcome']; ?></h1>
        <div class="about-text"><?php echo $theme_header['welcome_desc']; ?></div>
        <a target="_blank" href="<?php echo $theme_header['theme_brand_url']; ?>/?wp=novellite" class="themehunkhemes-badge wp-badge"><span><?php echo $theme_header['theme_brand']; ?></span></a>
    </div>
</div>
<div class="content-wrap">
    <div class="main">


        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Welcome')">Welcome</button>
            <button class="tablinks" onclick="openTab(event, 'Recommanded-Plugin')">Recommanded Plugin</button>
            <button class="tablinks" onclick="openTab(event, 'Free-Vs-Pro')">Free Vs Pro</button>
            <button class="tablinks" onclick="openTab(event, 'Help')">Help</button>
        </div>


        <!-- Tab content -->
        <div id="Welcome" class="tabcontent">
            <div class="theme_link">
                <h3><?php echo $theme_config['plugin_title']; ?></h3>
                <p class="about"><?php echo $theme_config['plugin_text']; ?></p>
                
            </div>
            <div class="theme_link">
                <h3><?php echo $theme_config['plugin_title']; ?></h3>
                <p class="about"><?php echo $theme_config['plugin_text']; ?></p>
                
            </div>
        </div>
        <div id="Recommanded-Plugin" class="tabcontent">
            <div class="theme_link">
                <h3><?php echo $theme_config['docs_title']; ?></h3>
                <?php
                // Import template
                $class       = 'button';
                $button_text = __( 'Import Demo Template', 'novellite' );
                $data_slug   = 'one-click-demo-import';
                $data_init   = '?page=themehunk-site-library';
                printf(
                '<a class="ztabtn %1$s" %2$s %3$s> %4$s </a>',
                esc_attr( $class ),
                isset( $data_init ) ? 'href="' . esc_url( $data_init ) . '"' : '',
                isset( $data_slug ) ? 'data-slug="' . esc_attr( $data_slug ) . '"' : '',
                esc_html( $button_text )
                );
                ?>
            </p>
            <?php echo $this->NovelLite_plugin_api(); ?>
        </div>
        
    </div>
    <div id="Free-Vs-Pro" class="tabcontent">
        <div class="theme_link">
            <h3><?php echo $theme_config['customizer_title']; ?></h3>
            <p class="about"><?php  echo $theme_config['customizer_text']; ?></p>
            <p>
                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php echo $theme_config['customizer_button']; ?></a>
            </p>
        </div>
    </div>
    <div id="Help" class="tabcontent">
        <div class="theme_link">
            <h3><?php echo $theme_config['support_title']; ?></h3>
            <p class="about"><?php  echo $theme_config['support_text']; ?></p>
            <p>
                <a target="_blank" href="<?php echo $theme_config['support_link']; ?>"><?php echo $theme_config['support_forum']; ?></a>
            </p>
            <p><a target="_blank" href="<?php echo $theme_config['doc_link']; ?>"><?php  echo $theme_config['doc_link_text']; ?></a></p>
        </div>
    </div>
</div>




<div class="sidebar-wrap">
    <div class="sidebar">
        <div class="sidebar-section">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        </div>
        <div class="sidebar-section">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        </div>
    </div>
</div>
</div>