<?php /*

@package simpletheme

*/

if( !is_active_sidebar('simple-single-post-sidebar') ) { 
    return; 
}

?>

<div id="single-post-sidebar" class="col-xs-12 col-md-3">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('simple-single-post-sidebar'); ?>

    </aside> 
</div><!-- #single-post-sidebar -->

