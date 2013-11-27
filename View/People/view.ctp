<?php
	echo $this->Html->script('tab');
	echo $this->Html->script('people-tabs-config');

	$this->Html->addCrumb(__("People"), __("/people"));
	$this->Html->addCrumb(__("View"), __("/people/view"));	  
?>
<h2><?php echo __('Person'); ?></h2>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="people-tabs">
  	<li><a href="#person-content" data-toggle="tab"><?php echo __('Person'); ?></a></li>
	
  	<?php if($father || $father2):?>
  	  <li><a href="#parents-content" data-toggle="tab"><?php echo __('Parents'); ?></a></li>
	<?php endif;?>

  	<?php if($spouse):?>
  	  <li><a href="#spouse-content" data-toggle="tab"><?php echo __('Spouse'); ?></a></li>
	<?php endif;?>	
	
  	<?php if($childs):?>
  	  <li><a href="#child-content" data-toggle="tab"><?php echo __('Childs'); ?></a></li>
	<?php endif;?>	
</ul>
<!-- Tab panes -->
<div class="people view tab-content">
  <div class="person-content tab-pane active" id="person-content">
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
			<?php //echo $this->Html->link($person['Parish']['name'], array('controller' => 'parishes', 'action' => 'view', $person['Parish']['id'])); ?>
			<?php echo $person['Parish']['name']; ?>
			&nbsp;
		</dd>		
		</dl>
	</div> 
	<?php if($father || $father2):?>
		<div class="parents-content tab-pane" id="parents-content">
			<dl>
				<dt><?php echo __('Father'); ?></dt>
				<?php if($father):?>
					<dd>
						<span><?php echo __("Name: ");?> </span><?php echo $this->Html->link(($father['Person']['name']),array('controller' => 'people', 'action' => 'view', $father['Person']['id'])); ?>
						<span><?php echo __("Birth: ");?></span><?php echo $this->Time->format('d/m/Y',$father['Person']['birth']); ?>
						<span><?php echo __("Tel: ");?></span><?php echo h($father['Person']['tel']); ?>
						&nbsp;
					</dd>
				<?php endif;?>
				<?php if($father2):?>				
					<dd>
						<span><?php echo __("Name: ");?> </span><?php echo $this->Html->link(($father2['Person']['name']),array('controller' => 'people', 'action' => 'view', $father2['Person']['id'])); ?>
						<span><?php echo __("Birth: ");?></span><?php echo $this->Time->format('d/m/Y',$father2['Person']['birth']); ?>
						<span><?php echo __("Tel: ");?></span><?php echo h($father2['Person']['tel']); ?>
						&nbsp;
					</dd>
				<?php endif;?>		
				</dl>   
			</div>
	<?php endif;?>
	<?php if($spouse):?>
		<div class="spouse-content tab-pane" id="spouse-content">
			<dl>
				<dt><?php echo __('Spouse'); ?></dt>
					<dd>
						<span><?php echo __("Name: ");?> </span><?php echo $this->Html->link(($spouse['Person']['name']),array('controller' => 'people', 'action' => 'view', $spouse['Person']['id'])); ?>						
						<span><?php echo __("Birth: ");?></span><?php echo $this->Time->format('d/m/Y',$spouse['Person']['birth']); ?>
						<span><?php echo __("Tel: ");?></span><?php echo h($spouse['Person']['tel']); ?>
						&nbsp;
					</dd>
				</dl>   
			</div>
	<?php endif;?>	
	<?php if($childs):?>
		<div class="child-content tab-pane" id="child-content">
			<dl>
				<dt><?php echo __('Childs'); ?></dt>
				<?php foreach($childs as $child):?>
					<dd>
						<span><?php echo __("Name: ");?> </span><?php echo $this->Html->link(($child['Person']['name']),array('controller' => 'people', 'action' => 'view', $child['Person']['id'])); ?>						
						<span><?php echo __("Birth: ");?></span><?php echo $this->Time->format('d/m/Y',$child['Person']['birth']); ?>
						<span><?php echo __("Tel: ");?></span><?php echo h($child['Person']['tel']); ?>
						&nbsp;
					</dd>
				<?php endforeach;?>
				</dl>   
			</div>
	<?php endif;?>		
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
