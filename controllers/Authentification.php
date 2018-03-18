<?php

class Authentification extends Controller {

	function __construct() {
		parent::__construct();	
	}
	//Register
	function Register() 
	{	
	    $this->view->title = 'Register';
		$this->view->render('Authentification/Register');
	}
	function Registerrun()
	{
		$data = array();
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
	    $data['GRADE']     = $_POST['GRADE'];
		$data['LANG']      = $_POST['LANG'];
		$data['login']     = $_POST['login'];
		$data['password']  = $_POST['password'];
		// $data['password']  = $this->generateRandomString($length = 10);
		$data['Email']     = $_POST['Email'];
		$this->model->runRegister($data);	
	}
	function Registerupdate($id) 
	{	
	    $this->view->title = 'Registerupdate';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('Authentification/Registerupdate');
	}
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['login']     = $_POST['login'];
		$data['password']  = $_POST['password'];
		$data['Email']     = $_POST['Email'];
		$data['REGION']     = $_POST['REGION'];
		$data['WILAYA']     = $_POST['WILAYA'];
		$data['STRUCTURE']  = $_POST['STRUCTURE'];
		$this->model->editSave($data);
		header('location: ' . URL . 'Dnr/');
	}
	
	function terms() 
	{	
	    $this->view->title = 'terms';
		$this->view->render('Authentification/terms');
	}
	
	
	//Login
	function Login() 
	{	
	    $this->view->title = 'Login';
		$this->view->render('Authentification/login');
	}
	function Loginrun()
	{
		$this->model->runLogin();
	}
	function ForgotPassword() 
	{	
	    $this->view->title = 'ForgotPassword';
		$this->view->render('Authentification/ForgotPassword');
	}
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	

}