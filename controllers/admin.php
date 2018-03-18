<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class admin extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}
	
	//***acceuil ***//
	function index() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render('admin/index');    
	}
	
	function Users() 
	{
	$this->view->title = 'Search Users';
	$this->view->user =$this->model->userSearch();
	$this->view->render('admin/Users');    
	}
	
	
	 //**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render('admin/upl');    
	}
	
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
				//upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				// $uploadLocation = "d:\\mvc/public/webcam/pat/"; 
				$target_path = uploadLocationusers.trim($id).".jpg";      
				if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) 
				{	
				$this->view->msg ='le fichier :  '.basename( $_FILES['upfile']['name']).'  a été corectement envoyer merci';
				} 
				else
				{
				$this->view->msg ='il ya une erreur d\'envoie du fichier :  '.basename( $_FILES['upfile']['name']).'  veillez recomencer svp';	
				}
			}	
		}
		header('location: ' . URL . 'admin/Users');
		   
	}		
	
	
	
	
	
}