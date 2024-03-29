<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class evernet_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'evernet' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'evernet-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'evernet' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'evernet' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style1',
            'options' => [
               'style1' => __( 'Style 1', 'evernet' ),
               'style2' => __( 'Style 2', 'evernet' )
            ],
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'title', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Standard Plan'
         ]
      );

      $this->add_control(
         'desc',
         [
            'label' => __( 'Description', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'condition' => ['style' => 'style2']
         ]
      );

      $this->add_control(
         'icon',
         [
            'label' => __( 'icon', 'evernet' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $this->add_control(
         'price',
         [
            'label' => __( 'Price', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );
      
      $this->add_control(
         'package',
         [
            'label' => __( 'Package', 'evernet' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'Yealry',
            'options' => [
               'Daily'  => __( 'Daily', 'evernet' ),
               'Weekly'  => __( 'Weekly', 'evernet' ),
               'Monthly' => __( 'Monthly', 'evernet' ),
               'Yealry' => __( 'Yealry', 'evernet' ),
               'none' => __( 'None', 'evernet' )
            ],
         ]
      );

      $feature = new \Elementor\Repeater();

      $feature->add_control(
         'feature',
         [
            'label' => __( 'Feature', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( '10 Free Domain Names', 'evernet' )
         ]
      );

      $this->add_control(
         'feature_list',
         [
            'label' => __( 'Feature List', 'evernet' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $feature->get_controls(),
            'default' => [
               [
                  'feature' => __( '5GB Storage Space', 'evernet' )
               ],
               [
                  'feature' => __( '20GB Monthly Bandwidth', 'evernet' )
               ],
               [
                  'feature' => __( 'My SQL Databases', 'evernet' )
               ],
               [
                  'feature' => __( '100 Email Account', 'evernet' )
               ],
               [
                  'feature' => __( '10 Free Domain Names', 'evernet' )
               ]
            ],
            'title_field' => '{{{ feature }}}',
         ]
      );

      $this->add_control(
         'btn_text',
         [
            'label' => __( 'button text', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'subscribe',
         ]
      );

      $this->add_control(
         'btn_url',
         [
            'label' => __( 'button URL', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'recommended',
         [
            'label' => __( 'Recommended', 'evernet' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'evernet' ),
            'label_off' => __( 'Off', 'evernet' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );

      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>
      
      <?php if ( $settings['style'] == 'style1' ){ ?>

      <div class="single-pricing <?php if ( 'on' == $settings['recommended'] ){ echo"active"; }?> text-center">
         <div class="pricing-head mb-30">
             <span><?php echo esc_html( $settings['title'] ); ?></span>
             <h2>$<?php echo esc_html( $settings['price'] ); ?><span>/<?php echo esc_html( $settings['package'] ); ?></span></h2>
         </div>
         <div class="pricing-icon mb-35">
             <img src="<?php echo esc_url( $settings['icon']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
         </div>
         <div class="pricing-list mb-35">
             <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="pricing-btn">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

      <?php } elseif( $settings['style'] == 'style2' ){ ?>

      <div class="single-pricing s-single-pricing active text-center mb-30">
         <div class="pricing-head mb-35">
             <span><?php echo esc_html( $settings['title'] ); ?></span>
             <p><?php echo esc_html( $settings['desc'] ); ?></p>
             <h2  class="price-count">$<?php echo esc_html( $settings['price'] ); ?><span>/<?php echo esc_html( $settings['package'] ); ?></span></h2>
         </div>
         <div class="pricing-list mb-35">
            <ul>
               <?php foreach( $settings['feature_list'] as $index => $feature ) { ?>
                  <li><?php echo $feature['feature'] ?></li>
               <?php } ?>
             </ul>
         </div>
         <div class="s-pricing-btn">
            <a href="<?php echo esc_attr( $settings['btn_url'] ) ?>" class="btn"><?php echo esc_html( $settings['btn_text'] ) ?></a>
         </div>
      </div>

   <?php }

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new evernet_Widget_Pricing );