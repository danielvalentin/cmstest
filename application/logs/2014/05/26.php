<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-05-26 13:18:42 --- EMERGENCY: Exception [ 0 ]: View Menus/menu doesn't exist  ~ APPPATH/classes/Controller/Projectcontroller.php [ 38 ] in /var/www/skolemad/system/classes/Kohana/Controller.php:69
2014-05-26 13:18:42 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/Controller.php(69): Controller_Projectcontroller->before()
#1 [internal function]: Kohana_Controller->execute()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Menus))
#3 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#6 {main} in /var/www/skolemad/system/classes/Kohana/Controller.php:69
2014-05-26 13:19:07 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function title() on a non-object ~ APPPATH/views/Menus/menu.php [ 1 ] in file:line
2014-05-26 13:19:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-26 13:19:33 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function render_blocks() on a non-object ~ APPPATH/views/Menus/menu.php [ 4 ] in file:line
2014-05-26 13:19:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-26 13:41:05 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: secret ~ APPPATH/classes/Controller/Api.php [ 7 ] in /var/www/skolemad/application/classes/Controller/Api.php:7
2014-05-26 13:41:05 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(7): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/skolem...', 7, Array)
#1 /var/www/skolemad/system/classes/Kohana/Controller.php(69): Controller_Api->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#4 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/skolemad/application/classes/Controller/Api.php:7
2014-05-26 13:46:12 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_blocktype' not found ~ MODPATH/orm/classes/Kohana/ORM.php [ 46 ] in file:line
2014-05-26 13:46:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-26 13:49:42 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function show() on a non-object ~ APPPATH/classes/Controller/Api.php [ 54 ] in file:line
2014-05-26 13:49:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-26 13:49:50 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function show() on a non-object ~ APPPATH/classes/Controller/Api.php [ 55 ] in file:line
2014-05-26 13:49:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-05-26 13:50:06 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 55 ] in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:06 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(55): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/skolem...', 55, Array)
#1 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_today()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#4 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:10 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 55 ] in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:10 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(55): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/skolem...', 55, Array)
#1 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_today()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#4 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:17 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 55 ] in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:17 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(55): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/skolem...', 55, Array)
#1 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_today()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#4 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:36 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 54 ] in /var/www/skolemad/application/classes/Controller/Api.php:54
2014-05-26 13:50:36 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(54): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/skolem...', 54, Array)
#1 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_today()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#4 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/skolemad/application/classes/Controller/Api.php:54
2014-05-26 13:50:45 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 55 ] in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:45 --- DEBUG: #0 /var/www/skolemad/application/classes/Controller/Api.php(55): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/skolem...', 55, Array)
#1 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_today()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#4 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/skolemad/application/classes/Controller/Api.php:55
2014-05-26 13:50:58 --- EMERGENCY: Kohana_Exception [ 0 ]: The file property does not exist in the Model_File class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /var/www/skolemad/modules/orm/classes/Kohana/ORM.php:603
2014-05-26 13:50:58 --- DEBUG: #0 /var/www/skolemad/modules/orm/classes/Kohana/ORM.php(603): Kohana_ORM->get('file')
#1 /var/www/skolemad/application/classes/Controller/Api.php(55): Kohana_ORM->__get('file')
#2 /var/www/skolemad/system/classes/Kohana/Controller.php(84): Controller_Api->action_today()
#3 [internal function]: Kohana_Controller->execute()
#4 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#5 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#8 {main} in /var/www/skolemad/modules/orm/classes/Kohana/ORM.php:603
2014-05-26 14:23:07 --- EMERGENCY: Kohana_Exception [ 0 ]: A 'www-authenticate' header must be specified for a HTTP 401 Unauthorized ~ SYSPATH/classes/Kohana/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:23:07 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): Kohana_HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:25:01 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:25:01 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:27:52 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:27:52 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:27:55 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:27:55 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:28:12 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:28:12 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:28:35 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:28:35 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:29:30 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 14:29:30 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 15:21:17 --- EMERGENCY: Kohana_Exception [ 0 ]: You are not authorized to view this resource ~ APPPATH/classes/HTTP/Exception/401.php [ 34 ] in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77
2014-05-26 15:21:17 --- DEBUG: #0 /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php(77): HTTP_Exception_401->check()
#1 /var/www/skolemad/system/classes/Kohana/Request/Client/Internal.php(114): Kohana_HTTP_Exception_Expected->get_response()
#2 /var/www/skolemad/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 /var/www/skolemad/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#4 /var/www/skolemad/index.php(118): Kohana_Request->execute()
#5 {main} in /var/www/skolemad/system/classes/Kohana/HTTP/Exception/Expected.php:77