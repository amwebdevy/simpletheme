<?php /*

@package simpletheme

*/

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="size-main" rold="main">
            
            <div class="container">
                <div class="row">
                    
                    <?php
                        if( have_posts() ):

                            while( have_posts() ): the_post();

                             
                            endwhile;

                        endif;
                    ?>

                    <?php  
                        include 'inc/templates/simple-popular-posts.php';
                        include 'inc/templates/simple-recent-posts.php';
                    ?>
                        
                </div><!-- .row -->
            </div><!-- .container -->
            
        </main>
        
    </div><!-- #primary -->

<?php get_footer(); ?>