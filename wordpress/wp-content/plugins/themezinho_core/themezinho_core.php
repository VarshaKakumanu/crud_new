<?php
/*
Plugin Name: Themezinho Core
Plugin URI: https://themezinho.net
Description: Themezinho Core
Author: Themezinh0
Version: 1.1.0
Author URI: http://themezinho.net
*/

define( "THEMEZINHO_CORE_PATH", plugin_dir_path( __FILE__ ) );
define( "THEMEZINHO_CORE_URI", plugins_url( 'themezinho_core/' ) );
define( "PAGE_BUILDER_GROUP", __( 'uoncorp', 'themezinho' ) );

add_action( 'vc_before_init', 'themezinho_vc_addons' );
/**
 * JS Composer Elements
 */

function themezinho_vc_addons() {
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/header.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/partner.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/label-text-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/section-title.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/image-content-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-content-left.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-content-right.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/icon-flip-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/projects-carousel.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/grid-gallery.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/testimonials.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/recent-news.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/team-member.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/cta-banner.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/contact-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/text-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/progress-bar.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/price-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/office-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/google-map.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/faq.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/side-support-box.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/client.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/press-release.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/image.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/solution-infos.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/solution-gallery.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/solution-sidebar.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/counter.php';
  require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/elements/history-timeline.php';

}

require_once THEMEZINHO_CORE_PATH . '/inc/js_composer/vc_extra_params.php';

/**
 * Include advanced custom field
 */
// 1. customize ACF path
add_filter( 'acf/settings/path', 'themezinho_acf_settings_path' );

function themezinho_acf_settings_path( $path ) {
  $path = THEMEZINHO_CORE_PATH . '/inc/acf/';

  return $path;
}


// 2. customize ACF dir
add_filter( 'acf/settings/dir', 'themezinho_acf_settings_dir' );

function themezinho_acf_settings_dir( $dir ) {
  $dir = THEMEZINHO_CORE_URI . '/inc/acf/';

  return $dir;
}

//Hide ACF field group menu item
add_filter( 'acf/settings/show_admin', '__return_false' );
require THEMEZINHO_CORE_PATH . '/inc/acf/acf.php';

require_once THEMEZINHO_CORE_PATH . '/inc/theme-options.php';

require_once THEMEZINHO_CORE_PATH . '/inc/cpt-taxonomy.php';


function motts_animations() {

  return array(
    'bounce' => 'bounce',
    'flash' => 'flash',
    'pulse' => 'pulse',
    'rubberBand' => 'rubberBand',
    'shake' => 'shake',
    'headShake' => 'headShake',
    'swing' => 'swing',
    'tada' => 'tada',
    'wobble' => 'wobble',
    'jello' => 'jello',
    'bounceIn' => 'bounceIn',
    'bounceInDown' => 'bounceInDown',
    'bounceInLeft' => 'bounceInLeft',
    'bounceInRight' => 'bounceInRight',
    'bounceInUp' => 'bounceInUp',
    'bounceOut' => 'bounceOut',
    'bounceOutDown' => 'bounceOutDown',
    'bounceOutLeft' => 'bounceOutLeft',
    'bounceOutRight' => 'bounceOutRight',
    'bounceOutUp' => 'bounceOutUp',
    'fadeIn' => 'fadeIn',
    'fadeInDown' => 'fadeInDown',
    'fadeInDownBig' => 'fadeInDownBig',
    'fadeInLeft' => 'fadeInLeft',
    'fadeInLeftBig' => 'fadeInLeftBig',
    'fadeInRight' => 'fadeInRight',
    'fadeInRightBig' => 'fadeInRightBig',
    'fadeInUp' => 'fadeInUp',
    'fadeInUpBig' => 'fadeInUpBig',
    'fadeOut' => 'fadeOut',
    'fadeOutDown' => 'fadeOutDown',
    'fadeOutDownBig' => 'fadeOutDownBig',
    'fadeOutLeft' => 'fadeOutLeft',
    'fadeOutLeftBig' => 'fadeOutLeftBig',
    'fadeOutRight' => 'fadeOutRight',
    'fadeOutRightBig' => 'fadeOutRightBig',
    'fadeOutUp' => 'fadeOutUp',
    'fadeOutUpBig' => 'fadeOutUpBig',
    'flipInX' => 'flipInX',
    'flipInY' => 'flipInY',
    'flipOutX' => 'flipOutX',
    'flipOutY' => 'flipOutY',
    'lightSpeedIn' => 'lightSpeedIn',
    'lightSpeedOut' => 'lightSpeedOut',
    'rotateIn' => 'rotateIn',
    'rotateInDownLeft' => 'rotateInDownLeft',
    'rotateInDownRight' => 'rotateInDownRight',
    'rotateInUpLeft' => 'rotateInUpLeft',
    'rotateInUpRight' => 'rotateInUpRight',
    'rotateOut' => 'rotateOut',
    'rotateOutDownLeft' => 'rotateOutDownLeft',
    'rotateOutDownRight' => 'rotateOutDownRight',
    'rotateOutUpLeft' => 'rotateOutUpLeft',
    'rotateOutUpRight' => 'rotateOutUpRight',
    'hinge' => 'hinge',
    'jackInTheBox' => 'jackInTheBox',
    'rollIn' => 'rollIn',
    'rollOut' => 'rollOut',
    'zoomIn' => 'zoomIn',
    'zoomInDown' => 'zoomInDown',
    'zoomInLeft' => 'zoomInLeft',
    'zoomInRight' => 'zoomInRight',
    'zoomInUp' => 'zoomInUp',
    'zoomOut' => 'zoomOut',
    'zoomOutDown' => 'zoomOutDown',
    'zoomOutLeft' => 'zoomOutLeft',
    'zoomOutRight' => 'zoomOutRight',
    'zoomOutUp' => 'zoomOutUp',
    'slideInDown' => 'slideInDown',
    'slideInLeft' => 'slideInLeft',
    'slideInRight' => 'slideInRight',
    'slideInUp' => 'slideInUp',
    'slideOutDown' => 'slideOutDown',
    'slideOutLeft' => 'slideOutLeft',
    'slideOutRight' => 'slideOutRight',
    'slideOutUp' => 'slideOutUp',
    'heartBeat' => 'heartBeat'
  );
}


