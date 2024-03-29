<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Accordion
class evernet_Widget_Accordion extends Widget_Base {
 
   public function get_name() {
      return 'accordion';
   }
 
   public function get_title() {
      return esc_html__( 'Accordion', 'evernet' );
   }
 
   public function get_icon() { 
        return 'eicon-accordion';
   }
 
   public function get_categories() {
      return [ 'evernet-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'accordion_section',
         [
            'label' => esc_html__( 'Accordion', 'evernet' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $accordion = new \Elementor\Repeater();

      $accordion->add_control(
         'title', [
            'label' => __( 'Title', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );
      $accordion->add_control(
         'text', [
            'label' => __( 'Text', 'evernet' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'accordion_list',
         [
            'label' => __( 'Accordion list', 'evernet' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $accordion->get_controls(),
            'default' => [
               [
                  'title' => __( 'Lorem ipsum dummy text used here?', 'evernet' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'evernet' )
               ],
               [
                  'title' => __( 'Why i should buy this Theme?', 'evernet' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'evernet' )
               ],
               [
                  'title' => __( 'Can i change any elements easilly?', 'evernet' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'evernet' )
               ]
            ],
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.

      $randID = wp_rand();

      $settings = $this->get_settings_for_display(); ?>


      <div class="row">
        <div class="col-12">
          <div class="faq-wrapper-padding">
              <div class="faq-wrapper">
                  <div class="accordion" id="accordionExample<?php echo $randID ?>">
                    <?php if ( $settings['accordion_list'] ) {
                    foreach (  $settings['accordion_list'] as $key => $accordion ) { ?>

                      <div class="card">
                          <div class="card-header" id="heading<?php echo $key.$randID ?>">
                              <h5 class="mb-0">
                                  <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $key.$randID ?>"
                                      aria-expanded="false" aria-controls="collapse<?php echo $key.$randID ?>">
                                      <?php echo esc_html( $accordion['title'] ); ?>
                                  </a>
                              </h5>
                          </div>
                          <div id="collapse<?php echo $key.$randID ?>" class="collapse" aria-labelledby="heading<?php echo $key.$randID ?>" data-parent="#accordionExample<?php echo $randID ?>">
                              <div class="card-body">
                                  <p><?php echo esc_html( $accordion['text'] ); ?></p>
                              </div>
                          </div>
                      </div>

                      <?php } 
                    } ?>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <!-- faq-area-end -->
      <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new evernet_Widget_Accordion );