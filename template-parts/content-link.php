<?php 

/*

@package simpletheme
-- LINK POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-format-link' ); ?>>
    
    <header class="entry-header">
        
        <div class="post-header text-center">
            
            <div class="entry-title">
            
            <?php
                
                $link = simple_grab_url();
                
                the_title( '<h1 class="post-title"><a href="' . $link . '" target="_blank">', '<div class="link-icon"><span class="simple-icon simple-link"></span></div></a></h1>' ); 
            
            ?>
                
            </div><!-- .entry-title -->
            
        </div><!-- .post-header -->

    </header>
    
    <footer class="entry-footer">
        <?php echo simple_posted_footer(); ?>
    </footer>

</article>