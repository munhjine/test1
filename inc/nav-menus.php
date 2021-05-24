<?php

if( ! function_exists( 'agensy_register_nav_menus' ) ) {
	/**
	 * Register required nav menus
	 */
	function agensy_register_nav_menus() {

		register_nav_menus( array(
			'header' => esc_html__( 'Main menu',  'agensy' ),
		) );
		
		register_nav_menus( array(
			'footer' => esc_html__( 'Footer menu',  'agensy' ),
		) );

	}
	add_action( 'after_setup_theme', 'agensy_register_nav_menus' );
}