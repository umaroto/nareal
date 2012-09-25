<div class="actions">
	<h3><?php echo __('Usuários'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Usuário'), array('controller' => 'users', 'action' => 'edit')); ?></li>
	</ul><br>

	<h3><?php echo __('Autores'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Autores'), array('controller' => 'authors', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Autor'), array('controller' => 'authors', 'action' => 'edit')); ?></li>
	</ul><br>

	<h3><?php echo __('Categorias'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categories', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Subcategorias'), array('controller' => 'subcategories', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Subcategoria'), array('controller' => 'subcategories', 'action' => 'edit')); ?></li>
	</ul><br>

	<h3><?php echo __('Posts'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Posts'), array('controller' => 'posts', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Adicionar Post'), array('controller' => 'posts', 'action' => 'edit')); ?></li>
	</ul><br>

	<h3><?php echo __('Newsletter'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Cadastros'), array('controller' => 'newsletters', 'action' => 'index')); ?></li>
	</ul><br>
</div>