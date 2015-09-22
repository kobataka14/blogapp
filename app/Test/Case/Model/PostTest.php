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
		'app.post'
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

	public function test適当(){
		$post = Fabricate::attributes_for('Post', function($data){
			$faker = Faker\Factory::create('ja_JP');
	    	return ["created" => "2013-10-09 12:40:28", "title" => $faker->address];
		});
		$this->assertEquals('eee', $post[0]['title']);
	}

	/**
	 * @dataProvider exampleValidationErrors
	 */
	public function testバリデーションエラー($column, $value, $message){
		$post = Fabricate::build('Post', [$column=>$value]);
		$this->assertFalse($post->validates());
		$this->assertEquals([$message], $this->Post->validationErrors[$column]);
	}

	public function exampleValidationErrors(){
		return [
			['title', '', 'タイトルは必須入力です'],
			['title', str_pad('', 256, "a"), 'タイトルは255文字以内で入力してください'],
		];
	}

}
