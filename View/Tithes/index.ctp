<?php $meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December')); 

		//debug($this->params);			
		if(!empty($this->params['pass'])){
			$current_month = $this->params['pass'][0]-1;
		}else{
			$current_month = (int)date('m')-1;
		}
	   
	   //set a previous month and year
	   if($current_month == 0){
		   $prev_month = 12;
		   
	   		if(!empty($this->params['pass'])){
	   			$prev_year = $this->params['pass'][1]-1;
	   		}else{
	   			$prev_year = date('Y')-1;
	   		}
			
	   }else{
		   $prev_month = $current_month;
		   
	   		if(!empty($this->params['pass'])){
	   			$prev_year = $this->params['pass'][1];
	   		}else{
	   			$prev_year = date('Y');
	   		}
			
	   }
	   
	   //set a next month and year
	   if($current_month == 11){
		   $next_month = 1;
		   
	   		if(!empty($this->params['pass'])){
	   			$next_year = $this->params['pass'][1]+1;
	   		}else{
	   			$next_year = date('Y')+1;
	   		}
			
	   }else{
		   $next_month = $current_month + 2;
		   
	   		if(!empty($this->params['pass'])){
	   			$next_year = $this->params['pass'][1];
	   		}else{
	   			$next_year = date('Y');
	   		}
			
	   }	   
?>
<?php
	$this->Html->addCrumb(__("Tithes"), __("/tithes"));
?>
<div class="tithes index">
	<h2><?php echo __('Tithes'); ?></h2>
	<div>
		<?php echo $this->Html->link(__('<'), array('controller' => 'tithes', $prev_month, $prev_year)); ?>
		<span><?php echo $meses[$current_month]; ?></span>
		<?php echo $this->Html->link(__('>'), array('controller' => 'tithes', $next_month, $next_year)); ?>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('month'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('person_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tithes as $tithe): ?>
	<tr>
		<td><?php echo h($tithe['Tithe']['id']); ?>&nbsp;</td>
		<td><?php echo h($tithe['Tithe']['value']); ?>&nbsp;</td>
		<td><?php echo h($tithe['Tithe']['month']); ?>&nbsp;</td>
		<td><?php echo h($tithe['Tithe']['year']); ?>&nbsp;</td>
		<td><?php echo h($tithe['Tithe']['created']); ?>&nbsp;</td>
		<td><?php echo h($tithe['Tithe']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tithe['Person']['name'], array('controller' => 'people', 'action' => 'view', $tithe['Person']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tithe['Tithe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tithe['Tithe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tithe['Tithe']['id']), null, __('Are you sure you want to delete # %s?', $tithe['Tithe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tithe'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
