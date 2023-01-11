<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_price_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'icon'			        => '',
			'title'		            => '',
			'tagline'		            => '',
			'price'				=> '',
			'time'				=> '',
			'info'				=> '',
			'features'				=> '',
			'button_label'				=> '',
			'button_url'				=> '',
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

<div class="price-box <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
          
          
        
<img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_html( $title ); ?>">

	
          
        
	
	

       			<?php if( $title != '' ) { ?>
                        <h3><?php echo esc_html( $title ); ?></h3>
                    <?php } ?>
	
	<?php if( $tagline != '' ) { ?>
                        <h5><?php echo esc_html( $tagline ); ?></h5>
                    <?php } ?>
	
	<?php if( $price != '' ) { ?>
                        <span><?php echo esc_html( $price ); ?></span>
                    <?php } ?>
	<?php if( $time != '' ) { ?>
                        <small><?php echo esc_html( $time ); ?></small>
                    <?php } ?>
	
	
	<?php if( $info != '' ) { ?>
                        <b><?php echo esc_html( $info ); ?></b>
                    <?php } ?>
	
					
					<?php if( $features != '' ) { ?>
                        <?php echo wpb_js_remove_wpautop( $features ); ?>
                    <?php } ?>
					
	<a href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_label ); ?><span></span></a> 
					
                  
                
           
    
                
           
        </div>
		<?php

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			    => "ts_price_box",
	"name" 			    => __( 'Price Box', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		
        array(
            "type" 			=> 	"attach_image",
            "heading" 		=> 	__( 'Icon', 'themezinho' ),
            "param_name" 	=> 	"icon",
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
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price', 'themezinho' ),
			"param_name" 	=> 	"price",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Time', 'themezinho' ),
			"param_name" 	=> 	"time",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Info', 'themezinho' ),
			"param_name" 	=> 	"info",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Features', 'themezinho' ),
			"param_name" 	=> 	"features",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Label', 'themezinho' ),
			"param_name" 	=> 	"button_label",
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button URL', 'themezinho' ),
			"param_name" 	=> 	"button_url",
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
