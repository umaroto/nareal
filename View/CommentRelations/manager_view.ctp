<div class="commentRelations view">
<h2><?php  echo __('Comment Relation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($commentRelation['CommentRelation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commentRelation['Comment']['name'], array('controller' => 'comments', 'action' => 'view', $commentRelation['Comment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Relation Id'); ?></dt>
		<dd>
			<?php echo h($commentRelation['CommentRelation']['comment_relation_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comment Relation'), array('action' => 'edit', $commentRelation['CommentRelation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comment Relation'), array('action' => 'delete', $commentRelation['CommentRelation']['id']), null, __('Are you sure you want to delete # %s?', $commentRelation['CommentRelation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comment Relations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment Relation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
