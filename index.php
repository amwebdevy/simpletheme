<?php /*

@package simpletheme

*/

get_header(); ?>

<div class="container">
    <div class="row">
        
        <div class="archive-container <?php ( is_active_sidebar( 'simple-archive-pages-sidebar' ) ? print 'col-md-9' : print 'full-width' ); ?>">

            <div class="container simple-posts-container">

                <div id="primary" class="content-area">
                    <main id="main" class="size-main" rold="main">

                        <header class="blog-header">
                            <?php the_archive_title('<h2 class="page-title">', ':</h2>'); ?>
                        </header>

                    </main>
                </div><!-- #primary -->

                <?php
                    if( have_posts() ):

                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;

                    endif;
                ?>

            </div><!-- .simple-posts-container -->

            <div class="post-nav-container">
                    
                <div class="col-xs-6 text-left post-nav">
                    <?php next_posts_link('« Older Posts'); ?>
                </div>
                
                <div class="col-xs-6 text-right post-nav">
                    <?php previous_posts_link('Newer Posts »'); ?>
                </div>
         
            </div>

        </div><!-- .archive-container -->
        
        <?php get_sidebar('simple-archive-pages-sidebar'); ?>
        
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
