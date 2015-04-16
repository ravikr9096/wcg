(function($) {
	"use strict";  
	$('.menu').find('li:has(ul)').addClass('has-menu');

	$('.select-menu').change(function(){					
		window.location = $(this).val();
	});

	$("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to Page..."
	}).appendTo(".select-menu");

	$('.menu').find('li').each(function(){	
		var cur_link = $(this).children("a");

		if (!$(this).parent('ul').hasClass('sub-menu')) {
			$('.select-menu').append('<option value='+cur_link.attr("href")+' > &nbsp; '+cur_link.text()+'</option>');		
		}else if (!$(this).parent('ul.sub-menu li ul').hasClass('sub-menu')) {
			$('.select-menu').append('<option value='+cur_link.attr("href") +' > &nbsp;&ndash; '+cur_link.text()+'</option>');
		}else {
			$('.select-menu').append('<option value='+cur_link.attr("href") +' > &nbsp;&ndash;&nbsp;&ndash; '+cur_link.text()+'</option>');
		}

	});
})(jQuery);