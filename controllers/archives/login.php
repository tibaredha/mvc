<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
	    $this->view->title = 'Login';
		$this->view->render('login/index');
	}
	function ForgotPassword() 
	{	
	    $this->view->title = 'ForgotPassword';
		$this->view->render('login/ForgotPassword');
	}
	function run()
	{
		$this->model->run();
	}
	

}