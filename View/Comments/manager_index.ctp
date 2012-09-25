<div class="comments index">
	<h2><?php echo __('Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($comments as $comment): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($comment['posts']['title'], array('controller' => 'posts', 'action' => 'view', $comment['posts']['id'])); ?>
		</td>
		<td><?php echo h($comment['Comment']['name']); ?>&nbsp;</td>
		<td><?php echo h($comment['Comment']['data']); ?>&nbsp;</td>
		<td><?php echo h($comment['Comment']['status'] == 0 ? 'Ativo' : 'Inativo'); ?>&nbsp;</td>
		<?php
		echo $this->element('manager/table_actions', array('id' => $comment['Comment']['id']));
		?>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('manager/pagination');?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php
echo $this->element('manager/actions');
