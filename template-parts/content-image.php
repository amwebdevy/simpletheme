<?php 

/*

@package simpletheme
-- IMAGE POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-format-image' ); ?>>
    
    <header class="entry-header background-image" style="background-image: url(<?php                                                   
        if( !simple_get_single_attachment() ): echo simple_default_post_attachment( get_post_format() );  

        else: echo simple_get_single_attachment();

        endif; ?>);">
        
        <div class="post-header">
        
            <div class="title-date-container">
                
                <div class="entry-categories">
                    <?php echo simple_posted_categories(); ?>
                </div>
                
                <div class="entry-title">
                    <?php the_title( '<h1 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>' ); ?>
                </div>
                
                <div class="entry-date">
                    <?php echo simple_posted_date(); ?>
                </div>

            </div><!-- .title-date-container -->
            
        </div><!-- .post-header -->

        <div class="entry-excerpt image-caption text-center">
            <?php the_excerpt(); ?>
        </div>
        
    </header>
    
    <footer class="entry-footer">
        <?php echo simple_posted_footer(); ?>
    </footer>

</article>