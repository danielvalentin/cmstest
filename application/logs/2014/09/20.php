<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-09-20 17:21:45 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /home/daniel/Web/www/cmstest/system/classes/Kohana/Cookie.php:67
2014-09-20 17:21:45 --- DEBUG: #0 /home/daniel/Web/www/cmstest/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 /home/daniel/Web/www/cmstest/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('session')
#2 /home/daniel/Web/www/cmstest/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /home/daniel/Web/www/cmstest/system/classes/Kohana/Cookie.php:67