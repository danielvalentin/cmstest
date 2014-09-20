<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(
	'zipcodes' => array(
		'length' => array(
			'min'			=> 4,
			'max'			=> 4,
		)
	),
	'currency' => array(
		'thousands_seperator' => '.',
		'decimal_seperator'	=> ',',
		'denomination' => '$',
		'placement' => 'front'
	),
	'dates' => array(
		'format' => 'DD-MM-YYYY',
		'months' => 'januar,februar,marts,april,maj,juni,juli,august,september,oktober,november,december'
	),
	'users' => array(
		'urls' => array(
			'login'		=> 'bruger/logind',
			'new'		=> 'bruger/tilmeld',
			'logout'	=> 'bruger/logud',
			'base'		=> 'bruger',
			'help'		=> 'bruger/hjælp',
			'signup'	=> 'bruger/tilmeld'
		)
	)
);
