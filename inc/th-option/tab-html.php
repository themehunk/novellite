<div class="wrap about-wrap theme_info_wrapper">
    <div class="header">
        <h1><?php  echo $theme_header['welcome']; ?></h1>
        <div class="about-text"><?php echo $theme_header['welcome_desc']; ?></div>
        <a target="_blank" href="<?php echo $theme_header['theme_brand_url']; ?>/?wp=novellite" class="themehunkhemes-badge wp-badge"><span><?php echo $theme_header['theme_brand']; ?></span></a>
    </div>
</div>
<div class="content-wrap">
    <div class="main">

<div class="tab-left" >

        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'Welcome')"><?php _e('Welcome','novellite');?></button>
            <button class="tablinks" onclick="openTab(event, 'Recommanded-Plugin')"><?php _e('Recommanded Plugin','novellite');?> </button>
            <button class="tablinks" onclick="openTab(event, 'Free-Vs-Pro')"><?php _e('Free Vs Pro','novellite');?></button>
            <button class="tablinks" onclick="openTab(event, 'Help')"><?php _e('Help','novellite');?></button>
        </div>

        <!-- Tab content -->
        <div id="Welcome" class="tabcontent active">
            <div class="rp-two-column">
        <?php include('welcome.php' ); ?>

            </div> <!-- close twocolumn -->
        </div>


        <div id="Recommanded-Plugin" class="tabcontent">
            <div class="rp-two-column">
            <?php echo $this->plugin_setup_api(); ?>
            </div>
        </div>


            <div id="Free-Vs-Pro" class="tabcontent">
                <div class="rp-two-column">
                    <?php include('free-pro.php' ); ?>

                </div>
            </div>

    <div id="Help" class="tabcontent">
        <div class="rp-two-column">
                    <?php include('need-help.php' ); ?>

        </div>
    </div>


</div> <!-- tab div close -->



<div class="sidebar-wrap">
    <div class="sidebar">
    <?php include('sidebar.php' ); ?>
    </div>
</div>


</div>