<?php defined('SYSPATH') or die('No direct script access.');class Controller_Cms_Ajax_Widgets_Errorpages extends Controller {		public function action_get()	{		$errors = ORM::factory('Error')			->order_by('when', 'DESC')			->limit(10)			->find_all();		$errs = array();		if((bool)$errors->count())		{			foreach($errors as $e)			{				$errs[] = array(					'id' => $e->id,					'type' => $e->type,					'ip' => $e->ip,					'when' => date('d/m/Y H:i', $e->when),					'url' => $e->url				);			}		}		ajax::success('',array(			'errors' => $errs		));	}	}