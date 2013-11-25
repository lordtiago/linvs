$(function($){	  
  	$("#TithePersonId").select2({allowClear: true});
	
    $("#TitheValue").priceFormat({
    	prefix: "R$ ",
    	centsSeparator: ",",
    	thousandsSeparator: "."
    });
	
    $("#TitheAddForm").formataMoeda({
    	args: new Array($("#TitheValue"))
    });
	
    $("#TitheEditForm").formataMoeda({
    	args: new Array($("#TitheValue"))
    });
		
});