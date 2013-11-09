$(document).ready(function() {
	$('ul li a').on('click', function(){
	    $(this).parent().addClass('current_page_item').siblings().removeClass('current_page_item');
	  });
});