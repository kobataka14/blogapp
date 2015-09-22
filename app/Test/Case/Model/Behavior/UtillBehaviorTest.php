<?php
class Fake extends CakeTestModel{
	public $actsAs = array('Utill');
}

class UtillBehaviorTest extends CakeTestCase{
	public function setUp() {
		parent::setUp();
		$this->Fake = ClassRegistry::init('Fake');
	}

	public function testIncrement(){
		$this->assertEquals($this->Fake->increment(1), 2);
	}
}
