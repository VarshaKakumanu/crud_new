<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_history_timeline extends WPBakeryShortCode {


	
	
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


	
	
	
		




	<div class="cd-horizontal-timeline <?php echo esc_attr( $wrapper_class ); ?>" <?php if( $animate_block == 'yes' && $animation_delay != '' ) { echo 'data-wow-delay="' . esc_attr( $animation_delay ) . '"'; } ?>>
            
		
		
		

			

		
		

    
  
          <?php $new_accordion_value = array();
      foreach($details as $data){
        $new_line = $data;
       
        $new_line['date_short_text'] = isset($new_line['date_short_text']) ? $new_line['date_short_text'] : '';
        $new_line['date_number'] = isset($new_line['date_number']) ? $new_line['date_number'] : '';
        $new_line['title'] = isset($new_line['title']) ? $new_line['title'] : '';
        $new_line['date_text'] = isset($new_line['date_text']) ? $new_line['date_text'] : '';
        $new_line['description'] = isset($new_line['description']) ? $new_line['description'] : '';
        
     
        $new_accordion_value[] = $new_line;
     
      } ?>
		
		<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					
			  
			  <?php
      $idd = 0;
      foreach($new_accordion_value as $accordion1):
		
      $idd++; ?>
     <li><a href="#0" data-date="<?php echo esc_attr($accordion1['date_number']);?>"><?php echo esc_html($accordion1['date_short_text']);?></a></li>
			  
			    <?php endforeach;
                  wp_reset_query(); ?>
     
		
		
				</ol>
				
					<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->
			
		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive"><i class="fa fa-chevron-left"></i></a></li>
			<li><a href="#0" class="next"><i class="fa fa-chevron-right"></i></a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> 
	<!-- end timeline -->
		
		<div class="events-content">
          <ol>

			  
<?php
      $idd = 0;
      foreach($new_accordion_value as $accordion):
		
      $idd++;
                ?>
       <li data-date="<?php echo esc_attr($accordion['date_number']);?>">
				<h2><?php echo esc_html($accordion['title']);?></h2>
				<em><?php echo esc_html($accordion['date_text']);?></em>
				<p>	<?php echo esc_html($accordion['description']);?></p>
			</li>
		
		
	
		
		
			
			
          
       
          <?php endforeach;
                  wp_reset_query(); ?>
     
    

</ol>
</div>


</div>
<!-- end cd-horizontal-timeline -->





<?php  return ob_get_clean();
} 
	}
	


vc_map( array(
	"base" 			    => "ts_history_timeline",
	"name" 			    => __( 'History Timeline', 'themezinho' ),
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
               "heading" => __("Date for Timeline", 'themezinho'),
               "param_name" => "date_short_text",
               "value" => ""
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Date Number with Slash", 'themezinho'),
               "param_name" => "date_number",
               "value" => ""
            ),
		  array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Title", 'themezinho'),
               "param_name" => "title",
               "value" => ""
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Date Static Text", 'themezinho'),
               "param_name" => "date_text",
               "value" => ""
            ),
			array(
               "type" => "textarea",
               "holder" => "div",
               "class" => "",
               "heading" => __("Description", 'themezinho'),
               "param_name" => "description",
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
