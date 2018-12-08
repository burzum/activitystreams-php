<?php
require 'vendor/autoload.php';
require 'config/config.php';

use ActivityStreams\Server\Config;

return [
	'paths' => [
		'migrations' => [
			'./config/migrations'
		]
	],
	'environments' => [
		'default_database' => 'development',
		'development' => [
			'adapter' => 'mysql',
			'name' => 'activities',
			'host' => 'localhost',
			'user' => Config::get('database.user'),
			'pass' => Config::get('database.password'),
			'port' => 3306,
			'charset' => 'utf8',
			'collation' => 'utf8_unicode_ci'
		]
	]
];
