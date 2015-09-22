<?php
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('CurrencyRendererHelper', 'View/Helper');

class CurrencyRendererHelperTest extends CakeTestCase {

	public $CurrencyRendererHelper = null;

	public function setUp(){
		parent::setUp();
		$Controller = new Controller();
		$View = new View($Controller);
		$this->CurrencyRenderer = new CurrencyRendererHelper($View);
	}

	public function testusd(){
		$this->assertEquals('USD 5.30', $this->CurrencyRenderer->usd(5.30));
	}

}
