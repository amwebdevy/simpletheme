<?php 

/*

@package simpletheme
-- STANDARD POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
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

    </header>

    <div class="entry-content">
    
        <a class="standard-featured-link" href="<?php the_permalink(); ?>">
            <div class="standard-featured background-image" style="background-image: url(<?php                                                   
                if( !simple_get_single_attachment() ): echo simple_default_post_attachment( get_post_format() );  

                else: echo simple_get_single_attachment();

                endif; ?>);"></div>   
        </a>
        
        <h2 class="round-cap"></h2>
        
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
    </div><!-- .entry-content -->
    
    <footer class="entry-footer">
        <?php echo simple_posted_footer(); ?>
    </footer>

</article>