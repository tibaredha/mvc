<?php

class Ist extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
	    $this->view->title = 'ist';
		$this->view->render('ist/index');
	}
	
	function run()
	{
		$this->model->run();
	}
	
    function procedure() 
	{	
	    $this->view->title = 'ist';
		$this->view->render('ist/procedure');
	}
	
	function map() 
	{	
	    $this->view->title = 'ist';
		$this->view->render('ist/map');
	}
	
}