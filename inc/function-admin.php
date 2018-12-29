<?php
/*

@package simpletheme

    ===================================
        CUSTOM ADMIN PAGE FUNCTIONS
    ===================================
*/

function simple_add_admin_page() {
    
    add_menu_page(
        'Simple Theme Options',
        'Simple Theme',
        'manage_options',
        'simple_theme',
        'simple_theme_create_page',
        get_template_directory_uri() . '/img/simple-icon.png',
        110
    );
    
    add_submenu_page(
        'simple_theme',
        'User Profile Options',
        'User',
        'manage_options',
        'simple_theme',
        'simple_theme_create_page'
        
    );
    
    add_submenu_page(
        'simple_theme',
        'Contact Form Options',
        'Contact Form',
        'manage_options',
        'simple_theme_contact',
        'simple_contact_form_page' 
    );
}

add_action( 'admin_menu', 'simple_add_admin_page' );

//REGISTER CUSTOM SETTINGS
add_action( 'admin_init', 'simple_custom_settings' );

function simple_custom_settings() {
    //USER PROFILE SETTINGS
    register_setting( 'simple-user-settings', 'activate_user_sidebar', $args = array( 'default' => 1 ) );
    
    register_setting( 'simple-user-settings', 'profile_header', $args = array( 'default' => 'Hi! I\'m Example!' ) );
    register_setting( 'simple-user-settings', 'profile_description', 'simple_sanitize_description' );
    
    register_setting( 'simple-user-settings', 'profile_picture' );
    
    register_setting( 'simple-user-settings', 'facebook_handler' );
    register_setting( 'simple-user-settings', 'pinterest_handler' );
    register_setting( 'simple-user-settings', 'twitter_handler', 'simple_sanitize_twitter_handler' );
    register_setting( 'simple-user-settings', 'instagram_handler' );
    register_setting( 'simple-user-settings', 'tumblr_handler' );
    register_setting( 'simple-user-settings', 'soundcloud_handler' );
    register_setting( 'simple-user-settings', 'linkedin_handler' );
    
    add_settings_section(
        'simple-user-profile-options',
        'User Sidebar Options',
        'simple_user_profile_options',
        'simple_theme'
    );
      
    add_settings_field( 'activate-sidebar', 'Display User Profile Sidebar', 'simple_activate_user_sidebar', 'simple_theme', 'simple-user-profile-options' );
    
    add_settings_field( 'profile-header', 'Profile Header', 'simple_user_profile_header', 'simple_theme', 'simple-user-profile-options' ); 
    add_settings_field( 'profile-description', 'Profile Description', 'simple_user_profile_description', 'simple_theme', 'simple-user-profile-options' );
    
    add_settings_field( 'profile-picture', 'Profile Picture', 'simple_user_profile_picture', 'simple_theme', 'simple-user-profile-options' );
    
    add_settings_field( 'profile-facebook', 'Facebook Handler', 'simple_user_facebook', 'simple_theme', 'simple-user-profile-options' );
    add_settings_field( 'profile-pinterest', 'Pinterest Handler', 'simple_user_pinterest', 'simple_theme', 'simple-user-profile-options' );
    add_settings_field( 'profile-twitter', 'Twitter Handler', 'simple_user_twitter', 'simple_theme', 'simple-user-profile-options' );
    add_settings_field( 'profile-instagram', 'Instagram Handler', 'simple_user_instagram', 'simple_theme', 'simple-user-profile-options' );
    add_settings_field( 'profile-tumblr', 'Tumblr Handler', 'simple_user_tumblr', 'simple_theme', 'simple-user-profile-options' );
    add_settings_field( 'profile-soundcloud', 'SoundCloud Handler', 'simple_user_soundcloud', 'simple_theme', 'simple-user-profile-options' );
    add_settings_field( 'profile-linkedin', 'LinkedIn Handler', 'simple_user_linkedin', 'simple_theme', 'simple-user-profile-options' );
    
    //CONTACT FORM OPTIONS
    register_setting( 'simple-contact-options', 'activate_contact', $args = array( 'default' => 1 ) );
    
    add_settings_section( 
        'simple-contact-section', 
        'Contact Form', 
        'simple_contact_section', 
        'simple_theme_contact' 
    );
    
    add_settings_field( 'activate-form', 'Activate Contact Form', 'simple_activate_contact', 'simple_theme_contact', 'simple-contact-section' );
}

/*
    ===================================
        USER PROFILE CALLBACKS
    ===================================
*/

