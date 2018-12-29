<?php /*

@package simpletheme

*/

if( !is_active_sidebar('simple-front-page-sidebar') ) { 
    return; 
}

?>

<div id="front-page-sidebar" class="col-xs-12 col-md-3">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('simple-front-page-sidebar'); ?>

    </aside> 
</div><!-- #front-page-sidebar -->

