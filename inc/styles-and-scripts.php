<?php

if( ! function_exists( 'agensy_google_fonts_url' ) ) {
	/*
	* Register Google Font Family
	*/
	function agensy_google_fonts_url() {
		$fonts_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		$fjalla_one = _x( 'on', 'Fjalla One: on or off', 'agensy' );
		$poppins = _x( 'on', 'Poppins font: on or off', 'agensy' );
		$dancing_script = _x( 'on', 'Dancing Script: on or off', 'agensy' );

		if ( 'off' !== $fjalla_one || 'off' !== $poppins  || 'off' !== $dancing_script ) {

			$font_families = array();

			if ( 'off' !== $fjalla_one ) {
				$font_families[] = 'Fjalla One';
			}

			if ( 'off' !== $dancing_script ) {
				$font_families[] = 'Dancing Script';
			}

			if ( 'off' !== $poppins ) {
				$font_families[] = 'Poppins:400,600,800';
			}

			$f_query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin-ext' ),
			);
			$fonts_url = add_query_arg( $f_query_args, '//fonts.googleapis.com/css' );

		}

		return esc_url_raw( $fonts_url );
	}

}

if ( ! function_exists( 'agensy_enqueue_styles_and_scripts' ) ) {
	/**
	 * This function enqueues the required css and js files.
	 *
	 * @return void
	 */
	function agensy_enqueue_styles_and_scripts() {
		/**
		 * Enqueue css files.
		 */
		wp_enqueue_style( 'agensy-bundle', get_template_directory_uri() . '/css/bundle.min.css' );
		wp_enqueue_style( 'bootsrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'agensy-main-style', get_template_directory_uri() . '/css/style.css' );
		wp_enqueue_style( 'agensy-stylesheet', get_stylesheet_uri() );
		wp_add_inline_style( 'agensy-stylesheet', agensy_dynamic_css() );

		/**
		 * Enqueue javascript files.
		 */

		wp_enqueue_script( 'comments', get_template_directory_uri() . '/js/comments.js', array(), false, false );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'agensy-bundle', get_template_directory_uri() . '/js/bundle.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'agensy-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		$data = array(
			'pre_loader_typewriter' => [],
			'audio_source' => '',
			'enable_sound_bar' => false
		);

		if( agensy_get_option( 'enable_preloader' ) ) {
			$typewriter_text = [];
			$text_rotater = agensy_get_option( 'pre_loader_text_rotater' );
			if( $text_rotater ) {
				foreach ( $text_rotater as $rotater ) {
					$typewriter_text[] = esc_html( $rotater['title'] );
				}
			}
			$data['pre_loader_typewriter'] = $typewriter_text;
		}

		$comment_data = array(
			'name'      => esc_html__( 'Name is required', 'agensy' ),
			'email'     => esc_html__( 'Email is required', 'agensy' ),
			'comment'   => esc_html__( 'Comment is required', 'agensy' ),

		);

		wp_localize_script( 'agensy-scripts', 'data', $data );
		wp_localize_script( 'comments', 'comment_data', $comment_data );
	}

	add_action( 'wp_enqueue_scripts', 'agensy_enqueue_styles_and_scripts', 10 );
}

if( !function_exists( 'agensy_dynamic_css' ) ) {
	function agensy_dynamic_css() {

		$styles = '';
		if( agensy_get_option( 'logo_height' ) ) {
			$logo_height = str_replace(' ', '', agensy_get_option( 'logo_height' ) );
			$logo_height = str_replace('px', '', $logo_height);
			$styles .= "
				body .navbar > .logo img{
					height: {$logo_height}px;
				}
			";
		}
		if( agensy_get_option( 'enable_dynamic_color' ) ) {

			$site_color = ( agensy_get_option( 'theme_color' ) ) ? agensy_get_option( 'theme_color' ) : '#33a16e';
			$body_bg_color = ( agensy_get_option( 'body_background_color' ) ) ? agensy_get_option( 'body_background_color' ) : '#131314';

			$styles .= "
				main{
					background: {$body_bg_color} !important;
				}
				.page-header,
				.left-side-content,
				.left-side-content:before,
				.left-side-content:after,
				.right-side-image figcaption img,
				.masonry .masonry-grid .masonry-gallery,
				.team,
				.blog-post .post-content .post-title a:hover,
				.blog-post .post-content .post-categories li a:hover,
				.blog-post .post-content blockquote,
				.map:after,
				.map .map-note,
				.footer
				{
					background-color: {$site_color} !important;
				}
				
				.blog-post .post-content .post-title a:hover
				{
				  color: {$site_color} !important;
				}
				
				
			";
		}

		return $styles;
	}
}

add_action( 'init', 'agensy_dynamic_css' );
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);