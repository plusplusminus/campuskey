<?php
class ckCustomPostTypes {

	public function __construct() {
		add_action( 'cmb2_init', array($this,'ck_custom_meta'));
		add_action('init',array($this,'ck_custom_posts'));

	}

    function ck_custom_posts()
	{
		// Register custom post types
		register_post_type(	'campuses', 
			array(	
				'label' 			=> __('Campuses'),
				'labels' 			=> array(	'name' 					=> __('Campuses'),
												'singular_name' 		=> __('Campus'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Campus'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Campus'),
												'new_item' 				=> __('New Campus'),
												'view_item'				=> __('View Campus'),
												'search_items' 			=> __('Search Campus'),
												'not_found' 			=> __('No Campus found'),
												'not_found_in_trash' 	=> __('No Campus found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, // UI in admin panel
				'_builtin' 			=> false, // It's a custom post type, not built in
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-location-alt',
				'hierarchical' 		=> false,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "campus"	), // Permalinks
				'query_var' 		=> "campus", // This goes to the WP_Query schema
				'supports' 			=> array(	'title',																
												'editor',
												'thumbnail'
												),
				'show_in_nav_menus'	=> false ,
				'taxonomies'		=> array()
			)
		);	

		register_post_type(	'rooms', 
			array(	
				'label' 			=> __('Rooms'),
				'labels' 			=> array(	'name' 					=> __('Rooms'),
												'singular_name' 		=> __('Room'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Room'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Room'),
												'new_item' 				=> __('New Room'),
												'view_item'				=> __('View Room'),
												'search_items' 			=> __('Search Room'),
												'not_found' 			=> __('No Room found'),
												'not_found_in_trash' 	=> __('No Room found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, // UI in admin panel
				'_builtin' 			=> false, // It's a custom post type, not built in
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-admin-home',
				'hierarchical' 		=> false,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "room"	), // Permalinks
				'query_var' 		=> "room", // This goes to the WP_Query schema
				'supports' 			=> array(	'title',																
												'editor',
												'thumbnail'
												),
				'show_in_nav_menus'	=> false ,
				'taxonomies'		=> array()
			)
		);	

		register_post_type(	'buildings', 
			array(	
				'label' 			=> __('Buildings'),
				'labels' 			=> array(	'name' 					=> __('Buildings'),
												'singular_name' 		=> __('Building'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Building'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Building'),
												'new_item' 				=> __('New Building'),
												'view_item'				=> __('View Building'),
												'search_items' 			=> __('Search Building'),
												'not_found' 			=> __('No Building found'),
												'not_found_in_trash' 	=> __('No Building found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, // UI in admin panel
				'_builtin' 			=> false, // It's a custom post type, not built in
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-building',
				'hierarchical' 		=> false,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "building"	), // Permalinks
				'query_var' 		=> "building", // This goes to the WP_Query schema
				'supports' 			=> array(	'title',																
												'editor',
												'thumbnail'
												),
				'show_in_nav_menus'	=> false ,
				'taxonomies'		=> array()
			)
		);

		register_post_type(	'features', 
			array(	
				'label' 			=> __('Features'),
				'labels' 			=> array(	'name' 					=> __('Features'),
												'singular_name' 		=> __('Feature'),
												'add_new' 				=> __('Add New'),
												'add_new_item' 			=> __('Add New Feature'),
												'edit' 					=> __('Edit'),
												'edit_item' 			=> __('Edit Feature'),
												'new_item' 				=> __('New Feature'),
												'view_item'				=> __('View Feature'),
												'search_items' 			=> __('Search Feature'),
												'not_found' 			=> __('No Feature found'),
												'not_found_in_trash' 	=> __('No Feature found in trash')	),
				'public' 			=> true,
				'can_export'		=> true,
				'show_ui' 			=> true, // UI in admin panel
				'_builtin' 			=> false, // It's a custom post type, not built in
				'_edit_link' 		=> 'post.php?post=%d',
				'capability_type' 	=> 'post',
				'menu_icon' 		=> 'dashicons-star-filled',
				'hierarchical' 		=> false,
				'has_archive' 		=> true,
				'rewrite' 			=> array(	"slug" => "feature"	), // Permalinks
				'query_var' 		=> "feature", // This goes to the WP_Query schema
				'supports' 			=> array(	'title',																
												'editor'
												),
				'show_in_nav_menus'	=> false ,
				'taxonomies'		=> array()
			)
		);		
	}

	public function ck_custom_meta() {

	    // Start with an underscore to hide fields from custom fields list
	    $prefix = '_ck_';

	    
	    $page_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'page_metabox',
	        'title'         => __( 'Page Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $page_meta->add_field( array(
		    'name'    => 'Page Header Content',
		    'desc'    => 'enter the building header area content',
		    'id'      => $prefix.'page_header',
		    'type'    => 'textarea'
		) );

		$page_meta->add_field( array(
		    'name' => 'Home Gallery',
		    'desc' => '',
		    'id'   => $prefix.'home_gallery',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );


	    $campus_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'campus_metabox',
	        'title'         => __( 'Campus Meta', 'cmb2' ),
	        'object_types'  => array( 'campuses', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $campus_meta->add_field( array(
		    'name'    => 'Campus Header Content',
		    'desc'    => 'enter the campus header area content',
		    'id'      => $prefix.'campus_header',
		    'type'    => 'textarea'
		) );

	    $campus_meta->add_field(
	    	array(
			    'name' => 'Campus Location',
			    'desc' => 'Drag the marker to set the exact location',
			    'id' => $prefix . 'location',
			    'type' => 'pw_map',
			    // 'split_values' => true, // Save latitude and longitude as two separate fields
			)
	    );

	    $campus_meta->add_field( array(
			'name'    => 'Map Icon',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => $prefix . 'map_icon',
			'type'    => 'file',
			// Optionally hide the text input for the url:
			'options' => array(
				'url' => false,
			),
		) );

	    
	    $campus_meta->add_field( array(
		    'name'    => 'Campus Contact Name',
		    'desc'    => 'enter the campus contact person name',
		    'id'      => $prefix.'campus_contact',
		    'type'    => 'text'
		) );

		$campus_meta->add_field( array(
		    'name'    => 'Campus Physical Address',
		    'desc'    => 'enter the campus physical address',
		    'id'      => $prefix.'campus_address',
		    'type'    => 'text'
		) );

		$campus_meta->add_field( array(
		    'name'    => 'Campus Telephone Number',
		    'desc'    => 'enter the campus telephone number',
		    'id'      => $prefix.'campus_tel',
		    'type'    => 'text'
		) );

		$campus_meta->add_field( array(
		    'name'    => 'Campus Email',
		    'desc'    => 'enter the campus email address',
		    'id'      => $prefix.'campus_email',
		    'type'    => 'text'
		) );

		$campus_meta->add_field( array(
		    'name' => 'Campus Gallery',
		    'desc' => '',
		    'id'   => $prefix.'campus_gallery',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );

		$campus_meta->add_field( array(
		    'name'     => 'Campus Tag Select',
		    'desc'     => 'select the news & updates tag to show on the page',
		    'id'       => $prefix.'campus_tag',
		    'taxonomy' => 'post_tag', //Enter Taxonomy Slug
		    'type'     => 'taxonomy_select',
		) );

		$building_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'building_metabox',
	        'title'         => __( 'Building Meta', 'cmb2' ),
	        'object_types'  => array( 'buildings', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $building_meta->add_field( array(
		    'name'    => 'Building Header Content',
		    'desc'    => 'enter the building header area content',
		    'id'      => $prefix.'building_header',
		    'type'    => 'textarea'
		) );

	    $building_meta->add_field(
	    	array(
			    'name' => 'Building Location',
			    'desc' => 'Drag the marker to set the exact location',
			    'id' => $prefix . 'location',
			    'type' => 'pw_map',
			    // 'split_values' => true, // Save latitude and longitude as two separate fields
			)
	    );

	     $building_meta->add_field( array(
			'name'    => 'Map Icon',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => $prefix . 'map_icon',
			'type'    => 'file',
			// Optionally hide the text input for the url:
			'options' => array(
				'url' => false,
			),
		) );


		$building_meta->add_field( array(
		    'name' => 'Building Gallery',
		    'desc' => '',
		    'id'   => $prefix.'building_gallery',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );

		$building_meta->add_field( array(
		    'name'    => 'Building Floor Plan',
		    'desc'    => 'Upload the floor plan image',
		    'id'      => $prefix.'building_floorplan',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );



		$room_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'room_metabox',
	        'title'         => __( 'Room Meta', 'cmb2' ),
	        'object_types'  => array( 'rooms', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $room_meta->add_field( array(
		    'name'    => 'Room Header Content',
		    'desc'    => 'enter the room header area content',
		    'id'      => $prefix.'room_header',
		    'type'    => 'textarea'
		) );

		$room_meta->add_field( array(
		    'name'    => 'Room Description',
		    'desc'    => 'enter the room short description',
		    'id'      => $prefix.'room_description',
		    'type'    => 'text'
		) );


		$room_meta->add_field( array(
		    'name' => 'Room Gallery',
		    'desc' => '',
		    'id'   => $prefix.'room_gallery',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );

		$room_meta->add_field( array(
		    'name'    => 'Room Floor Plan',
		    'desc'    => 'Upload the floor plan image',
		    'id'      => $prefix.'room_floorplan',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );


	    $group_field_id = $room_meta->add_field( array(
		    'id'          => $prefix.'floor_plan_group',
		    'type'        => 'group',
		    'description' => __( 'Generates reusable form entries', 'cmb' ),
		    'options'     => array(
		        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Entry', 'cmb' ),
		        'remove_button' => __( 'Remove Entry', 'cmb' ),
		        'sortable'      => true, // beta
		    ),
		) );

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$room_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Title',
		    'id'   => 'title',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$room_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Caption',
		    'id'   => 'caption',
		    'type' => 'textarea_small',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );


		$room_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Image',
		    'id'   => 'name',
		    'type' => 'file',
		) );

		$room_meta->add_group_field( $group_field_id, array(
		    'name'    => 'Select Campus',
		    'desc'    => 'select the campuses the room is available on',
		    'id'      => 'campus_select',
		    'type'    => 'multicheck',
		    'options' => array(
		        'stellenbosch' => 'Stellenbosch',
		        'potchefstroom' => 'Potchefstroom',
		        'port-elizabeth' => 'Port Elizabeth',
		        'pretoria' => 'Pretoria',
		        'bloemfontein' => 'Bloemfontein',
		        'cape-town' => 'Cape Town',
		    )
		) );


	    $features_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'features_metabox',
	        'title'         => __( 'Features Settings', 'cmb2' ),
	        'object_types'  => array( 'features', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $features_meta->add_field( array(
		    'name'    => 'Feature Icon',
		    'desc'    => 'enter the name of the icon',
		    'id'      => $prefix.'feature_icon',
		    'type'    => 'text'
		) );

		p2p_register_connection_type( array(
	        'name' => 'pages_to_features',
	        'from' => 'page',
	        'to' => 'features',
	        'sortable' => 'any'
	    ) );

	    p2p_register_connection_type( array(
	        'name' => 'rooms_to_features',
	        'from' => 'rooms',
	        'to' => 'features',
	        'sortable' => 'any'
	    ) );

	    p2p_register_connection_type( array(
	        'name' => 'campuses_to_buildings',
	        'from' => 'campuses',
	        'to' => 'buildings',
	        'sortable' => 'any'
	    ) );

	    $contact_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'contact_metabox',
	        'title'         => __( 'Contact Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/template-contact.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $group_field_id = $contact_meta->add_field( array(
		    'id'          => $prefix.'contact_group',
		    'type'        => 'group',
		    'description' => __( 'Generates reusable form entries', 'cmb' ),
		    'options'     => array(
		        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Entry', 'cmb' ),
		        'remove_button' => __( 'Remove Entry', 'cmb' ),
		        'sortable'      => true, // beta
		    ),
		) );

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$contact_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Title',
		    'id'   => 'title',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$contact_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Name',
		    'id'   => 'name',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$contact_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Telephone',
		    'id'   => 'telephone',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$contact_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Email',
		    'id'   => 'email',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$contact_meta->add_group_field( $group_field_id, array(
		    'name' => 'Description',
		    'description' => 'Write a short description for this entry',
		    'id'   => 'description',
		    'type' => 'textarea_small',
		) );

	    $documents_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'documents_metabox',
	        'title'         => __( 'Documents Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/template-docs.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $group_field_id = $documents_meta->add_field( array(
		    'id'          => $prefix.'documents_group',
		    'type'        => 'group',
		    'description' => __( 'Add each document here', 'cmb' ),
		    'options'     => array(
		        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Entry', 'cmb' ),
		        'remove_button' => __( 'Remove Entry', 'cmb' ),
		        'sortable'      => true, // beta
		    ),
		) );

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.

		$documents_meta->add_group_field( $group_field_id, array(
		    'name' => 'Document Name',
		    'id'   => 'name',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$documents_meta->add_group_field( $group_field_id, array(
		    'name' => 'File Upload',
		    'id'   => 'file',
		    'type' => 'file',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$documents_meta->add_group_field( $group_field_id, array(
		    'name' => 'Description',
		    'description' => 'Write a short description for this document',
		    'id'   => 'description',
		    'type' => 'textarea_small',
		) );

		$faq_meta = new_cmb2_box( array(
		    'id'            => $prefix . 'faq_metabox',
		    'title'         => __( 'FAQ Meta', 'cmb2' ),
		    'object_types'  => array( 'page', ), // Post type
		    'show_on'      => array( 'key' => 'page-template', 'value' => 'templates/template-faq.php' ),
		    'context'       => 'normal',
		    'priority'      => 'high',
		    'show_names'    => true, // Show field names on the left
		    // 'cmb_styles' => false, // false to disable the CMB stylesheet
		    // 'closed'     => true, // true to keep the metabox closed by default
		) );

	    $group_field_id = $faq_meta->add_field( array(
		    'id'          => $prefix.'faq_group',
		    'type'        => 'group',
		    'description' => __( 'Add each Q&A here', 'cmb' ),
		    'options'     => array(
		        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Entry', 'cmb' ),
		        'remove_button' => __( 'Remove Entry', 'cmb' ),
		        'sortable'      => true, // beta
		    ),
		) );

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.

		$faq_meta->add_group_field( $group_field_id, array(
		    'name' => 'Question',
		    'id'   => 'q',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$faq_meta->add_group_field( $group_field_id, array(
		    'name' => 'Answer',
		    'id'   => 'a',
		    'type' => 'wysiwyg',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
	  
	}

}
global $cpt; 
$cpt = new ckCustomPostTypes(); 

add_action( 'widgets_init', create_function( '', 'register_widget( "PPM_Menu_Widget" );' ) );

class PPM_Menu_Widget extends WP_Widget {
 
	public function __construct() {
		parent::__construct(
	 		'ppm_newsletter_widget', // Base ID
			'PPM Custom Menus Widget', // Name
			array( 'description' => __( 'Custom options to output various menus')) // Args
		);
	}
 
	public function widget( $args, $instance ) {
		extract( $args );
 
		$title = apply_filters( 'widget_title', $instance['title'] );
 
		echo $before_widget;
 
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;

		wp_nav_menu( array('menu_class'=> 'list-group list-group-static','items_wrap'=>'<div id="%1$s" class="list-group list-group-static %2$s">%3$s</div>','menu' => $instance['menu_item'],'link_before' => '','link_after' => '', ) );
 
		echo $after_widget;
	}
 
 	public function form( $instance ) {
 
		$title = isset($instance['title']) ? $instance['title'] : '';
		$menu_item = isset($instance['menu_item']) ? $instance['menu_item'] : '';
		$menus = get_terms('nav_menu');
 
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
 
		<p>
			<label for="<?php echo $this->get_field_id( 'menu_item' ); ?>"><?php _e( 'Select Menu:' ); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'menu_item' ); ?>" name="<?php echo $this->get_field_name( 'menu_item' ); ?>" >
				<?php foreach($menus as $m){
					if ($m->slug == $menu_item)
					{
					echo '<option value="'.$m->slug.'" selected>'.$m->name.'</option>';
					}
					else
					{
					echo '<option value="'.$m->slug.'">'.$m->name.'</option>';
					}
				} ?>
			</select>
		</p>
 
		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {
		$instance = array();
 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['menu_item'] = strip_tags( $new_instance['menu_item'] );
 
		return $instance;
	}
}

