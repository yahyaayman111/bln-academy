<?php
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BLN_THEME_VERSION', '1.0.0' );

function bln_academy_setup() {
    load_theme_textdomain( 'bln-academy' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'elementor', array( 'full-width' ) );
    add_theme_support( 'editor-styles' );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'bln-academy' ),
        'footer-quick' => __( 'Footer Quick Links', 'bln-academy' ),
        'footer-courses' => __( 'Footer Courses', 'bln-academy' ),
        'footer-contact' => __( 'Footer Contact', 'bln-academy' ),
    ) );
}
add_action( 'after_setup_theme', 'bln_academy_setup' );

function bln_academy_enqueue_assets() {
    wp_enqueue_style(
        'bln-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cairo+Play:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&family=Inter+Tight:wght@500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'bln-academy-style',
        get_stylesheet_uri(),
        array( 'bln-google-fonts' ),
        BLN_THEME_VERSION
    );

    wp_enqueue_style(
        'bln-academy-pages',
        get_template_directory_uri() . '/assets/css/pages.css',
        array( 'bln-academy-style' ),
        BLN_THEME_VERSION
    );

    wp_enqueue_script(
        'bln-global',
        get_template_directory_uri() . '/assets/js/bln-global.js',
        array(),
        BLN_THEME_VERSION,
        true
    );

    if ( is_page_template( 'page-courses.php' ) || is_page( 'courses' ) ) {
        wp_enqueue_script(
            'bln-courses',
            get_template_directory_uri() . '/assets/js/bln-courses.js',
            array(),
            BLN_THEME_VERSION,
            true
        );
    }

    wp_enqueue_script(
        'bln-forms',
        get_template_directory_uri() . '/assets/js/bln-forms.js',
        array(),
        BLN_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'bln_academy_enqueue_assets' );

function bln_academy_body_classes( $classes ) {
    if ( is_rtl() ) {
        $classes[] = 'rtl';
    }
    if ( class_exists( '\\Elementor\\Plugin' ) ) {
        $classes[] = 'elementor-enabled';
    }
    return $classes;
}
add_filter( 'body_class', 'bln_academy_body_classes' );

function bln_academy_disable_elementor_header_footer() {
    if ( class_exists( '\\Elementor\\Plugin' ) ) {
        add_filter( 'elementor/theme/do_location/header', '__return_false' );
        add_filter( 'elementor/theme/do_location/footer', '__return_false' );
    }
}
add_action( 'wp', 'bln_academy_disable_elementor_header_footer' );
