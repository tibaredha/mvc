<?php

class Register_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run($data) {

	    $sth = $this->db->prepare("SELECT * FROM users WHERE login = :login ");
		$sth->execute(array(
			':login' => $data['login']	
		));
		$data1 = $sth->fetch();
		$count =  $sth->rowCount();
	    
		$uLen = strlen($data['login']);
		$pLen = strlen($data['password']);
		if ($uLen <= 4 || $uLen >= 11) {
		    Session::init();
			Session::set('errorregister', 'Username must be between 4 and 11 characters.');
			header('location: ../Register');
		}
		elseif ($pLen < 6) 
		{
		    Session::init();
			Session::set('errorregister', 'Password must be longer then 6 characters.');
			header('location: ../Register');
		}
		elseif ($count > 0) {	
			Session::init();
			Session::set('errorregister', 'Username already exists.');
			header('location: ../Register');
		} 
		else 
		{
		 $this->db->insert('users', array(
            'REGION' => $data['REGION'],
            'WILAYA' => $data['WILAYA'],
            'STRUCTURE' => $data['STRUCTURE'],
            'GRADE' => $data['GRADE'],
            'lang' => $data['LANG'],
            'login' => $data['login'],
            'password' => md5($data['password']),
			'Email' => $data['Email']	
        ));
		header('location: ' . URL . 'login');
		}     
    }

}
