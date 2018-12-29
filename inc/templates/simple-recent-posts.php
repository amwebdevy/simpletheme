<div class="container front-page-section recent-posts-container-<?php echo sidebar_active('simple-front-page-sidebar'); ?>">
        
    <header class="entry-header">

        <div class="recent-header">
            <h3>Most Recent <a href="<?php echo get_blog_posts_page_url(); ?>">View All ></a></h3>
        </div>

        <div class="row recent-posts">

        <?php 
            $post_args = array(
                'post_type'       => 'post',
                'posts_per_page'  => ( is_active_sidebar( 'simple-front-page-sidebar' ) ? '6' : '3' ),
                'orderby'         => 'date',
                'order'           => 'DESC'
            );

            $posts = get_posts( $post_args );

            if( $posts ):

                foreach( $posts as $post ): setup_postdata( $post ); ?>

                    <div class="col-sm-4 <?php ( is_active_sidebar( 'simple-front-page-sidebar' ) ? print 'col-md-6' : print 'col-md-4' ); ?> post-container">

                        <div class="entry-content">

                            <a class="standard-featured-link" href="<?php the_permalink(); ?>">
                                <div class="standard-featured background-image" style="background-image: url(<?php                                                   
                                    if( !simple_get_single_attachment() ): echo simple_default_post_attachment( get_post_format() );  

                                    else: echo simple_get_single_attachment();

                                    endif; ?>);"></div>

                                <div class="entry-post-type">
                                    <span class="dashicons <?php echo simple_post_icon( get_post_format() ); ?>"></span>
                                </div>  
                            </a>

                        </div><!-- .entry-content -->

                        <div class="post-header">

                            <div class="entry-categories">
                                <?php echo simple_posted_categories(); ?>
                            </div>

                            <div class="title-date-container">
                                <div class="entry-title">
                                    <?php the_title( '<h2 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>' ); ?>
                                </div>
                            </div><!-- .title-date-container -->

                        </div><!-- .post-header -->

                    </div><!-- .post-container -->

            <?php endforeach; wp_reset_postdata(); endif; ?>

        </div><!-- .recent-posts -->

    </header>
    
</div><!-- .recent-posts-container -->
    
<?php get_sidebar('front-page-sidebar'); ?>