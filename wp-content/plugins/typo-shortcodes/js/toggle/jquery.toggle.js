(function($) {
  	"use strict";
  	
  	$(document).ready(function(){ 
    	$(".toggle_container").hide();
     	$("h4.toggle").click(function(){
    		$(this).toggleClass("active").next().slideToggle("normal");
    		return false; 
		});
	}); 

})(jQuery);