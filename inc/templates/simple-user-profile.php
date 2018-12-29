<?php 
    //USER VALUES
    $profile_activation = get_option('activate_user_sidebar', $default = true );

    $profile_picture = ( !empty(get_option('profile_picture')) ? esc_attr( get_option('profile_picture') ) : get_template_directory_uri() . '/img/placeholder.jpg' );

    $header = esc_attr( get_option('profile_header') );
    
    $description = ( !empty(get_option('profile_description')) ? esc_attr( get_option('profile_description') ) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries." );

    $profile_social = array(
        'facebook'    => array( 'value' => esc_attr( get_option('facebook_handler') ),   'domain_part' => 'facebook.com/'.esc_attr( get_option('facebook_handler') ) ), 
        'pinterest'   => array( 'value' => esc_attr( get_option('pinterest_handler') ),  'domain_part' => 'pinterest.com/'.esc_attr( get_option('pinterest_handler') ) ),  
        'twitter'     => array( 'value' => esc_attr( get_option('twitter_handler') ),    'domain_part' => 'twitter.com/'.esc_attr( get_option('twitter_handler') ) ),
        'instagram'   => array( 'value' => esc_attr( get_option('instagram_handler') ),  'domain_part' => 'instagram.com/'.esc_attr( get_option('instagram_handler') ) ),
        'tumblr'      => array( 'value' => esc_attr( get_option('tumblr_handler') ),     'domain_part' => esc_attr( get_option('tumblr_handler') ).'.tumblr.com' ),
        'soundcloud'  => array( 'value' => esc_attr( get_option('soundcloud_handler') ), 'domain_part' => 'soundcloud.com/'.esc_attr( get_option('soundcloud_handler') ) ),
        'linkedin'    => array( 'value' => esc_attr( get_option('linkedin_handler') ),   'domain_part' => 'linkedin.com/in/'.esc_attr( get_option('linkedin_handler') ) )
    );

?>

 <?php if ( $profile_activation ): ?>

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
                    <a class="description-link" href="<?php echo get_page_link( get_page_by_title( 'about', 'about-me' )->ID ); ?>">Read More</a>
                    
                </div><!-- .user-description-container -->

                <div class="icons-wrapper">
                    
                    <div class="user-social-media">

                        <?php foreach( $profile_social as $social_name => $social_input ): ?>

                            <?php if( !empty($social_input['value']) ): ?>

                                <a href="http://<?php print $social_input['domain_part']; ?>" target="_blank"><span class="simple-social-icon simple-icon simple-<?php print $social_name; ?>"></span></a>

                            <?php endif; ?>

                        <?php endforeach; ?>
                        
                    </div><!-- .user-social-media -->

                </div><!-- .icons-wrapper -->

            </div><!-- .user-container -->     
        </div><!-- .user-profile-section -->

    </div><!-- .simple-profile -->  

<?php endif; ?>