(function($) {
  	"use strict";
  	
  	$(".failed span.close").click(function () {
		$(".failed").fadeOut("slow");
	});

	$(".success span.close").click(function () {
		$(".success").fadeOut("slow");
	});

	$(".info span.close").click(function () {
		$(".info").fadeOut("slow");
	});

})(jQuery);