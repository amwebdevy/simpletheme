<?php 

/*

@package simpletheme
-- CONTACT PAGE TEMPLATE

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="entry-header text-center">
            
        <div class="contact-title">
            <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?> 
        </div>

    </header>
    
    <div class="col-xs-12 contact-container">

        <div class="entry-content clearfix">

            <?php the_content(); ?>

        </div><!-- .entry-content -->
        
    </div><!-- .contact-container-->
    
</article>

