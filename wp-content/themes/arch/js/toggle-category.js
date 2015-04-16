(function($) {
	"use strict";	
	$("a.pfilter").click(function () {
		$("ul.cat-list").slideToggle("slow");
		return false;
	});
})(jQuery);