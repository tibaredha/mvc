<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Qua extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function index() 
	{
	$this->view->title = 'Search qua';
	$this->view->userListview = $this->model->userList() ;
	$this->view->render('qua/index');    
	}
	function search() 
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'listqual';
	    $this->view->userListviewo =trim($_GET['o']); //criter de choix
	    $this->view->userListviewq =trim($_GET['q']); //key word  
		$this->view->userListviewp =$url1[2];  // parametre 2 page                     limit 2,3
		$this->view->userListviewl =10      ;   // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('qua/listqual');   
	}
	public function editqua($id) 
	{
        $this->view->title = 'Edit qua';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('qua/editqua');
	}
	function imp() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render('qua/imp');    
	}
	function run()
	{
		$this->model->run();
	}
	public function edit($id) 
	{
        $this->view->title = 'Edit qua';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('qua/edit');
	}
	public function editSave($id)
	{
		$data = array();
		$data['id']     = $id;
		$data['GRABO']  = $_POST['GRABO'];
		$data['GRRH1']  = $_POST['GRRH1'];
		$data['GRRH2']  = $_POST['GRRH2'];
		$data['GRRH3']  = $_POST['GRRH3'];
		$data['GRRH4']  = $_POST['GRRH4'];
		$data['GRRH5']  = $_POST['GRRH5'];
		$data['KELL1']  = $_POST['KELL1'];
		$data['KELL2']  = $_POST['KELL2'];
		$data['HVB']    = $_POST['HVB'];
		$data['HVC']    = $_POST['HVC'];
		$data['HIV']    = $_POST['HIV'];
		$data['TPHA']   = $_POST['TPHA'];
		$data['IDDNR']  = $_POST['IDDNR'];
		$data['DATEQUA']= $_POST['DATEQUA'];
		$this->model->editSave($data);
		//echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL . 'qua/');
	}
	

}