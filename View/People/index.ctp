<?php
     $this->Html->addCrumb(__("People"), __("/people"));        
?>
<div class="people index">
	<hgroup class="tt-g">
		<h2 class="tt"><?php echo __('People'); ?></h2>
	</hgroup>
	<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" id="table-people" class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('tel'); ?></th>
					<th><?php echo $this->Paginator->sort('cel'); ?></th>
					<th><?php echo $this->Paginator->sort('birth'); ?></th>
					<th><?php echo $this->Paginator->sort('street'); ?></th>
					<th><?php echo $this->Paginator->sort('number'); ?></th>
					<th><?php echo $this->Paginator->sort('district'); ?></th>
					<th><?php echo $this->Paginator->sort('cep'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<?php foreach ($people as $person): ?>
			<tbody>
				<tr>
					<td><?php echo h($person['Person']['name']); ?></td>
					<td><?php echo h($person['Person']['tel']); ?></td>
					<td><?php echo h($person['Person']['cel']); ?></td>
					<td><?php echo h($person['Person']['birth']); ?></td>
					<td><?php echo h($person['Person']['street']); ?></td>
					<td><?php echo h($person['Person']['number']); ?></td>
					<td><?php echo h($person['Person']['district']); ?></td>
					<td><?php echo h($person['Person']['cep']); ?></td>
					<td><?php echo h($person['Person']['email']); ?></td>
					<!-- <td>
						<?php //echo $this->Html->link($person['Parish']['name'], array('controller' => 'parishes', 'action' => 'view', $person['Parish']['id'])); ?>
					</td> -->
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $person['Person']['id']), array('class' => 'act-view', 'title' => __('View'))); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $person['Person']['id']), array('class' => 'act-edit', 'title' => __('Edit'))); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $person['Person']['id']), array('class' => 'act-remove', 'title' => __('Delete')), null, __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?>
					</td>
				</tr>
			</tbody>
	<?php endforeach; ?>
		</table>
	</div>
	<p class="the-log">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<?php
			echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'prev disabled'));
		?>
		<?php
			echo $this->Paginator->numbers(array('separator' => ''));
		?>
		<?php
			echo $this->Paginator->next(__('next'), array(), null, array('class' => 'next disabled'));
		?>
		<span class=" glyphicon glyphicon-chevron-right"></span>
	</div>
</div>
<div class="actions">
	<h3>
		<span class="hide"><?php echo __('Actions'); ?></span>
		<span class="menu-icon"></span>
		<span class="menu-icon"></span>
		<span class="menu-icon"></span>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Parishes'), array('controller' => 'parishes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parish'), array('controller' => 'parishes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('controller' => 'tithes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('controller' => 'tithes', 'action' => 'add')); ?> </li>
	</ul>
</div>
