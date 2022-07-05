<?php
/**
 * @author  Polodev
 * @since   1.0
 * @version 1.0
 */
namespace ibauthor\Polodev_WP_Companion;

trait ElementorHelperTrait
{
  /**
   * @param  $template // "view"
   * @param  $settings // elementor settings
   * @return output buffering
   */
  public function get_template($template, $settings)
  {
    // inside ReflectionClass we are passing object. due to this, its pic that 
    // object exact location
    $directory_path = dirname( ( new \ReflectionClass( $this ) )->getFileName() );
    $file = $directory_path . DIRECTORY_SEPARATOR . $template . '.php';
    ob_start();
    include $file;
    echo ob_get_clean();
  }
}