<?php 

/*

@package simpletheme
-- ASIDE POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-format-aside' ); ?>>
    
    <div class="aside-container">
    
        <div class="row">
        
            <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                
            <div class="aside-featured background-image" style="background-image: url(<?php                                                   
                if( !simple_get_single_attachment() ): echo get_template_directory_uri() . '/img/placeholder.jpg'; 

                else: echo simple_get_single_attachment();

                endif; ?>);"></div>  
               
                
            </div><!-- .col-md-2 -->
            
            <div class="col-xs-12 col-sm-9 col-md-10">      
                      
                <div class="entry-content">

                    <div class="entry-categories">
                        <?php echo simple_posted_categories(); ?>
                    </div>
                    
                    <div class="entry-date">
                        <?php echo simple_posted_date(); ?>
                    </div>
            
                    <div class="entry-excerpt">
                        <?php the_content(); ?>
                    </div>

                </div><!-- .entry-content -->
                
            </div><!-- .col-md-10 -->
            
        </div><!-- .row -->
        
        <footer class="entry-footer">
            <?php echo simple_posted_footer(); ?>
        </footer>
        
    </div><!-- .aside-container -->

</article>