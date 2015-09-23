<?php 
class Controller extends Fuel\Core\Controller
{
	
	public function before(){
		parent::before();
		$this->_checkAccessRules();
	}
    
	private function _checkAccessRules(){
		
		$rules = method_exists($this, 'accessRules') ? $this->accessRules() : array();
		$action = Request::active()->action;
		
		$redirect = true;
		foreach($rules as $rule){
			if(in_array($action, $rule['actions']) && $rule['users'] == '*'){
				$redirect = false;
				break;
			}
		}
		
		if($redirect && !Auth::check()){
			Response::redirect(Uri::create('login') . '?url=' . urlencode(Uri::update_query_string()));
		}
		
	}
	
}
