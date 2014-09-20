<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Errors extends Controller_Projectcontroller {
	
	public function action_404()
	{
		$error = ORM::factory('Error');
		$error -> type = '404';
		$error -> url = URL::site(request::detect_uri() . ((isset($_GET)&&!empty($_GET)) ? '?' . http_build_query($_GET) : ''), request::factory());
		$error -> ip = $_SERVER['REMOTE_ADDR'];
		$error -> client = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
		$error -> server = serialize($_SERVER);
		$error -> referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
		$error -> when = time();
		$error -> save();
		// 404 HTTP response
		$this -> response -> status(404);
		
		$page = cms::get_content_by_typetype('404', 'util', false);
		$this->bind('page',$page);
	}
	
}