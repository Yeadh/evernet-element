<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class evernet_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'evernet' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'evernet-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'evernet' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'style',
         [
            'label' => __( 'Banner Style', 'evernet' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'saas',
            'options' => [
               'saas' => __( 'SaaS', 'evernet' ),
               'hrmanagement' => __( 'HR Management', 'evernet' ),
               'digitalmarketing' => __( 'Digital Marketing', 'evernet' ),
               'accountsbilling' => __( 'Accounts Billing', 'evernet' ),
               'how_we_work' => __( 'How we work', 'evernet' ),
            ],
         ]
      );


      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Banner image', 'evernet' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Thinking Software High Quality','evernet')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing seddo eiumod tempor incididunt labore dolore','evernet')
         ]
      );

      $this->add_control(
         'btn_text', [
            'label' => __( 'Text', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('get started','evernet')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'URL', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'btn_text2', [
            'label' => __( 'Text', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('contact us','evernet')
         ]
      );

      $this->add_control(
         'btn_url2', [
            'label' => __( 'URL', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <?php if ( $settings['style'] == 'saas' ){ ?>
        <!-- slider-area -->
        <section class="slider-area slider-bg" data-background="<?php echo esc_url( $settings['banner_image']['url'] ) ?>">
            <div class="container">
                <div class="slider-overflow">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="slider-content mt-15">
                                <h2><?php echo $settings['title'] ?></h2>
                                <p><?php echo esc_html( $settings['description'] ) ?></p>
                                <a class="btn" href="#">Start now</a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 d-none d-lg-block">
                            <div class="slider-img animate-slider-img position-relative ml-50">
                                <img src="<?php echo get_template_directory_uri() ?>/images/slider_img01.png" alt="img" class="slider-main-img">
                                <img src="<?php echo get_template_directory_uri() ?>/images/board_img.png" alt="img">
                                <img src="<?php echo get_template_directory_uri() ?>/images/man_img.png" alt="img">
                                <div class="img-nth-four"><img src="<?php echo get_template_directory_uri() ?>/images/cog_img1.png" alt="img" class="rotateme"></div>
                                <div class="img-nth-five"><img src="<?php echo get_template_directory_uri() ?>/images/cog_img2.png" alt="img" class="rotateme"></div>
                                <img src="<?php echo get_template_directory_uri() ?>/images/cog_img3.png" alt="img">
                                <img src="<?php echo get_template_directory_uri() ?>/images/cog_img4.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-shape s-shape-one"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape01.png" alt="img"></div>
            <div class="slider-shape s-shape-two"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape03.png" alt="img"></div>
            <div class="slider-shape s-shape-three"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape02.png" alt="img"></div>
            <div class="slider-shape s-shape-four"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape04.png" alt="img"></div>
            <div class="slider-shape s-shape-five"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape05.png" alt="img"></div>
            <div class="slider-shape s-shape-six"><img src="<?php echo get_template_directory_uri() ?>/images/slider_shape06.png" alt="img"></div>
        </section>
        <!-- slider-area-end -->
      <?php } elseif( $settings['style'] == 'hrmanagement' ){ ?>
        
      <section class="slider-area s-slider-bg fix">
        <div class="container">
            <div class="s-slider-overflow">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="slider-content s-slider-content mt-60">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo esc_html( $settings['title'] ) ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.4s"><?php echo esc_html( $settings['description'] ) ?></p>
                            <a href="<?php echo esc_url( $settings['btn_url'] ) ?>" class="btn wow fadeInLeft" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text'] ) ?></a>
                            <a href="<?php echo esc_url( $settings['btn_url2'] ) ?>" class="btn wow fadeInRight" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text2'] ) ?></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="s-slider-img position-relative wow fadeInRight" data-wow-delay="0.6s">
                            <img src="<?php echo esc_url( $settings['banner_image']['url'] ) ?>" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="s-slider-shape s-slider-shape-one wow fadeIn" data-wow-delay="1s"><img src="<?php echo get_template_directory_uri() ?>/images/s_slider_shape01.png" alt="img" data-parallax='{"x": 150}'></div>
        <div class="s-slider-shape s-slider-shape-two wow fadeIn" data-wow-delay="1s"><img src="<?php echo get_template_directory_uri() ?>/images/s_slider_shape02.png" alt="img" data-parallax='{"y": -150}'></div>
      </section>

      <?php } elseif( $settings['style'] == 'digitalmarketing' ){ ?>

      <section class="slider-area slider-bg fix digital-slider-bg" data-background="<?php echo esc_url( $settings['banner_image']['url'] ) ?>">
          <div class="container">
              <div class="digital-slider-overflow">
                  <div class="row">
                      <div class="col-xl-6 col-lg-7 col-md-11">
                          <div class="slider-content digital-slider-content mt-95">
                              <h2 class="wow slideInLeft" data-wow-delay="0.2s"><?php echo $settings['title'] ?></h2>
                              <p class="wow slideInLeft" data-wow-delay="0.4s"><?php echo esc_html( $settings['description'] ) ?></p>
                              <a href="#" class="btn wow fadeInUp" data-wow-delay="0.6s">Start now</a>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                          <div class="slider-img digital-animate-slider-img position-relative">
                              <img src="<?php echo get_template_directory_uri() ?>/images/digital_slider_img.png" alt="img" class="digital-slider-main-img">
                              <img src="<?php echo get_template_directory_uri() ?>/images/digi_phone.png" alt="img" class="digital-slider-phone wow slideInDown" data-wow-delay="0.6s">
                              <div class="digital-slider-man" data-wow-delay="0.8s"><img src="<?php echo get_template_directory_uri() ?>/images/digi_man.png" alt="img" class="alltuchtopdown wow" data-wow-delay="1.2s"></div>
                              <div class="wow slideInRightDigi digital-slider-cog" data-wow-delay="1s"><img src="<?php echo get_template_directory_uri() ?>/images/digi_cog.png" alt="img" class="rotateme"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <?php } elseif( $settings['style'] == 'accountsbilling' ){ ?>

      <section class="slider-area t-slider-bg fix">
              <div class="container">
                  <div class="s-slider-overflow t-slider-overflow">
                      <div class="row justify-content-center text-center">
                          <div class="col-lg-10">
                              <div class="slider-content s-slider-content">
                                 <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo esc_html( $settings['title'] ) ?></h2>
                                  <a href="<?php echo esc_url( $settings['btn_url'] ) ?>" class="btn wow fadeInLeft" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text'] ) ?></a>
                                  <a href="<?php echo esc_url( $settings['btn_url2'] ) ?>" class="btn wow fadeInRight" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text2'] ) ?></a>
                              </div>
                              <div class="t-slider-img wow fadeInUp" data-wow-delay="0.8s">
                                  <img src="<?php echo esc_url( $settings['banner_image']['url'] ) ?>" class="alltuchtopdown" alt="img">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

      <?php } elseif( $settings['style'] == 'how_we_work' ){ ?>
          <!-- how-we-wrok -->
          <section class="how-we-work hww-bg">
              <div class="container">
                  <div class="row">
                      <div class="col-12 text-center">
                          <div class="hww-content">
                              <h2><?php echo esc_html( $settings['title'] ) ?></h2>
                          </div>
                          <div class="hww-img">
                              <img src="<?php echo esc_url( $settings['banner_image']['url'] ) ?>" alt="img">
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- how-we-wrok-end -->
      <?php } ?>

      
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new evernet_Widget_Banner );