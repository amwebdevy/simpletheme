<?php /*

@package simpletheme

*/

if( !is_active_sidebar('simple-footer-sidebar') ) { 
    return; 
}

?>

<div id="simple-footer-sidebar">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('simple-footer-sidebar'); ?>

    </aside> 
</div><!-- #simple-footer-sidebar -->

