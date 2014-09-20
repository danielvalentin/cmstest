$(document).ready(function(){
	
	/**
	 * 
	 */
	$('.fancybox').fancybox();
	
});

function scrollToElement(element)
{
	$('body, html').animate({
		scrollTop:$(element).offset().top
	});
}
