<?php
/**
 * Template Name: Elementor Canvas
 *
 * Blank canvas template for Elementor — no header, no footer, no
 * theme chrome. Renders the Elementor `content` location only.
 *
 * Used when a page should be entirely composed of an Elementor
 * template (landing pages, sales pages, custom layouts).
 *
 * @package BLN_Academy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'elementor-page-canvas' ); ?>>
<?php wp_body_open(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        if ( function_exists( 'elementor_theme_do_location' ) ) {
            elementor_theme_do_location( 'content' );
        } else {
            the_content();
        }
    endwhile;
endif;
?>

<?php wp_footer(); ?>
</body>
</html>
