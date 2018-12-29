<?php /*

@package simpletheme

*/

if( !is_active_sidebar('simple-page-sidebar') ) { 
    return; 
}

?>

<div id="page-sidebar" class="col-xs-3">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('simple-page-sidebar'); ?>

    </aside> 
</div><!-- #page-sidebar -->

