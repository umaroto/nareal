<?php
App::uses('CommentRelation', 'Model');

/**
 * CommentRelation Test Case
 *
 */
class CommentRelationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comment_relation',
		'app.comment',
		'app.posts'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommentRelation = ClassRegistry::init('CommentRelation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommentRelation);

		parent::tearDown();
	}

}
