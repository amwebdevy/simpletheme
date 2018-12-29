<?php 

/*

@package simpletheme
-- PAGE TEMPLATE

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content clearfix">
        
        <?php the_content(); ?>
        
    </div><!-- .entry-content -->
    
</article>

