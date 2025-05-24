<?php
/**
 * Corporate Theme Block Patterns
 *
 * @package Corporate_Theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register block patterns
 */
function corporate_theme_register_patterns() {
    
    // Hero Section Pattern
    register_block_pattern(
        'corporate-theme/hero-section',
        array(
            'title'       => __( 'Hero Section', 'corporate-theme' ),
            'description' => __( 'A hero section with background image, title, subtitle and call-to-action button.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'featured', 'banner' ),
            'content'     => '<!-- wp:group {"className":"hero-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"light-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-section has-light-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:site-logo {"width":200,"isLink":false,"align":"center"} /-->
    
    <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"huge","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"textColor":"white"} -->
    <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-link-color has-huge-font-size" style="margin-top:var(--wp--preset--spacing--40)">Empowering Your Business for the Future</h1>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
    <p class="has-text-align-center has-white-color has-text-color has-link-color">Innovative solutions tailored for your success.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"30px"},"color":{"background":"transparent","text":"#ffffff"},"elements":{"link":{"color":{"text":"#ffffff"}}}},"borderColor":"white"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-text-color has-background has-link-color has-border-color has-white-border-color wp-element-button" href="#contact" style="border-radius:30px;background-color:transparent;color:#ffffff">Get Started</a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
        )
    );

    // Mission Section Pattern
    register_block_pattern(
        'corporate-theme/mission-section',
        array(
            'title'       => __( 'Mission Section', 'corporate-theme' ),
            'description' => __( 'A centered content section for mission statement.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'text' ),
            'content'     => '<!-- wp:group {"className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group section has-light-bg-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","className":"section-title"} -->
    <h2 class="wp-block-heading has-text-align-center section-title">Our Mission</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"section-content"} -->
    <p class="has-text-align-center section-content">We strive to deliver world-class solutions that drive growth, efficiency, and innovation for our clients across the globe.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->',
        )
    );

    // Services Section Pattern
    register_block_pattern(
        'corporate-theme/services-section',
        array(
            'title'       => __( 'Services Section', 'corporate-theme' ),
            'description' => __( 'A section highlighting services offered.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'text' ),
            'content'     => '<!-- wp:group {"className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"light-bg-alt","layout":{"type":"constrained"}} -->
<div class="wp-block-group section has-light-bg-alt-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","className":"section-title"} -->
    <h2 class="wp-block-heading has-text-align-center section-title">What We Offer</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"section-content"} -->
    <p class="has-text-align-center section-content">From strategic consulting to cutting-edge technology implementation, our services are designed to meet the unique needs of every business.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->',
        )
    );

    // Why Choose Us Pattern
    register_block_pattern(
        'corporate-theme/why-choose-section',
        array(
            'title'       => __( 'Why Choose Us Section', 'corporate-theme' ),
            'description' => __( 'A section explaining why to choose your company.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'text' ),
            'content'     => '<!-- wp:group {"className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group section has-light-bg-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","className":"section-title"} -->
    <h2 class="wp-block-heading has-text-align-center section-title">Why Choose Us</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"section-content"} -->
    <p class="has-text-align-center section-content">Our team of experts brings decades of experience, a passion for excellence, and a commitment to your success.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->',
        )
    );

    // Contact Section Pattern
    register_block_pattern(
        'corporate-theme/contact-section',
        array(
            'title'       => __( 'Contact Section', 'corporate-theme' ),
            'description' => __( 'A contact section with anchor link support.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'text', 'call-to-action' ),
            'content'     => '<!-- wp:group {"anchor":"contact","className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"light-bg-alt","layout":{"type":"constrained"}} -->
<div id="contact" class="wp-block-group section has-light-bg-alt-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","className":"section-title"} -->
    <h2 class="wp-block-heading has-text-align-center section-title">Contact Us</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"section-content"} -->
    <p class="has-text-align-center section-content">Ready to take the next step? Reach out to our team today and let\'s build the future together.</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->',
        )
    );

    // Three Column Services Pattern
    register_block_pattern(
        'corporate-theme/three-column-services',
        array(
            'title'       => __( 'Three Column Services', 'corporate-theme' ),
            'description' => __( 'A three-column layout for displaying services.', 'corporate-theme' ),
            'categories'  => array( 'corporate-theme', 'columns' ),
            'content'     => '<!-- wp:group {"className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"light-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group section has-light-bg-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
    <!-- wp:heading {"textAlign":"center","className":"section-title"} -->
    <h2 class="wp-block-heading has-text-align-center section-title">Our Services</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Consulting</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Expert guidance to help you navigate complex business challenges and opportunities.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Implementation</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Seamless deployment of cutting-edge solutions tailored to your specific needs.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Support</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Ongoing assistance to ensure your systems run smoothly and efficiently.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
        )
    );
}
add_action( 'init', 'corporate_theme_register_patterns', 9 );