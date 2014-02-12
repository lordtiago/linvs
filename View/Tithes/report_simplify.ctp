<?php
$parish = "Paróquia Senhor Bom Jesus";

$groupControl = true;
$grp = '';
$t = '';
?>
<div class="report_header">
    <div class="col-md-8">Uso exclusivo de: <?php echo $parish;?></div> <div class="col-md-3 date"><?php echo date("d/m/Y h:m");?></div>
    <div class="col-md-8">Linvs - Sistema de Gerenciamento Canônico 0.1.0</div>
    <div class="col-md-8"><b>Entrade Dízimo referente ao mês de: <?php echo $month; ?></b></div>
</div>
<div class="container_header">
    <div class="column_header col-md-8"><?php echo __("Value"); ?></div>
    <div class="column_header col-md-4"><?php echo __("Date"); ?></div>
</div>
<div class="details">
    <?php foreach ($tithes as $tithe): ?>

        <div class="column_details col-md-8"><?php echo h($tithe['Tithe']['value']); ?>&nbsp;</div>
        <div class="column_details col-md-4"><?php echo h($tithe['Tithe']['created']); ?>&nbsp;</div>

    <?php  endforeach;?>
        <div class="column_summary number col-md-12">Total: R$<?php echo $t; ?>&nbsp;</div>
</div>
