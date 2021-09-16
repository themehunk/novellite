<?php $back_to_top = get_theme_mod('novellite_backtotop_disable','0');?>
<input type="hidden" id="back-to-top" value="<?php echo $back_to_top?>"/> 
<div class="outer-footer">
<div class="container">
<div class="footer-widget-area">
        <?php
        /* A sidebar in the footer? Yep. You can can customize
         * your footer with four columns of widgets.
         */
        get_sidebar('footer');
        ?>
		</div>
    </div>
	</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
				<?php
                $allowed_html = array(
                                  'a' => array(
                                  'href' => array(),
                                  'title' => array(),
                                  'target' => array()
                              ),
                              'br' => array(),
                              'em' => array(),
                              'strong' => array(),
                          );
                $url = "https://themehunk.com";
              echo  sprintf( 
                wp_kses( __( 'Novellite developed by <a href="%s" target="_blank">ThemeHunk</a>', 'novellite' ), $allowed_html), esc_url( $url ) ); ?>
			         </p>
                     </div>
                    </div>
        </div>
    </footer>
	<?php wp_footer(); ?>
</body>
</html>