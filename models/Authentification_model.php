<?php

class Authentification_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function runRegister($data) {
	
	 // echo '<pre>';print_r ($data);echo '<pre>';
	 // echo 'model';

	    $sth = $this->db->prepare("SELECT * FROM users WHERE login = :login ");
		$sth->execute(array(
			':login' => $data['login']	
		));
		$data1 = $sth->fetch();
		$count = $sth->rowCount();
	    
		$uLen = strlen($data['login']);
		$pLen = strlen($data['password']);
		if ($uLen <= 4 || $uLen >= 11) {
		    Session::init();
			Session::set('errorregister', 'Username must be between 4 and 11 characters.');
			header('location: ../Authentification/Register');
		}
		elseif ($pLen < 6) 
		{
		    Session::init();
			Session::set('errorregister', 'Password must be longer then 6 characters.');
			header('location: ../Authentification/Register');
		}
		elseif ($count > 0) {	
			Session::init();
			Session::set('errorregister', 'Username already exists.');
			header('location: ../Authentification/Register');
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
		header('location: ' . URL . 'Authentification/login');
		}     
    }
	
	public function runLogin()
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
			header('location: ../cour/');
			// header('location: ../Bordereau/NBordereau/');
			//header('location: ../dnr/');
		} else {
		    Session::init();
		    Session::set('errorlogin', 'Bad username or password supplied.');
			header('location: ../Authentification/login');
		}
		
	}
	
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM users WHERE id = :id', array(':id' => $id));
    }
	
	public function editSave($data) {
        $postData = array(
            'login' => $data['login'],
            'password' => md5($data['password']),
			'Email' => $data['Email'],
            'REGION' => $data['REGION'],
			'WILAYA' => $data['WILAYA'],
			'STRUCTURE' => $data['STRUCTURE']	
        );
		// echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('users', $postData, "id =" . $data['id'] . "");
    }
	
	

}
