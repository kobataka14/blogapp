<?php
App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('ComponentCollection', 'Controller');
App::uses('PagematronComponent', 'Controller/Component');

// テストの対象となる偽物のコントローラ
class TestPagematronController extends Controller {
    public $paginate = null;
}

class PagematronComponentTest extends CakeTestCase {
    public $PagematronComponent = null;
    public $Controller = null;

    public function setUp() {
        parent::setUp();
        // コンポーネントと偽のテストコントローラをセットアップする
        $Collection = new ComponentCollection();
        $this->PagematronComponent = new PagematronComponent($Collection);
        $CakeRequest = new CakeRequest();
        $CakeResponse = new CakeResponse();
        $this->Controller = new TestPagematronController($CakeRequest, $CakeResponse);
        $this->PagematronComponent->startup($this->Controller);
    }

    public function testAdjust() {
        // 異なる値の設定を用いてadjustメソッドをテストする
        $this->PagematronComponent->adjust();
        $this->assertEquals(20, $this->Controller->paginate['limit']);

        $this->PagematronComponent->adjust('medium');
        $this->assertEquals(50, $this->Controller->paginate['limit']);

        $this->PagematronComponent->adjust('long');
        $this->assertEquals(100, $this->Controller->paginate['limit']);
    }

    public function tearDown() {
        parent::tearDown();
        // 終了した後のお掃除
        unset($this->PagematronComponent);
        unset($this->Controller);
    }
}