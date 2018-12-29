<?php
/*

@package simpletheme

    ===================================
        ADMIN ENQUEUE FUNCTIONS 
    ===================================
*/

function simple_load_admin_scripts( $hook ) {
        
    //REGISTER ADMIN CSS 
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
    
    wp_register_style( 'simple-admin', get_template_directory_uri() . '/css/simple.admin.css', array(), '1.0.0', 'all' );
    
    //REGISTER ADMIN JS
    wp_register_script( 'simple_admin_script', get_template_directory_uri() . '/js/simple.admin.js', array('jquery'), '1.0.0', true );
    
    $admin_pages = array(
        'toplevel_page_simple_theme',
        'simple-theme_page_simple_theme_contact',
    );
    
    //ENQUEUE ADMIN CSS
    if( in_array($hook, $admin_pages) ) {
        wp_enqueue_style( 'bootstrap' );  
        wp_enqueue_style( 'simple-admin' );
    } 
    
    if ( 'toplevel_page_simple_theme' == $hook ) {  
        wp_enqueue_media();
        wp_enqueue_script( 'simple_admin_script' );   
    }
}

add_action( 'admin_enqueue_scripts', 'simple_load_admin_scripts' );

/*
    ===================================
        FRONT-END ENQUEUE FUNCTIONS 
    ===================================
*/

function simple_load_scripts() {
    
    //REGISTER CSS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
    
    wp_enqueue_style( 'simple', get_template_directory_uri() . '/css/simple.css', array(), '1.0.0', 'all' );
    
    wp_enqueue_style( 'oswald', 'https://fonts.googleapis.com/css?family=Oswald:200,400,600' );
    
    wp_enqueue_style( 'knewave', 'https://fonts.googleapis.com/css?family=Knewave' );
    
    wp_enqueue_style( 'dashicons' );
    
    //REGISTER JS
        /* Deregister defaul jQuery, force jQuery to footer. */
        wp_deregister_script( 'jquery' ); 
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true ); 
        
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true ); 
    
    wp_enqueue_script( 'simple', get_template_directory_uri() . '/js/simple.js', array('jquery'), '1.0.0', true );
    
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script( 'comment-reply' );
    }

}

add_action( 'wp_enqueue_scripts', 'simple_load_scripts' );