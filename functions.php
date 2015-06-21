<?php
/**
 * themesco functions and definitions
 *
 * @package themesco
 */

if ( ! function_exists( 'themesco_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themesco_setup() {
    
    add_image_size( 'latest-thumb', 520, 520, true ); // (cropped)
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on themesco, use a find and replace
	 * to change 'themesco' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'themesco', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Header Menu', 'themesco' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'themesco')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
    
    
    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'themesco_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri().'/img/jumbotron.jpg',
        'default-repeat'         => 'no-repeat',
        'default-position-x'     => 'center',
        'default-attachment'     => 'fixed'
	) ) );
}
endif; // themesco_setup
add_action( 'after_setup_theme', 'themesco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themesco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'themesco_content_width', 640 );
}
add_action( 'after_setup_theme', 'themesco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

require_once ( 'inc/class/themesco-why-section-widget.php');

function themesco_widgets_init() {
    register_widget( 'themesco_why_section_widget' );
    
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'themesco' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    
    register_sidebar( array(
        'name' => __( 'Why Section boxes', 'themesco' ),
        'id' => 'sidebar-2',
    ) );
    
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'themesco' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div class="col-md-4 footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
    
}
add_action( 'widgets_init', 'themesco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function themesco_scripts() {
    
    wp_enqueue_style( 'themesco-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    
	wp_enqueue_style( 'themesco-style', get_stylesheet_uri() );
    
    wp_enqueue_script( 'themesco-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 'v3.3.4', true );

	wp_enqueue_script( 'themesco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'themesco-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themesco_scripts' );


add_action('admin_enqueue_scripts', 'themesco_widget_scripts');
function themesco_widget_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('themesco_why_widget', get_template_directory_uri() . '/js/why-widget.js', array('jquery'), '1.0', true);
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


/* ---------------------------------------------------
-----------------themes custom post type -------------
----------------------------------------------------*/


function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Themes', 'Post Type General Name', 'themesco' ),
		'singular_name'       => _x( 'Theme', 'Post Type Singular Name', 'themesco' ),
		'menu_name'           => __( 'Themes', 'themesco' ),
		'parent_item_colon'   => __( 'Parent Theme', 'themesco' ),
		'all_items'           => __( 'All Themes', 'themesco' ),
		'view_item'           => __( 'View Theme', 'themesco' ),
		'add_new_item'        => __( 'Add New Theme', 'themesco' ),
		'add_new'             => __( 'Add New', 'themesco' ),
		'edit_item'           => __( 'Edit Theme', 'themesco' ),
		'update_item'         => __( 'Update Theme', 'themesco' ),
		'search_items'        => __( 'Search Theme', 'themesco' ),
		'not_found'           => __( 'Not Found', 'themesco' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'themesco' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'themes', 'themesco' ),
		'description'         => __( 'Our awesome themes', 'themesco' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 2,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'themes', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );