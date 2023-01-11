<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_counter extends WPBakeryShortCode {


	
	
	 protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
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
		
	
	
   
    $details = vc_param_group_parse_atts($atts['details']);
    ?> 


	<ul class="counter <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?> id="accordion" role="tablist">
            
          


    
  
          <?php $new_accordion_value = array();
      foreach($details as $data){
        $new_line = $data;
       
        $new_line['value'] = isset($new_line['value']) ? $new_line['value'] : '';
        $new_line['symbol'] = isset($new_line['symbol']) ? $new_line['symbol'] : '';
        $new_line['tagline'] = isset($new_line['tagline']) ? $new_line['tagline'] : '';
        
     
        $new_accordion_value[] = $new_line;
     
      }
     
      $idd = 0;
      foreach($new_accordion_value as $accordion):
		
      $idd++;
                ?>
       
		<li>
			<span class="odometer" data-count="<?php echo esc_attr($accordion['value']);?>" data-status="yes">0</span>
			<span class="symbol"><?php echo esc_html($accordion['symbol']);?></span>
			<small><?php echo esc_html($accordion['tagline']);?></small>
			
			
            
			
            </li>
		
		
		
			
			
          
       
          <?php endforeach;
                  wp_reset_query(); ?>
       </ul	>
    








<?php  return ob_get_clean();
} 
	}
	


vc_map( array(
	"base" 			    => "ts_counter",
	"name" 			    => __( 'Counter', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
	      
   array(
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __('Counter Item', 'themezinho'),
      'params' => array(
           
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Value", 'themezinho'),
               "param_name" => "value",
               "value" => ""
            ),
		  array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Symbol", 'themezinho'),
               "param_name" => "symbol",
               "value" => ""
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Tagline", 'themezinho'),
               "param_name" => "tagline",
               "value" => ""
            ),
            
	  ),
	 
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
		),
)));
