<?php
/**
 * Mist website functions and definitions
 *
 * @package Mist
 * @since Mist 1.0
 */
 
 if ( ! defined( '_S_VERSION' ) ) {
    define( '_S_VERSION', wp_get_theme()->get( 'Version' ) );
}

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 1600; /* pixels */
 
if ( ! function_exists( 'mist_setup' ) ) :
    /** 
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function mist_setup() {
    
        load_theme_textdomain( 'mist', get_template_directory() . '/languages' );
    
        // Add default posts and comments RSS feed links to <head>.
        add_theme_support( 'automatic-feed-links' );
    
        /* HTML5 */
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

        /*
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support( 'title-tag' );

        // Enable support for post thumbnails and featured images.
        add_theme_support( 'post-thumbnails' );
    
        // Add support for two custom navigation menus.
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'mist' ),
            'secondary' => __('Secondary Menu', 'mist' )
        ) );
    
        // Enable support for the following post formats:
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        
        add_post_type_support('page', 'excerpt');
    }
endif; // setup
add_action( 'after_setup_theme', 'mist_setup' );

// Enqueue scripts and styles.
function mist_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/bootstrap.min.css', array(), '5.3.3' );
    wp_enqueue_script( 'bs-plugins', get_template_directory_uri() . '/dist/js/bs-plugins.min.js', array(), _S_VERSION, true );
    wp_enqueue_style( 'mist', get_template_directory_uri() .'/dist/style.min.css', array(), _S_VERSION );
    wp_enqueue_script( 'mist', get_template_directory_uri() . '/dist/js/main.min.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'mist_scripts' );

function google_fonts_prefetch() {

    echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com/" >';
}
add_action( 'wp_head', 'google_fonts_prefetch' );

function google_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Muli:wght@300;400;600;700&family=Pridi:wght@300;400;500&display=swap', array(), null);
} 
add_action('wp_enqueue_scripts', 'google_fonts');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's 5 dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

// Excerpt length 
function my_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'my_excerpt_length');

function mist_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'mist' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Appears on blog posts and pages.', 'mist' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'mist_widgets_init' );

function mist_site_title_shortcode() {
    return esc_html( get_bloginfo( 'name' ) );
}
add_shortcode( 'site_title', 'mist_site_title_shortcode' );


// Disable Yoast SEO plugin @Person schema on posts
add_filter( 'wpseo_schema_needs_author', '__return_false' );

// Disable Yoast SEO plugin meta name author on posts
add_filter( 'wpseo_meta_author', '__return_false' );

/**
 * Remove author from the Yoast SEO plugin @Article schema
 *
 * @param array $graph_piece Yoast schema pieces.
 *
 * @return array
 */
function remove_author_wpseo_article_schema( $graph_piece ) {
    unset( $graph_piece['author'] );
	return $graph_piece;
}

add_filter( 'wpseo_schema_article', 'remove_author_wpseo_article_schema' );

// Removing oEmbed links in head
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

// Removing shortlink in head
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

// Removing rest API links in head
remove_action( 'wp_head', 'rest_output_link_wp_head');

// Removing rest API links in head EditURI/RSD (Really Simple Discovery) link
remove_action('wp_head', 'rsd_link');

// Remove WordPress version meta tag
remove_action('wp_head', 'wp_generator');

function custom_asset_versioning($src) {
    $url = parse_url($src);
    $path = $_SERVER['DOCUMENT_ROOT'] . $url['path'];

    if (file_exists($path)) {
        $version = filemtime($path); // last modified timestamp
        return remove_query_arg('ver', $src) . '?v=' . $version;
    }

    return $src;
}
add_filter('style_loader_src', 'custom_asset_versioning');
add_filter('script_loader_src', 'custom_asset_versioning');
