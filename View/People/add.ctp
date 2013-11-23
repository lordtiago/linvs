<?php
//Configs
echo $this->Html->script('jquery.maskedinput-1.3.1');
echo $this->Html->script('jquery.cep-1.0.min');
echo $this->Html->script('people-configs');
?>
<div class="people form">
<?php echo $this->Form->create('Person'); ?>
	<fieldset>
		<legend><?php echo __('Add Person'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('birth');
		echo $this->Form->input('cpf');
		echo $this->Form->input('rg');
		echo $this->Form->input('cep');
		echo $this->Form->input('street');
		echo $this->Form->input('number');
		echo $this->Form->input('district');
		echo $this->Form->input('city');
		echo $this->Form->input('uf');
		echo $this->Form->input('country');
		echo $this->Form->input('father_id');
		echo $this->Form->input('spouse_id');
		echo $this->Form->input('tel');
		echo $this->Form->input('cel');
		echo $this->Form->input('cel2');
		echo $this->Form->input('email');
		//echo $this->Form->input('parish_id');
	?>
	</fieldset>

<?php // adicionando marcação requerida pelo bootstrap ?>
<?php echo $this->Form->end(array(
    'label' => __('Submit'),
    'class' => 'btn btn-primary',
    'div' => array(
        'class' => 'control-group',
        ),
    'before' => '<div class="controls">',
    'after' => '</div>'
));?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parishes'), array('controller' => 'parishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parish'), array('controller' => 'parishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('controller' => 'tithes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('controller' => 'tithes', 'action' => 'add')); ?> </li>
	</ul>
</div>
