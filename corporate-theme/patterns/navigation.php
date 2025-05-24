<?php
/**
 * Navigation Block Pattern
 *
 * @package Corporate_Theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register navigation patterns
 */
function corporate_theme_register_navigation_patterns() {
    
    // Main Navigation Pattern
    register_block_pattern(
        'corporate-theme/main-navigation',
        array(
            'title'       => __( 'Main Navigation with Dropdowns', 'corporate-theme' ),
            'description' => __( 'A navigation menu with dropdown support for desktop and mobile.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'header' ),
            'content'     => '<!-- wp:navigation {"overlayMenu":"mobile","className":"nav","style":{"spacing":{"blockGap":"0"}},"fontSize":"medium"} -->
<!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"About","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-submenu {"label":"Services","url":"#","kind":"custom","isTopLevelLink":true} -->
<!-- wp:navigation-link {"label":"Consulting","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- wp:navigation-link {"label":"Implementation","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- wp:navigation-link {"label":"Support","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- /wp:navigation-submenu -->
<!-- wp:navigation-submenu {"label":"Solutions","url":"#","kind":"custom","isTopLevelLink":true} -->
<!-- wp:navigation-link {"label":"Cloud","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- wp:navigation-link {"label":"On-Premise","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- wp:navigation-link {"label":"Hybrid","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- /wp:navigation-submenu -->
<!-- wp:navigation-submenu {"label":"Resources","url":"#","kind":"custom","isTopLevelLink":true} -->
<!-- wp:navigation-link {"label":"Blog","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- wp:navigation-link {"label":"Case Studies","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- wp:navigation-link {"label":"Webinars","url":"#","kind":"custom","isTopLevelLink":false} /-->
<!-- /wp:navigation-submenu -->
<!-- wp:navigation-link {"label":"Contact","url":"#contact","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->',
        )
    );

    // Simple Navigation Pattern
    register_block_pattern(
        'corporate-theme/simple-navigation',
        array(
            'title'       => __( 'Simple Navigation', 'corporate-theme' ),
            'description' => __( 'A simple navigation menu without dropdowns.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'header' ),
            'content'     => '<!-- wp:navigation {"overlayMenu":"mobile","className":"nav","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"medium"} -->
<!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"About","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Services","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Contact","url":"#contact","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->',
        )
    );

    // Footer Navigation Pattern
    register_block_pattern(
        'corporate-theme/footer-navigation',
        array(
            'title'       => __( 'Footer Navigation', 'corporate-theme' ),
            'description' => __( 'A horizontal navigation menu for the footer.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'footer' ),
            'content'     => '<!-- wp:navigation {"overlayMenu":"never","className":"footer-nav","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"small","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:navigation-link {"label":"Privacy Policy","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Terms of Service","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Contact","url":"#contact","kind":"custom","isTopLevelLink":true} /-->
<!-- wp:navigation-link {"label":"Sitemap","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->',
        )
    );
}
add_action( 'init', 'corporate_theme_register_navigation_patterns', 9 );