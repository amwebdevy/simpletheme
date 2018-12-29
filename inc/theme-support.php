<?php
/*

@package simpletheme

    ===================================
        THEME SUPPORT FUNCTIONS 
    ===================================
*/

//ACTIVATE POST FORMATS
$formats = array( 
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'video',
        'audio',
    );

add_theme_support( 'post-formats', $formats );

//ACTIVATE CUSTOM HEADER
add_theme_support( 'custom-header' );

//ACTIVATE CUSTOM BACKGROUND
add_theme_support( 'custom-background' );

//ACTIVATE FEATURED IMAGE
add_theme_support( 'post-thumbnails' );

//ACTIVATE NAV MENU OPTION
function simple_register_nav_menu() {
    register_nav_menu(
        'primary',
        'Header Navigation Menu'
    );  
}

add_action( 'after_setup_theme', 'simple_register_nav_menu' );

//ACTIVATE HTML5 FEATURES
add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );  

//ACTIVATE THEME STARTER CONTENT
$starter_content = array(
    'widgets' => array(
        'simple-sidebar' => array(
            'categories',
            'recent-posts',
            'archives',
            'recent-comments',
        ),
        'simple-front-page-sidebar' => array(
            'meta',
            'categories',
        ),
        'simple-page-sidebar' => array(
            'search',
            'categories',
            'recent-posts',
            'archives',
        ),
        'simple-single-post-sidebar' => array(
            'categories',
            'recent-posts',
            'archives',
        ),
        'simple-archive-pages-sidebar' => array(
            'meta',
            'categories',
            'archives',
        ),
        'simple-footer-sidebar' => array(
            'recent-comments',
            'archives',
            'recent-posts',
            'search',
        ),
    ),
    'posts' => array(
        'home',
        'about',
        'contact' => array( 
            'template' => 'page-contact-template.php',
            'post_content' => _x('[contact_form]', 'Theme starter content'),
        ),
        'blog',
    ),
    'options' => array(
        'show_on_front' => 'page',
        'page_on_front' => '{{home}}',
        'page_for_posts' => '{{blog}}',
    ),
    'nav_menus' => array(
        'primary' => array(
            'name' => __( 'Header Menu', 'simpletheme' ),
            'items' => array(
                'link_home',
                'page_about',
                'page_contact',
            ),
        ),
    ),
    
);

add_theme_support( 'starter-content', $starter_content );

/*
    ===================================
        FRONT PAGE FUNCTIONS 
    ===================================
*/

function simple_get_single_attachment( $num = 1 ) {
    
    $output = '';
    
    if( has_post_thumbnail() && $num == 1 ):
    
        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    else:
    
        $attachments = get_posts( array(
            'post_type'      =>  'attachment',
            'posts_per_page' =>  $num,
            'post_parent'    =>  get_the_ID(),
            
        ) );
    
        if( $attachments && $num == 1 ):
            
            foreach( $attachments as $attachment ):   
                
                if( wp_attachment_is_image( $attachment->ID ) ):
                    $output = wp_get_attachment_url( $attachment->ID );
                endif;
    
            endforeach;
    
        endif;
    
    endif;
    
    return $output;
}

function simple_default_post_attachment( $post_format = false ) {
    
    $output = '';
    
    $formats = array(
        'aside'   => 'placeholder-aside.jpg',
        'gallery' => 'placeholder-gallery.jpg',
        'link'    => 'placeholder-link.jpg',
        'image'   => 'placeholder-image.jpg',
        'quote'   => 'placeholder-quote.jpg',
        'video'   => 'placeholder-video.jpg',
        'audio'   => 'placeholder-audio.jpg',
    );
    
    if( $post_format != false ):
    
        foreach( $formats as $format => $placeholder ):
    
            if( $format == $post_format ):
                
                $output .= $placeholder;
                    
            endif;
    
        endforeach;
    
    else: $output .= 'placeholder-standard.jpg';
    
    endif;
    
    return get_template_directory_uri() . '/img/' . $output;
} 

