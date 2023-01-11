<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_testimonials extends WPBakeryShortCode {


	
	
	
	
	 protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
        'details' => '',
        'image' => '',
        ), $atts ) );

        
        ob_start();
	
		 
		
	
    $images = wp_get_attachment_image_src($image,''); 
    $details = vc_param_group_parse_atts($atts['details']);
    ?> 



    
      <div class="swiper-testimonials">
        <div class="swiper-wrapper">
          <?php $new_accordion_value = array();
      foreach($details as $data){
        $new_line = $data;
        $new_line['image'] = isset($new_line['image']) ? $new_line['image'] : '';
        $new_line['testimonial'] = isset($new_line['testimonial']) ? $new_line['testimonial'] : '';
        $new_line['jobtitle'] = isset($new_line['jobtitle']) ? $new_line['jobtitle'] : '';
		$new_line['brand'] = isset($new_line['brand']) ? $new_line['brand'] : '';
        
     
        $new_accordion_value[] = $new_line;
     
      }
     
      $idd = 0;
      foreach($new_accordion_value as $accordion):
      $idd++;
		 $brands = wp_get_attachment_image_src($accordion['brand'],'');
    $images = wp_get_attachment_image_src($accordion['image'],'');
                ?>
        
			
			
			  <div class="swiper-slide">
    <div class="testimonial">
      <figure>
		    <?php if($accordion['image']){ ?>
		  <img src="<?php echo esc_url($images[0]);?>" alt="Image" class="avatar">
		   <?php } ?>
        <figcaption> <img src="<?php echo get_template_directory_uri(); ?>/images/icon-quote.svg" alt="Image"> </figcaption>
      </figure>
		
      <blockquote>
        
			    <p><?php echo wpb_js_remove_wpautop($accordion['testimonial']);?></p>
				
      </blockquote>
		
      <img src="<?php echo esc_url($brands[0]);?>" alt="<?php echo esc_attr($accordion['jobtitle']);?>" class="name-sign"> 
		
		 <?php if($accordion['jobtitle']) { ?>
			    <small><?php echo esc_attr($accordion['jobtitle']);?></small> 
				 <?php } ?>
				  
				  </div>
    <!-- end testimonial --> 
    </div>
			
			
          
       
          <?php endforeach;
                  wp_reset_query(); ?>
        </div>
        <!-- end swiper-wrapper -->
       <div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-right-arrow.svg" alt="Image"></div>
          <div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-right-arrow.svg" alt="Image"></div>
      </div>
    








<?php  return ob_get_clean();
} 
	}
	


vc_map( array(
	"base" 			    => "ts_testimonials",
	"name" 			    => __( 'Testimonials', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		
             
   array(
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __('Testimonial', 'themezinho'),
      'params' => array(
            array(
                  'type' => 'attach_image',
                  'heading' => __( 'Avatar', 'themezinho' ),
                  'param_name' => 'image',
                  'value' => ''
               ),
            array(
               "type" => "textfield",
               "heading" => __("Testimonial", 'themezinho'),
               "param_name" => "testimonial",
               "value" => ""
            ),
            array(
               "type" => "textfield",
               "heading" => __("Job Title", 'themezinho'),
               "param_name" => "jobtitle",
               "value" => ""
            ),
		  array(
                  'type' => 'attach_image',
                  'heading' => __( 'Brand', 'themezinho' ),
                  'param_name' => 'brand',
                  'value' => ''
               ),
            
               )
	),
)));
