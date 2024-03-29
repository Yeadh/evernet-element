<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class evernet_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'evernet' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'evernet-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'evernet' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'evernet' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'evernet' ),
               'DESC' => __( 'Descending', 'evernet' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>
              <div class="col-lg-4 col-md-6">
                <div class="single-blog-post mb-30">
                    <div class="b-post-thumb">
                      <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'deimos-404x302'); ?>" alt="<?php the_title() ?>"></a>
                      <div class="category">
                        <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        } ?>
                      </div>
                    </div>
                    <div class="blog-content">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo esc_html__( 'By','zaaple' ); ?> <?php the_author(); ?></a></li>
                        <li class="list-inline-item"><i class="fa fa-calendar"></i><?php the_date(); ?></li>
                      </ul>
                      <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                      <p><?php echo wp_trim_words( get_the_content(), 15, '.' ); ?></p>
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'evernet' ); ?> <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
              </div>

               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new evernet_Widget_Blog );