function get_blog_posts_page_url() {
	if ( 'page' === get_option( 'show_on_front' ) ):
		return get_permalink( get_option( 'page_for_posts' ) );
	endif;
    
	return get_home_url();
}

function simple_post_icon( $post_format = false ) {
    
    $output = '';
    
    $formats = array( 
        'aside'   => 'dashicons-format-aside',
        'gallery' => 'dashicons-format-gallery',
        'link'    => 'dashicons-admin-links',
        'image'   => 'dashicons-format-image',
        'quote'   => 'dashicons-format-quote',
        'video'   => 'dashicons-format-video',
        'audio'   => 'dashicons-format-audio',
    );
    
    if( $post_format != false ):
    
        foreach( $formats as $format => $icon ):

            if( $format == $post_format ):
                
                $output .= $icon;
                    
            endif;
    
        endforeach;
    
    else: $output .= 'dashicons-admin-post';
    
    endif; 
    
    return $output;  
}

/*
    ===================================
        SIDEBAR FUNCTIONS 
    ===================================
*/

function simple_sidebar_init() { 
    
     register_sidebar(
        array(
			'name' => esc_html__( 'Sidebar', 'simpletheme'),
			'id' => 'simple-sidebar',
			'description' => 'Dynamic Nav Sidebar',
			'before_widget' => '<section id="%1$s" class="simple-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="simple-widget-title">',
			'after_title' => '</h3>'
		)
    );
    
    register_sidebar(
        array(
			'name' => esc_html__( 'Front Page Sidebar', 'simpletheme'),
			'id' => 'simple-front-page-sidebar',
			'description' => 'Dynamic Front Page Sidebar',
			'before_widget' => '<section id="%1$s" class="simple-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="simple-widget-title">',
			'after_title' => '</h3>'
		)
    );
    
    register_sidebar(
        array(
			'name' => esc_html__( 'Single Post Sidebar', 'simpletheme'),
			'id' => 'simple-single-post-sidebar',
			'description' => 'Dynamic Single Post Sidebar',
			'before_widget' => '<section id="%1$s" class="simple-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="simple-widget-title">',
			'after_title' => '</h3>'
		)
    );
    
    register_sidebar(
        array(
			'name' => esc_html__( 'Archive Pages Sidebar', 'simpletheme'),
			'id' => 'simple-archive-pages-sidebar',
			'description' => 'Dynamic Archive Pages Sidebar',
			'before_widget' => '<section id="%1$s" class="simple-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="simple-widget-title">',
			'after_title' => '</h3>'
		)
    );
    
    register_sidebar(
        array(
			'name' => esc_html__( 'Page Sidebar', 'simpletheme'),
			'id' => 'simple-page-sidebar',
			'description' => 'Dynamic Page Sidebar',
			'before_widget' => '<section id="%1$s" class="simple-widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="simple-widget-title">',
			'after_title' => '</h3>'
		)
    );
    
    register_sidebar(
        array(
			'name' => esc_html__( 'Footer Sidebar', 'simpletheme'),
			'id' => 'simple-footer-sidebar',
			'description' => 'Dynamic Footer Sidebar',
			'before_widget' => '<section id="%1$s" class="simple-widget %2$s col-xs-12 col-md-4 col-lg-3">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="simple-widget-title">',
			'after_title' => '</h3>'
		)
    );
}

add_action('widgets_init', 'simple_sidebar_init');

/* Return full-width class if sidebar is inactive */
function sidebar_active( $sidebar ) {
    if ( ! is_active_sidebar( $sidebar ) ):
        return 'full-width';
    else: 
        return 'sidebar-active';
    endif;
}

/*
    ===================================
        BLOG LOOP FUNCTIONS 
    ===================================
*/

