<?php
/**
 * EBC Kings Mountain, NC functions and definitions
 *
 * @package EBC Kings Mountain, NC
 */

define( 'EBC_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ebckm_2014_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ebckm_2014_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EBC Kings Mountain, NC, use a find and replace
		 * to change 'ebckm-2014' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'ebckm-2014', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'ebckm-2014' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Setup the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'ebckm_2014_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
	}
endif; // ebckm_2014_setup.
add_action( 'after_setup_theme', 'ebckm_2014_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ebckm_2014_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ebckm-2014' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
}
add_action( 'widgets_init', 'ebckm_2014_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ebckm_2014_scripts() {
	wp_enqueue_style( 'webfonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Slabo+13px' );
	wp_enqueue_style( 'ebckm-2014-style', get_stylesheet_directory_uri() . '/style.min.css', array(), EBC_THEME_VERSION );

	wp_enqueue_script( 'ebckm-2014-navigation', get_template_directory_uri() . '/js/navigation.js', array(), EBC_THEME_VERSION, true );

	$stickup = '$(document).ready( function() {
	  $(".site-header").stickUp();
	});';
	wp_enqueue_script( 'stick-up', get_template_directory_uri() . '/js/stickUp.min.js', array( 'jquery' ), EBC_THEME_VERSION, true );
	wp_add_inline_script( 'stick-up', $stickup, 'after' );

	wp_enqueue_script( 'ebckm-2014-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), EBC_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'ebckm_2014_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom image size for featured images.
 */
add_image_size( 'page_header', '2400', '400' );
add_image_size( 'page_header_tall', '2400', '800' );
add_image_size( 'home_quick_link', '600', '600' );
add_image_size( 'opengraph', 1200, 630, true );
add_image_size( 'opengraph-m', 1800, 945, true );

/**
 * Use full-size sermon category image instead of letting it pick up the 75x75 image from the page content
 *
 * @param  WPSEO_OpenGraph_Image $image WPSEO_OpenGraph_Image object.
 *
 * @return void Modifies the WPSEO_OpenGraph_Image object.
 */
function ebc_sermon_opengraph_images( WPSEO_OpenGraph_Image $image ) {
	if ( is_singular( 'wpfc_sermon' ) ) {
		ob_start();
		render_sermon_image( 'opengraph-m' );
		$thumbnail_html = ob_get_clean();

		preg_match( '/src="(.+?)"/', $thumbnail_html, $thumbnail_url );
		$image->add_image( $thumbnail_url[1] );
	}
}
add_action( 'wpseo_add_opengraph_images', 'ebc_sermon_opengraph_images' );
