<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class stat extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}
	//***stat ***//
	function index() 
	{
	$this->view->title = 'stat';
	$this->view->render('stat/index');    
	}
	

}