<?php
/**
 * Template Name: Elementor Full Width
 *
 * Renders the theme header (or the Elementor Theme Builder header) and
 * theme footer (or the Elementor Theme Builder footer), but lets the
 * content area use the full viewport width via the Elementor
 * `content` location.
 *
 * The header/footer conditionals live in header.php / footer.php
 * themselves, so this template simply delegates to them and then
 * outputs the Elementor content.
 *
 * @package BLN_Academy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="main" class="site-main elementor-full-width">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'content' ) ) {
                the_content();
            }
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
