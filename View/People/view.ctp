<?php
	$this->Html->addCrumb(__("People"), __("/people"));
	$this->Html->addCrumb(__("View"), __("/people/view"));  
?>
<div class="people view">
<h2><?php echo __('Person'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($person['Person']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($person['Person']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth'); ?></dt>
		<dd>
			<?php echo h($person['Person']['birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cpf'); ?></dt>
		<dd>
			<?php echo h($person['Person']['cpf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rg'); ?></dt>
		<dd>
			<?php echo h($person['Person']['rg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($person['Person']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($person['Person']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($person['Person']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cep'); ?></dt>
		<dd>
			<?php echo h($person['Person']['cep']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($person['Person']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uf'); ?></dt>
		<dd>
			<?php echo h($person['Person']['uf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($person['Person']['country']); ?>
			&nbsp;
		</dd>
<!--		<dt><?php //echo __('Father Id'); ?></dt>
		<dd>
			<?php //echo h($person['Person']['father_id']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('Father2 Id'); ?></dt>
		<dd>
			<?php //echo h($person['Person']['father2_id']); ?>
			&nbsp;
		</dd>		
		<dt><?php //echo __('Spouse Id'); ?></dt>
		<dd>
			<?php //echo h($person['Person']['spouse_id']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($person['Person']['tel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cel'); ?></dt>
		<dd>
			<?php echo h($person['Person']['cel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cel2'); ?></dt>
		<dd>
			<?php echo h($person['Person']['cel2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($person['Person']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parish'); ?></dt>
		<dd>
			<?php echo $this->Html->link($person['Parish']['name'], array('controller' => 'parishes', 'action' => 'view', $person['Parish']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['id']), null, __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parishes'), array('controller' => 'parishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parish'), array('controller' => 'parishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('controller' => 'tithes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('controller' => 'tithes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tithes'); ?></h3>
	<?php if (!empty($person['Tithe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Month'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Person Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($person['Tithe'] as $tithe): ?>
		<tr>
			<td><?php echo $tithe['id']; ?></td>
			<td><?php echo $tithe['value']; ?></td>
			<td><?php echo $tithe['month']; ?></td>
			<td><?php echo $tithe['year']; ?></td>
			<td><?php echo $tithe['created']; ?></td>
			<td><?php echo $tithe['modified']; ?></td>
			<td><?php echo $tithe['person_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tithes', 'action' => 'view', $tithe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tithes', 'action' => 'edit', $tithe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tithes', 'action' => 'delete', $tithe['id']), null, __('Are you sure you want to delete # %s?', $tithe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tithe'), array('controller' => 'tithes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
