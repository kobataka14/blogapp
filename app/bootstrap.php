<?php
App::uses('Fabricate', 'Fabricate.Lib');

Fabricate::config(function($config){
	$config->auto_validate = true;
});

Fabricate::define('Post', function($data, $world){
return ['title'=>$world->sequence('title', function($i){
	return "タイトル{$i}";})];
});