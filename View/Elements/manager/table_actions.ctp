<td class="actions">
	<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $id)); ?>
	<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $id), null, __('Tem certeza que você quer apagar o registro # %s?', $id)); ?>
</td>