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


    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
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
    ) );

    // Prevent WordPress from pulling patterns from the directory
    add_filter( 'should_load_remote_block_patterns', '__return_false' );

}
add_action( 'after_setup_theme', 'corporate_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function corporate_theme_scripts() {
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
        wp_add_inline_style( 'wp-block-library', '
            .header { top: 32px; }
            @media screen and (max-width: 782px) {
                .header { top: 46px; }
            }
        ' );
    }
}
add_action( 'wp_enqueue_scripts', 'corporate_theme_scripts' );

/**
 * Register block pattern categories
 */
function corporate_theme_register_block_pattern_categories() {
    register_block_pattern_category(
        'corporate-theme',
        array( 'label' => esc_html__( 'Corporate Theme', 'corporate-theme' ) )
    );
    
    register_block_pattern_category(
        'banner',
        array( 'label' => esc_html__( 'Banner', 'corporate-theme' ) )
    );
    
    register_block_pattern_category(
        'featured',
        array( 'label' => esc_html__( 'Featured', 'corporate-theme' ) )
    );
    
    register_block_pattern_category(
        'columns',
        array( 'label' => esc_html__( 'Columns', 'corporate-theme' ) )
    );
}
add_action( 'init', 'corporate_theme_register_block_pattern_categories', 8 );

/**
 * Include block patterns
 */
if ( function_exists( 'register_block_pattern' ) ) {
    require get_template_directory() . '/patterns/sections.php';
    require get_template_directory() . '/patterns/navigation.php';
}

// WordPress core already provides header and footer template part areas
// No need to re-register them