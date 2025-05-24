<?php
/**
 * The header for our theme
 *
 * @package Corporate_Theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
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

<header class="header">
    <div class="logo">
        <?php
        if ( has_custom_logo() ) :
            the_custom_logo();
        else :
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
            <?php
        endif;
        ?>
    </div>

    <div class="header-right-controls">
        <nav class="nav" aria-label="Main navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>
        
        <button class="hamburger" aria-label="Open menu" aria-controls="mobile-menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <button class="theme-toggle" aria-label="Toggle light/dark mode" title="Toggle light/dark mode">
            &#9790;
        </button>
    </div>
</header>

<div class="overlay"></div>
<nav class="mobile-menu" id="mobile-menu" aria-label="Mobile navigation">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'mobile',
        'menu_id'        => 'mobile-menu-list',
        'container'      => false,
        'fallback_cb'    => false,
    ) );
    ?>
</nav>