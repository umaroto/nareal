<?php
App::uses('AppModel', 'Model');

class Comment extends AppModel {

	public $displayField = 'name';

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
		'data' => array(
			'date' => array(
				'rule' => array('date')
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean')
			),
		),
	);

	public $hasMany = array(
		'CommentRelation' => array(
			'className' => 'CommentRelation',
			'foreignKey' => 'comment_id'
		)
	);

	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
		)
	);

}
