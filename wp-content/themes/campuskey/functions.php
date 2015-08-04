<?php

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/


require('classes/theme-cpt.php');

add_image_size( 'blog-custom', 1024, 479, true );


add_action( 'wp_enqueue_scripts', 'ppm_scripts_and_styles', 999 );

function ppm_scripts_and_styles() {
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    if (!is_admin()) {
        
        wp_register_script( 'packery', get_stylesheet_directory_uri() . '/library/vendors/packery/dist/packery.pkgd.min.js', array('jquery'), '1.0.8',true);
     
        wp_register_script( 'third-party', get_stylesheet_directory_uri() . '/library/js/third-party.js', array('jquery'), '1.0.8',true);
        
        wp_register_script( 'ppm', get_stylesheet_directory_uri() . '/library/js/ppm.js', array('third-party','packery','jquery'), '1.0.49',true);

        wp_enqueue_script('packery');

        wp_localize_script( 'ppm', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

        wp_enqueue_script('ppm');

      
    }
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="section_widget--heading"><h3 class="section_widget--title">',
    'after_title'   => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Block 1', 'theme-slug' ),
        'id' => 'footer-sidebar-1',
        'description' => __( 'Widgets in this area will be shown on home page footer area.', 'ck' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="section_widget--title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Block 2', 'theme-slug' ),
        'id' => 'footer-sidebar-2',
        'description' => __( 'Widgets in this area will be shown on home page footer area.', 'ck' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="section_widget--title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Block 3', 'theme-slug' ),
        'id' => 'footer-sidebar-3',
        'description' => __( 'Widgets in this area will be shown on home page footer area.', 'ck' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="section_widget--title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Block 4', 'theme-slug' ),
        'id' => 'footer-sidebar-4',
        'description' => __( 'Widgets in this area will be shown on home page footer area.', 'ck' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="section_widget--title">',
        'after_title'   => '</h2>',
    ) );
}

add_filter('redux/options/tpb_options/sections', 'child_sections');
function child_sections($sections){
    //$sections = array();
    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Theme Options', 'peadig-framework'),
        'desc'          => __('<p class="description">Theme modifications</p>', 'ppm'),
        'fields' => array(
            array(
                'id'=>'site_logo',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Site Logo', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main logo from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'booknow_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Book Now Image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main menu book now from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'preloader_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Preloader Image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main menu book now from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
            array(
                'id'=>'footer_image',
                'type' => 'media', 
                'url'=> true,
                'title' => __('Footer Image', 'ppm'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'=> __('Select main menu book now from media gallery', 'ppm'),
                'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
            ),
 
        )
    );


    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-heart',
        'title'         => __('Social Profiles', 'ppm-framework'),
        'desc'          => __('<p class="description">Social Network URLS</p>', 'ppm'),
        'fields' => array(
            array(
                'id'=>'twitter_url',
                'type' => 'text',
                'title' => __('Twitter', 'campuskey'),
                'desc' => __('Enter your twitter url', 'campuskey'),
            ),  
            array(
                'id'=>'facebook_url',
                'type' => 'text',
                'title' => __('Facebook', 'campuskey'),
                'desc' => __('Enter your Facebook URL', 'campuskey'),
            ),  
            array(
                'id'=>'instagram_url',
                'type' => 'text',
                'title' => __('Instagram', 'campuskey'),
                'desc' => __('Enter your INstagram URL', 'campuskey'),
            ),  
        )
    );

    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-phone',
        'title'         => __('Contact Details', 'campuskey'),
        'desc'          => __('<p class="description">Campus key contact information</p>', 'campuskey'),
        'fields' => array(
            array(
                'id'=>'campuskey_phone_text',
                'type' => 'text',
                'title' => __('Phone Number Text', 'campuskey'),
                'desc' => __('Enter the text based phone number', 'campuskey'),
            ), 
            array(
                'id'=>'campuskey_phone',
                'type' => 'text',
                'title' => __('Phone Number', 'campuskey'),
                'desc' => __('Enter the number based phone number', 'campuskey'),
            ),
            array(
                'id'=>'campuskey_phone',
                'type' => 'text',
                'title' => __('Phone Number', 'campuskey'),
                'desc' => __('Enter the number based phone number', 'campuskey'),
            ),
            array(
                'id'=>'campuskey_booknow',
                'type' => 'text',
                'title' => __('Book Now Link', 'campuskey'),
                'desc' => __('Enter the book now link', 'campuskey'),
            ), 
        )
    );

    

    return $sections;
}

function sergio($str) {
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

register_nav_menus(
    array(
        'secondary-nav' => __( 'Secondary Navigation', 'bonestheme' ),   // main nav in header
        'footer-nav' => __( 'Footer Nav', 'bonestheme' ),   // main nav in header
    )
);

function secondary_nav($nav = 'secondary-nav',$class='nav_secondary') {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'The Secondary Menu', 'bonestheme' ),              // nav name
        'menu_class' => $class,              // adding custom nav class
        'theme_location' => $nav,                             // where it's located in the theme
        'before' => '',                                             // before the menu
        'after' => '',                                            // after the menu
        'link_before' => '',                                      // before each link
        'link_after' => '',                                       // after each link
        'depth' => 2,                                             // limit the depth of the nav
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',  // fallback               // for bootstrap nav
    ));
} /* end bones main nav */


