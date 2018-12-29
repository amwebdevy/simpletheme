<?php 

/*

@package simpletheme
-- SINGLE POST TEMPLATE

*/

$profile_picture = ( !empty( get_avatar( get_the_author_meta('ID') ) ) ? get_avatar_url( get_the_author_meta('ID') )  : get_template_directory_uri() . '/img/placeholder.jpg' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="entry-header text-center">
        
        <div class="entry-categories">
            <?php echo simple_posted_categories(); ?>
        </div>  
        
        <div class="entry-title">
            <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
        </div>
        
        <div class="entry-date">
            <?php echo simple_posted_date(); ?>
        </div>

    </header>

    <div class="entry-content clearfix">
        
        <div class="post-header-container">
            
            <div class="standard-featured background-image" style="background-image: url(<?php
                if( !simple_get_single_attachment() ):
                                                                   
                    echo simple_default_post_attachment( get_post_format() );  
                    
                else: echo simple_get_single_attachment();
                                
                endif; ?>);">
            </div><!-- .background-image -->
            
            <div class="featured-author text-center">
                
                <div class="user-container">
                    <img class="user-image" src="<?php print $profile_picture; ?>" alt="User Image" />
                </div>
                
                <div class="post-author">
                    <p>by <a href="<?php echo get_page_link( get_page_by_title( 'about', 'about-me' )->ID ); ?>"><?php the_author(); ?></a></p>
                </div>
                
            </div><!-- .featured-author -->
            
        </div><!-- .post-header-container -->
        
        <div class="post-content-container <?php ( is_active_sidebar( 'simple-single-post-sidebar' ) ? print 'col-xs-12 col-md-9' : print 'col-md-12' ); ?> post-container">

            <?php 
                the_content(); 

                echo simple_post_navigation();
            ?>
            
            <?php if( comments_open() ): comments_template(); endif; ?>
            
        </div><!-- .post-container -->
        
    </div><!-- .entry-content -->
    
    <?php get_sidebar('simple-single-post-sidebar'); ?>
    
</article>