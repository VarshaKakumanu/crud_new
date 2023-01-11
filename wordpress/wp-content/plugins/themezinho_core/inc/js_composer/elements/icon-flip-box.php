<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_icon_flip_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'index'		            => '',
			'title'		            => '',
			'icon'			        => '',
			'description'			=> '',
			'animate_block'			=> 'false',
			'animation_type'		=> 'fadeIn',
			'animation_delay'		=> '',
		), $atts ) );

		ob_start();

        $icon_url = '';
        if ( $icon != '') {
            $icon_url = wp_get_attachment_url( $icon );
        }

        if( !$icon_url ) return;

		$wrapper_class = '';
		if( $animate_block == 'yes' ) {
			$wrapper_class = 'wow ' . $animation_type;
		}
		?>

<div class="icon-flip-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
          
          
        <div class="flip-box" data-flip-direction="horizontal-to-left" data-h_text_align="left" data-v_text_align="center">
            <div class="flip-box-front" data-bg-overlay="true" data-text-color="light">
              <div class="inner">
				   <?php if( $index != '' ) { ?>
                        <span><?php echo esc_html( $index ); ?></span>
                    <?php } ?>
               	<?php if( $title != '' ) { ?>
                        <h4><?php echo esc_html( $title ); ?></h4>
                    <?php } ?>
                <figure> <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( get_the_title( $icon ) ); ?>"> </figure>
              </div>
              <!-- end inner --> 
            </div>
            <!-- end flip-box-front -->
            <div class="flip-box-back">
              <div class="inner">
                  	<?php if( $title != '' ) { ?>
                        <h4><?php echo esc_html( $title ); ?></h4>
                    <?php } ?>
                  	
                        <p><?php echo esc_html( $description ); ?></p>
                   
              </div>
              <!-- end inner --> 
            </div>
            <!-- end end flip-box-back --> 
          </div>
          <!-- end flip-box --> 


       
            
                
           
        </div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_icon_flip_box",
	"name" 			    => __( 'Icon Flip Box', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Index', 'themezinho' ),
			"param_name" 	=> 	"index",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'themezinho' ),
			"param_name" 	=> 	"title",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Description', 'themezinho' ),
			"param_name" 	=> 	"description",
			"group" 		=> 'General',
		),
		array(
            "type" 			=> 	"attach_image",
            "heading" 		=> 	__( 'Icon', 'themezinho' ),
            "param_name" 	=> 	"icon",
            "group" 		=> "General",
        ),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animate', 'themezinho' ),
			"param_name" 	=> 	"animate_block",
			"group" 		=> 'Animation',
			"value"			=>	array(
				"No"			=>		'no',
				"Yes"			=>		'yes',
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animation Type', 'themezinho' ),
			"param_name" 	=> 	"animation_type",
			"dependency" => array('element' => "animate_block", 'value' => 'yes'),
			"group" 		=> 'Animation',
			"value"			=>	motts_animations()
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Animation Delay', 'themezinho' ),
			"param_name" 	=> 	"animation_delay",
			"dependency" => array('element' => "animate_block", 'value' => 'yes'),
			"description"	=>	__( 'Animation delay set in second e.g. 0.6s', 'themezinho' ),
			"group" 		=> 'Animation',
		)
	),
) );
