<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_solution_gallery extends WPBakeryShortCode {

	
	 protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
			
			'has_readmore'   	    => 'no',
			'readmore_label'   		=> 'Learn More',
			'readmore_link'   		=> '',
      		'image' => '',
        ), $atts ) );

        
        ob_start();
	
		 
		
	
	
    $images = wp_get_attachment_image_src($image,''); 
    $details = vc_param_group_parse_atts($atts['details']);
    ?> 



    
     
        <div class="solution-gallery">
			<ul>
          <?php $new_accordion_value = array();
      foreach($details as $data){
        $new_line = $data;
        $new_line['image'] = isset($new_line['image']) ? $new_line['image'] : '';
        $new_line['title'] = isset($new_line['title']) ? $new_line['title'] : '';
     
        $new_accordion_value[] = $new_line;
     
      }
     
      $idd = 0;
      foreach($new_accordion_value as $accordion):
      $idd++;
    $images = wp_get_attachment_image_src($accordion['image'],'');
                ?>
         
				
				<li>
            <figure><a href="<?php echo esc_url($images[0]);?>" data-fancybox><img src="<?php echo esc_url($images[0]);?>" alt="<?php echo esc_attr($accordion['title']);?>"></a>
             
            </figure>
          </li>
				
			
			
			  
            
			
		
          
    
          <?php endforeach;
                  wp_reset_query(); ?>
        </ul>
        <!-- end swiper-wrapper -->
		 
			
		
	
      </div>
      <!-- end grid-gallery -->
    








<?php  return ob_get_clean();
} 
	}
	


vc_map( array(
	"base" 			    => "ts_solution_gallery",
	"name" 			    => __( 'Solution Gallery', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		
             
   array(
	   "group" 		=> 'Gallery',
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __('Gallery Image', 'themezinho'),
      'params' => array(
            array(
                  'type' => 'attach_image',
                  'heading' => __( 'Image background', 'themezinho' ),
                  'param_name' => 'image',
                  'value' => '',
                  'description' => __( 'Even for using video bg at least add transparent image here ! Otherwise you can use here for adding background image', 'themezinho' )
               ),
            
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Title", 'themezinho'),
               "param_name" => "title",
               "value" => ""
            ),
               )
	),
)));
