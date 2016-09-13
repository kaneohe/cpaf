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