//USER PROFILE OPTIONS SECTION
function simple_user_profile_options() {
    echo 'Customize User Profile Widget Settings';
}

//USER PROFILE SIDEBAR ACTIVATION FIELD
function simple_activate_user_sidebar() {
    $options = get_option( 'activate_user_sidebar' );
    $checked = ( @$options == 1 ? 'checked' : '' ); 
        
    echo '<label><input type="checkbox" id="activate_user_sidebar" name="activate_user_sidebar" value="1" '.$checked.'></label>';
}

//PROFILE DESCRIPTION SETTINGS FIELD
function simple_user_profile_header() {
    $header = esc_attr( get_option('profile_header') );
    
    echo '<input type="text" name="profile_header" value="'.$header.'" placeholder="Profile Header" />';  
}

//PROFILE DESCRIPTION SETTINGS FIELD
function simple_user_profile_description() {
    $description = esc_attr( get_option('profile_description') );
    
    echo '<div id="userDesc"><textarea id="profile_description" name="profile_description">'.$description.'</textarea></div>';
}

//PROFILE PICTURE SETTINGS FIELD
function simple_user_profile_picture() {
    
    $user_image = esc_attr( get_option('profile_picture') );
    
    if( empty($user_image) ) {
        echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="simple-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture </button>
        
        <input type="hidden" id="profile-picture" name="profile_picture" value="" />';
    } else {
        echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="simple-icon-button dashicons-before dashicons-format-image"</span> Replace Profile Picture</button>
        
        <input type="hidden" id="profile-picture" name="profile_picture" value="'.$user_image.'" />
        
        <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="simple-icon-button dashicons-before dashicons-no"></span> Remove</button>';
    }
}

//FACEBOOK SETTINGS FIELD
function simple_user_facebook() {
    $facebook = esc_attr( get_option('facebook_handler') );
    
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';  
}  

//PINTEREST SETTINGS FIELD
function simple_user_pinterest() {
    $pinterest = esc_attr( get_option('pinterest_handler') );
    
    echo '<input type="text" name="pinterest_handler" value="'.$pinterest.'" placeholder="Pinterest handler" />';  
} 

//TWITTER SETTINGS FIELD
function simple_user_twitter() {
    $twitter = esc_attr( get_option('twitter_handler') );
    
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" />';  
} 

//INSTAGRAM SETTINGS FIELD
function simple_user_instagram() {
    $instagram = esc_attr( get_option('instagram_handler') );
    
    echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram handler" />';  
} 

//TUMBLR SETTINGS FIELD
function simple_user_tumblr() {
    $tumblr = esc_attr( get_option('tumblr_handler') );
    
    echo '<input type="text" name="tumblr_handler" value="'.$tumblr.'" placeholder="Tumblr handler" />';  
}

//SOUNDCLOUD SETTINGS FIELD
function simple_user_soundcloud() {
    $soundcloud = esc_attr( get_option('soundcloud_handler') );
    
    echo '<input type="text" name="soundcloud_handler" value="'.$soundcloud.'" placeholder="SoundCloud handler" />';  
}

//LINKEDIN SETTINGS FIELD
function simple_user_linkedin() {
    $linkedin = esc_attr( get_option('linkedin_handler') );
    
    echo '<input type="text" name="linkedin_handler" value="'.$linkedin.'" placeholder="LinkedIn handler" />';  
}

//CONTACT FORM OPTIONS SECTIONS
function simple_contact_section() {
    echo 'Activate and Deactivate the Built-in Contact Form';
}

//CONTACT FORM ACTIVATION FIELD
function simple_activate_contact() {
    $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' ); 
        
    echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.'></label>';
}

/*
    ===================================
        SANITIZATION FUNCTIONS
    ===================================
*/

function simple_sanitize_description( $input ) {
    $output = esc_textarea( $input );
    
    return $output;
}

function simple_sanitize_twitter_handler( $input ) {
    $output = sanitize_text_field( $input ); 
    $output = str_replace('@', '', $output);
        
    return $output;
}

/*
    ===================================
        ADMIN PAGE TEMPLATES
    ===================================
*/

//SIMPLE THEME ADMIN 'User' PAGE
function simple_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/simple-user.php' );
}

//SIMPLE THEME ADMIN 'Contact Form' PAGE
function simple_contact_form_page() {
    require_once( get_template_directory() . '/inc/templates/simple-contact-form.php' );
}