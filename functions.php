<?php
/**
 * enqueue parent theme style to child theme
 */
function child_theme_enqueue_style() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
    	get_stylesheet_directory_uri() . '/style.css',
    	array( $parent_style ),
    	wp_get_theme()->get('Version')
    );

    wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array($parent_style), wp_get_theme()->get('Version'));

    wp_enqueue_script('jquery');

    wp_enqueue_script('custom-javascript', get_stylesheet_directory_uri().'/assets/js/custom.js', array('jquery'),'', true);

    wp_localize_script('custom-javascript', 'myAjax' ,array('ajax_url'=> admin_url( 'admin-ajax.php') ) );

}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_style' );

//$src = get_stylesheet_directory_uri();
require_once(get_stylesheet_directory().'/includes/custom-posts.php');

/*-----------------------------------------------------------------
----------------implementing ajax in load more button -------------
------------------------------------------------------------------*/
add_action("wp_ajax_show_more_posts", "show_more_posts");
add_action("wp_ajax_nopriv_show_more_posts", "show_more_posts");
function show_more_posts(){
	$current_page = $_POST['current_page'];
	$next_page = $current_page + 1 ;;
	$vehicles = new WP_Query( array(
		'post_type' => 'vehicle',
		'paged' => $next_page,
		'post_status' => 'publish',
		'orderby' => 'ID',
		'order' => 'ASC',
		//'posts_per_page' => 1,
	) );	
	
	if($vehicles->have_posts()){
		ob_start();
		while($vehicles->have_posts()):
				$vehicles->the_post();
				echo '<h1>'.get_the_title(). '</h1>';
				the_post_thumbnail();
				the_content();
		endwhile;
			
		  $vehicles = ob_get_clean();
		 
	wp_reset_postdata();
	wp_send_json( array ('result' =>$vehicles,'current_page' => $next_page ) );
	}
	else{
		wp_send_json(array('result' => 'NO MORE POSTS'));	
	}
	die();
}
/*-----------------------------------------------------------------
----------------implementing infinite scroll ----------------------
------------------------------------------------------------------*/
add_action("wp_ajax_load_posts", "load_posts");
add_action("wp_ajax_nopriv_load_posts", "load_posts");
function load_posts(){
	$current_page = $_POST['current_page'];
	$next_page = $current_page + 1 ;
	$magazines = new WP_Query( array(
		'post_type' => 'magazine',
		'paged' => $next_page,
		'post_status' => 'publish',
		'orderby' => 'ID',
		'order' => 'ASC',
		//'posts_per_page' => 1,
	) );	
	
	if($magazines->have_posts()){
		ob_start();
		while($magazines->have_posts()):
				$magazines->the_post();
				echo '<h1>'.get_the_title(). '</h1>';
				the_post_thumbnail();
				the_content();
		endwhile;
			
		  $magazines = ob_get_clean();
		 
	wp_reset_postdata();
	wp_send_json( array ('output' =>$magazines,'current_page' => $next_page ) );
	}
	else{
		wp_send_json(array('output' => 'NO MORE POSTS'));	
	}
	die();
}