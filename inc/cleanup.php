<?php
/*

@package simpletheme

    ===================================
        REMOVE GENERATOR VER. NUMBER
    ===================================
*/

function simple_remove_wp_version_strings( $src ) {
    
    global $wp_version;
    
    parse_str( parse_url($src, PHP_URL_QUERY), $query );
    
    if( !empty($query['ver']) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

//JS FILTER
add_filter(
    'script_loader_src',
    'simple_remove_wp_version_strings'
);

//CSS FILTER
add_filter(
    'style_loader_src',
    'simple_remove_wp_version_strings'
);

//GENERATOR METATAG
function simple_remove_meta_version() {
    return '';
}

add_filter( 'the_generator', 'simple_remove_meta_version');