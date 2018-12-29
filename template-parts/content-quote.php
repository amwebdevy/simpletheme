<?php 

/*

@package simpletheme
-- QUOTE POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-format-quote' ); ?>>
    
    <header class="entry-header standard-featured background-image" style="background-image: url(<?php                                                   
        if( !simple_get_single_attachment() ): echo simple_default_post_attachment( get_post_format() );  

        else: echo simple_get_single_attachment();

        endif; ?>);">
        
        <div class="quote-overlay"></div>
        
            <div class="post-header">
                
                <a href="<?php the_permalink(); ?>">

                    <div class="quote-content-container text-center">
                        
                        <span class="simple-icon simple-quotes-right"></span>

                        <div class="quote-content"><?php echo get_the_content(); ?></div>

                    </div><!-- .quote-content-container -->

                </a>
                
            </div><!-- .post-header -->
        
    </header>
    
    <footer class="entry-footer">
        <?php echo simple_posted_footer(); ?>
    </footer>

</article>