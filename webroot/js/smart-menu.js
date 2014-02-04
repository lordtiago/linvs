$(document).ready(function() {

    $('#smart-menu').click(function() {
        $('#smart-menu').hide();
    });
    $(document).click(function() {
        $('#smart-menu').hide();
    });
	
	$("#container").bind("contextmenu", function(e) {

	    $('#smart-menu').css({
	        top: e.pageY+'px',
	        left: e.pageX+'px'
	    }).show();

	    return false;

	});

});