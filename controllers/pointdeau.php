<?php
class pointdeau extends Controller {

	 private $route  = 'pointdeau';

     private $uploadLocation = "C:\\wamp/www/mvc/public/webcam/oaep/"; 


	function __construct() {
	   parent::__construct();
    
	}
	//***acceuil pat ***//
	function index() 
	{
	$this->view->title = 'Search deces';
	$this->view->render('pointdeau/index');    
	}
	
	//***search eleve ***//
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search pointdeau';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl = 13     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb = 15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function OAEP() 
	{
	$this->view->title = 'OAEP';
	$this->view->userListview = $this->model->listoaep() ;
	$this->view->render('pointdeau/OAEP');    
	}
	public function createoaep() 
	{
		$data = array();
		$data['TOAEP']        = $_POST['TOAEP'];
		$data['NUM']          = $_POST['NUM'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['NOMPRENOM']    = $_POST['NOMPRENOM'];
		$data['DATEN']        = $_POST['DATEN'];
		$data['POPDES']       = $_POST['POPDES'];
		$data['DES']          = $_POST['DES']; 
	    $data['DATEI']        = $_POST['DATEI'];
		$data['EPSP']         = $_POST['EPSP'];
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$this->model->createoaep($data);
		header('location: ' . URL . 'pointdeau/OAEP/');		
	}
	
	
	
	//***editoaep***//
	public function editoaep($id) 
	{
        $this->view->title = 'editoaep';
		$this->view->user = $this->model->userSingleListoaep($id);
		$this->view->render('pointdeau/editoaep');
	}
	
	public function editSaveoaep($id)
	{
		$data = array();
		$data['id']           = $id;
		$data['TOAEP']        = $_POST['TOAEP'];
		$data['NUM']          = $_POST['NUM'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['NOMPRENOM']    = $_POST['NOMPRENOM'];
		$data['DATEN']        = $_POST['DATEN'];
		$data['POPDES']       = $_POST['POPDES'];
		$data['DES']          = $_POST['DES']; 
	    $data['DATEI']        = $_POST['DATEI'];
		$data['EPSP']         = $_POST['EPSP'];
		//echo '<pre>';print_r ($data);echo '<pre>';
	    $this->model->editSaveoaep($data);
		header('location: ' . URL . 'pointdeau/OAEP/');
	}
	//***deleteoaep***//
	public function deleteoaep($id)
	{
	$this->model->deleteoaep($id);                 //la supression 
	header('location: ' . URL . 'pointdeau/OAEP/');
	}
	
	
	
	
	
	function SOAEP() 
	{
	$this->view->title = 'Surveillance';
	$this->view->userListview = $this->model->listsoaep() ;
	$this->view->render('pointdeau/Surveillance');     
	}
	public function screateoaep() 
	{
		$data = array();
		$data['TOAEP']        = $_POST['TOAEP'];
		$data['NUM']          = $_POST['NUM'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['CR']           = $_POST['CR'];
		$data['BC']           = $_POST['BC'];
	    $data['DATEI']        = $_POST['DATEI'];
		$data['EPSP']         = $_POST['EPSP'];
		echo '<pre>';print_r ($data);echo '<pre>';  
		$this->model->screateoaep($data);
		header('location: ' . URL . 'pointdeau/SOAEP/');		
	}
	
	//***editsoaep***//
	public function editsoaep($id) 
	{
        $this->view->title = 'editoaep';
		$this->view->user = $this->model->userSingleListsoaep($id);
		$this->view->render('pointdeau/editsoaep');
	}
	
	public function editSavesoaep($id)
	{
		$data = array();
		$data['id']           = $id;
		$data['TOAEP']        = $_POST['TOAEP'];
		$data['NUM']          = $_POST['NUM'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['CR']           = $_POST['CR'];
		$data['BC']           = $_POST['BC'];
	    $data['DATEI']        = $_POST['DATEI'];
		$data['EPSP']         = $_POST['EPSP'];
		//echo '<pre>';print_r ($data);echo '<pre>';
	    $this->model->editSavesoaep($data);
		header('location: ' . URL . 'pointdeau/SOAEP/');
	}
	//***deleteoaep***//
	public function deletesoaep($id)
	{
	$this->model->deletesoaep($id);                 //la supression 
	header('location: ' . URL . 'pointdeau/SOAEP/');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function Evaluation() 
	{
	$this->view->title = 'evaluation';
	$this->view->render('pointdeau/Evaluation');    
	}
	
	
	
	
}