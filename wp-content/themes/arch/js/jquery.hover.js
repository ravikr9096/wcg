(function($) {
  	"use strict";
  
  	/*MEMBERS LIST*/

	$(".thumbs-animate").hover(function(){
		$("img", this).stop().animate({opacity: 0.3},{queue:false,duration:400});
		$(".team-social img", this).animate({opacity: 1},{queue:false,duration:400});
		$(".team-social", this).css("display","block");		
	}, function() {
		$("img", this).stop().animate({opacity: 1},{queue:false,duration:400});
		$(".team-social", this).css("display","none");
	});

	/*BLOG LIST*/

	$(".link-hover").hover(function(){
		$("img", this).stop().animate({opacity: 0.5},{queue:false,duration:400});
		$(".blog-hover", this).css("display","block");	
		$(".blog-hover img", this).animate({opacity: 1},{queue:false,duration:900});	

	}, function() {
		$("img", this).stop().animate({opacity: 1},{queue:false,duration:400});
		$(".blog-hover img", this).animate({opacity: 0},{queue:false,duration:400});		
	});

})(jQuery);