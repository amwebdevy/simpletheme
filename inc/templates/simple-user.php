<h1 id="user-profile-title">User Profile Settings</h1>

<?php settings_errors(); ?>

<?php 
    //FIELD INPUT VALUES
    $profile_picture = ( !empty(get_option('profile_picture')) ? esc_attr( get_option('profile_picture') ) : get_template_directory_uri() . '/img/placeholder.jpg' );
    
    $header = esc_attr( get_option('profile_header') );
    $description = esc_attr( get_option('profile_description') );

    $profile_social = array(
        'facebook'    => array( 'value' => esc_attr( get_option('facebook_handler') ) ), 
        'pinterest'   => array( 'value' => esc_attr( get_option('pinterest_handler') ) ),  
        'twitter'     => array( 'value' => esc_attr( get_option('twitter_handler') ) ),
        'instagram'   => array( 'value' => esc_attr( get_option('instagram_handler') ) ),
        'tumblr'      => array( 'value' => esc_attr( get_option('tumblr_handler') ) ),
        'soundcloud'  => array( 'value' => esc_attr( get_option('soundcloud_handler') ) ),
        'linkedin'    => array( 'value' => esc_attr( get_option('linkedin_handler') ) )
    );

?>

<div class="container-fluid admin-user-section">
    
    <div class="profile-container">
        <div class="col-xs-12 col-sm-3">
            <div class="simple-profile"> 

                <div class="user-profile-section">

                    <div class="user-container">
                        
                        <div class="user-image-container"> 
                            <div class="user-background-image background-image-default" id="profile-picture-preview" style="background-image: url(<?php print $profile_picture; ?>);"></div> 
                        </div>

                        <div class="user-description-container">
                            
                            <?php if( !empty($header) ): ?>
                                <p id="user-description-header"><?php print $header; ?></p>
                            <?php endif; ?>
                            
                            <p id="user-description"><?php print $description; ?></p>
                            <a class="description-link">Read More</a>
                            
                        </div><!-- .user-description-container -->

                        <div class="icons-wrapper">
                            
                            <div class="user-social-media">

                                <?php foreach( $profile_social as $social_name => $social_input ): ?>

                                    <?php if( !empty($social_input['value']) ): ?>

                                        <span class="simple-social-icon simple-icon simple-<?php print $social_name; ?>"></span>

                                    <?php endif; ?>

                                <?php endforeach; ?>
                                
                            </div><!-- .user-social-media -->

                        </div><!-- .icons-wrapper -->

                    </div><!-- .user-container -->

                </div><!-- .user-profile-section -->

            </div><!-- .simple-profile -->
        </div><!-- .col-sm-3 -->
    </div><!-- profile-container -->
    
    <div class="settings-section">
        <form id="submitForm" method="post" action="options.php" class="simple-user-profile-form">
            <?php settings_fields( 'simple-user-settings' ); ?>
            <?php do_settings_sections( 'simple_theme' ); ?>

            <?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>

        </form>    
    </div><!-- .settings-section -->
    
 </div><!-- .admin-user-section -->