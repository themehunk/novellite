<?php
/**
 * Sanitization for textarea field
 */
function NovelLite_sanitize_textarea( $input ) {
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}
function NovelLite_sanitize_textarea_html( $input ) {
    $output = esc_html( $input );
    return $output;
}
function NovelLite_sanitize_checkbox( $input ) {
    if ( $input == 1 ){
        return 1;
    }else{
        return 0;
    }
}
function NovelLite_sanitize_text( $string ) {
    return wp_kses_post( balanceTags( $string ) );
}

/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function NovelLite_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}
//color
function Novellite_hex_color( $color ) {
    if ( '' === $color ) {
        return '';
    }

    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }
}
//alfa-color
function NovelLite_sanitize_color_alpha( $color ){
    $color = str_replace( '#', '', $color );
    if ( '' === $color ){
        return '';
    }

    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', '#' . $color ) ) {
        // convert to rgb
        $colour = $color;
        if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
            return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return 'rgba('.join( ',', array( 'r' => $r, 'g' => $g, 'b' => $b, 'a' => 1 ) ).')';

    }

    return strpos( trim( $color ), 'rgb' ) !== false ?  $color : false;
}




/**
 * vaild int.
 */
function NovelLite_sanitize_int( $input ) {
$return = absint($input);
    return $return;
}
// Multiple Checkbox Show
function NovelLite_checkbox_explode( $values ) {
$multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
function NovelLite_custom_customize_register( $wp_customize ) {
    
class NovelLite_Misc_Control extends WP_Customize_Control{
    public function render_content() {
        switch ( $this->type ) {
            default:

            case 'heading':
                echo '<span class="customize-control-title">' . $this->title . '</span>';
                break;

            case 'custom_message' :
                echo '<p class="description">' . $this->description . '</p>';
                break;

            case 'hr' :
                echo '<hr />';
                break;
        }
    }
}

/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class TH_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {


    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'checkbox-multiple';

    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue() {
       
    }

    /**
     * Displays the control content.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function render_content() {

        if ( empty( $this->choices ) ){
            return;   }
            ?>
      

        <?php if ( !empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>
        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>
        <ul>
            <?php foreach ( $this->choices as $value => $label ) : ?>

                <li>
                    <label>
                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                        <?php echo esc_html( $label ); ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
    <?php }
}

}
add_action('customize_register','NovelLite_custom_customize_register');
function NovelLite_registers() {

    wp_enqueue_script( 'NovelLite_customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery"), '', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'NovelLite_registers' );

function NovelLite_customizer_styles() {

    wp_enqueue_style('NovelLite_customizer_styles', get_template_directory_uri() . '/css/customizer_styles.css');

}
add_action('customize_controls_print_styles', 'NovelLite_customizer_styles');

// single page post meta
function th_checkbox_filter($search,$theme_mod,$default=false){
$filter = get_theme_mod($theme_mod);
$value = (!empty($filter) && !empty($filter[0]))?in_array($search, $filter):$default;
return $value;
}

add_action( 'wp_ajax_novellite_default_home', 'novellite_default_home' );
function novellite_default_home() {
$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-frontpage.php'
));
  $post_id = isset($pages[0]->ID)?$pages[0]->ID:false;
if(empty($pages)){
      $post_id = wp_insert_post(array (
       'post_type' => 'page',
       'post_title' => 'Home Page',
       'post_content' => '',
       'post_status' => 'publish',
       'comment_status' => 'closed',   // if you prefer
       'ping_status' => 'closed',      // if you prefer
       'page_template' =>'template-frontpage.php', //Sets the template for the page.
    ));
  }
      if($post_id){
        update_option( 'page_on_front', $post_id );
        update_option( 'show_on_front', 'page' );
    }
    wp_die(); // this is required to terminate immediately and return a proper response
}
?>