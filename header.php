<?php
    
    /*  
        @package simpletheme
    */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php bloginfo( 'name' ); wp_title(); ?></title>

        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php 
            if( is_singular() && pings_open( get_queried_object() ) ): ?>
                <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    
        <div class="container-fluid">
            <div class="row">

                <header class="header-container header-image text-center">

                    <div class="nav-container">
                        
                        <nav class="navbar navbar-simple">
                            
                            <div class="focus-overlay"></div>
                            
                            <div class="search-form-container">
                                <div class="container">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>

                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav',
                                    'walker' => new Simple_Walker_Nav_Primary()

                                ) );
                            ?>
                            
                            <div class="header-content-md table"> 
                                <div class="table-cell">

                                    <div class="site-info">
                                        
                                        <a href="<?php echo home_url(); ?>">
                                            <h1 class="site-title simple-icon">
                                                <?php if ( !has_header_image() ): ?>
                                                
                                                    <span class="simple-logo"></span>
                                                
                                                <?php else: ?>
                                                
                                                    <div class="theme-header">
                                                        <span class="theme-header-image" style="background-image: url(<?php echo get_header_image(); ?>);"></span>
                                                    </div>
                                            
                                                <?php endif; ?>
                                                
                                                <span class="hide"><?php bloginfo('name'); ?></span>
                                            </h1>

                                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                                        </a>
                                        
                                    </div><!-- .site-info -->

                                </div><!-- .table-cell -->
                            </div><!-- .header-content-md -->

                        </nav>

                        <div class="simple-sidebar sidebar-closed">
                            
                            <div id="scroll-nav" class="simple-sidebar-container">
                                
                                <div class="sidebar-scroll">
                                    <?php get_sidebar(); ?>
                                </div>
                                
                            </div><!-- .simple-sidebar-container -->
                            
                        </div><!-- .simple-sidebar -->
                        
                        <a class="js-toggleSidebar sidebar-open">
                            <span class="simple-icon simple-menu"></span>
                        </a>
                        
                    </div><!-- .nav-container -->

                    <div class="header-content table">
                        <div class="table-cell">
                            
                            <div class="site-info">
                                
                                <a href="<?php echo home_url(); ?>">
                                    <h1 class="site-title simple-icon">
                                        <?php if ( !has_header_image() ): ?>
                                                
                                            <span class="simple-logo"></span>
                                                
                                        <?php else: ?>
                                                
                                            <div class="theme-header">
                                                <span class="theme-header-image" style="background-image: url(<?php echo get_header_image(); ?>);"></span>
                                            </div>
                                            
                                        <?php endif; ?>
                                        <span class="hide"><?php bloginfo('name'); ?></span>
                                    </h1>
                                
                                    <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                                </a>
                                
                            </div><!-- .site-info -->
                            
                        </div><!-- .table-cell -->
                    </div><!-- .header-content -->

                </header><!-- .header-container --> 

            </div><!-- .row -->
        </div><!-- .container-fluid -->

