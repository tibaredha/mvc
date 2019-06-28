<?php

class Session
{
	const dateexpiration ='2020-01-01';
	public static function init()
	{
	
	if (date('Y-m-d') <= self::dateexpiration )
		{ 
		session_save_path(path);       //default session.save_path = "c:/wamp/tmp"  +  path = constante definie dans le fichier lib/config 
		session_name('Sessionamrane');   //default session.name = PHPSESSID  session_id()= nom du fichier stocker dans D:\framework\libs\sessions; 
		session_set_cookie_params(0);
		@session_start();
		//setcookie('tibaredha','030570', time() + 365*24*3600, null, null, false, true);
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