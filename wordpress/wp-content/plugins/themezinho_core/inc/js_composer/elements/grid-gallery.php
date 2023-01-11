<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_ts_grid_gallery extends WPBakeryShortCode {

	
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



    
     
        <div class="grid-gallery">
			<ul class="masonry">
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
         
				
				<li>
            <figure><a href="<?php echo esc_url($images[0]);?>" data-fancybox><img src="<?php echo esc_url($images[0]);?>" alt="<?php echo esc_attr($accordion['title']);?>"></a>
              <figcaption>
                 <?php if($accordion['title']) { ?>
			    <h6><?php echo esc_attr($accordion['title']);?></h6> 
				 <?php } ?>
                
				  <?php if($accordion['tagline']) { ?>
			    <small><?php echo esc_attr($accordion['tagline']);?></small> 
				 <?php } ?>
				
				</figcaption>
            </figure>
          </li>
				
			
			
			  
            
			
		
          
    
          <?php endforeach;
                  wp_reset_query(); ?>
        </ul>
        <!-- end swiper-wrapper -->
		 
			
			<?php
            if( $has_readmore == 'yes' ) { ?>
                <div class="all-btn">
                    <a href="<?php echo esc_url( $readmore_link ); ?>" title="<?php echo esc_attr( $readmore_label ); ?>">
                        <?php echo esc_html( $readmore_label ); ?>
                    </a>
                </div>
            <?php
            }
            ?>
			
			
	
      </div>
      <!-- end grid-gallery -->
    








<?php  return ob_get_clean();
} 
	}
	


vc_map( array(
	"base" 			    => "ts_grid_gallery",
	"name" 			    => __( 'Grid Gallery', 'themezinho' ),
	"icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
	"content_element"   => true,
	"category" 		    => PAGE_BUILDER_GROUP,
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'More Button', 'themezinho' ),
			"param_name" 	=> 	"has_readmore",
			"group" 		=> 'General',
			"value"			=>	array(
				"No"		=> 'no',
				"Yes"		=> 'yes',
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Read More Label', 'themezinho' ),
			"param_name" 	=> 	"readmore_label",
			"dependency"    => array('element' => "has_readmore", 'value' => 'yes'),
			"value"         => __( 'SEE AL CASES', 'themezinho' ),
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Read More Link', 'themezinho' ),
			"param_name" 	=> 	"readmore_link",
			"dependency"    => array('element' => "has_readmore", 'value' => 'yes'),
			"group" 		=> 'General',
		),
		
             
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
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => __("Tagline", 'themezinho'),
               "param_name" => "tagline",
               "value" => ""
            ),
               )
	),
)));
