<?php 
/**
 * register custom post type vehicles
 */
add_action( 'init', 'vehicles_post_type_init' );
/**
 * Register a vehicle post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function vehicles_post_type_init() {
	$labels = array(
		'name'               => _x( 'Vehicles', 'post type general name', 'twenty-seventeen-child' ),
		'singular_name'      => _x( 'vehicle', 'post type singular name', 'twenty-seventeen-child' ),
		'menu_name'          => _x( 'Vehicles', 'admin menu', 'twenty-seventeen-child' ),
		'name_admin_bar'     => _x( 'vehicle', 'add new on admin bar', 'twenty-seventeen-child' ),
		'add_new'            => _x( 'Add New', 'vehicle', 'twenty-seventeen-child' ),
		'add_new_item'       => __( 'Add New vehicle', 'twenty-seventeen-child' ),
		'new_item'           => __( 'New vehicle', 'twenty-seventeen-child' ),
		'edit_item'          => __( 'Edit vehicle', 'twenty-seventeen-child' ),
		'view_item'          => __( 'View vehicle', 'twenty-seventeen-child' ),
		'all_items'          => __( 'All Vehicles', 'twenty-seventeen-child' ),
		'search_items'       => __( 'Search Vehicles', 'twenty-seventeen-child' ),
		'parent_item_colon'  => __( 'Parent Vehicles:', 'twenty-seventeen-child' ),
		'not_found'          => __( 'No Vehicles found.', 'twenty-seventeen-child' ),
		'not_found_in_trash' => __( 'No Vehicles found in Trash.', 'twenty-seventeen-child' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'twenty-seventeen-child' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'vehicle' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'vehicle', $args );
}

//create axonomy for vehicle post type
// hook into the init action and call create_vehicle_taxonomy when it fires
add_action( 'init', 'create_vehicle_taxonomy', 0 );

// create two taxonomies, Brand and writers for the post type "book"
function create_vehicle_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Brand', 'taxonomy general name', 'twenty-seventeen-child' ),
		'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'twenty-seventeen-child' ),
		'search_items'      => __( 'Search Brand', 'twenty-seventeen-child' ),
		'all_items'         => __( 'All Brand', 'twenty-seventeen-child' ),
		'parent_item'       => __( 'Parent Brand', 'twenty-seventeen-child' ),
		'parent_item_colon' => __( 'Parent Brand:', 'twenty-seventeen-child' ),
		'edit_item'         => __( 'Edit Brand', 'twenty-seventeen-child' ),
		'update_item'       => __( 'Update Brand', 'twenty-seventeen-child' ),
		'add_new_item'      => __( 'Add New Brand', 'twenty-seventeen-child' ),
		'new_item_name'     => __( 'New Brand Name', 'twenty-seventeen-child' ),
		'menu_name'         => __( 'Brand', 'twenty-seventeen-child' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'brand' ),
	);

	register_taxonomy( 'brand', array( 'vehicle' ), $args );	
}

//----------------------------------------------------------------------------------
//----------------------------------------------------------------------------------
/**
 * register custom post type magazines
 */
add_action( 'init', 'magazines_post_type_init' );
/**
 * Register a vehicle post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function magazines_post_type_init() {
	$labels = array(
		'name'               => _x( 'Magazines', 'post type general name', 'twenty-seventeen-child' ),
		'singular_name'      => _x( 'Magazine', 'post type singular name', 'twenty-seventeen-child' ),
		'menu_name'          => _x( 'Magazines', 'admin menu', 'twenty-seventeen-child' ),
		'name_admin_bar'     => _x( 'Magazine', 'add new on admin bar', 'twenty-seventeen-child' ),
		'add_new'            => _x( 'Add New', 'Magazine', 'twenty-seventeen-child' ),
		'add_new_item'       => __( 'Add New Magazine', 'twenty-seventeen-child' ),
		'new_item'           => __( 'New Magazine', 'twenty-seventeen-child' ),
		'edit_item'          => __( 'Edit Magazine', 'twenty-seventeen-child' ),
		'view_item'          => __( 'View Magazine', 'twenty-seventeen-child' ),
		'all_items'          => __( 'All Magazines', 'twenty-seventeen-child' ),
		'search_items'       => __( 'Search Magazines', 'twenty-seventeen-child' ),
		'parent_item_colon'  => __( 'Parent Magazines:', 'twenty-seventeen-child' ),
		'not_found'          => __( 'No Magazines found.', 'twenty-seventeen-child' ),
		'not_found_in_trash' => __( 'No Magazines found in Trash.', 'twenty-seventeen-child' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'twenty-seventeen-child' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'magazine' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-id-alt',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'magazine', $args );
}