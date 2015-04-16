(function($) {
    "use strict";
    
    $(window).load(function() { 
       
        $(".horScroll").mCustomScrollbar({
            horizontalScroll:true,
            advanced:{
                autoExpandHorizontalScroll:true
            }
        });
        
        $(".verScroll").mCustomScrollbar({
            set_width:"100%",
            scrollButtons:{
                enable:true
            }
        });
        
        if (jQuery.browser.mobile == true) {
            $(".verScroll").mCustomScrollbarMobile("vertical",200,5); 
            $(".horScroll").mCustomScrollbarMobile("horizontal",200,5); 
        }

    });

})(jQuery);