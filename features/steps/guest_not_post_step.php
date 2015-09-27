<?php
use Behat\Behat\Context\Step\Given,
	Behat\Behat\Context\Step\When,
	Behat\Behat\Context\Step\Then;

$steps->Given('/^"([^"]*)" 画面に遷移しようとする$/', function($world, $page) {
	return [
		new When('"' . $page . '" へ移動する')
	];
});

$steps->Given('/^"([^"]*)" が表示されること$/', function($world, $page) {
	return [
		new Then($page . ' を表示していること')
	];
});