add_filter('post_thumbnail_html', 'tpb_thumbnail_attr',10,5);

function tpb_thumbnail_attr($html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if ($size == 'grid') :
        $attr = array('class'=>'img-responsive js-cut');

        $image_lg = wp_get_attachment_image_src( $post_thumbnail_id, 'image-lg');
        $image_md = wp_get_attachment_image_src( $post_thumbnail_id, 'image-md');
        $image_sm = wp_get_attachment_image_src( $post_thumbnail_id, 'image-sm');


        $html =    '<picture class="js-cut">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$image_lg[0].'" media="(min-width: 1200px)" class="img-responsive">
                        <source srcset="'.$image_lg[0].'" media="(min-width: 992px)" class="img-responsive">
                        <source srcset="'.$image_sm[0].'" media="(min-width: 768px)" class="img-responsive">
                        
                        
                         <!--[if IE 9]></video><![endif]-->
                        <img srcset="'.$image_sm[0].'" class="img-responsive">
                    </picture>';
    endif;

    if ($size == 'grid-6') :
        $attr = array('class'=>'img-responsive js-cut');


        $image_lg = wp_get_attachment_image_src( $post_thumbnail_id, 'grid-6');
        $image_md = wp_get_attachment_image_src( $post_thumbnail_id, 'grid-6');
        $image_sm = wp_get_attachment_image_src( $post_thumbnail_id, 'image-sm');


        $html =    '<picture class="js-cut">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$image_lg[0].'" media="(min-width: 1200px)" class="img-responsive">
                        <source srcset="'.$image_lg[0].'" media="(min-width: 992px)" class="img-responsive">
                        <source srcset="'.$image_sm[0].'" media="(min-width: 768px)" class="img-responsive">
                        
                        
                         <!--[if IE 9]></video><![endif]-->
                        <img srcset="'.$image_sm[0].'" class="img-responsive">
                    </picture>';
    endif;

    if ($size == 'slider') :
        $attr = array('class'=>'img-responsive js-cut');

        $header_id = get_post_meta($post_id,'_ppm_header_image_id',true); 

        $image_lg = wp_get_attachment_image_src( $header_id, 'slider');
        $image_md = wp_get_attachment_image_src( $header_id, 'slider');
        $image_sm = wp_get_attachment_image_src( $header_id, 'slider');


        $html =    '<picture class="js-cut">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$image_lg[0].'" media="(min-width: 1200px)" class="img-responsive">
                        <source srcset="'.$image_lg[0].'" media="(min-width: 992px)" class="img-responsive">
                        <source srcset="'.$image_sm[0].'" media="(min-width: 768px)" class="img-responsive">
                        
                        
                         <!--[if IE 9]></video><![endif]-->
                        <img srcset="'.$image_sm[0].'" class="img-responsive">
                    </picture>';
    endif;

    return $html;
}

add_action("wp_ajax_get_map_options", "get_map");
add_action("wp_ajax_nopriv_get_map_options", "get_map");

function get_map() {

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        global $post;

        $query_args = array(
            'post_type' => $_POST['type'], 
            'posts_per_page' => -1,
            'orderby' => 'menu_order'
        );

        $query = new WP_Query( $query_args );

        if ( $query->have_posts() ) : $count = 0; 
            $data = array();
            while ( $query->have_posts() ) : $query->the_post(); $count++;

                $location = get_post_meta($post->ID,'_ck_location',true);
                $image = get_post_meta($post->ID,'_ck_map_icon_id',true);
                $image_url =  wp_get_attachment_image_src( $image,'full', $icon );
                $data[] =  array('location'=>$location,'title'=>get_the_title(),'url'=>get_permalink(),'icon'=>$image_url[0]);

            endwhile;
        endif; 

        wp_reset_query();

        $return = array(
            'message'   => 'Saved',
            'data' => $data,
        );
        
        wp_send_json($return);
    
    }
    else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    die();
}

add_action("wp_ajax_get_cmap_options", "get_cmap");
add_action("wp_ajax_nopriv_cget_map_options", "get_cmap");

