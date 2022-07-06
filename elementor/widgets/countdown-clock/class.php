<?php
namespace ibauthor\Polodev_WP_Companion;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) exit; // Exit if accessed directly
class CountdownClock extends Widget_Base
{
  use ElementorHelperTrait;
  public function get_name()
  {
    return 'countdown-clock';
  }
  public function get_title()
  {
    return __('Countdown Clock', 'polodev-wp-companion');
  }
  public function get_icon()
  {
    return 'eicon-countdown';
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
      'date',
      [
        'label' => __('Date Time', 'polodev-wp-companion'),
        'type' => Controls_Manager::TEXT,
        'label_block' => false,
        'default' => '07/27/2021',
        'placeholder' => esc_html__( 'Date format will be month/day/year ', 'polodev-wp-companion' ),
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
