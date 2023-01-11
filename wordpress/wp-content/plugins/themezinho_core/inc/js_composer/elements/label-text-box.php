<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_label_text_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'   				=> '',
			'block_type'   			=> 'normal',
			'readmore_link'   		=> '',
			'animate_block'			=> 'false',
			'animation_type'		=> 'fadeIn',
			'animation_delay'		=> '',
		), $atts ) );

		ob_start();

		$wrapper_class = array();

		if( $animate_block == 'yes' ) {
			$wrapper_class[] = 'wow';
			$wrapper_class[] = $animation_type;
		}
		
		
		
		$wrapper_class = implode( ' ', $wrapper_class );
		?>
		<div class="label-text-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
			<span></span>
			<h3><?php echo esc_html( $title ); ?></h3>
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>
			
			<a href="<?php echo esc_url( $readmore_link ); ?>">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-right-arrow.svg" alt="<?php echo esc_url( $title ); ?>"> 
                    </a>
		</div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_label_text_box",
	"name" 			    => __( 'Label Text Box', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'themezinho' ),
			"param_name" 	=> 	"title",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Text', 'themezinho' ),
			"param_name" 	=> 	"content",
			"group" 		=> 'General',
		),
		
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Link URL', 'themezinho' ),
			"param_name" 	=> 	"readmore_link",
			"dependency"    => array('element' => "has_readmore", 'value' => 'yes'),
			"group" 		=> 'General',
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
