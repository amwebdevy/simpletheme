<?php
/*

@package simpletheme

    ===================================
        WIDGET CLASS
    ===================================
*/

//FILTER FOR DEFAULT CATEGORIES WIDGET
function simple_list_categories_output_change( $links ) {
    	
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	
	return $links;
}

add_filter( 'wp_list_categories', 'simple_list_categories_output_change' );

class Simple_Profile_Widget extends WP_Widget { 
    
    public function __construct() { 
        
        $widget_ops = array(
            'classname' => 'simple-profile-widget',
            'description' => 'Custom User Profile Widget',  
        );
        parent::__construct( 'simple_profile', 'Simple Profile', $widget_ops ); 
    }
    
    //BACK-END DISPLAY OF WIDGET
    public function form( $instance ) { 
        echo '<p><strong>No options for this widget!</strong></br>You can control the fields of this Widget from <a href="./admin.php?page=simple_theme">This Page</a></p>';
    }

    //FRONT-END DISPLAY OF WIDGET
    public function widget( $args, $instance ) { 
            
        echo $args['before_widget']; ?>

            <?php include 'templates/simple-user-profile.php'; ?>

        <?php
        echo $args['after_widget']; 
    } 
}

add_action( 'widgets_init', function() {
   register_widget( 'Simple_Profile_Widget' ); 
});

//SIMPLE CATEGORIES WIDGET
class Simple_Categories_Widget extends WP_Widget {
    
    public function __construct() {    
        $widget_ops = array( 
            'classname' => 'simple-categories-widget',
            'description' => 'Custom Categories Widget',  
        );
        parent::__construct( 'simple_categories', 'Simple Categories', $widget_ops ); 
    }
    
    //BACK-END DISPLAY OF WIDGET
    public function form( $instance ) { 
        $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Categories' );
        $tot = ( !empty( $instance['tot'] ) ? absint( $instance['tot'] ) : 3 );
        $orderby = ( !empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'count' );
        $order = ( !empty( $instance[ 'order' ] ) ? $instance[ 'order' ] : 'DESC' );
        
        //TITLE INPUT
        $output = '<p>';
        
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>'; 
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '">'; 
        
        $output .= '</p>';
        
        //TOTAL INPUT 
        $output .= '<p>'; 
        
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Categories:</label>';      
        $output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '">'; 
        
        $output .= '</p>';
        
        //ORDERBY INPUT 
        $output .= '<p>'; 
        
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'orderby' ) ) . '">Order By:</label>';      
        $output .= '<select class="widefat" id="' . esc_attr( $this->get_field_id( 'orderby' ) ) . '" name="' . esc_attr( $this->get_field_name( 'orderby' ) ) . '" value="' . esc_attr( $orderby ) . '"><option value="count" '. selected( $instance['orderby'], "count", false ) .'>count</option><option value="name" '. selected( $instance['orderby'], "name", false ) .'>name</option><option value="ID" '. selected( $instance['orderby'], "ID", false ) .'>ID</option></select>'; 
        
        $output .= '</p>';
        
        //ORDER INPUT 
        $output .= '<p>'; 
        
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'order' ) ) . '">Order:</label>';      
        $output .= '<select class="widefat" id="' . esc_attr( $this->get_field_id( 'order' ) ) . '" name="' . esc_attr( $this->get_field_name( 'order' ) ) . '" value="' . esc_attr( $order ) . '"><option value="DESC" '. selected( $instance['order'], "DESC", false ) .'>Descending</option><option value="ASC" '. selected( $instance['order'], "ASC", false ) .'>Ascending</option></select>'; 
        
        $output .= '</p>';
        
        echo $output; 
    }
    
    //UPDATE WIDGET
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();
        $instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' ); 
        $instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags($new_instance[ 'tot' ]) ) : 0 );
        $instance[ 'orderby' ] = ( !empty( $new_instance[ 'orderby' ] ) ? strip_tags( $new_instance[ 'orderby' ] ) : '' ); 
        $instance[ 'order' ] = ( !empty( $new_instance[ 'order' ] ) ? strip_tags( $new_instance[ 'order' ] ) : '' ); 
        
        return $instance;
    }
    
    //FRONT-END DISPLAY OF WIDGET
    public function widget( $args, $instance ) {
        
        $tot = absint( $instance['tot'] );
        $orderby = $instance['orderby'];
        $order = $instance['order'];
        
        $cat_args = array( 
            'title_li'   => __( '' ),
            'number'     => $tot, 
            'orderby'    => $orderby,
            'order'      => $order,
            'show_count' => 1
        );
        
        echo $args[ 'before_widget' ];
        
        if( !empty( $instance[ 'title' ] ) ):
        
            echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ]; 
        
        endif;
        
        echo '<ul>';
        
        $links = wp_list_categories( $cat_args );
        $links = str_replace('</a> (', '</a> <span>', $links);
        $links = str_replace(')', '</span>', $links);
        
        echo $links;

        echo '</ul>';
        
        echo $args[ 'after_widget' ]; 
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Simple_Categories_Widget' );
} );

