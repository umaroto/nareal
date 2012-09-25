<div class="categories form">
<?php echo $this->Form->create('Category', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo isset($this->request->data['Category']['id']) ? __('Editar Categoria') : __('Adicionar Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Título'));
		echo $this->Form->input('slug');
		echo $this->Form->input('template_id', array('label' => 'Template'));
		if(!empty($this->request->data['Category']['image'])){
			echo $this->Html->image('../uploads/category/660/'.$this->request->data['Category']['image']);
		}
		echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagem ficará com 660px x 110px'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
echo $this->element('manager/actions');