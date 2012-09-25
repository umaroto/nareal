<div class="authors index">
	<h2><?php echo __('Authors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($authors as $author): ?>
	<tr>
		<td><?php echo h($author['Author']['id']); ?>&nbsp;</td>
		<td><?php echo h($author['Author']['name']); ?>&nbsp;</td>
		<td><?php echo h($author['Author']['status'] == 0 ? 'Ativo' : 'Inativo'); ?>&nbsp;</td>
		<?php
		echo $this->element('manager/table_actions', array('id' => $author['Author']['id']));
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
