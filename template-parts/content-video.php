<?php 

/*

@package simpletheme
-- VIDEO POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-format-video' ); ?>>
        
    <header class="entry-header">
        
        <div class="post-header">
            
            <div class="entry-categories">
                <?php echo simple_posted_categories(); ?>
            </div>
        
            <div class="title-date-container">
                
                <div class="entry-title">
                    <?php the_title( '<h1 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>' ); ?>
                </div>
                
                <div class="entry-date">
                    <?php echo simple_posted_date(); ?>
                </div>

            </div><!-- .title-date-container -->
            
        </div><!-- .post-header -->
        
        <div class="embed-responsive embed-responsive-16by9">
            <?php echo simple_get_embedded_media( array('video', 'iframe') ); ?>
        </div>
    
    </header>
    
    <footer class="entry-footer">
        <?php echo simple_posted_footer(); ?>
    </footer>
    
</article>