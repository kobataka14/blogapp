<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * ブログ記事専用モデルです
 *
 * @copyright php_ci_book
 * @link https://wwwww.jp
 * @since 1.0
 * @auther taka
 */
class Post extends AppModel {

/**
 * 一覧表示時のタイトルに使用するカラム名
 *
 * @var string
 */
	public $displayField = 'title';
/**
 * バリデーションルール
 *
 * @var array
 */
	public $validate = [
		'title' => [
			'notEmpty' => [
				'rule' => ['notEmpty'],
				'message' => 'タイトルは必須入力です',
			],
			'maxLength' => [
				'rule' => ['maxLength', '255'],
				'message' => 'タイトルは255文字以内で入力してください',
			],
		],
	];
}
