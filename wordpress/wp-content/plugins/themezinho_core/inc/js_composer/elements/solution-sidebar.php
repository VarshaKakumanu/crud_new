<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

class WPBakeryShortCode_ts_solution_sidebar extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'total_count'		    => 4,
            'show_tags'			    => 'yes',
            'animate_block'			=> 'false',
            'animation_type'		=> 'fadeIn',
            'animation_delay'       => ''
        ), $atts ) );

        
        ob_start();

        $args = array (
            'post_type'              => 'solution',
           
            
        );
        $solution = new WP_Query( $args );

        $wrapper_class = array();
        if( $animate_block == 'yes' ) {
            $wrapper_class[] = 'wow';
            $wrapper_class[] = $animation_type;
        }

        $wrapper_class = implode( ' ', $wrapper_class );

        if ( $solution->have_posts() ) :
            ?>
            <aside class="solution-sidebar">
            <ul>
                <?php
                while ( $solution->have_posts() ) :
                    $solution->the_post();

                   

                    $title = get_the_title();

                    if( get_field( 'listing_title_type' ) == 'custom' && get_field( 'listing_title') ) {
                        $title = get_field( 'listing_title' );
                    }
                    
                   
                    ?>
                    <li>
						
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" data-text="<?php echo wp_kses_post( $title ); ?>">
                                            <?php echo wp_kses_post( $title ); ?>
                                        </a>
						
						
						
                           
                           
                      
                    </li>
                <?php
                endwhile;
                ?>
            </ul>
				</aside>
        <?php
        endif;

        wp_reset_query();
        return ob_get_clean();
    }
}


vc_map( array(
    "base" 			    => "ts_solution_sidebar",
    "name" 			    => __( "Solution Sidebar", "themezinho" ),
    "icon"              => THEMEZINHO_CORE_URI . "assets/img/custom.png",
    "content_element"   => true,
    "category" 		    => PAGE_BUILDER_GROUP,
    'params' => array(
        
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
