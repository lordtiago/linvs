<form method="get" target = "_blank" action="<?php echo $this->webroot; ?>tithes/report_simplify" class="form_report_simplify" >
        <div class="content-block-title">Opções:</div>
        <div class="list-block">
            <ul>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="all" checked>
                      <div class="item-inner">
                        <div class="item-title">Todos</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="active">
                      <div class="item-inner">
                        <div class="item-title">Ativos (06 meses)</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="inactive_2">
                      <div class="item-inner">
                        <div class="item-title">Inativos (02 meses)</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="inactive_3">
                      <div class="item-inner">
                        <div class="item-title">Inativos (03 meses)</div>
                      </div>
                    </label>
                  </li>                
                <li>
                    <div class="item-content">
                        <div class="item-inner row">
                            <div class="item-title label col-50"></div>
                            <div class="control-group col-50">
                                <div class="controls">
                                     <input type="submit" value="Gerar Relatório" class="button button-big button-fill color-green">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</form>   
<script>
$(".form_report_simplify").submit(function(){
	var url = "<?php echo $this->webroot; ?>tithes/report_tithing_street/"+$(".report_simplify_month").val();
	window.open(url);
	return false;
});
</script>