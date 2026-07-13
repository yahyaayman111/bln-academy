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

<?php
function bln_academy_fallback_nav() {
  echo '<ul class="nav-links" id="navLinks">';
  echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'الرئيسية', 'bln-academy' ) . '</a></li>';
  echo '<li><a href="' . esc_url( home_url( '/courses' ) ) . '">' . esc_html__( 'الكورسات', 'bln-academy' ) . '</a></li>';
  echo '<li><a href="' . esc_url( home_url( '/about' ) ) . '">' . esc_html__( 'عن الأكاديمية', 'bln-academy' ) . '</a></li>';
  echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">' . esc_html__( 'اتصل بنا', 'bln-academy' ) . '</a></li>';
  echo '<li><a href="' . esc_url( home_url( '/register' ) ) . '" class="nav-cta">' . esc_html__( 'سجّل الآن', 'bln-academy' ) . '</a></li>';
  echo '</ul>';
}
