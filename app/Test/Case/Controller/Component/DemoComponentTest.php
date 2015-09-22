<?php
App::uses('ComponentCollection', 'Controller');
App::uses('DemoComponent', 'Controller/Component');
class DemoComponentTest extends CakeTestCase {
	public function setUp(){
		parent::setUp();
		$Collection = new ComponentCollection();
		$this->Demo = new DemoComponent($Collection);
	}

	public function testHello(){
		$msg = $this->Demo->hello();
		$this->assertEquals('hello world', $msg);
	}
}