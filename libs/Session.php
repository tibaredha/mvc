<?php

class Session
{
	
	public static function init()
	{
	    $date=date('Y-m-d');
		if ($date <= '2019-01-01' )
		{
		session_set_cookie_params(0);// kill session when browser closed
		@session_start();
		// echo $date ;
		}	
	}
	
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}
	
	
	
	
	
	
	
	
}