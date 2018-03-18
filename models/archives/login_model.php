<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$sth = $this->db->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => md5($_POST['password'])
		));
		$data = $sth->fetch();
		$count =  $sth->rowCount();
		if ($count > 0) {
			Session::init();
			Session::set('REGION',$data['REGION']);
			Session::set('WILAYA',$data['WILAYA']);
			Session::set('STRUCTURE',$data['STRUCTURE']);
			Session::set('role',$data['role']);
			Session::set('id',$data['id']);
			Session::set('lang',$data['lang']);
			Session::set('login',$data['login']);
			Session::set('loggedIn', true);
			header('location: ../dnr/');
		} else {
		    Session::init();
		    Session::set('errorlogin', 'Bad username or password supplied.');
			header('location: ../login');
		}
		
	}
	
}