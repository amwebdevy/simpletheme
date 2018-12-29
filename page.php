<?php /*

@package simpletheme

*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="size-main" role="main">
    
            <div class="container">
                <div class="row">
                    
                    <div class="page-container <?php ( is_active_sidebar( 'simple-page-sidebar' ) ? print 'col-md-9' : print 'col-xs-12' ); ?>">

                        <?php 
                            if( have_posts() ):

                                while( have_posts() ): the_post();

                                    get_template_part( 'template-parts/content', 'page' ); 

                                endwhile;

                            endif;
                        ?>

                    </div><!-- .page-container -->
                
                 <?php get_sidebar('simple-page-sidebar'); ?>
                
                </div><!-- .row -->
            </div><!-- .container -->
  
        </main>
    </div><!-- #primary -->

<?php get_footer(); ?>