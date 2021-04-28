<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );	

		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css', array(), $css_version );
		wp_enqueue_style( 'lightgallery-styles', get_template_directory_uri() . '/css/lightgallery.min.css', array(), $css_version );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );


		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );

		wp_enqueue_script( 'lightgallery-scripts', get_template_directory_uri() . '/js/lightgallery.min.js', array(), $js_version, true );
		wp_enqueue_script( 'lightgallery-thumbnail-scripts', get_template_directory_uri() . '/js/lg-thumbnail.min.js', array(), $js_version, true );
		wp_enqueue_script( 'lightgallery-fullscreen-scripts', get_template_directory_uri() . '/js/lg-fullscreen.min.js', array(), $js_version, true );
		wp_enqueue_script( 'lightgallery-zoom-scripts', get_template_directory_uri() . '/js/lg-zoom.min.js', array(), $js_version, true );

		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
