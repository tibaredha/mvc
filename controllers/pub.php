<?php

class Pub extends Controller {

	function __construct() {
		parent::__construct();	
		
	}
	
	function index() 
	{	
	    $this->view->title = '';
		$this->view->render('dnr/index');
	}
	function AboutUs() 
	{	
	    $this->view->title = 'About Us';
		$this->view->render('Pub/index');
	}
	function VisionMission() 
	{	
	    $this->view->title = 'Vision Mission';
		$this->view->render('Pub/VisionMission');
	}
	
    function PeopleBehind() 
	{	
	    $this->view->title = 'People Behind';
		$this->view->render('Pub/PeopleBehind');
	}
	
	 function Facts() 
	{	
	    $this->view->title = 'Blood Donation Facts';
		$this->view->render('Pub/Facts');
	}
	
	 function can() 
	{	
	    $this->view->title = 'Who can/can\'t donate blood';
		$this->view->render('Pub/can');
	}
	
	
	
}