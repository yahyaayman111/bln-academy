<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'content' ) ) : ?>
    <?php the_content(); ?>
  <?php endif; ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
