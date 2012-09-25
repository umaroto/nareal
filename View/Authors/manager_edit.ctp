<div class="authors form">
<?php echo $this->Form->create('Author', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo isset($this->request->data['Author']['id']) ? __('Editar Autor') : __('Adicionar Autor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		if(!empty($this->request->data['Author']['image'])){
			echo $this->Html->image('../uploads/author/322/'.$this->request->data['Author']['image']);
		}
		echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagem ficará com 660px x 320px'));
		echo $this->Form->input('status', array('label' => 'Inativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
echo $this->element('manager/actions');
