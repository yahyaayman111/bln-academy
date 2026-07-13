<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

  <footer class="footer" data-od-id="footer">
    <div class="footer-inner">
      <div>
        <div class="footer-brand"><?php bloginfo( 'name' ); ?></div>
        <p class="footer-desc"><?php bloginfo( 'description' ); ?></p>
      </div>
      <div class="footer-col">
        <h4><?php esc_html_e( 'روابط سريعة', 'bln-academy' ); ?></h4>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'footer-quick',
          'container'      => false,
          'fallback_cb'    => false,
          'depth'          => 1,
        ) );
        ?>
      </div>
      <div class="footer-col">
        <h4><?php esc_html_e( 'الكورسات', 'bln-academy' ); ?></h4>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'footer-courses',
          'container'      => false,
          'fallback_cb'    => false,
          'depth'          => 1,
        ) );
        ?>
      </div>
      <div class="footer-col">
        <h4><?php esc_html_e( 'تواصل معنا', 'bln-academy' ); ?></h4>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'footer-contact',
          'container'      => false,
          'fallback_cb'    => false,
          'depth'          => 1,
        ) );
        ?>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'جميع الحقوق محفوظة.', 'bln-academy' ); ?></span>
      <span><?php esc_html_e( 'صُنع بشغف', 'bln-academy' ); ?> <a href="#"><?php esc_html_e( 'ما وراء الأرقام', 'bln-academy' ); ?></a></span>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
