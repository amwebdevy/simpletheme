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
                            <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'simpletheme' ), get_search_query() ); ?></h2>
                        </header>

                    </main>
                </div><!-- #primary -->

                <?php
                    if( have_posts() ):

                        while( have_posts() ): the_post();

                            get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;

                    else:

                        echo '<div class="no-search"><h1>No Results!</h1><h4>Sorry, no content matched your criteria. Please try again with some different keywords.</h4></div>';

                    endif;
                ?>

            </div><!-- .simple-posts-container -->

            <div class="row post-nav-container">

                <div class="col-xs-6 text-left post-nav">
                    <?php next_posts_link('« Older Posts'); ?>
                </div>

                <div class="col-xs-6 text-right post-nav">
                    <?php previous_posts_link('Newer Posts »'); ?>
                </div>

            </div><!-- .row -->

        </div><!-- .archive-container -->
        
        <?php get_sidebar('simple-archive-pages-sidebar'); ?>
        
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>