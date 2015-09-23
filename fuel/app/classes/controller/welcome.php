<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Template
{
	
	/*
	public function before(){
		
		if ( ! Auth::check() and ! Auth::guest_login()){
			Response::redirect('/login');
		}
		
	}
	*/
	
	public function action_index()
	{
		
		$this->template->title = 'Welcome';
		$this->template->content = \View::forge('welcome/index');
		
	}
	
	public function action_dashboard()
	{
		
		$this->template->title = 'Dashboard';
		$this->template->content = '';//\View::forge('users/index');
		
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
