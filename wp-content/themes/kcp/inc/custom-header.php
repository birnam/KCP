<?php
/**
 * Implement a custom header for KCP
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package KCP
 * @subpackage 1.0
 */

/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses kcp_header_style() to style front-end.
 * @uses kcp_admin_header_style() to style wp-admin form.
 * @uses kcp_admin_header_image() to add custom markup to wp-admin form.
 * @uses register_default_headers() to set up the bundled header images.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '220e10',
		'default-image'          => '%s/images/headers/kcp_header1.jpg',

		// Set height and width, with a maximum value for the width.
		'height'                 => 230,
		'width'                  => 1600,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'kcp_header_style',
		'admin-head-callback'    => 'kcp_admin_header_style',
		'admin-preview-callback' => 'kcp_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'kcp_header1' => array(
			'url'           => '%s/images/headers/kcp_header1.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header1_thumbnail.jpg',
			'description'   => _x( 'kcp_header1', 'header image description', 'kcp' )
		),
		'kcp_header2' => array(
			'url'           => '%s/images/headers/kcp_header2.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header2_thumbnail.jpg',
			'description'   => _x( 'kcp_header2', 'header image description', 'kcp' )
		),
		'kcp_header4' => array(
			'url'           => '%s/images/headers/kcp_header4.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header4_thumbnail.jpg',
			'description'   => _x( 'kcp_header4', 'header image description', 'kcp' )
		),
		'kcp_header5' => array(
			'url'           => '%s/images/headers/kcp_header5.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header5_thumbnail.jpg',
			'description'   => _x( 'kcp_header5', 'header image description', 'kcp' )
		),
		'kcp_header6' => array(
			'url'           => '%s/images/headers/kcp_header6.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header6_thumbnail.jpg',
			'description'   => _x( 'kcp_header6', 'header image description', 'kcp' )
		),
		'kcp_header7' => array(
			'url'           => '%s/images/headers/kcp_header7.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header7_thumbnail.jpg',
			'description'   => _x( 'kcp_header7', 'header image description', 'kcp' )
		),
		'kcp_header8' => array(
			'url'           => '%s/images/headers/kcp_header8.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header8_thumbnail.jpg',
			'description'   => _x( 'kcp_header8', 'header image description', 'kcp' )
		),
		'kcp_header9' => array(
			'url'           => '%s/images/headers/kcp_header9.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header9_thumbnail.jpg',
			'description'   => _x( 'kcp_header9', 'header image description', 'kcp' )
		),
		'kcp_header10' => array(
			'url'           => '%s/images/headers/kcp_header10.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header10_thumbnail.jpg',
			'description'   => _x( 'kcp_header10', 'header image description', 'kcp' )
		),
		'kcp_header11' => array(
			'url'           => '%s/images/headers/kcp_header11.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header11_thumbnail.jpg',
			'description'   => _x( 'kcp_header11', 'header image description', 'kcp' )
		),
		'kcp_header12' => array(
			'url'           => '%s/images/headers/kcp_header12.jpg',
			'thumbnail_url' => '%s/images/headers/kcp_header12_thumbnail.jpg',
			'description'   => _x( 'kcp_header12', 'header image description', 'kcp' )
		)
	) );
}
add_action( 'after_setup_theme', 'kcp_custom_header_setup', 11 );

/**
 * Load our special font CSS files.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_custom_header_fonts() {
	// Add Source Sans Pro and Bitter fonts.
	wp_enqueue_style( 'kcp-fonts', kcp_fonts_url(), array(), null );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'kcp_custom_header_fonts' );

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: Hide text (returns 'blank'), or any hex value.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="kcp-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) 50% 100% no-repeat;
			background-size: cover;
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
			if ( empty( $header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php
			endif;

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

/**
 * Style the header image displayed on the Appearance > Header admin panel.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="kcp-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') 50% 100% no-repeat; background-size: 1600px auto;';
		} ?>
		padding: 0 20px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 230px;';
		} ?>
		width: 100%;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>
	#headimg h1 {
		font: bold 60px/1 Bitter, Georgia, serif;
		margin: 0;
		padding: 58px 0 10px;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h1 a:hover {
		text-decoration: underline;
	}
	#headimg h2 {
		font: 200 italic 24px "Source Sans Pro", Helvetica, sans-serif;
		margin: 0;
		text-shadow: none;
	}
	.default-header img {
		max-width: 230px;
		width: auto;
	}
	</style>
<?php
}

/**
 * Output markup to be displayed on the Appearance > Header admin panel.
 *
 * This callback overrides the default markup displayed there.
 *
 * @since KCP 1.0
 *
 * @return void
 */
function kcp_admin_header_image() {
	?>
	<div id="headimg" style="background: url(<?php header_image(); ?>) 50% 100% no-repeat; background-size: cover;">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
	</div>
<?php }
