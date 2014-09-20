<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-29 12:58:08 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-29 12:58:08 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-29 12:58:14 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-29 12:58:14 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-29 14:31:12 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function file_get_html() ~ APPPATH/classes/Controller/Api.php [ 12 ] in file:line
2014-05-29 14:31:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-29 16:10:30 --- EMERGENCY: ErrorException [ 2 ]: date() expects at least 1 parameter, 0 given ~ APPPATH/classes/Controller/Api.php [ 22 ] in file:line
2014-05-29 16:10:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'date() expects ...', '/var/www/skolem...', 22, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(22): date()
#2 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#3 [internal function]: Kohana_Controller->execute()
#4 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#5 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2014-05-29 16:35:58 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: today ~ APPPATH/classes/Controller/Api.php [ 27 ] in /var/www/skolemad/application/classes/Controller/Api.php:27
2014-05-29 16:35:58 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(27): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(42): Controller_Api->isopenday(1401460558)
#2 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#3 [internal function]: Kohana_Controller->execute()
#4 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#5 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/skolemad/application/classes/Controller/Api.php:27
2014-05-29 16:39:30 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 27 ] in file:line
2014-05-29 16:39:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(27): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(52): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:40:24 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 27 ] in file:line
2014-05-29 16:40:24 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(27): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(53): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:40:46 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 28 ] in file:line
2014-05-29 16:40:46 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 28, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(28): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(54): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:41:31 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 27 ] in file:line
2014-05-29 16:41:31 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(27): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(54): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:42:30 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 28 ] in file:line
2014-05-29 16:42:30 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 28, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(28): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(55): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:42:55 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 31 ] in file:line
2014-05-29 16:42:55 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 31, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(31): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(57): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:44:19 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 27 ] in file:line
2014-05-29 16:44:19 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(27): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(53): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:46:05 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 27 ] in file:line
2014-05-29 16:46:05 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(27): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(53): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2014-05-29 16:46:18 --- EMERGENCY: ErrorException [ 2 ]: array_key_exists(): The first argument should be either a string or an integer ~ APPPATH/classes/Controller/Api.php [ 27 ] in file:line
2014-05-29 16:46:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_key_exist...', '/var/www/skolem...', 27, Array)
#1 /var/www/skolemad/application/classes/Controller/Api.php(27): array_key_exists(false, Array)
#2 /var/www/skolemad/application/classes/Controller/Api.php(53): Controller_Api->isopenday(false)
#3 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_info()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#9 {main} in file:line