<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_icon_content_block extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'index'		            => '',
			'icon'			        => '',
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
        <div class="icon-content-block reveal-effect masker <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>

                <figure>
                    <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( get_the_title( $icon ) ); ?>">
					<figcaption>
					 <?php if( $index != '' ) { ?>
                        <h5><?php echo esc_html( $index ); ?></h5>
                    <?php } ?>
                    <?php echo wpb_js_remove_wpautop( $content, true ); ?>
					</figcaption>
					
                </figure>
               
            
        </div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_icon_content_block",
	"name" 			    => __( 'Icon Content Block', 'themezinho' ),
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
            "type" 			=> 	"attach_image",
            "heading" 		=> 	__( 'Icon', 'themezinho' ),
            "param_name" 	=> 	"icon",
            "group" 		=> "General",
        ),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Content', 'themezinho' ),
			"param_name" 	=> 	"content",
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
