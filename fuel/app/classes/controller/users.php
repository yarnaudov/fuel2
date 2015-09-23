<?php

class Controller_Users extends Controller_Template
{
	
	public function action_index()
	{
		
		$this->template->title = 'Users Page';
		$this->template->content = \View::forge('users/index');
		
	}

}
