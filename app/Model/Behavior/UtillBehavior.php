<?php
class UtillBehavior extends ModelBehavior{
	public function increment(Model $model, $par){
		return ($par + 1);
	}

}