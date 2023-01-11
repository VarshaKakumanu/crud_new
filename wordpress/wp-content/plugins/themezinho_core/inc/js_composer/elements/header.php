<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_hero_slider extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'hero_slider'		=> 0,
		), $atts ) );

//		 if( !is_int( $hero_slider ) ) {
//		 	return;
//		 }
		ob_start();
		$args = array (
			'post_type'		=> 'hero',
			'post__in'		=> array( $hero_slider )
	    );

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) :
				$the_query->the_post();

				$hero_type = get_field( 'type' );
				

				if( $hero_type === 'swiper' ) :

					if( have_rows('slider') ):

						$transition_speed = ( get_field( 'transition_speed' ) ) ? get_field( 'transition_speed' ) : 600;
						$auto_play_delay = ( get_field( 'auto_play_delay' ) ) ? get_field( 'auto_play_delay' ) : 3500;
						$loop = ( get_field( 'disable_loop' ) ) ? 'disable' : 'enable';

                        $page_number = ( get_field( 'disable_page_number' ) ) ? false : true;
                        $pagination = ( get_field( 'disable_pagination' ) ) ? false : true;
                        $navigation = ( get_field( 'disable_navigation' ) ) ? false : true;


						$slides = count( get_field( 'slider' ) );

						if( $slides < 2 ) {
						    $loop = 'disable';
                        }
					
						?>
                        <header class="slider">
							
							
                            <div class="swiper-container"
                                 data-speed="<?php echo esc_attr( $transition_speed ); ?>"
                                 data-autoplay-delay="<?php echo esc_attr( $auto_play_delay ); ?>"
                                 data-loop="<?php echo esc_attr( $loop ); ?>"
                                >
                                <div class="swiper-wrapper">
                                    <?php
                                    while ( have_rows('slider') ) : the_row();
                                        $background_image = get_sub_field( 'background_image' );
                                        ?>

									
									  <div class="swiper-slide">
										  
        <div class="slide-inner bg-image" data-background="<?php echo esc_url( $background_image ); ?>" data-text="<?php the_sub_field( 'data_text' ); ?>">
			
          <div class="container">
			  
            <h6 data-swiper-parallax="100"><?php the_sub_field( 'tagline' ); ?></h6>
            <h2 data-swiper-parallax="200"><span>.</span><?php the_sub_field( 'title' ); ?></h2>
            <p data-swiper-parallax="300"><?php the_sub_field( 'description' ); ?></p>
            <div class="clearfix"></div>
			    <?php if( $button_link = get_sub_field( 'button_link' ) ){
                                                        $button_label = get_sub_field( 'button_label' );
                                                        ?>
												
								<a href="<?php echo esc_url( $button_link ); ?>" data-swiper-parallax="200">
              <?php echo esc_html( $button_label ); ?><span></span> </a>
          
												
                                                    <?php } ?>
			  
         </div>
          <!-- end container --> 
        </div>
        <!-- end slide-inner --> 
      </div>
      <!-- end swiper-slide -->
									
                                        <?php
                                    endwhile;
                                    ?>
                                </div>
								<!-- end swiper-wrapper -->
                                

									<div class="swiper-custom-pagination"></div>
									
									
                                </div>
							<!-- end swiper-container -->
							
							
							
							        	

                           
                        </header>

						<?php
					endif;

                    elseif( $hero_type === 'video' ) :
                        ?>
                        <header class="video-hero">
 
                            <div class="video-bg">
                                <video src="<?php echo esc_url( get_field( 'background_video' ) ); ?>" muted loop autoplay playsinline></video>
								</div>
							
							
                                <div class="container">
									
									
									
									  <h6><?php the_field( 'video_bg_tagline' ); ?></h6>
            <h2><span>.</span><?php the_field( 'video_bg_title' ); ?></h2>
            <p><?php the_field( 'video_bg_title_with_effect' ); ?></p>
									
									<div class="clearfix"></div>
                                 

                                    <?php if( get_field( 'video_bg_button_link' ) ){ ?>
									
									 <a href="<?php echo esc_url( get_field( 'video_bg_button_link' ) ); ?>">
           
           <?php echo esc_html( get_field( 'video_bg_button_label' ) ); ?><span></span> </a>
		 
									
									
                                    <?php } ?>
                                </div>
                            

							
							
                        </header>
                        <?php

                endif;

			endwhile;
		endif;

		return ob_get_clean();
	}
}

vc_map( array(
	"base" 			    => "ts_hero_slider",
	"name" 			    => __( 'Hero Slider', 'ts' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Hero Slider', 'ts' ),
			"param_name" 	=> 	"hero_slider",
			"group" 		=> "General",
			"description"	=> __( 'Select the slider that you created in Hero Slider section. Check documentation for further detail.', 'ts' ),
			"value"			=>	ts_get_hero_slider()
		)
	),
) );
