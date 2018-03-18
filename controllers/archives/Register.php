<?php

class Register extends Controller {

	function __construct() {
		parent::__construct();	
	}
	function index() 
	{	
	    $this->view->title = 'Register';
		$this->view->render('Register/index');
	}
	function terms() 
	{	
	    $this->view->title = 'terms';
		$this->view->render('Register/terms');
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
	function run()
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
		$this->model->run($data);	
	}
	

}