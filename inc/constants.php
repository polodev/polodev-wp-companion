<?php
/**
 * @author  Polodev
 * @since   1.0
 * @version 1.0
 */

namespace ibauthor\Polodev_WP_Companion;

class Constants {

  public static $plugin_prefix;
  public static $widget_prefix;
  public static $plugin_namespace;

  public static $plugin_base_dir;
  public static $plugin_inc_dir;
  public static $plugin_assets_dir;
  public static $plugin_elementor_widgets_dir;
  public static $plugin_templates_dir;
  public static $theme_version;

  public static $plugin_base_url;
  public static $plugin_assets_url;



  public function __construct() {
    self::$plugin_prefix      = 'polodev_wp_companion';
    self::$widget_prefix     = 'themename';
    self::$plugin_namespace  = __NAMESPACE__ . '\\';

    // directory
    self::$plugin_base_dir    = plugin_dir_path(dirname(__FILE__));
    self::$plugin_inc_dir    = self::$plugin_base_dir . 'inc/';
    self::$plugin_elementor_widgets_dir    = self::$plugin_base_dir . 'elementor/widgets/';
    self::$plugin_assets_dir    = self::$plugin_base_dir . 'assets/';

    // url
    self::$plugin_base_url    = plugin_dir_url(dirname(__FILE__));
    self::$plugin_assets_url    = self::$plugin_base_url . 'assets/';

    $theme_data = wp_get_theme( get_template() );
    self::$theme_version     = ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' );

  }
}

new Constants;