function get_cmap() {

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        global $post;

        $id = $_POST['id'];

        $location = get_post_meta($id,'_ck_location',true);
        $image = get_post_meta($id,'_ck_map_icon_id',true);
        $image_url =  wp_get_attachment_image_src( $image,'full', '' );
        $base =  array('location'=>$location,'title'=>get_the_title($id),'url'=>get_permalink(),'icon'=>$image_url[0]);


        $connected = new WP_Query( array(
          'connected_type' => 'campuses_to_buildings',
          'connected_items' => $id,
          'nopaging' => true,
        ) );

        // Display connected pages
        if ( $connected->have_posts() ) :
        while ( $connected->have_posts() ) : $connected->the_post(); 
            $location = get_post_meta($post->ID,'_ck_location',true);
            $image = get_post_meta($post->ID,'_ck_map_icon_id',true);
            $image_url =  wp_get_attachment_image_src( $image,'full', $icon );
            $data[] =  array('location'=>$location,'title'=>get_the_title(),'url'=>get_permalink(),'icon'=>$image_url[0]);
        endwhile; 
        wp_reset_postdata();
        endif;
        
        $return = array(
            'message'   => 'Saved',
            'data' => $data,
            'base' => $base
        );
        
        wp_send_json($return);
    
    }
    else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    die();
}

/**
* Calculation Subtotal Merge Tag
*
* Adds a {subtotal} merge tag which calculates the subtotal of the form. This merge tag can only be used
* within the "Formula" setting of Calculation-enabled fields (i.e. Number, Calculated Product).
*
* @author    David Smith <david@gravitywiz.com>
* @license   GPL-2.0+
* @link      http://gravitywiz.com/subtotal-merge-tag-for-calculations/
* @copyright 2013 Gravity Wiz
*/
class GWCalcSubtotal {

    public static $merge_tag = '{subtotal}';

    function __construct() {

        // front-end
        add_filter( 'gform_pre_render', array( $this, 'maybe_replace_subtotal_merge_tag' ) );
        add_filter( 'gform_pre_validation', array( $this, 'maybe_replace_subtotal_merge_tag_submission' ) );

        // back-end
        add_filter( 'gform_admin_pre_render', array( $this, 'add_merge_tags' ) );

    }

    /**
    * Look for {subtotal} merge tag in form fields 'calculationFormula' property. If found, replace with the
    * aggregated subtotal merge tag string.
    *
    * @param mixed $form
    */
    function maybe_replace_subtotal_merge_tag( $form, $filter_tags = false ) {
        
        foreach( $form['fields'] as &$field ) {
            
            if( current_filter() == 'gform_pre_render' && rgar( $field, 'origCalculationFormula' ) )
                $field['calculationFormula'] = $field['origCalculationFormula'];
            
            if( ! self::has_subtotal_merge_tag( $field ) )
                continue;

            $subtotal_merge_tags = self::get_subtotal_merge_tag_string( $form, $field, $filter_tags );
            $field['origCalculationFormula'] = $field['calculationFormula'];
            $field['calculationFormula'] = str_replace( self::$merge_tag, $subtotal_merge_tags, $field['calculationFormula'] );

        }

        return $form;
    }
    
    function maybe_replace_subtotal_merge_tag_submission( $form ) {
        return $this->maybe_replace_subtotal_merge_tag( $form, true );
    }

