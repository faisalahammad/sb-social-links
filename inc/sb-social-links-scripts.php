<?php

function sbsl_assets() {
	wp_enqueue_style( 'sbsl-stylesheet', plugins_url() . '/sb-social-links/css/style.css', null, time() );

	wp_enqueue_script( 'sbsl-script', plugins_url() . '/sb-social-links/js/main.js', null, time(), true );
}

add_action( 'wp_enqueue_scripts', 'sbsl_assets' );