<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) : ?>
  <nav class="nav" data-od-id="main-nav">
    <div class="nav-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" data-od-id="logo">
        <span class="logo-dot"></span>
        <?php bloginfo( 'name' ); ?>
      </a>
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'nav-links',
        'menu_id'        => 'navLinks',
        'fallback_cb'    => 'bln_academy_fallback_nav',
      ) );
      ?>
      <button class="nav-mobile-toggle" id="mobileToggle" aria-label="<?php esc_attr_e( 'القائمة', 'bln-academy' ); ?>" data-od-id="mobile-toggle">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>
<?php endif; ?>
