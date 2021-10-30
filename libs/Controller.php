<?php

class Controller {

	function __construct() {
		//echo 'Main controller<br />';
		$this->view = new View();
	}
	
	public function loadModel($name) {
		
		$path = 'models/'.$name.'_model.php';
		
		if (file_exists($path)) {
			require 'models/'.$name.'_model.php';
			
			$modelName = $name . '_Model';
			$this->model = new $modelName();
		}		
	}
	
	
	function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
	

}