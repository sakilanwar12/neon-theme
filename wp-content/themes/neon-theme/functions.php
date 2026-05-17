<?php
/**
 * NEON THEME functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NEON_THEME
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function neon_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on NEON THEME, use a find and replace
		* to change 'neon-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'neon-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'neon-theme' ),
			'social'  => esc_html__( 'Social Menu', 'neon-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'neon_theme_custom_background_args',
			array(
				'default-color' => '0b0f1a',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'neon_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function neon_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'neon_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'neon_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function neon_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'neon-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'neon-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'neon_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function neon_theme_scripts() {
	// Enqueue main neon styles
	wp_enqueue_style( 'neon-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'neon-theme-style', 'rtl', 'replace' );

	// Enqueue neon component styles
	wp_enqueue_style( 'neon-components', get_template_directory_uri() . '/neon-style.css', array(), _S_VERSION );

	// Enqueue responsive styles
	wp_enqueue_style( 'neon-responsive', get_template_directory_uri() . '/assets/css/neon-responsive.css', array(), _S_VERSION );

	// Enqueue Google Fonts (Inter and Poppins)
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap', array(), null );

	// Enqueue navigation script
	wp_enqueue_script( 'neon-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Enqueue main neon script
	wp_enqueue_script( 'neon-theme-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'neon_theme_scripts' );

/**
 * Register Custom Post Type: Projects
 */
function neon_theme_register_cpt_projects() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'neon-theme' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'neon-theme' ),
		'menu_name'             => __( 'Projects', 'neon-theme' ),
		'name_admin_bar'        => __( 'Project', 'neon-theme' ),
		'archives'              => __( 'Project Archives', 'neon-theme' ),
		'attributes'            => __( 'Project Attributes', 'neon-theme' ),
		'parent_item_colon'     => __( 'Parent Project:', 'neon-theme' ),
		'all_items'             => __( 'All Projects', 'neon-theme' ),
		'add_new_item'          => __( 'Add New Project', 'neon-theme' ),
		'add_new'               => __( 'Add New', 'neon-theme' ),
		'new_item'              => __( 'New Project', 'neon-theme' ),
		'edit_item'             => __( 'Edit Project', 'neon-theme' ),
		'update_item'           => __( 'Update Project', 'neon-theme' ),
		'view_item'             => __( 'View Project', 'neon-theme' ),
		'view_items'            => __( 'View Projects', 'neon-theme' ),
		'search_items'          => __( 'Search Project', 'neon-theme' ),
		'not_found'             => __( 'Not found', 'neon-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'neon-theme' ),
		'featured_image'        => __( 'Featured Image', 'neon-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'neon-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'neon-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'neon-theme' ),
		'insert_into_item'      => __( 'Insert into project', 'neon-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'neon-theme' ),
		'items_list'            => __( 'Projects list', 'neon-theme' ),
		'items_list_navigation' => __( 'Projects list navigation', 'neon-theme' ),
		'filter_items_list'     => __( 'Filter projects list', 'neon-theme' ),
	);

	$args = array(
		'label'               => __( 'Projects', 'neon-theme' ),
		'labels'              => $labels,
		'description'         => __( 'Portfolio projects', 'neon-theme' ),
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'projects' ),
		'capability_type'     => 'post',
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => 6,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
		'menu_icon'           => 'dashicons-format-gallery',
		'show_in_rest'        => true,
		'rest_base'           => 'projects',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	);

	register_post_type( 'projects', $args );
}
add_action( 'init', 'neon_theme_register_cpt_projects' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

