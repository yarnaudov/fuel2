<?php 
class Uri extends Fuel\Core\Uri
{
    public function __construct($uri = NULL)
    {
        parent::__construct($uri);
        $this->detect_language();
    }
 
    public function detect_language()
    {
        if ( ! count($this->segments))
        {
            return false;
        }
 
        $first = $this->segments[0];
        $locales = Config::get('locales');
 
        if(array_key_exists($first, $locales))
        {
            array_shift($this->segments);
            $this->uri = implode('/', $this->segments);
 
            Config::set('language', $first);
            Config::set('locale', $locales[$first]);
        }
    }
    
    public static function create($uri = null, $variables = array(), $get_variables = array(), $secure = null)
	{
		is_null($uri) and $uri = static::string();
		if(!preg_match("#^(http|https|ftp)://#i", $uri)){
			$uri = Config::get('language') . '/' . $uri;
		}	
		return parent::create($uri, $variables, $get_variables, $secure);
	}
    
}
