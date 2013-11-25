<?php
	$this->Html->addCrumb(__("Tithes"), __("/tithes"));
	$this->Html->addCrumb(__("View"), __("/tithes/view"));  
?>
<div class="tithes view">
<h2><?php echo __('Tithe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tithe['Tithe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($tithe['Tithe']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Month'); ?></dt>
		<dd>
			<?php echo h($tithe['Tithe']['month']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($tithe['Tithe']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tithe['Tithe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tithe['Tithe']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tithe['Person']['name'], array('controller' => 'people', 'action' => 'view', $tithe['Person']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tithe'), array('action' => 'edit', $tithe['Tithe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tithe'), array('action' => 'delete', $tithe['Tithe']['id']), null, __('Are you sure you want to delete # %s?', $tithe['Tithe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
