<?php
namespace ibauthor\Polodev_WP_Companion;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) exit; // Exit if accessed directly
class Title extends Widget_Base
{
  use ElementorHelperTrait;
  public function get_name()
  {
    return 'advanced-title';
  }
  public function get_title()
  {
    return __('Dhaka Title', 'polodev-wp-companion');
  }
  public function get_icon()
  {
    return 'eicon-site-title';
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
      'title',
      [
        'label' => __('Title', 'polodev-wp-companion'),
        'type' => Controls_Manager::TEXT,
        'label_block' => false,
      ]
    );
    $this->add_control(
      'heading',
      [
        'label' => __('Heading', 'polodev-wp-companion'),
        'type' => Controls_Manager::TEXTAREA,
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
