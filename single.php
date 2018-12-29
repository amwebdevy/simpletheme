<?php /*

@package simpletheme

*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="size-main" role="main">
            
            <div class="container">         
                <div class="row">
                    
                    <div class="col-xs-12 single-container">
                        
                        <?php 

                            if( have_posts() ):          

                                while( have_posts() ): the_post();
                        
                                    simple_save_post_views( get_the_ID() );

                                    get_template_part( 'template-parts/single', get_post_format() );
     
                                endwhile;

                            endif;
                        ?>
                        
                     </div><!-- .col-xs-12 -->

                </div><!-- .row -->
            </div><!-- .container -->
            
        </main>
    </div><!-- #primary -->

<?php get_footer(); ?>