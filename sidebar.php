<?php /*

@package simpletheme

*/

if( !is_active_sidebar('simple-sidebar') ) { 
    return; 
}

?>

<aside id="secondary" class="widget-area" role="complementary">
    
    <div class="visible-scroll">
        <?php 
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav navbar-nav navbar-collapse',
                'walker' => new Simple_Walker_Nav_Primary()

            ) );
        ?>
    </div><!-- .visible-scroll -->

    <?php dynamic_sidebar('simple-sidebar'); ?>
    
</aside> 