<?php
class PagematronComponent extends Component {
    public $Controller = null;

    public function startup(Controller $controller) {
        parent::startup($controller);
        $this->Controller = $controller;
        // コントローラがページネーションを使っているか確かめる
        if (!isset($this->Controller->paginate)) {
            $this->Controller->paginate = array();
        }
    }

    public function adjust($length = 'short') {
        switch ($length) {
            case 'long':
                $this->Controller->paginate['limit'] = 100;
            break;
            case 'medium':
                $this->Controller->paginate['limit'] = 50;
            break;
            default:
                $this->Controller->paginate['limit'] = 20;
            break;
        }
    }
}