function ts_get_hero_slider() {
  $args = array(
    'post_type' => 'hero',
    'posts_per_page' => -1,
  );
  $sliders = get_posts( $args );

  $_slider = array();

  if ( count( $sliders ) ) {
    foreach ( $sliders as $slider ) {
      $_slider[ $slider->ID . ' ' . $slider->post_title ] = $slider->ID;
    }
  }

  return $_slider;
}


// default options
function uoncorp_after_import() {

  update_field( 'enable_topbar', 1, 'option' );
  update_field( 'enable_search', 1, 'option' );
  update_field( 'enable_sandwich_menu', 1, 'option' );
  update_field( 'enable_custom_menu', 1, 'option' );


  $social_media = array(
    array(
      'social_icon' => wp_kses_post( '<i class="fa fa-facebook"></i>', 'uoncorp' ),
      'url' => '#',
    ),
    array(
      'social_icon' => wp_kses_post( '<i class="fa fa-twitter"></i>', 'uoncorp' ),
      'url' => '#',
    ),
    array(
      'social_icon' => wp_kses_post( '<i class="fa fa-linkedin"></i>', 'uoncorp' ),
      'url' => '#',
    ),
    array(
      'social_icon' => wp_kses_post( '<i class="fa fa-instagram"></i>', 'uoncorp' ),
      'url' => '#',
    ),
    array(
      'social_icon' => wp_kses_post( '<i class="fa fa-youtube-play"></i>', 'uoncorp' ),
      'url' => '#',
    ),
  );


  $custom_menu = array(
    array(
      'menu' => wp_kses_post( 'EN', 'uoncorp' ),
      'url' => '#',
    ),
    array(
      'menu' => wp_kses_post( 'RU', 'uoncorp' ),
      'url' => '#',
    ),
  );


  update_field( 'social_media', $social_media, 'option' );
  update_field( 'custom_menu', $custom_menu, 'option' );


  update_field( 'topbar_text', wp_kses_post( "Although : no-one wants to be knocked back or told their <u>idea is unworkable</u>" ), 'option' );
  update_field( 'contact_text', wp_kses_post( "<b>UA</b> +38 062 431 8086" ), 'option' );


  update_field( 'archive_show_sidebar', 'no', 'option' );
  update_field( 'archive_strip_content', 'yes', 'option' );

  update_field( 'footer_show_widgets', 1, 'option' );

  update_field( 'footer_widget1_title', wp_kses_post( "address infos" ), 'option' );
  update_field( 'footer_widget1_text', wp_kses_post( "Boryssa Himry 124 B Block Pozniaky IvanaFrankovsk - Ukraine" ), 'option' );
  update_field( 'footer_widget2_title', wp_kses_post( "working hours" ), 'option' );
  update_field( 'footer_widget2_text', wp_kses_post( "Monday to Friday 09:00 to 18:30 and Saturday we work until 15:30" ), 'option' );
  update_field( 'footer_widget3_title', wp_kses_post( "support center" ), 'option' );
  update_field( 'footer_widget3_text', wp_kses_post( "UonCorp is your trusted call service that you can <a href='#'>call</a> or <a href='#'>e-mail</a> us anytime" ), 'option' );

}