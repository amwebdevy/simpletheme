jQuery(document).ready(function($){
    
    //NAVIGATION SEARCH BAR
    $('#search').on('focusin', function() {
        $('.simple-search').css( 'visibility', 'hidden' );
        $('.nav, .header-content-md, .sidebar-open').css( 'visibility', 'hidden' );
        $('.focus-overlay').fadeIn( 320 );
        $('body').addClass( 'no-scroll' );
    });
    $('#search').on('focusout', function() {
        $('.simple-search').css( 'visibility', 'visible' );
        $('.nav, .header-content-md, .sidebar-open').css( 'visibility', 'visible' );
        $('.focus-overlay').fadeOut( 320 );
        $('body').removeClass( 'no-scroll' );
    });
    
    //POPULAR POSTS CAROUSEL
    var popCarousel = $('.simple-carousel-popular');
    var carouselItems = popCarousel.find('.item');
    
    $('.entry-background').css( 'background-image', 'url(' +carouselItems.siblings('.active').data('featured')+ ')' );
    
    popCarousel.carousel({
        interval: 10000
    }).on('slid.bs.carousel', function(e) {
         $('.entry-background').fadeOut( 300, function() {
             $('.entry-background').fadeIn(400).css( 'background-image', 'url(' +carouselItems.siblings('.active').data('featured')+ ')' );
        });
    });
    
    //CONTACT FORM SUBMISSION 
    $('#simpleContactForm').on('submit', function(e){
        e.preventDefault();
        
        $('.has-error').removeClass('has-error'); 
        $('.js-show-feedback').removeClass('js-show-feedback');  
        
        var form = $(this); 
        
        var name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val();
        
        var ajaxurl = form.data('url'); 
        
        /* JS FORM VALIDAITON */
        if( name === '' ) {
            $('#name').parent('.form-group').addClass('has-error'); 
            return; 
        }
        
        if( email === '' ) {
            $('#email').parent('.form-group').addClass('has-error'); 
            return; 
        } 
        
        if( message === '' ) {
            $('#message').parent('.form-group').addClass('has-error'); 
            return; 
        }
        
        form.find('input, button, textarea').attr('disabled', 'disabled'); 
       
        $('.js-form-submission').addClass('js-show-feedback'); 
        
        $.ajax({ 
            
            url : ajaxurl,
            type : 'post',  
            data : { 
                
                name : name,
                email : email, 
                message : message, 
                action : 'simple_save_user_contact_form' 
                
            },
            error : function( response ) { 
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').addClass('js-show-feedback'); 
                form.find('input, button, textarea').removeAttr('disabled'); 
            }, 
            success : function( response ) { 
                if( response == 0 ) { 
                    
                    setTimeout(function() {                      
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').addClass('js-show-feedback'); 
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);

                } else {
                    
                   setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').addClass('js-show-feedback'); 
                        form.find('input, button, textarea').removeAttr('disabled').val(''); 
                   }, 1500);        
                }
            }
            
        }); 
        
    });
    
    //SIDEBAR TOGGLE
    $(document).on('click', '.js-toggleSidebar', function() {
        $('.simple-sidebar').toggleClass( 'sidebar-closed' );
     });
    
});