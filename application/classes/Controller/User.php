<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Projectcontroller {
	
	public function action_index()
	{
		$this->require_login();
		
		$errors = false;
		if($_POST)
		{
			try
			{
				$user = user::get();
				$user->update_user($_POST, array('email', 'password'));
				if(arr::get($_POST, 'reminder', false))
				{
					$user->reminder = 1;
				}
				else
				{
					$user->reminder = 0;
				}
				$user->save();
				notes::success(__('Your info has been updated!'));
				user::redirect();
			}
			catch(ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
			}
		}
		$this->bind('errors', $errors);
	}
	
	public function action_delete()
	{
		$user = user::get();
		$user->delete = time();
		$user->save();
	}
	
	public function action_login()
	{
		if((bool)arr::get($_GET, 'return', false))
		{
			site::set_last_url($this->request->referrer());
		}
		$errors = false;
		if($_POST)
		{
			$email = arr::get($_POST, 'email','');
			$password = arr::get($_POST, 'password','');
			$remember = false;//(arr::get($_POST, 'remember','')=='yes');
			try
			{
				if(user::login($email, $password, $remember))
				{
					$user = user::get();
					if($user->delete != 0) // Previously set for deletion. Cancel that
					{
						$user->delete = 0;
						$user->save();
					}
					notes::success(__('You have been logged in. Welcome back!'));
					$lasturl = site::get_last_url();
					if($lasturl)
					{
						site::redirect($lasturl);
					}
					user::redirect();
				}
				else
				{
					notes::error(__('Wrong e-mail or password. Please try again'));
					$errors = true;
				}
			}
			catch(ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
			}
		}
		$this->bind('errors', $errors);
	}
	
	/**
	 * @todo: Log user logout failure
	 */
	public function action_logout()
	{
		$this->auto_render = false;
		if(user::logout())
		{
			notes::info(__('You have been logged out. See ya!'));
			user::redirect('login');
		}
		else
		{
			notes::error(__('An error occured and you could not be logged out.'));
			user::redirect('');
		}
	}
	
	public function action_help()
	{
		if($_POST)
		{
			$user = ORM::factory('User')->where('email', '=', $_POST['email'])->find();
			if($user->loaded())
			{
				$token = ORM::factory('user_token');
				$token->user_id = $user -> id;
				$token->created = time();
				$token->expires = strtotime('+2 hours');
				//$token -> type = 'password';
				$token->save();
				$mail = mail::create('userforgotpass')
					->to($user->email)
					->tokenize(array(
						'email' => $user->email,
						'resetlink' => $user::url('password/'.$token->token, 'http')
					))->send();
				notes::info(__('Check your e-mail! We\'ve sent you a mail with instructions on resetting your password.'));
				user::redirect('logind');
			}
			else
			{
				$url = user::url('signup');
				notes::add('error', __('No account is registerred with that e-mail address'));
			}
		}
	}
	
	/**
	 * Password recovery - enter new password
	 */
	public function action_password($token = false)
	{
		$token = $this->request->param('id');
		$errors = false;
		$token = ORM::factory('User_Token')->where('token', '=', $token)->find();
		if(!$token || !$token->loaded())
		{
			// Bad or expired token
			notes::add('error', __('The link you used was either wrong or has expired.'));
			site::redirect(user::slug('help'));
		}
		if($_POST)
		{
			$errors = ORM::factory('User')->where('id', '=', $token->user->id)->find()->update_password($_POST);
			if(!$errors)
			{
				// Password successfully changed
				$token->delete();
				notes::add('success', __('Your password has been updated and you can now log in.'));
				user::redirect('logind');
				die();
			}
			
		}
		$this->bind('token', $token);
		$this->bind('errors', $errors);
	}
	
	/*
	 * @todo: Log "user not logged" issues
	 */
	public function action_signup()
	{
		$errors = false;
		$password = false;
		if($_POST)
		{
			$user = ORM::factory('User');
			try
			{
				user::create($_POST);
				user::login(arr::get($_POST, 'email', ''), arr::get($_POST, 'password', ''));
				notes::add('success', __('You are now signed up. Welcome!'));
				if(user::logged())
				{
					user::redirect();
				}
				else
				{
					// should log this error (user wasnt logged in with user::create())
					user::redirect('login');
				}
			}
			catch(ORM_Validation_Exception $e)
			{
				$errors = $e->errors('models');
			}
			
		}
		$this->bind('errors', $errors);
	}
	
	public function action_job()
	{
		$job = $this->request->param('job');
		
		$this->bind('job', $job);
	}

}
