<?php

class Controller_Users extends Controller_Template
{
	
	public function before(){
		
		parent::before();
		
		if(! Auth::check()){
			Response::redirect('/login');
		}
	}
	
	public function action_index()
	{
		
		$this->template->title = 'Users Page';
		$this->template->content = \View::forge('users/index');
		
	}

}
