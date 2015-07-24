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
												'editor',
												'thumbnail'
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
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'template-contact.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

		  
	}

}
global $cpt; 
$cpt = new ckCustomPostTypes(); 
