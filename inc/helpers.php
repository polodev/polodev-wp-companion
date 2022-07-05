<?php
/**
 * @author  Polodev
 * @since   1.0
 * @version 1.0
 */

namespace ibauthor\Polodev_WP_Companion;

class Helpers {
  public static function get_asset_file($file) {
    return Constants::$plugin_assets_url . $file;
  }
}