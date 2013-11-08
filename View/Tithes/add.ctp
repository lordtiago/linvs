<div class="tithes form">
<?php echo $this->Form->create('Tithe'); ?>
	<fieldset>
		<legend><?php echo __('Add Tithe'); ?></legend>
	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('month');
		echo $this->Form->input('year');
		echo $this->Form->input('person_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tithes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
