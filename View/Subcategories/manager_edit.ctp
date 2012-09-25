<div class="subcategories form">
<?php echo $this->Form->create('Subcategory', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo isset($this->request->data['Subcategory']['id']) ? __('Editar Subcategoria') : __('Adicionar Subcategoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label' => 'Título'));
		echo $this->Form->input('slug');
		echo $this->Form->input('category_id', array('label' => 'Categoria'));
		echo $this->Form->input('template_id', array('label' => 'Template'));
		if(!empty($this->request->data['Subcategory']['image'])){
			echo $this->Html->image('../uploads/subcategory/660/'.$this->request->data['Subcategory']['image']);
		}
		echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagem ficará com 660px x 110px'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
echo $this->element('manager/actions');
