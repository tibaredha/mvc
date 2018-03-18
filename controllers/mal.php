<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Mal extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}
	
	function FICHEIPA() 
	{
	$this->view->title = 'FICHEIPA';
	$this->view->render('mal/FICHEIPA');    
	}
	
	
	
	
	function index() 
	{
	$this->view->title = 'Search Patient';
	$this->view->render('mal/index');    
	}
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search mal';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =5;           //parametre 3 nobre de ligne par page  limit 2,3 
		$this->view->userListviewb =15;          //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('mal/index');
	}
	public function newmal() 
	{
		$this->view->title = 'create malade';
		$this->view->render('mal/new');
	}
	public function create() 
	{
		$data = array();
		$data['DINS']      = $_POST['DINS'];
		$data['FILSDE']    = $_POST['FILSDE'];
		$data['NUM']       = $_POST['NUM'];
		$data['SERVICE']   = $_POST['SERVICE'];
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['DATENS']    = $_POST['DATENS'];
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		$data['TEL']       = $_POST['TEL'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$last_id=$this->model->create($data);
		header('location: ' . URL . 'mal/newmal/');
		
	}
	
	public function qualifier($id) 
	{
        $this->view->title = 'qualifier mal';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('mal/qualifier');
	}
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['DATEQUA']   = $_POST['DATEQUA'];
	    $data['GRABO']     = $_POST['GRABO'];
	    $data['GRRH']      = $_POST['GRRH1'];
		$data['GRRH2']     = $_POST['GRRH2'];
		$data['GRRH3']     = $_POST['GRRH3'];
		$data['GRRH4']     = $_POST['GRRH4'];
		$data['GRRH5']     = $_POST['GRRH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['HVB']       = $_POST['HVB'];
		$data['HVC']       = $_POST['HVC'];
		$data['HIV']       = $_POST['HIV'];
		$data['TPHA']      = $_POST['TPHA'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL . 'mal/');
	}
	public function editSave1($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['DINS']      = $_POST['DINS'];
		$data['FILSDE']    = $_POST['FILSDE'];
		$data['NUM']       = $_POST['NUM'];
		$data['SERVICE']   = $_POST['SERVICE'];
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['DATENS']    = $_POST['DATENS'];
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		$data['TEL']       = $_POST['TEL'];
		$data['GRABO']     = $_POST['GRABO'];
		$data['GRRH']      = $_POST['GRRH'];
		$data['CRH2']      = $_POST['CRH2'];
		$data['CRH4']      = $_POST['CRH4'];
		$data['ERH3']      = $_POST['ERH3'];
		$data['ERH5']      = $_POST['ERH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['HVB']       = $_POST['HVB'];
		$data['HVC']       = $_POST['HVC'];
		$data['HIV']       = $_POST['HIV'];
		$data['TPHA']      = $_POST['TPHA'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave1($data);
		header('location: ' . URL . 'mal/');
	}
	public function edit($id) 
	{
        $this->view->title = 'edit mal';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('mal/edit');
	}
	
	public function delete($id)
	{
		$this->model->delete($id);      
		header('location: ' . URL . 'mal');
	}
	function impmal() 
	{
	$this->view->title = 'Search mal';
	$this->view->render('mal/impmal');    
	}

}