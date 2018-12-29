<?php /*

@package simpletheme

*/

get_header(); ?>

    <div id="primary" class="content-area">
        
        <main id="main" class="size-main" role="main">   
            
            <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12 text-center">
                        
                        <section class="error-404 not-found">
                            
                            <div class="page-error">
                                <span class="simple-icon simple-exclamation"></span>
                            </div>
                            
                            <div class="error-content">
                                
                                <header class="page-header">
                                    <h1 class="page-title"><?php _e( '404', 'simpletheme' ); ?></h1><h2><?php _e( 'Page Not Found!', 'simpletheme' ); ?></h2>
                                </header>
                                
                                <div class="page-content">
                                    
                                    <p><?php _e( 'The page you are looking for is not available.', 'simpletheme'); ?> </br> <?php _e(' Click the link below to return home.', 'simpletheme' ); ?></p>
                            
                                    <div class="error-home-redirect">
                                        <a class="error-home-link" href="<?php echo get_home_url(); ?>">Take Me Home<span class="simple-icon simple-arrow-right"></span></a>
                                    </div>
                            
                                </div><!-- .page-content -->

                            </div><!-- .error-content -->
                    
                        </section><!-- .error-404 -->
                        
                    </div><!-- .col-xs-12 -->
            
                </div><!-- .row -->
            </div><!-- .container -->

        </main>

    </div><!-- #primary -->

<?php get_footer(); ?>