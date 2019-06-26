<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class sassbeyond_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'sassbeyond' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'sassbeyond-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner 1', 'sassbeyond' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Banner image', 'sassbeyond' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Get the Apps & Enjoy!','sassbeyond')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipxumd dummy text are used in this industry. So replace your orginal text. Lorem dummy','sassbeyond')
         ]
      );


      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('DOWNLOAD','sassbeyond')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'sassbeyond' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
      'app_mockup',
        [
          'label' => __( 'App Mockup', 'sassbeyond' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- banner-area -->
      <section class="banner-area banner-bg d-flex align-items-center p-relative" data-background="<?php echo $settings['banner_image'][url] ?>">
          <div id="particles-js"></div>
          <div class="container">
              <div class="row align-items-center justify-content-between">
                  <div class="col-lg-6">
                      <div class="banner-content">
                          <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo esc_html($settings['title']); ?></h2>
                          <p class="wow fadeInUp" data-wow-delay="0.4s"><?php echo esc_html($settings['description']); ?></p>
                          <a href="<?php echo esc_url($settings['btn_url']); ?>" class="banner-btn wow fadeInUp" data-wow-delay="0.6s"><?php echo esc_html($settings['btn_text']); ?> <i class="arrow_down"></i></a>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                      <div class="banner-app wow fadeInRight" data-wow-delay="0.4s">
                          <img src="<?php echo $settings['app_mockup'][url] ?>" alt="img">
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- banner-area-end -->
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new sassbeyond_Widget_Banner );