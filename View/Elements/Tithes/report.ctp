<?php 
		$meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December')); 
?>
<!-- Modal -->
<div class="modal fade tithesReport"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title" id="myModalLabel">Relatórios</h4>
	  </div>
	  <div class="modal-body">
	    <form method="get" target = "_blank" action="<?php echo $this->webroot; ?>tithes/report_simplify" class="form_report_simplify" >
	        <fieldset>
	                    <legend>Opções do Relatório de Dízimo Simples</legend>
	                    <div>
							<label>Escolha o mes: </label>
	                        <select name="month" class="report_simplify_month">
								<?php foreach($meses as $chave=>$mes): ?>
									<option value="<?php echo $chave+1; ?>">
										<?php echo $mes;?>
									</option>
								<?php endforeach;?>								
							</select>
	                    </div>
	                    <div>
							<label>Escolha o ano: </label>
	                        <select name="year" class="report_simplify_year">
								<?php foreach($report_simplify_year as $year): ?>
									<option value="<?php echo $year; ?>">
										<?php echo $year;?>
									</option>
								<?php endforeach?>
							</select>
	                   </div>
	        </fieldset>
			<div class="control-group">
	        	<div class="controls">
	            	 <input type="submit" value="Enviar" class="btn btn-primary">
	        	</div>
			</div>
	    </form>		   
	  </div>
	</div>
  </div>
</div>
<!-- End Modal -->
<script>
$(".form_report_simplify").submit(function(){
	var url = "<?php echo $this->webroot; ?>tithes/report_simplify/"+$(".report_simplify_month").val()+"/"+$(".report_simplify_year").val();
	window.open(url);
	return false;
});
</script>