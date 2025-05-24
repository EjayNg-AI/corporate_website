<?php
/**
 * Corporate Theme Functions
 *
 * @package Corporate_Theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function corporate_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add support for full and wide align blocks
    add_theme_support( 'align-wide' );

    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'corporate-theme' ),
        'mobile'  => esc_html__( 'Mobile Menu', 'corporate-theme' ),
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ) );

    // Add support for core custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
add_action( 'after_setup_theme', 'corporate_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function corporate_theme_scripts() {
    // Theme stylesheet
    wp_enqueue_style( 
        'corporate-theme-style', 
        get_stylesheet_uri(), 
        array(), 
        wp_get_theme()->get( 'Version' ) 
    );

    // Main theme styles
    wp_enqueue_style( 
        'corporate-theme-main', 
        get_template_directory_uri() . '/assets/css/style.css', 
        array(), 
        wp_get_theme()->get( 'Version' ) 
    );

    // Theme JavaScript
    wp_enqueue_script( 
        'corporate-theme-script', 
        get_template_directory_uri() . '/assets/js/theme.js', 
        array(), 
        wp_get_theme()->get( 'Version' ), 
        true 
    );

    // Add inline script for WordPress admin bar adjustment
    if ( is_admin_bar_showing() ) {
        wp_add_inline_style( 'corporate-theme-main', '
            .header { top: 32px; }
            .mobile-menu { padding-top: 64px; }
            @media screen and (max-width: 782px) {
                .header { top: 46px; }
                .mobile-menu { padding-top: 78px; }
            }
        ' );
    }
}
add_action( 'wp_enqueue_scripts', 'corporate_theme_scripts' );

/**
 * Enqueue editor styles
 */
function corporate_theme_editor_styles() {
    add_editor_style( 'assets/css/style.css' );
}
add_action( 'admin_init', 'corporate_theme_editor_styles' );

/**
 * Register block pattern categories
 */
function corporate_theme_register_block_pattern_categories() {
    // Register pattern categories
    register_block_pattern_category(
        'corporate-theme',
        array( 'label' => esc_html__( 'Corporate Theme', 'corporate-theme' ) )
    );
}
add_action( 'init', 'corporate_theme_register_block_pattern_categories', 8 );

/**
 * Include block patterns
 */
require get_template_directory() . '/patterns/sections.php';
require get_template_directory() . '/patterns/navigation.php';

/**
 * Add custom body classes
 */
function corporate_theme_body_classes( $classes ) {
    // Add class if sidebar is active
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'has-sidebar';
    }

    // Add class for single posts
    if ( is_singular() ) {
        $classes[] = 'singular';
    }

    return $classes;
}
add_filter( 'body_class', 'corporate_theme_body_classes' );

/**
 * Classic theme compatibility functions
 */

// Header function for classic theme support
function corporate_theme_header() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php
}

// Footer function for classic theme support
function corporate_theme_footer() {
    ?>
    <?php wp_footer(); ?>
    </body>
    </html>
    <?php
}

/**
 * Custom template tags
 */
function corporate_theme_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_html( get_the_modified_date() )
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Customizer additions
 */
function corporate_theme_customize_register( $wp_customize ) {
    // Add custom controls here if needed
}
add_action( 'customize_register', 'corporate_theme_customize_register' );