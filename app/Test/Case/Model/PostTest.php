<?php
App::uses('Post', 'Model');
App::uses('Fabricate', 'Fabricate.Lib');

/**
 * Post Test Case
 *
 */
class PostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post', 'plugin.users.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Post);

		parent::tearDown();
	}

	/**
	 * @dataProvider exampleValidationErrors
	 */
	public function testバリデーションエラー($column, $value, $message){
		$default = ["title"=>"タイトル","body"=>"本文"];
		$this->Post->create(array_merge($default, [$column=>$value]));
		$this->assertFalse($this->Post->validates());
		$this->assertEquals([$message],$this->Post->validationErrors[$column]);

		/*
		$post = Fabricate::build('Post', [$column=>$value]);
		$this->assertFalse($post->validates());
		$this->assertEquals([$message], $this->Post->validationErrors[$column]);
		*/
	}

	public function exampleValidationErrors(){
		return [
			['title', '', 'タイトルは必須入力です'],
			['title', str_pad('', 256, "a"), 'タイトルは255文字以内で入力してください'],
		];
	}

	public function test一覧画面は特定ユーザーで5件新しい順である(){
		Fabricate::create('Post', 10, ['id'=>false, 'title'=>'adminuser post', 'author_id'=>'1']);
		Fabricate::create('Post', 10, ['id'=>false, 'title'=>'user1 post', 'author_id'=>'37i-9036514i9eoee1102920aououotel888']);

		$actual = $this->Post->find('all', $this->Post->getPaginateSettings('adminuser'));
		$this->assertCount(5, $actual);
		$this->assertEquals([10,9,8,7,6], Hash::extract($actual, '{n}.Post.id'));
		$this->assertEquals('adminuser post', $actual[0]['Post']['title']);
	}


}
