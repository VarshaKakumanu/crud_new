<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_icon_content_list extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'index'		            => '',
			'icon'			        => '',
			'title'		            => '',
			'description'			=> '',
			'text_content'			=> '',
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

<div class="icon-content-list-block reveal-effect masker <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
          
          
        


       
            
                <figure>
                    <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( get_the_title( $icon ) ); ?>">
                </figure>
                    <?php if( $index != '' ) { ?>
                        <small><?php echo esc_html( $index ); ?></small>
                    <?php } ?>
					
					<?php if( $index != '' ) { ?>
                        <h5><?php echo esc_html( $title ); ?></h5>
                    <?php } ?>
					
					<?php if( $index != '' ) { ?>
                        <p><?php echo esc_html( $description ); ?></p>
                    <?php } ?>
					
					
                    <?php echo wpb_js_remove_wpautop( $text_content, true ); ?>
                
           
        </div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_icon_content_list",
	"name" 			    => __( 'Icon Content List', 'themezinho' ),
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
			"type" 			=> 	"textfield",
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
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Text Content', 'themezinho' ),
			"param_name" 	=> 	"text_content",
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
