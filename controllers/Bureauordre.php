<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Bureauordre extends Controller {

    private $route  = 'Bureauordre';

    private $uploadLocation = "C:\\wamp/www/mvc/public/webcam/bo/"; 

	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}
	
	
	//***acceuil Bureauordre ***//
	function index() 
	{
	$this->view->title = 'Search Bureauordre';
	$this->view->render($this->route.'/index');    
	}
	//******************************************************1ere partie********************************************************//
	//***search message ***//
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search Bureauordre';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl = 13     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb = 15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	
	function Message () 
	{	
	    $this->view->title = 'Message';	
		$this->view->render($this->route.'/new_message');
	}
	
	public function createmessage() 
	{
		$data = array();
		$data['Date']        = $_POST['Date'];
		$data['Numero']      = $_POST['Numero'];
		$data['Etat']        = $_POST['Etat'];
		$data['Source']      = $_POST['Source'];
		$data['Objet']       = $_POST['Objet'];
		$data['Destination'] = $_POST['Destination'];
	    $this->model->createmessage($data);
        // echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/Message/');	
	}
	
	
	

	
	//***editeleve***//
	public function edit($id) 
	{
        $this->view->title = 'Edit Message';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['Date']        = $_POST['Date'];
		$data['Numero']      = $_POST['Numero'];
		$data['Etat']        = $_POST['Etat'];
		$data['Source']      = $_POST['Source'];
		$data['Objet']       = $_POST['Objet'];
		$data['Destination'] = $_POST['Destination'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		//header('location: ' . URL .$this->route.'/view/'.$id.'');
		header('location: ' . URL .$this->route.'/search/0/10?o=Numero&q=');	
	}
	//***deleteeleve***//
	public function delete($id)
	{
	$this->model->deletemessage($id);     //la supression eleve  
	header('location: ' . URL .$this->route.'/search/0/10?q=&o=Numero');
	}
	//******************************************************3eme partie********************************************************//
	function listmessage($id) 
	{
	$this->view->title = 'listmessage';
	$this->view->userListview = $this->model->listmessage($id);
	$this->view->render($this->route.'/listmessage');    
	}
	function listmessage1() 
	{
	$this->view->title = 'listmessage1';
	$this->view->render($this->route.'/listmessage1');    
	}
	function listmessage2() 
	{
	$this->view->title = 'listmessage2';
	$this->view->render($this->route.'/listmessage2');    
	}
	
	
	
	//******************************************************2eme partie********************************************************//
	//**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render($this->route.'/upl');    
	}
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
				//upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				//
				$target_path = $this->uploadLocation.trim($id).".jpg";      
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
		// header('location: ' . URL .$this->route.'/search/0/10?q=&o=NOM');
		$this->view->render($this->route.'/upl');    
	}
	
	
	
	
	
	
	
}