function simple_posted_categories() {

    $categories = get_the_category();
    $seperator = ' ';
    $output = '';
    $i = 1;
    
    if( !empty($categories) ):
        foreach( $categories as $category ):
            
            if( $i > 1 ): $output .= $seperator; endif;
    
            $output .= '<a class="cat-button" href="'. esc_url( get_category_link($category->term_id) ) .'" alt="'. esc_attr( 'View all posts in %s', $category->name ) .'">'. esc_html( $category->name ) .'</a>';
            $i++;
    
        endforeach;
    endif;
    
    return '<div class="posted-in">' . $output . '</div>'; 
}

function simple_posted_date() {
    $posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );
    
    return '<span class="posted-on">Posted <a href="'. esc_url( get_month_link( get_the_time('Y'), (get_the_time('m') ) ) ) .'">' . $posted_on . '</a> ago</span>';
}

function simple_posted_footer( $onlyComments = false ) {
    
    $comments_num = get_comments_number(); 
    if( comments_open() ) {
        if( $comments_num == 0 ) {
            $comments = __('No Comments');
        } elseif( $comments_num > 1 ) {
            $comments = $comments_num . __(' Comments');
        } else {
            $comments = __('1 Comment');
        }
        $comments = '<a class="comments-link small text-caps" href="' . get_comments_link() . '">'. $comments .'</a>';
	} else {
		$comments = __('Comments are closed');
    } 
    
    if ($onlyComments) {
		return $comments;
	}
    
    return '<div class="post-footer-container"><div class="row"><div class="col-xs-6 comments-link-container">'. $comments .'</div><div class="col-xs-6 text-right"><a href="'. esc_url( get_permalink() ) .'">View Post &#62;</a></div></div><h2 class="footer-cap"></h2></div>';
}

function simple_get_attachment( $num = 1 ) {
    
    $output = '';
    
    if( has_post_thumbnail() && $num == 1 ):
    
        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    else:
    
        $attachments = get_posts( array(
            'post_type'      =>  'attachment',
            'posts_per_page' =>  $num,
            'post_parent'    =>  get_the_ID()
        ) );
    
        if( $attachments && $num == 1 ):
            
            foreach( $attachments as $attachment ):   
                $output = wp_get_attachment_url( $attachment->ID );
            endforeach;
    
        elseif( $attachments && $num > 1 ):
        
            $output = $attachments;
            
        endif;
    
        wp_reset_postdata();
    
    endif;
    
    return $output; 
}

function simple_get_embedded_media( $type = array() ) {
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    
    $embed = get_media_embedded_in_content( $content, $type );
    
    if( in_array('audio', $type) ):
        
        $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
    else:
        
        $output = $embed[0];
    endif;
    
    return $output;
}

function simple_grab_url() {
    
    if( !preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ) {
        
        return false;
    }
    
    return esc_url_raw( $links[1] );  
}

function simple_get_bs_slides($attachments) {
    
    $output = array();
    $count = count($attachments)-1;
    
    for( $i = 0; $i <= $count; $i++ ):
        
        $active = ( $i == 0 ? ' active' : '' );
    
        $output[$i] = array( 
            'class'     => $active, 
            'url'       => wp_get_attachment_url( $attachments[$i]->ID ), 
            'caption'   => $attachments[$i]->post_excerpt 
        );
    
    endfor;
    
    return $output; 
}

/*
    ===================================
        SINGLE POST CUSTOM FUNCTIONS 
    ===================================
*/

function simple_posted_meta() { 
    $posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') ); 
    
    $categories = get_the_category();
    $seperator = ', ';
    $output = '';
    $i = 1;
    
    if( !empty($categories) ):
        foreach( $categories as $category ):
            
            if( $i > 1 ): $output .= $seperator; endif;
    
            $output .= '<a href="'  .esc_url( get_category_link( $category->term_id ) ) . '" alt="'. esc_attr('View all posts in %s', $category->name ) .'">'. esc_html( $category->name ) .'</a>';
            $i++; 
        endforeach;
    
    endif;
    
    return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}

