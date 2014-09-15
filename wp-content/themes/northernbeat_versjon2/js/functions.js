// remap jQuery to $
(function($){})(window.jQuery);


/* trigger when page is ready */
$(document).ready(function (){

	// your functions go here
	
	$("#menuButton").click(function () {
		$("#pageTop nav ul").toggle();
	});
	


});


/* optional triggers

$(window).load(function() {
	
});

$(window).resize(function() {
	
});

*/