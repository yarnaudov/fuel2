<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	
	'login' => 'auth/login',
	'logout' => 'auth/logout',
	'lostpassword' => 'auth/lostpassword',
	'register' => 'auth/register',
	
	'dashboard' => 'welcome/dashboard',
);