function simple_post_navigation() { 
    
    $nav = '<div class="row post-nav">';
    
    $prev = get_previous_post_link( '<div class="post-link-nav"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> %link</div>', '%title' ); 
    
    $nav .= '<div class="col-xs-6">' . $prev . '</div>';
    
    $next = get_next_post_link( '<div class="post-link-nav">%link <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></div>', '%title' ); 
    
    $nav .= '<div class="col-xs-6 text-right">' . $next . '</div>';
    
    $nav .= '</div>';
    
    return $nav;
}

function simple_get_post_navigation() { 
    
    if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): 
    
       require( get_template_directory() . '/inc/templates/simple-comment-nav.php'); 
    
    endif;
}

function simple_save_post_views( $postID ) {
    
    $metaKey = 'simple_post_views';
    $views = get_post_meta( $postID, $metaKey, true );
    
    $count = ( empty( $views ) ? 0 : $views );
    
    $count++;
    
    update_post_meta( $postID, $metaKey, $count );
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function simple_share_this_footer( $content, $onlyComments = false  ) { 
    
    if( is_single() ): 
    
        $content .= '<footer class="entry-footer"><div class="share-container"><div class="simple-shareThis"><h4>Share This:</h4>';

        $title = get_the_title();

        $permalink = get_permalink();
    
        $comments_num = get_comments_number(); 

        $twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' ); 

        $twitter = 'https://twitter.com/intent/tweet?text='. $title . '&amp;url=' . $permalink . $twitterHandler . ''; 

        $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink; 
    
        $tumblr = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' .$permalink.'&title=title&caption=text&tags=hash_tags';

        $content .= '<ul>';

            $content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><span class="simple-icon simple-twitter"></span></a></li>';
    
            $content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><span class="simple-icon simple-facebook"></span></a></li>';
    
            $content .= '<li><a href="' . $tumblr . '" target="_blank" rel="nofollow"><span class="simple-icon simple-tumblr"></span></a></li>';
    
            $content .= '</ul></div></div><!-- .simple-share -->';
                
            if( comments_open() ) {
                if( $comments_num == 0 ) {
                    $comments = __('No Comments');
                } elseif( $comments_num > 1 ) {
                    $comments = $comments_num . __(' Comments');
                } else {
                    $comments = __('1 Comment');
                }
                $comments = '<a class="comments-link small text-caps" href="' . get_comments_link() . '">'. $comments .'</a>';
            } else {
                $comments = __('Comments are closed');
            } 

            if ($onlyComments) {
                return $comments;
            }
    
            $content .=  '<div class="post-footer-container"><div class="row"><div class="col-xs-6">'. get_the_tag_list( '<div class="tags-list"><span class="simple-icon simple-tag"></span>', ' ', '</div>' ) .'</div><div class="col-xs-6 comments-link-container text-right">'. $comments .'<span class="simple-icon simple-comments"></span></div></div><h2 class="footer-cap"></h2></div></footer>';

        return $content;  
        
     else:
        return $content; 
    
    endif;
}

add_filter( 'the_content', 'simple_share_this_footer'); 

function change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '12';
    $args['largest'] = '16';

    return $args;
}

add_filter( 'widget_tag_cloud_args', 'change_tag_cloud_font_sizes');

function change_archive_title( $title ) {
    return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}

add_filter( 'get_the_archive_title', 'change_archive_title' );

//Exclude pages from WordPress Search
if (!is_admin()) {
    function wpb_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    
    add_filter('pre_get_posts','wpb_search_filter');
}

/* Mailtrap SMTP for localhost development */
function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '989890ac6f03c6';
  $phpmailer->Password = '4568883d9a6a1c';
}

add_action('phpmailer_init', 'mailtrap');
