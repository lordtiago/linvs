<?php

	echo $this->Html->script('select2.min');
	echo $this->Html->script('jquery.price_format.1.0');
	echo $this->Html->script('jquery.formata_moeda.1.0');
	echo $this->Html->script('tithe-configs');

	$this->Html->addCrumb(__("Tithes"), __("/tithes"));
	$this->Html->addCrumb(__("Edit"), __("/tithes/edit"));  
?>
<div class="tithes form">
<?php echo $this->Form->create('Tithe'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tithe'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value', array('type' => 'text'));
		echo $this->Form->input('month');
		echo $this->Form->input('year');
		echo $this->Form->input('person_id');
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
	<h3>
		<span class="hide"><?php echo __('Actions'); ?></span>
		<span class="menu-icon"></span>
		<span class="menu-icon"></span>
		<span class="menu-icon"></span>
	</h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tithe.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tithe.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
