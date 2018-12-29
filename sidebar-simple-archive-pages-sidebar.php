<?php /*

@package simpletheme

*/

if( !is_active_sidebar('simple-archive-pages-sidebar') ) { 
    return; 
}

?>

<div id="archive-sidebar" class="col-xs-12 col-md-3">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('simple-archive-pages-sidebar'); ?>

    </aside> 
</div><!-- #archive-sidebar -->

