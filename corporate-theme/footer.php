<?php
/**
 * The template for displaying the footer
 *
 * @package Corporate_Theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<footer class="footer">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> | 123 Business Avenue, City, Country | info@corporate.com | +1 (555) 123-4567</p>
</footer>

<?php wp_footer(); ?>

</body>
</html>