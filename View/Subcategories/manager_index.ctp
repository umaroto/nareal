<div class="subcategories index">
	<h2><?php echo __('Subcategories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($subcategories as $subcategory): ?>
	<tr>
		<td><?php echo h($subcategory['Subcategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($subcategory['Subcategory']['title']); ?>&nbsp;</td>
		<td><?php echo h($subcategory['Subcategory']['slug']); ?>&nbsp;</td>
		<?php
		echo $this->element('manager/table_actions', array('id' => $subcategory['Subcategory']['id']));
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
