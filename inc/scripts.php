<?php
/**
 * @author  Polodev
 * @since   1.0
 * @version 1.0
 */

namespace ibauthor\Polodev_WP_Companion;

class Scripts {
  public function __construct()
  {
    // Register widget scripts
    // add_action('elementor/frontend/after_register_scripts', [$this, 'scripts_for_elementor'], 100);
    // add_action('elementor/frontend/after_enqueue_styles', [$this, 'styles_for_elementor'], 100);
    add_action('wp_enqueue_scripts', [$this, 'plugin_scripts']);
    add_action('wp_enqueue_scripts', [$this, 'plugin_styles']);
  }
  public function plugin_scripts()
  {
    $plugin_prefix = Constants::$plugin_prefix;
    wp_enqueue_script( 'popper.js', Helpers::get_asset_file( 'js/popper.min.js'  ), ['jquery'], false, true );
    wp_enqueue_script( 'bootstrap', Helpers::get_asset_file( 'js/bootstrap.min.js'  ), ['jquery'], false, true );
    wp_enqueue_script( $plugin_prefix . '-frontend', Helpers::get_asset_file( 'js/script.js'  ), ['jquery'], false, true );
  }
  public function plugin_styles()
  {
    $plugin_prefix = Constants::$plugin_prefix;
    wp_enqueue_style( 'font-awesome-4', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style( 'animate', Helpers::get_asset_file( 'css/animate.css' ));
    wp_enqueue_style( 'bootstrap', Helpers::get_asset_file( 'css/bootstrap.min.css' ));
    wp_enqueue_style( $plugin_prefix . '-style', Helpers::get_asset_file( 'css/style.css' ));
    wp_enqueue_style( $plugin_prefix . '-custom-styles', Helpers::get_asset_file( 'css/custom-style.css' ));
  }

}

new Scripts;