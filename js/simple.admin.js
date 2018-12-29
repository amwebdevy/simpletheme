jQuery(document).ready(function($){
    
    //PROFILE DESCRIPTION PREVIEW
    var desc_val = $('#profile_description').val();
    
    var desc_preview = $('#user-description');
    
    if( desc_val.length == 0 ) {
        
        desc_preview.append( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries." );
        
    } 
    
    //PROFILE IMAGE PREVIEW
    var mediaUploader;
    
    $('#upload-button').on('click', function(e) {
        e.preventDefault();
        
        if(mediaUploader) {
            mediaUploader.open(); 
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Profile Picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });
        
        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
           
            $('#profile-picture').val(attachment.url);
            
            $('#profile-picture-preview').css('background-image', 'url(' +  attachment.url + ')');
        });
        
        mediaUploader.open();
    });
    
     $('#remove-picture').on('click', function(e) {
        e.preventDefault();

        var answer = confirm("Are you sure you want to remove your profile picture?"); 
        
        if( answer == true ) {
            $('#profile-picture').val('');
            $('#profile-picture-preview').removeAttr('style');
            $('.simple-user-preview-form').submit(); 
        } 
        return;
    });
    
});