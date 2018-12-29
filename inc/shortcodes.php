<?php
/*

@package simpletheme

    ==========================
        SHORTCODE OPTIONS
    ==========================
*/

//CONTACT FORM [contact_form]
function simple_contact_form( $atts, $content = null ) {
    $atts = shortcode_atts(
        array(),
        $atts,
        'contact_form'
    );
    
    ob_start();
    
    include 'templates/contact-form.php';
    
    return ob_get_clean();
}

add_shortcode( 'contact_form', 'simple_contact_form' );