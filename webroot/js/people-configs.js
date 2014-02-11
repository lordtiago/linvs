$(function($){
      $("#PersonCep").mask("99.999-999");
	  $("#PersonCpf").mask("999.999.999-99");
	  $("#PersonTel").mask("(0xx99)9999-9999");
	  $("#PersonCel").mask("(0xx99)9999-9999?9").focusout(function(event){
		  nonoDigito(event);
	  });
	  $("#PersonCel2").mask("(0xx99)9999-9999?9").focusout(function(event){
		  nonoDigito(event);
	  });
	  
  	$("#PersonFatherId").select2({allowClear: true});
  	$("#PersonFather2Id").select2({allowClear: true});	  
	$("#PersonSpouseId").select2({allowClear: true}); 
	 
	  //Consulta CEP Webservice
      $("#PersonCep").focusout(function () {
      $("#PersonCep").cep({
          load: function () {
              //Exibe a div loading
              $("#loading").show();
          },
          complete: function () {
              //Esconde a div loading
              $("#loading").hide();
          },
          error: function (msg) {
              //Exibe em alert a mensagem de erro retornada
              alert(msg);
          },
          success: function (data) {
              $("#PersonStreet").val(data.tipoLogradouro + " " + data.logradouro);
			  $("#PersonNumber").val(" Nº ");
			  $("#PersonDistrict").val(data.bairro);
              $("#PersonCity").val(data.cidade);
              $("#PersonUf").val(data.estado);
			  $("#PersonCountry").val("Brasil");
          }
      });
  });
	
	function nonoDigito(event){
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 11) {
            element.mask("(0xx99)99999-999?9");
        } else {
            element.mask("(0xx99)9999-9999?9");
        }	
	}
	
	$("#PersonAddForm input:text, #PersonAddForm textarea").first().focus();
	$("#PersonEditForm input:text, #PersonEditForm textarea").first().focus();
});