jQuery(document).ready(function($) {
		
	/* Navigation
	-------------------------------------------------------------------------------*/

	$("#nav-primary li").hover(function(){
	
		$(this).addClass("hover");
		$(this).find("ul").hide().slideDown(200);	

	}, function(){
	
		$(this).removeClass("hover");

	});
	
	$("#nav-primary li ul li:has(ul)").find("a:first").append(" &raquo; ");

})