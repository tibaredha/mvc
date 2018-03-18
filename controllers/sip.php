<?php

class Sip extends Controller {

	function __construct() {
	   parent::__construct();
	}
	function run()
	{
		$this->model->run();
	}
	function index() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render('sip/index');    
	}
	function search()
	{
		$url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search sip';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word 
		$this->view->userListviewp =$url1[2];  // parametre 2 page                     limit 2,3
		$this->view->userListviewl =5      ;   // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('sip/index');
	}
	
	public function edit($id) 
	{
        $this->view->title = 'Edit sip';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('sip/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id']     = $id;
		$data['NOM']    = $_POST['NOM'];
		$data['PRENOM'] = $_POST['PRENOM'];
		$data['DATE']   = $_POST['DATE'];
	    $data['GRABO']   = $_POST['GRABO'];
	    $data['GRRH']    = $_POST['GRRH'];
		$this->model->editSave($data);
		header('location: ' . URL . 'sip');
	}
	
	public function delete($id)
	{
		$this->model->delete($id);
		header('location: ' . URL . 'sip');
	}
	
	public function newdnr() 
	{
		$this->view->title = 'create sip';
		$this->view->wilayaview = $this->model->wilayamodel();
		$this->view->render('sip/new');
	}
	
	public function create() 
	{
		$data = array();
		$data['NOM']     = $_POST['NOM'];
		$data['PRENOM']  = $_POST['PRENOM'];
		$this->model->create($data);
		header('location: ' . URL . 'sip');
	}
	
	public function view($id) 
	{
        $this->view->title = 'view sip';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('sip/view');
	}
	
	function Donate() 
	{	
	    $this->view->title = 'Search sip';
		$this->view->render('sip/Donate');
	}
	
	
	function wilaya()
	{
		$this->view->title = 'wilaya';
		$this->view->wilayaview = $this->model->wilayamodel();
		$this->view->render('sip/wilaya');
	}
	
	

}