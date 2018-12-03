<?php
require 'vendor/autoload.php';

return [
	'paths' => [
		'migrations' => [
			'./config/migrations'
		]
	],
	'environments' => [
		'default_database' => 'development',
		'development' => [
			'adapter: mysal',
			'name' => 'devdb',
			'host' => 'localhost',
			'user' => 'root',
			'pass' => 'id10t',
			'port' => 3306,
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci'
		]
	]
];
