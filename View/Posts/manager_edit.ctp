<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo isset($this->request->data['Post']['id']) ? __('Editar Post') : __('Adicionar Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('date');
		echo $this->Form->input('author_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('comment_id');
		echo $this->Form->input('slug');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
echo $this->element('manager/actions');
