<?php
/**
 * Susty WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Susty
 */

if ( ! function_exists( 'susty_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function susty_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Susty WP, use a find and replace
		 * to change 'susty' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'susty', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'susty' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'susty_custom_background_args', array(
			'default-color' => 'fffefc',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'susty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function susty_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'susty_content_width', 640 );
}
add_action( 'after_setup_theme', 'susty_content_width', 0 );

/**
 * Enqueue scripts and styles.+
 */
function susty_scripts() {
	wp_enqueue_style( 'susty-style', get_stylesheet_uri() , '', '1.0.8');

    wp_enqueue_script('script', get_template_directory_uri() . '/scripts.js', array(), '1.0.8', true);

	wp_deregister_script( 'wp-embed' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'susty_scripts' );

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';


require_once( get_template_directory() . '/cptui/post_types.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	//require get_template_directory() . '/inc/jetpack.php';
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function susty_nav_rewrite_rule() {
	add_rewrite_rule( 'menu', 'index.php?menu=true', 'top' );
}

add_action( 'init', 'susty_nav_rewrite_rule' );

function susty_register_query_var( $vars ) {
	$vars[] = 'menu';

	return $vars;
}

add_filter( 'query_vars', 'susty_register_query_var' );

add_filter( 'template_include', function( $path ) {
	if ( get_query_var( 'menu' ) ) {
		return get_template_directory() . '/menu.php';
	}
	return $path;
});

// Remove dashicons in frontend for unauthenticated users
add_action( 'wp_enqueue_scripts', 'susty_dequeue_dashicons' );
function susty_dequeue_dashicons() {
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}




// Add Header Menus
function register_menus() {
	register_nav_menu( 'main-menu', __( 'Main Menu', 'postlight-headless-wp' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'postlight-headless-wp' ) );
}

add_action( 'after_setup_theme', 'register_menus' );



/**
 * Register Blocks
 */
function register_acf_block_types() {


}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

/*

function my_acf_block_render_callback( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/{$slug}.php") );
	}
}
*/

//Disable gutenberg style in Front
/*
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
*/



function misha_allowed_block_types( $allowed_blocks ) {

	return [
       
 //       'acf/grid-element',
//	    'core/heading',
//        'core/block',
	   // 'core/paragraph',
		//'acf/accordion-image',
		//'acf/gallery',
		//'acf/job',
		//'acf/message',
		//'acf/project',
		//'acf/stage',
		//'acf/tiles',
    ];

//    core/shortcode
//    core/image
//    core/gallery
//    core/heading
//    core/quote
//    core/embed
//    core/list
//    core/separator
//    core/more
//    core/button
//    core/pullquote
//    core/table
//    core/preformatted
//    core/code
//    core/html
//    core/freeform
//    core/latest-posts
//    core/categories
//    core/cover (previously core/cover-image)
//    core/text-columns
//    core/verse
//    core/video
//    core/audio
//    core/block
//    core/paragraph
//    core-embed/twitter
//    core-embed/youtube
//    core-embed/facebook
//    core-embed/instagram
//    core-embed/wordpress
//    core-embed/soundcloud
//    core-embed/spotify
//    core-embed/flickr
//    core-embed/vimeo
//    core-embed/animoto
//    core-embed/cloudup
//    core-embed/collegehumor
//    core-embed/dailymotion
//    core-embed/funnyordie
//    core-embed/hulu
//    core-embed/imgur
//    core-embed/issuu
//    core-embed/kickstarter
//    core-embed/meetup-com
//    core-embed/mixcloud
//    core-embed/photobucket
//    core-embed/polldaddy
//    core-embed/reddit
//    core-embed/reverbnation
//    core-embed/screencast
//    core-embed/scribd
//    core-embed/slideshare
//    core-embed/smugmug
//    core-embed/speaker
//    core-embed/ted
//    core-embed/tumblr
//    core-embed/videopress
//    core-embed/wordpress-tv

}

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );

if (isset($_SERVER['HTTP_HOST']) && (
	stripos($_SERVER['HTTP_HOST'], "127.0.0.1") !== false ||
	stripos($_SERVER['HTTP_HOST'], "localhost") !== false ||
	stripos($_SERVER['HTTP_HOST'], "::1") !== false
)
) {
function livereload_scripts()
{
	wp_register_script('livereload', 'http://localhost:35728/livereload.js?snipver=1', null, false, true);
	wp_enqueue_script('livereload');
}

add_action('wp_enqueue_scripts', 'livereload_scripts');
}



add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
    wp_dequeue_style( 'wp-block-library' ); // WordPress core
    wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
    wp_dequeue_style( 'wc-block-style' ); // WooCommerce
    wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

function add_block_editor_assets(){
    wp_enqueue_style('style', get_stylesheet_directory_uri()  . '/style.css', array(), '1.0.3' );
  }
  
  add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);

/**
 * Enqueue block editor CSS
 */
function cssforcustomblocks_editor_scripts() {

    // Make paths variables so we don't write em twice ;)
    $editorStylePath = '/template-parts/block/editor.css';

    // Enqueue optional editor only styles
    wp_enqueue_style(
        'custom-blocks-editor-css',
        get_stylesheet_directory_uri() . $editorStylePath,
        [  'wp-edit-blocks' ],
        filemtime( get_template_directory() . $editorStylePath )
    );

}
// Hook scripts function into block editor hook
//add_action( 'enqueue_block_editor_assets', 'cssforcustomblocks_editor_scripts' );




add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
	add_image_size( 'teaser-image', 700,700 ); 
	show_admin_bar(false);

}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}



/**
 * Configure MAILER
 */
add_action('phpmailer_init', 'mailer_config');
function mailer_config(PHPMailer $mailer)
{
    if (defined('XAI_MAIL_HOST')) {
        $mailer->IsSMTP();
        $mailer->SMTPAutoTLS = false; // docker specific
        $mailer->Host = XAI_MAIL_HOST;
        $mailer->Port = XAI_MAIL_PORT;
        $mailer->SMTPAuth = true;
        $mailer->Username = XAI_MAIL_USER;
        $mailer->Password = XAI_MAIL_PASSWORD;
        $mailer->SMTPDebug = 0;
        $mailer->CharSet = "utf-8";
    }
}

add_filter('acf/load_field/name=select_post_type', 'yourprefix_acf_load_post_types');
/*
 *  Load Select Field `select_post_type` populated with the value and labels of the singular 
 *  name of all public post types
 */
function yourprefix_acf_load_post_types( $field ) {

    $choices = get_post_types( array( 	'show_in_nav_menus' => true,
										'_builtin' => false,
										'public' => true ), 'objects' );

    foreach ( $choices as $post_type ) :
        $field['choices'][$post_type->name] = $post_type->labels->singular_name;
    endforeach;
    return $field;
}