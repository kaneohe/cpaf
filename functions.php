<?php
function enqueue_scripts() {
	wp_deregister_style( 'main-stylesheet' );
	wp_enqueue_style( 'googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans' );
	wp_enqueue_style( 'cpaf', 
		get_stylesheet_directory_uri() . '/style.css', 
		array( 'googlefont' ), 
		wp_get_theme()->get('Version'), 
		'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Callback function to insert 'styleselect' into the $buttons array
if ( ! function_exists( 'my_mce_buttons_2' ) ) :
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');
endif;

// Callback function to filter the MCE settings
if ( ! function_exists( 'my_mce_before_init_insert_formats' ) ) :

function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Orange Button',  
			'inline' => 'span',  
			'classes' => 'orange-button',
			'wrapper' => false,
			
		),
		array(
			'title' => 'Green Button',
			'inline' => 'span',
			'classes' => 'green-button',
			'wrapper' => false,
		)
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  
endif;


// Enable custom style sheet for TinyMCE (wysiwyg)
if ( ! function_exists( 'my_theme_add_editor_styles' ) ) :
function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
endif;
?>