<?php 

/*

@package simpletheme
-- GALLERY POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-format-gallery' ); ?>>
    
    <header class="entry-header text-center">
        
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
        
        <?php if( simple_get_attachment() ): ?>
            
            <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
                 
                <div class="carousel-inner" role="listbox">
                
                <?php 
                    $attachments = simple_get_bs_slides( simple_get_attachment(7) );
                    
                    foreach( $attachments as $attachment ): ?>
                    
                        <div class="item <?php echo $attachment['class']; ?> background-image standard-featured" style="background-image: url(<?php echo $attachment['url']; ?>);"></div>
                    
                <?php endforeach; ?>
                
                </div><!-- .carousel-inner -->
        
            </div><!-- .carousel -->
        
        <?php else: ?>
        
            <div class="entry-content">
    
            <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                <div class="standard-featured background-image" style="background-image: url(<?php                                                   
                    if( !simple_get_single_attachment() ): echo simple_default_post_attachment( get_post_format() );  

                    else: echo simple_get_single_attachment();

                    endif; ?>);"></div>   
            </a>
        
            </div><!-- .entry-content -->
        
        <?php endif; ?>

    </header>
    
    <footer class="entry-footer">
        <?php echo simple_posted_footer(); ?>
    </footer>

</article>