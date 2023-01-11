<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_projects_carousel extends WPBakeryShortCode {


	
	
	
	
	 protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
        
        'image' => '',
        ), $atts ) );

        
        ob_start();
	
		 
		
	
	
    $images = wp_get_attachment_image_src($image,''); 
    $details = vc_param_group_parse_atts($atts['details']);
    ?> 



    
      <div class="swiper-carousel">
        <div class="swiper-wrapper">
          <?php $new_accordion_value = array();
      foreach($details as $data){
        $new_line = $data;
        $new_line['image'] = isset($new_line['image']) ? $new_line['image'] : '';
        $new_line['title'] = isset($new_line['title']) ? $new_line['title'] : '';
        $new_line['tagline'] = isset($new_line['tagline']) ? $new_line['tagline'] : '';
        $new_line['link_url'] = isset($new_line['link_url']) ? $new_line['link_url'] : '';
     
        $new_accordion_value[] = $new_line;
     
      }
     
      $idd = 0;
      foreach($new_accordion_value as $accordion):
      $idd++;
    $images = wp_get_attachment_image_src($accordion['image'],'');
                ?>
         
			
			
			  <div class="swiper-slide">
              <figure> 
				   <?php if($accordion['image']){ ?>
				 <a href="<?php echo esc_url($accordion['link_url']); ?>"><img src="<?php echo esc_url($images[0]);?>" alt="<?php echo esc_attr($accordion['title']);?>"></a>
                <figcaption>
                   <?php if($accordion['title']) { ?>
			    <h4><?php echo esc_attr($accordion['title']);?></h4> 
				 <?php } ?>
                 <?php if($accordion['tagline']) { ?>
			    <small><?php echo esc_attr($accordion['tagline']);?></small> 
				 <?php } ?>
				  
				  </figcaption>
              </figure>
            </div>
            
			
		
          
        <?php } ?>
          <?php endforeach;
                  wp_reset_query(); ?>
        </div>
        <!-- end swiper-wrapper -->
		  <div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-right-arrow.svg" alt="Image"></div>
        <div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-right-arrow.svg" alt="Image"></div>
		
      </div>
      <!-- end content-slider -->
    








<?php  return ob_get_clean();
} 
	}
	


vc_map( array(
	"base" 			    => "ts_projects_carousel",
	"name" 			    => __( 'Projects Carousel', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		
             
   array(
      'type' => 'param_group',
      'param_name' => 'details',
      'heading' => __('Item Slider', 'themezinho'),
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
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Tagline", 'themezinho'),
               "param_name" => "tagline",
               "value" => ""
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Project URL", 'themezinho'),
               "param_name" => "link_url",
               "value" => ""
            ),
               )
	),
)));
