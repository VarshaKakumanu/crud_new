<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_office_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'   			=> '',
			'address'   			=> '',
			'phone'   			=> '',
			'email'   			=> '',
			'link_label'   			=> '',
			'link_url'   			=> '',
			'block_type'   			=> 'normal',
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
		<div class="office-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
		
			
			<?php if( $title != '' ) { ?>
                        <h5><?php echo esc_html( $title ); ?></h5>
                    <?php } ?>
			
			<?php if( $address != '' ) { ?>
                        <address><?php echo wpb_js_remove_wpautop( $address ); ?></address>
                    <?php } ?>
	
			<?php if( $phone != '' ) { ?>
                        <p><?php echo esc_html( $phone ); ?></p>
                    <?php } ?>
        	
       	
       	
       	<a href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
       	<small><a data-fancybox data-type="iframe" data-src="<?php echo esc_url( $link_url ); ?>" href="javascript:;"><?php echo esc_html( $link_label ); ?></a></small>
        		

          
		</div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_office_box",
	"name" 			    => __( 'Office Box', 'themezinho' ),
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
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Address', 'themezinho' ),
			"param_name" 	=> 	"address",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Phone', 'themezinho' ),
			"param_name" 	=> 	"phone",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'E-mail', 'themezinho' ),
			"param_name" 	=> 	"email",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Link Label', 'themezinho' ),
			"param_name" 	=> 	"link_label",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Link URL', 'themezinho' ),
			"param_name" 	=> 	"link_url",
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
