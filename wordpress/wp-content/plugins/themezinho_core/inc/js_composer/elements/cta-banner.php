<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_cta_banner extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'image'			        => '',
			'title'		            => '',
			'tagline'		            => '',
			'description'			=> '',
			'animate_block'			=> 'false',
			'animation_type'		=> 'fadeIn',
			'animation_delay'		=> '',
		), $atts ) );

		ob_start();

        $image_url = '';
        if ( $image != '') {
            $image_url = wp_get_attachment_url( $image );
        }

        if( !$image_url ) return;

		$wrapper_class = '';
		if( $animate_block == 'yes' ) {
			$wrapper_class = 'wow ' . $animation_type;
		}
		?>

<div class="cta-banner <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
          



       			<?php if( $title != '' ) { ?>
                        <h3><?php echo esc_html( $title ); ?></h3>
                    <?php } ?>
	
	<?php if( $tagline != '' ) { ?>
                        <h6><?php echo esc_html( $tagline ); ?></h6>
                    <?php } ?>
					
					<?php if( $description != '' ) { ?>
                        <p><?php echo wpb_js_remove_wpautop( $description ); ?></p>
                    <?php } ?>
					
					 <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title( $image ) ); ?>">
                  
                
           
        </div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_cta_banner",
	"name" 			    => __( 'CTA Banner', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
            "type" 			=> 	"attach_image",
            "heading" 		=> 	__( 'Image', 'themezinho' ),
            "param_name" 	=> 	"image",
            "group" 		=> "General",
        ),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'themezinho' ),
			"param_name" 	=> 	"title",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Tagline', 'themezinho' ),
			"param_name" 	=> 	"tagline",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Description', 'themezinho' ),
			"param_name" 	=> 	"description",
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