    /**
    * Get all the pricing fields on the form, get their corresponding merge tags and aggregate them into a formula that
    * will yeild the form's subtotal.
    *
    * @param mixed $form
    */
    static function get_subtotal_merge_tag_string( $form, $current_field, $filter_tags = false ) {
        
        $pricing_fields = self::get_pricing_fields( $form );
        $product_tag_groups = array();
        
        foreach( $pricing_fields['products'] as $product ) {

            $product_field = rgar( $product, 'product' );
            $option_fields = rgar( $product, 'options' );
            $quantity_field = rgar( $product, 'quantity' );

            // do not include current field in subtotal
            if( $product_field['id'] == $current_field['id'] )
                continue;

            $product_tags = GFCommon::get_field_merge_tags( $product_field );
            $quantity_tag = 1;

            // if a single product type, only get the "price" merge tag
            if( in_array( GFFormsModel::get_input_type( $product_field ), array( 'singleproduct', 'calculation', 'hiddenproduct' ) ) ) {

                // single products provide quantity merge tag
                if( empty( $quantity_field ) && ! rgar( $product_field, 'disableQuantity' ) )
                    $quantity_tag = $product_tags[2]['tag'];

                $product_tags = array( $product_tags[1] );
            }

            // if quantity field is provided for product, get merge tag
            if( ! empty( $quantity_field ) ) {
                $quantity_tag = GFCommon::get_field_merge_tags( $quantity_field );
                $quantity_tag = $quantity_tag[0]['tag'];
            }
            
            if( $filter_tags && ! self::has_valid_quantity( $quantity_tag ) )
                continue;
            
            $product_tags = wp_list_pluck( $product_tags, 'tag' );
            $option_tags = array();
            
            foreach( $option_fields as $option_field ) {

                if( is_array( $option_field['inputs'] ) ) {

                    $choice_number = 1;

                    foreach( $option_field['inputs'] as &$input ) {

                        //hack to skip numbers ending in 0. so that 5.1 doesn't conflict with 5.10
                        if( $choice_number % 10 == 0 )
                            $choice_number++;

                        $input['id'] = $option_field['id'] . '.' . $choice_number++;

                    }
                }

                $new_options_tags = GFCommon::get_field_merge_tags( $option_field );
                if( ! is_array( $new_options_tags ) )
                    continue;

                if( GFFormsModel::get_input_type( $option_field ) == 'checkbox' )
                    array_shift( $new_options_tags );

                $option_tags = array_merge( $option_tags, $new_options_tags );
            }

            $option_tags = wp_list_pluck( $option_tags, 'tag' );

            $product_tag_groups[] = '( ( ' . implode( ' + ', array_merge( $product_tags, $option_tags ) ) . ' ) * ' . $quantity_tag . ' )';

        }

        $shipping_tag = 0;
        /* Shipping should not be included in subtotal, correct?
        if( rgar( $pricing_fields, 'shipping' ) ) {
            $shipping_tag = GFCommon::get_field_merge_tags( rgars( $pricing_fields, 'shipping/0' ) );
            $shipping_tag = $shipping_tag[0]['tag'];
        }*/

        $pricing_tag_string = '( ( ' . implode( ' + ', $product_tag_groups ) . ' ) + ' . $shipping_tag . ' )';

        return $pricing_tag_string;
    }
    
    /**
    * Get all pricing fields from a given form object grouped by product and shipping with options nested under their
    * respective products.
    *
    * @param mixed $form
    */
    static function get_pricing_fields( $form ) {

        $product_fields = array();

        foreach( $form["fields"] as $field ) {

            if( $field["type"] != 'product' )
                continue;

            $option_fields = GFCommon::get_product_fields_by_type($form, array("option"), $field['id'] );

            // can only have 1 quantity field
            $quantity_field = GFCommon::get_product_fields_by_type( $form, array("quantity"), $field['id'] );
            $quantity_field = rgar( $quantity_field, 0 );

            $product_fields[] = array(
                'product' => $field,
                'options' => $option_fields,
                'quantity' => $quantity_field
                );

        }

        $shipping_field = GFCommon::get_fields_by_type($form, array("shipping"));

        return array( "products" => $product_fields, "shipping" => $shipping_field );
    }
    
    static function has_valid_quantity( $quantity_tag ) {

        if( is_numeric( $quantity_tag ) ) {

            $qty_value = $quantity_tag;

        } else {

            // extract qty input ID from the merge tag
            preg_match_all( '/{[^{]*?:(\d+(\.\d+)?)(:(.*?))?}/mi', $quantity_tag, $matches, PREG_SET_ORDER );
            $qty_input_id = rgars( $matches, '0/1' );
            $qty_value = rgpost( 'input_' . str_replace( '.', '_', $qty_input_id ) );

        }
        
        return intval( $qty_value ) > 0;
    }
    
    function add_merge_tags( $form ) {

        $label = __('Subtotal', 'gravityforms');

        ?>

        <script type="text/javascript">

            // for the future (not yet supported for calc field)
            gform.addFilter("gform_merge_tags", "gwcs_add_merge_tags");
            function gwcs_add_merge_tags( mergeTags, elementId, hideAllFields, excludeFieldTypes, isPrepop, option ) {
                mergeTags["pricing"].tags.push({ tag: '<?php echo self::$merge_tag; ?>', label: '<?php echo $label; ?>' });
                return mergeTags;
            }

            // hacky, but only temporary
            jQuery(document).ready(function($){

                var calcMergeTagSelect = $('#field_calculation_formula_variable_select');
                calcMergeTagSelect.find('optgroup').eq(0).append( '<option value="<?php echo self::$merge_tag; ?>"><?php echo $label; ?></option>' );

            });

        </script>

        <?php
        //return the form object from the php hook
        return $form;
    }

    static function has_subtotal_merge_tag( $field ) {
        
        // check if form is passed
        if( isset( $field['fields'] ) ) {

            $form = $field;
            foreach( $form['fields'] as $field ) {
                if( self::has_subtotal_merge_tag( $field ) )
                    return true;
            }

        } else {

            if( isset( $field['calculationFormula'] ) && strpos( $field['calculationFormula'], self::$merge_tag ) !== false )
                return true;

        }

        return false;
    }

}

new GWCalcSubtotal();

?>