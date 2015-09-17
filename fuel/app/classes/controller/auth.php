<?php

class Controller_Auth extends Controller_Template
{

	public $template = 'template-login';
	
	public function action_login()
	{
		
		if (\Auth::check()) {
			
			echo print_r(Auth::get_profile_fields()). "<----<br>";
			echo Auth::has_access('blog.comments');
			
			//\Messages::info(__('login.already-logged-in'));
			//\Response::redirect_back('hello');
		}
		
		$data = array();
		if (Input::post())
		{
			
			if (Auth::login()) {
				\Response::redirect_back('dashboard');
			}
			else{
				$data['username']    = Input::post('username');
				$data['error'] = 'Wrong username/password combo. Try again';
				\Messages::error(__('login.registation-not-enabled') . "Wrong username or password");
			}
		}
		
		$this->template->title = 'Login Page';
		$this->template->content = \View::forge('auth/login', $data);
		
	}

	public function action_logout()
	{
		\Auth::dont_remember_me();
		\Auth::logout();

		\Messages::success(__('login.logged-out'));

		\Response::redirect_back();
	}

	public function action_register()
	{
	
		if (\Input::method() == 'POST')
		{
			// validate the input
			$form->validation()->run();

			// if validated, create the user
			if ( ! $form->validation()->error())
			{
				try
				{
					// call Auth to create this user
					$created = \Auth::create_user(
						$form->validated('username'),
						$form->validated('password'),
						$form->validated('email'),
						\Config::get('application.user.default_group', 1),
						array(
							'fullname' => $form->validated('fullname'),
						)
					);

					// if a user was created succesfully
					if ($created)
					{
						// inform the user
						\Messages::success(__('login.new-account-created'));

						// and go back to the previous page, or show the
						// application dashboard if we don't have any
						\Response::redirect_back('dashboard');
					}
					else
					{
						// oops, creating a new user failed?
						\Messages::error(__('login.account-creation-failed'));
					}
				}

				// catch exceptions from the create_user() call
				catch (\SimpleUserUpdateException $e)
				{
					// duplicate email address
					if ($e->getCode() == 2)
					{
						\Messages::error(__('login.email-already-exists'));
					}

					// duplicate username
					elseif ($e->getCode() == 3)
					{
						\Messages::error(__('login.username-already-exists'));
					}

					// this can't happen, but you'll never know...
					else
					{
						\Messages::error($e->getMessage());
					}
				}
			}

			// validation failed, repopulate the form from the posted data
			$form->repopulate();
		}

		// pass the fieldset to the form, and display the new user registration view
		//return \View::forge('auth/register');
		$this->template->title = 'Register';
		$this->template->content = \View::forge('auth/register');
	}

	public function action_lostpassword() {
	
		if ($hash = \Input::get('hash')){
			
			$hash = base64_decode($hash);
			$user = \Model\Auth_User::find_by_id(substr($hash, 44));
	
			if ($user && isset($user->lostpassword_hash) and $user->lostpassword_hash == $hash and time() - $user->lostpassword_created < 86400){
					
					if (\Input::method() == 'POST'){
					
					}
				
					$this->template->title = 'Change password';
					$this->template->content = \View::forge('auth/change-password', compact('user'));
					
					/*
					\Auth::update_user(
						array(
							'lostpassword_hash' => null,
							'lostpassword_created' => null
						),
						$user->username
					);

					// log the user in and go to the profile to change the password
					if (\Auth::instance()->force_login($user->id)){
						\Messages::info(__('login.password-recovery-accepted'));
						\Response::redirect('profile');
					}
					*/

			}
			else{
				$this->template->title = 'Invalid hash';
				$this->template->content = \View::forge('auth/invalid-hash');
			}
			
		}
		else{
			
			if (\Input::method() == 'POST'){
				if ($email = \Input::post('email')){
					if ($user = \Model\Auth_User::find_by_email($email)){

						$hash = \Auth::instance()->hash_password(\Str::random()).$user->id;
						\Auth::update_user(
							array(
								'lostpassword_hash' => $hash,
								'lostpassword_created' => time()
							),
							$user->username
						);

						// send an email out with a reset link
						\Package::load('email');
						$email = \Email::forge();
						$email->subject(__('login.password-recovery'));
						$email->html_body(
							\View::forge('emails/lostpassword', array(
								'url' => \Uri::generate('lostpassword') . '?hash=' . base64_encode($hash),
								'user' => $user
							))
						);

						// add from- and to address
						$from = \Config::get('application.email-addresses.from.website', 'website@example.org');
						$from = array('email' => 'website@example.org', 'name' => 'alabala');
						$email->from($from['email'], $from['name']);
						$email->to($user->email, $user->fullname);

						try{
							$email->send();
							\Messages::success(__('login.recovery-email-send'));
						}
						catch(\EmailValidationFailedException $e){
							\Messages::error(__('login.invalid-email-address'));
						}

					}
					else{
						\Messages::error(__('login.no-user-found'));
					}
				}
			}
			
			$this->template->title = 'Forgot password';
			$this->template->content = \View::forge('auth/forgot-password');
			
		}
			
	}

}
