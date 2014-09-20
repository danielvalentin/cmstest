<?php defined('SYSPATH') or die('No direct script access.'); 

abstract class router {
	
	public static function find_type($route, $params, $request)
	{
		// statistics
		//statistics::count_visit();
		// Current visitors
		visitor::save_update_current();
		maintenance::delete_inactive_visitors();
		extract($params);
		if(!isset($controller))
		{
			$controller = 'content';
		}
		$controller = strtolower($controller);
		$guid = $controller.'/'.$action;
		if($action == 'index')
		{
			$guid = $controller;
		}
		
		// Homepage
		if($guid == 'content')
		{
			$contenttypetype = ORM::factory('Contenttypetype')->where('key','=','home')->find();
			if($contenttypetype->loaded())
			{
				$homepage = $contenttypetype->contenttype->contents->find();
				$controller = 'Content';
				if(class_exists('Controller_'.$contenttypetype->contenttype->type))
				{
					$controller = $contenttypetype->contenttype->type;
				}
				$action = 'index';
				if(method_exists('Controller_'.$controller, 'action_home'))
				{
					$action = 'home';
				}
				$homepage->hit();
				return array(
					'controller' => $controller,
					'action' => $action,
					'content' => $homepage
				);
			}
		}
		
		// API
		if($controller == 'api')
		{
			return array(
				'controller' => 'Api',
				'action' => $action
			);
		}
		
		// User
		if($guid == localization::get('users.urls.login'))
		{
			return array(
				'controller' => 'User',
				'action' => 'login'
			);
		}
		if($guid == localization::get('users.urls.logout'))
		{
			return array(
				'controller' => 'User',
				'action' => 'logout'
			);
		}
		if($guid == localization::get('users.urls.base'))
		{
			return array(
				'controller' => 'User',
				'action' => 'index'
			);
		}
		if($guid == localization::get('users.urls.help'))
		{
			return array(
				'controller' => 'User',
				'action' => 'help'
			);
		}
		if($guid == localization::get('users.urls.signup'))
		{
			return array(
				'controller' => 'User',
				'action' => 'signup'
			);
		}
		
		// Redirects
		$redirect = ORM::factory('Redirect')->where('from','=',$guid)->find();
		if($redirect->loaded())
		{
			return array(
				'controller' => 'redirect',
				'action' => 'do',
				'guid' => $guid,
				'redirect' => $redirect
			);
		}
		
		// Products
		/*$product = ORM::factory('Product');
		if(!user::logged('admin'))
		{
			$product = $product->where('status','=','active');
		}
		$product = $product
			->where('guid','=',$guid)
			->where('splittest','=',0)
			->find();
		if($product->loaded())
		{
			$splittests = $product->get_splittests();
			if((bool)$splittests->count())
			{
				$tests = array();
				$tests[] = $product;
				foreach($splittests as $splittest)
				{
					$tests[] = $splittest;
				}
				$product = $tests[rand(0,count($tests)-1)];
			}
			$product->hit();
			return array(
				'controller' => 'products',
				'action' => 'show',
				'product' => $product
			);
		}
		
		// Brands
		$brand = ORM::factory('Brand')->where('status','=','active')->where('slug','=',$guid)->find();
		if($brand->loaded())
		{
			$brand->hit();
			return array(
				'controller' => 'brands',
				'action' => 'show',
				'brand' => $brand
			);
		}
		
		// Categories
		$category = ORM::factory('Productcategory')->where('status','=','active')->where('guid','=',$guid)->find();
		if($category->loaded())
		{
			$category->hit();
			return array(
				'controller' => 'productcategory',
				'action' => 'show',
				'category' => $category
			);
		}*/
		
		/*if($controller == 'blog')
		{
			if(!$action || $action == '' || $action == 'index')
			{
				return array(
					'controller' => 'blog',
					'action' => 'index'
				);
			}
			$post = ORM::factory('Content')->where('guid','=',$action)->find();
			if($post->loaded())
			{
				return array(
					'controller' => 'blog',
					'action' => 'post',
					'post' => $post
				);
			}
		}*/
		
		// Pages/Content
		$content = ORM::factory('Content');
		if(!user::logged('admin'))
		{
			$content = $content->where('status','=','active');
		}
		$content = $content->where('guid','=',$guid)->find();
		if($content->loaded())
		{
			// Specific content
			
			$class = 'Content';
			if(class_exists('Controller_'.ucfirst($content->contenttype->type)))
			{
				$class = ucfirst($content->contenttype->type);
			}
			
			$action = 'default';
			if($content->contenttypetype_id != 0)
			{
				if(method_exists('Controller_'.$class, 'action_'.$content->contenttypetype->key))
				{
					$action = $content->contenttypetype->key;
				}
			}
			$content->hit();
			return array(
				'controller' => $class,
				'action' => $action,
				'content' => $content
			);
		}
		else
		{
			// Index page for contenttype
			if($action == 'index')
			{
				$contenttype = $controller;
				if(class_exists('Controller_'.ucfirst($contenttype)))
				{
					$class = ucfirst($contenttype);
					return array(
						'controller' => $class,
						'action' => 'index'
					);
				}
			}
		}
		
		$parts = explode('/',$guid);
		// "Static" controllers or 404
		$file = 'application/classes/controller/' . $parts[0] . '.php';
		if(file_exists($file))
		{
			$return = array();
			$return['controller'] = $parts[0];
			$return['action'] = ((isset($parts[1]))?$parts[1]:'index');
			$return['id'] = ((isset($parts[2]))?$parts[2]:'');
			$return['guid'] = $guid;
			return $return;
		}
		else
		{
			return array(
				'controller' => 'Errors',
				'action' => '404',
				'guid' => $guid
			);
		}
	}
	
}