//SIMPLE SOCIAL MEDIA WIDGET
class Simple_Social_Widget extends WP_Widget {
    
    public function __construct() {    
        $widget_ops = array( 
            'classname' => 'simple-social-widget',
            'description' => 'Social Media Widget',  
        );
        parent::__construct( 'simple_social', 'Simple Social', $widget_ops ); 
    }
    
    //BACK-END DISPLAY OF WIDGET
    public function form( $instance ) {    
        $title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Follow Me' );
        $social_media = array (
            'twitter'    => array( 'name' => 'Twitter',    'value'  => ( !empty( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : 'id' ),       'pre_label' => 'twitter.com/' ),
            'facebook'   => array( 'name' => 'Facebook',   'value'  => ( !empty( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : 'id' ),     'pre_label' => 'facebook.com/' ),
            'instagram'  => array( 'name' => 'Instagram',  'value'  => ( !empty( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : 'id' ),   'pre_label' => 'instagram.com/' ),
            'tumblr'     => array( 'name' => 'Tumblr',     'value'  => ( !empty( $instance[ 'tumblr' ] ) ? $instance[ 'tumblr' ] : 'id' ),         'pre_label' => '.tumblr.com' ),
            'pinterest'  => array( 'name' => 'Pinterest',  'value'  => ( !empty( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : 'id' ),   'pre_label' => 'pinterest.com/' ),
            'soundcloud' => array( 'name' => 'SoundCloud', 'value'  => ( !empty( $instance[ 'soundcloud' ] ) ? $instance[ 'soundcloud' ] : 'id' ), 'pre_label' => 'soundcloud.com/' ),
            'linkedin'   => array( 'name' => 'LinkedIn',   'value'  => ( !empty( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : 'id' ),     'pre_label' => 'linkedin.com/in/' )
        );
        
        //TITLE INPUT
        $output = '<p>';
            
        $output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>'; 
        
        $output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '">'; 
        
        $output .= '</br>Display Title: <input class="checkbox" type="checkbox"'. checked( (bool) $instance['title_check'], true, false ) .' id="'. esc_attr($this->get_field_id( 'title_check' ) ).'" name="' . esc_attr($this->get_field_name( 'title_check' ) ).'"> ';
        
        $output .= '</p>';
        
        //SOCIAL MEDIA INPUT 
        foreach( $social_media as $social_name => $input ) {
            $output .= '<p style="margin-bottom: 0;">'; 
        
            $output .= '<input class="checkbox" type="checkbox"'. checked( (bool) $instance[$social_name.'_check'], ( $social_name == 'soundcloud' || $social_name == 'linkedin' || $social_name == 'pinterest' ? true : false ), false ) .' id="'. esc_attr($this->get_field_id( $social_name.'_check' ) ).'" name="' . esc_attr($this->get_field_name( $social_name.'_check' ) ).'"> ';

            $output .= '<label for="' . esc_attr( $this->get_field_id( $social_name ) ) . '">'. $input['name'] .':</label><p style="display: inline-block; margin-top: 0; margin-left: 25px;"><small '. ( $social_name == 'tumblr' ? 'style="float: right; margin-top: 10px;"' : '' ).'>'. $input['pre_label'] .'</small>'; 

            $output .= '<input type="text" id="' . esc_attr( $this->get_field_id( $social_name ) ) . '" name="' . esc_attr( $this->get_field_name( $social_name ) ) . '" value="' . esc_attr( $input['value'] ) . '">'; 

            $output .= '</p>';
        }

        echo $output; 
    }
    
    //UPDATE WIDGET
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();
        $instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' ); 
        $instance[ 'title_check' ] = checked( (bool) $new_instance['title_check'], true ); 
        
        $social_media = array(
            'twitter',
            'facebook',
            'instagram',
            'tumblr',
            'pinterest',
            'soundcloud',
            'linkedin'
        );
        
        foreach( $social_media as $social_name) {
            $instance[ $social_name ] = ( !empty( $new_instance[ $social_name ] ) ? strip_tags( $new_instance[ $social_name ] ) : '' ); 
            $instance[ $social_name.'_check' ] = checked( (bool) $new_instance[ $social_name.'_check'], ( $social_name == 'soundcloud' || $social_name == 'linkedin' || $social_name == 'pinterest' ? true : false ) );
        }
        
        return $instance;
    }
    
    //FRONT-END DISPLAY OF WIDGET
    public function widget( $args, $instance ) {
        
        //ENABLED BY DEFAULT 
        $social_media_enabled= array(
            'twitter'   => array( 'domain_part' => 'twitter.com/'.$instance['twitter'].'',              'icon_ext' => 'twitter' ),
            'facebook'  => array( 'domain_part' => 'facebook.com/'.$instance['facebook'].'',            'icon_ext' => 'facebook' ),
            'instagram' => array( 'domain_part' => 'instagram.com/'.$instance['instagram'].'',          'icon_ext' => 'instagram' ),
            'tumblr'    => array( 'domain_part' => ''.$instance['tumblr'].'.tumblr.com',                'icon_ext' => 'tumblr' ),
        );
        
        //DISABLED BY DEFAULT
        $social_media_disabled = array(
            'pinterest'  => array( 'domain_part' => 'pinterest.com/'.$instance['pinterest'].'',   'icon_ext'  => 'pinterest' ),
            'soundcloud' => array( 'domain_part' => 'soundcloud.com/'.$instance['soundcloud'].'', 'icon_ext'  => 'soundcloud' ),
            'linkedin'   => array( 'domain_part' => 'linkedin.com/in/'.$instance['linkedin'].'',  'icon_ext'  => 'linkedin' )
        );
        
        $title_check = $instance['title_check'];
        
        echo $args[ 'before_widget' ];
        
        if( $title_check == true ):
        
            echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ]; 

        endif;
        
        echo '<ul'. ( $title_check == false ? ' class="no-widget-title"' : '' ) .'>';
        
        foreach( $social_media_enabled as $social_name => $input ) {
        
            if ( $instance[$social_name.'_check'] == false ):

                echo '<li><a href="https://'.$input['domain_part'].'" target="_blank"><span class="simple-social-icon simple-icon simple-'.$input['icon_ext'].'"></span></a></li>';

            endif;
        }
            
        foreach( $social_media_disabled as $social_name => $input ) {

            if ( $instance[$social_name.'_check'] == true ):

                echo '<li><a href="https://'.$input['domain_part'].'" target="_blank"><span class="simple-social-icon simple-icon simple-'.$input['icon_ext'].'"></span></a></li>';

            endif;
        }

        echo '</ul>';
        
        echo $args[ 'after_widget' ]; 
    }
}

add_action( 'widgets_init', function() {
    register_widget( 'Simple_Social_Widget' );
} );
