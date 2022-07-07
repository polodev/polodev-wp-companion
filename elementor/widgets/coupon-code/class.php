<?php
namespace ibauthor\Polodev_WP_Companion;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) exit; // Exit if accessed directly
class CouponCode extends Widget_Base
{
  use ElementorHelperTrait;
  public function get_name()
  {
    return 'coupon-code';
  }
  public function get_title()
  {
    return __('Coupon Code', 'polodev-wp-companion');
  }
  public function get_icon()
  {
    return 'eicon-editor-code';
  }
  public function get_categories()
  {
    return [ 'general' ];
  }
  protected function register_controls()
  {
    $this->start_controls_section(
      'section_content',
      [
        'label' => __('Content', 'polodev-wp-companion'),
      ]
    );
    $this->add_control(
      'coupon_code',
      [
        'label' => __('Coupon Code', 'polodev-wp-companion'),
        'type' => Controls_Manager::TEXT,
        'label_block' => false,
        'default' => 'LASH50',
      ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $template = "view";
    $this->get_template( $template, $settings );
  }
}
