<?php
/**
 * Custom Header functionality for Twenty Fifteen
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses twentyfifteen_header_style()
 */
function twentyfifteen_custom_header_setup() {
	$color_scheme       = twentyfifteen_get_color_scheme();
	$default_text_color = trim( $color_scheme[4], '#' );

	add_theme_support(
		'custom-header',
		/**
		 * Filters Twenty Fifteen custom-header support arguments.
		 *
		 * @since Twenty Fifteen 1.0
		 *
		 * @param array $args {
		 *     An array of custom-header support arguments.
		 *
		 *     @type string $default_text_color Default color of the header text.
		 *     @type int    $width              Width in pixels of the custom header image. Default 954.
		 *     @type int    $height             Height in pixels of the custom header image. Default 1300.
		 *     @type string $wp-head-callback   Callback function used to styles the header image and text
		 *                                      displayed on the blog.
		 * }
		 */
		apply_filters(
			'twentyfifteen_custom_header_args',
			array(
				'default-text-color' => $default_text_color,
				'width'              => 954,
				'height'             => 1300,
				// 'flex-height'		 => true,
				// 'flex-height'		 => true,
				'wp-head-callback'   => 'twentyfifteen_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'twentyfifteen_custom_header_setup' );

if ( ! function_exists( 'twentyfifteen_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @see twentyfifteen_custom_header_setup()
	 */
	function twentyfifteen_header_style() {
		$header_image = get_header_image();

		// If no custom options for text are set, let's bail.
		if ( empty( $header_image ) && display_header_text() ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css" id="twentyfifteen-header-css">
		<?php

		// Has a Custom Header been added?
		if ( ! empty( $header_image ) ) :
			?>
			.top-header {

				/*
				* No shorthand so the Customizer can override individual properties.
				* @see https://core.trac.wordpress.org/ticket/31460
				*/
				/* background-image: url(<?php header_image(); ?>);
				background-size: contain;
				background-repeat: no-repeat;
				width: 100%;
				height: 0;
				padding-top: 66.64%; */
				/* background-position: 50% 50%;
				-webkit-background-size: cover;
				-moz-background-size:    cover;
				-o-background-size:      cover;
				background-size:         cover; */
			}

			<?php
		endif;
		?>
		</style>
		<?php
	}
endif; // twentyfifteen_header_style()
?>