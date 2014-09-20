<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projectcontroller extends Controller_Template {

	public $template = 'templates/default';

	protected $view = false;
	protected $scripts = array();
	protected $css = array();

	protected function view($title)
	{
		$this->template->view = View::factory($title);
	}

	public function before()
	{
		$controller = $this->request->controller();
		$action = $this->request->action();
		if(!$this->isAjax())
		{
			if($this->request->action() != 'media')
			{
				$adasd = 'asd';
				$assad = 2;
				parent::before();
				$this->template->controller = $controller;
				$this->template->action = $action;
				$foldercontroller = $controller;
				$foldercontroller = str_replace('_','/',$foldercontroller);
				$file = $foldercontroller.'/'.$action;
				if((file_exists(Kohana::find_file('views', $file))))
				{
					$this->template->view = View::factory($file);
				}
				else
				{
					throw new Exception('View '.$file.' doesn\'t exist ');
				}
			}
		}
	}

	protected function isAjax()
	{
		if($_SERVER['HTTP_ACCEPT'] == 'application/json, text/plain, */*' || $this->request->is_ajax())
		{
			return true;
		}
		return false;
	}

	public function after()
	{
		if(!$this->isAjax())
		{
			if(is_object($this->template))
			{
				$this->template->scripts = $this->scripts;
				$this->template->css = $this->css;
			}
			parent::after();
		}
	}

	public function bind($key, $val)
	{
		if($this->isAjax())
		{
			$this->view->$key = $val;
		}
		else
		{
			$this->template->view->$key = $val;
		}
	}

	public function load_script($script)
	{
		$this->scripts[] = $script;
	}

	public function load_css($file)
	{
		$this->css[] = $file;
	}

	public function require_login($msg = '', $redirect = false)
	{
		if(!user::logged())
		{
			notes::error($msg);
			if($redirect)
			{
				site::redirect($redirect);
			}
			else
			{
				user::redirect('login');
			}
		}
	}

}
