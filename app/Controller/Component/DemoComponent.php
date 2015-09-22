<?php

class DemoComponent extends Component {
	
	public function hello($name="world"){
		return 'hello '. $name;
	}
}