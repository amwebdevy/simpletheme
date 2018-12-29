<div class="container front-page-section popular-posts-container">
        
    <header class="entry-header text-center">

        <div class="popular-posts-label">
            <h3>Popular Posts</h3>
        </div>

        <div class="entry-background-container">
            <div class="entry-background background-image"></div>
        </div>

        <div id="post-gallery-popular" class="carousel slide carousel-fade simple-carousel-popular" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

            <?php 
                $post_args = array(
                    'post_type'       => 'post',
                    'posts_per_page'  => '4',
                    'meta_key'        => 'simple_post_views',
                    'orderby'         => 'meta_value_num',
                    'order'           => 'DESC'
                );

                $posts = get_posts( $post_args );

                $i = 0;  

                foreach( $posts as $post ): setup_postdata( $post ); $active = ( $i == 0 ? ' active' : '' ); ?>

                    <div class="item <?php echo $active; ?>" id="post-<?php the_ID(); ?>" data-featured="<?php

                        if( !simple_get_single_attachment() ): echo simple_default_post_attachment( get_post_format() );  

                        else: echo simple_get_single_attachment();

                        endif; ?>">

                        <div class="popular-featured">

                            <div class="post-header">

                                <div class="entry-categories">
                                    <?php echo simple_posted_categories(); ?>
                                </div>

                                <div class="entry-title">
                                    <?php the_title( '<h1 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>' ); ?>
                                </div>

                                <div class="entry-date">
                                    <?php echo simple_posted_date(); ?>
                                </div>

                            </div><!-- .post-header -->
                            
                        </div><!-- .popular-featured -->
                        
                    </div><!-- .item -->

                <?php $i++; wp_reset_postdata(); endforeach; ?>

            </div><!-- .carousel-inner -->

            <!-- Carousel Navigation -->
            <a class="left carousel-control" href="#post-gallery-popular" role="button" data-slide="prev">
                <div class="table">
                    <div class="table-cell">

                        <div class="preview-container">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            <!-- .sr-only -->
                            <span class="sr-only">Previous</span>
                        </div><!-- .preview-container -->

                    </div><!-- .table-cell -->
                </div><!-- .table -->
            </a>
            <a class="right carousel-control" href="#post-gallery-popular" role="button" data-slide="next">
                <div class="table">
                    <div class="table-cell">

                        <div class="preview-container">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                            <!-- .sr-only -->
                            <span class="sr-only">Next</span>
                        </div><!-- .preview-container -->

                    </div><!-- .table-cell -->
                </div><!-- .table -->
            </a>

        </div><!-- .carousel -->

    </header>
    
</div><!-- .popular-posts-container --> 