<div class="commentRelations form">
<?php echo $this->Form->create('CommentRelation'); ?>
	<fieldset>
		<legend><?php echo __('Manager Edit Comment Relation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('comment_id');
		echo $this->Form->input('comment_relation_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CommentRelation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CommentRelation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comment Relations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
