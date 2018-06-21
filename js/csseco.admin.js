/**
  * @package cssecoST
  * js/csseco.admin.js
  */
jQuery(document).ready(function($){
	
	var mediaUploader;
	var templateUrl = object_name.templateUrl; // see includes/back/enqueue.php $translation_array and wp_localize_script()
	
	$('#uploadButton').on('click', function(e){
		e.preventDefault();
		// if the mediaUploader exists open mediaUploader
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
		
		// mediaUploader settings
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title       	:      'Choose a Logo',
            button      	:	{
                	text    :       'Select'
            	},
            multiple    	:       false
		});
		
		// mediaUploader when select the picture
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON(); // retrieve the attachment url
			$('#siteLogoB').val(attachment.url);
			$('#previewLogo').attr('src', attachment.url);	
		});
		mediaUploader.open();
	});
	
	// Remove Btn
    $('#removeButton').on('click', function(e){
        e.preventDefault();
        var answer = confirm('Are you sure you want to remove the Logo?');
        if(answer === true) {
            $('#siteLogoB').val('');
            $('#previewLogo').attr('src', templateUrl+'/imgs/No_Image_Available.gif');
            // $('.csseco_about_page_form').submit();
        }
        // return; // remove comment if write something after this if
    });
	
});