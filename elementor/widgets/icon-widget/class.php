<?php
namespace ibauthor\Polodev_WP_Companion;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) exit; // Exit if accessed directly
class IconWidget extends Widget_Base
{
  use ElementorHelperTrait;
  public function get_name()
  {
    return 'lash-icon-widget';
  }
  public function get_title()
  {
    return __('Lash Icon Widget', 'polodev-wp-companion');
  }
  public function get_icon()
  {
    return 'eicon-instagram-likes';
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
      'icon',
      [
        'label' => esc_html__( 'Icon', 'polodev-wp-companion' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
          'value' => 'fas fa-circle',
          'library' => 'fa-solid',
        ],
        'recommended' => [
          'fa-solid' => [
            'circle',
            'dot-circle',
            'square-full',
          ],
          'fa-regular' => [
            'circle',
            'dot-circle',
            'square-full',
          ],
        ],
      ]
    );
    $this->add_control(
      'title',
      [
        'label' => esc_html__( 'Title', 'polodev-wp-companion' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'Subtitle', 'polodev-wp-companion' ),
        'placeholder' => esc_html__( 'Type your title here', 'polodev-wp-companion' ),
      ]
    );
    $this->add_control(
      'subtitle',
      [
        'label' => esc_html__( 'Title', 'polodev-wp-companion' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'Title', 'polodev-wp-companion' ),
        'placeholder' => esc_html__( 'Type your title here', 'polodev-wp-companion' ),
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
