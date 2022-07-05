<?php

use ibauthor\Polodev_WP_Companion\Constants;

/*
Plugin Name: Polodev WP Companion Lash
Plugin URI: https://www.github.com/polodev/polodev-wp-companion-lash
Description: Polodev WP companion plugin for Lash website
Version: 1.0.0
Author: Shibu deb polo
Author URI: https://www.github.com/polodev
*/
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'POLODEV_WP_COMPANION_LASH' ) ) {
  define( 'POLODEV_WP_COMPANION_LASH',                   ( WP_DEBUG ) ? time() : '1.0' );
}

class Polodev_Wp_Companion {

  public $plugin  = 'polodev-wp-companion';
  public $plugin_dir;
  public function __construct() {
    $this->plugin_dir      = __DIR__;
    $this->includes();
    $prefix = Constants::$plugin_prefix;
    add_action( 'after_setup_theme', array( $this, 'elementor_widgets' ) );
  }
  public function includes()
  {
    require $this->plugin_dir . '/inc/constants.php';
    require $this->plugin_dir . '/inc/helpers.php';
    require $this->plugin_dir . '/inc/scripts.php';
    require $this->plugin_dir . '/inc/elementor_helper_trait.php';
  }



  public function load_textdomain() {
    load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
  }


  public function elementor_widgets(){
    if ( did_action( 'elementor/loaded' ) ) {
      require_once 'elementor/init.php';
    }
  }

}

function polodev_wp_companion_admin_notice() {
  $msg = sprintf( esc_html__( 'Error: Your current PHP version is %1$s. You need at least PHP version 5.3+" to work. Please ask your hosting provider to upgrade your PHP version into 5.3+', 'polodev-wp-companion' ), PHP_VERSION );
  echo '<div class="error"><p>' . $msg . '</p></div>';
}

if ( version_compare( PHP_VERSION, '5.6', '>=' ) ) {
  new Polodev_Wp_Companion();
}
else {
  add_action( 'admin_notices',  'polodev_wp_companion_admin_notice' );
}

