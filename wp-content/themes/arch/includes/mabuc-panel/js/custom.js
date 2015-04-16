(function($) {
    "use strict";
    
    /****************************
    COLOR PICKER
    ****************************/

    $('#arch_menu_text_color').wpColorPicker();
    $('#arch_menu_bg_color').wpColorPicker();
    $('#arch_menu_bg_hover').wpColorPicker();
    $('#arch_submenu_bg_color').wpColorPicker();
    $('#arch_header_text_color').wpColorPicker();
    $('#arch_header_bg_color').wpColorPicker();
    $('#arch_sidebar_text_color').wpColorPicker();
    $('#arch_sidebar_bg_color').wpColorPicker();
    $('#arch_slider_title_bg').wpColorPicker();
    $('#arch_slider_text').wpColorPicker();
    $('#arch_button_bg_color').wpColorPicker();
    $('#arch_button_text_color').wpColorPicker();
    $('#arch_scrollbar_color').wpColorPicker();


    /****************************
    ACCORDION
    ****************************/

    jQuery('.mabuc_options').slideUp();    
    jQuery('.mabuc_section h3').click(function(){       
        if(jQuery(this).parent().next('.mabuc_options').css('display')=='none') {   
            jQuery(this).removeClass('inactive');
            jQuery(this).addClass('active');
            jQuery('.mabuc_title h3.active span').text('close');
            jQuery(this).children('img').removeClass('inactive');
            jQuery(this).children('img').addClass('active');                
        }else {   
            jQuery(this).removeClass('active');
            jQuery(this).addClass('inactive');      
            jQuery('.mabuc_title h3.inactive span').text('open');
            jQuery(this).children('img').removeClass('active');         
            jQuery(this).children('img').addClass('inactive');
        }            
        jQuery(this).parent().next('.mabuc_options').slideToggle('slow');   
    });


    /****************************
    FADE SET TIMEOUT
    ****************************/

    setTimeout(function(){
        jQuery(".fade").fadeOut("slow", function () {
            jQuery(".fade").remove();
        });
    }, 5000);


    /****************************
    UPLOADS
    ****************************/

    var formfield = '';
    var formfield_video = '';
    var formfield_audio = '';

    jQuery('#upload_image_button_arch_logo').click(function() {
        formfield = jQuery('#arch_logo').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;   
    });

    jQuery('#upload_image_button_arch_favicon').click(function() {
        formfield = jQuery('#arch_favicon').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;           
    });

    jQuery('#upload_image_button_arch_bgimage').click(function() {
        formfield = jQuery('#bgimage').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;           
    });

    jQuery('#upload_image_button_arch_video').click(function() {
        formfield_video = jQuery('#video').attr('name');
        tb_show('', 'media-upload.php?type=video&amp;TB_iframe=true');
        return false;           
    });

    jQuery('#upload_image_button_arch_svideo').click(function() {
        formfield_video = jQuery('#video').attr('name');
        tb_show('', 'media-upload.php?type=video&amp;TB_iframe=true');
        return false;           
    }); 

    jQuery('#upload_image_button_arch_archive_bgimage').click(function() {
        formfield = jQuery('#arch_archive_bgimage').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;           
    }); 

    jQuery('#upload_image_button_arch_search_bgimage').click(function() {
        formfield = jQuery('#arch_search_bgimage').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;           
    });

    jQuery('#upload_image_button_arch_theme_bgimage').click(function() {
        formfield = jQuery('#arch_theme_bgimage').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;           
    });

    jQuery('#upload_image_button_arch_notfound_bgimage').click(function() {
        formfield = jQuery('#arch_notfound_bgimage').attr('name');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;           
    });

    
    /****************************
    SEND EDITOR
    ****************************/

    var original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html) {

        /*IMAGE :: VIDEO :: AUDIO*/

        if(formfield) {
            var fileurl = jQuery(html).attr('src');
            if (typeof(fileurl)==="undefined") {
                fileurl = jQuery('img',html).attr('src');
            }
            jQuery('#' + formfield).val(fileurl);
            tb_remove();
            formfield = '';
        }else if(formfield_video) {
            var fileurl_video = jQuery(html).attr('href');
            if (typeof(fileurl_video)==="undefined") {
                fileurl_video = jQuery('video',html).attr('src');
            }
            jQuery('#' + formfield_video).val(fileurl_video);
            tb_remove();
            formfield_video = '';
        }else if(formfield_audio) {
            var fileurl_audio = jQuery(html).attr('href');
            if (typeof(fileurl_audio)==="undefined") {
                fileurl_audio = jQuery('audio',html).attr('src');
            }
            jQuery('#' + formfield_audio).val(fileurl_audio);
            tb_remove();
            formfield_audio = '';
        }else {
            original_send_to_editor(html);
        }

    };

})(jQuery);