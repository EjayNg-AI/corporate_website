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


    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );


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

}
add_action( 'after_setup_theme', 'corporate_theme_setup' );

// Prevent WordPress from pulling patterns from the directory
add_filter( 'should_load_remote_block_patterns', '__return_false' );

/**
 * Enqueue scripts and styles
 */
function corporate_theme_scripts() {
    // Theme JavaScript
    wp_enqueue_script( 
        'corporate-theme-script', 
        get_template_directory_uri() . '/assets/js/theme.js', 
        array( 'wp-dom-ready' ), 
        wp_get_theme()->get( 'Version' ), 
        true 
    );

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
    
}
add_action( 'init', 'corporate_theme_register_block_pattern_categories', 6 );

/**
 * Include block patterns
 */
function corporate_theme_load_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        require get_template_directory() . '/patterns/sections.php';
        require get_template_directory() . '/patterns/navigation.php';
    }
}
add_action( 'init', 'corporate_theme_load_patterns', 7 );

// Register custom block styles
function corporate_theme_register_block_styles() {
    if ( function_exists( 'register_block_style' ) ) {
        register_block_style(
            'core/button',
            array(
                'name'  => 'outline',
                'label' => __( 'Outline', 'corporate-theme' ),
            )
        );
    }
}
add_action( 'init', 'corporate_theme_register_block_styles' );

// Dynamic copyright year shortcode
function corporate_theme_current_year_shortcode() {
    return date( 'Y' );
}
add_shortcode( 'current_year', 'corporate_theme_current_year_shortcode' );

// WordPress core already provides header and footer template part areas
// No need to re-register them