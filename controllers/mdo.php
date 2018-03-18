<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class mdo extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}
	//***acceuil Documentation ***//
	function index() 
	{
	$this->view->title = 'mdo';
	$this->view->render('mdo/index');    
	}
	function MDO() 
	{
	$this->view->title = 'MDO';
	$this->view->render('mdo/MDO');    
	}

}