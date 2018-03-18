<?php
class mors extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	
	private $route  = 'mors';
	
	function run()
	{
		$this->model->run();
	}
	function index() 
	{
	$this->view->title = 'mors';
	$this->view->render($this->route.'/index');    
	}
	
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search hemodialyse';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page    limit 2,3
		$this->view->userListviewl =10; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =20; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	
	function nmors() 
	{
	$this->view->title = 'nmors';
	$this->view->render($this->route.'/nmors');    
	}
	function createmors() 
	{
	$data = array();
	$data['DATEMORS']     = $_POST['DATEMORS'];
	$data['STRUCTURE']    = $_POST['STRUCTURE'];
	$data['ANIMAL']       = $_POST['ANIMAL'];
	$data['MORSGRIF']       = $_POST['MORSGRIF'];
	$data['GRADE']       = $_POST['GRADE'];
	$data['SIEGE']       = $_POST['SIEGE'];
	$data['nom']          = $_POST['nom'];
	$data['prenom']       = $_POST['prenom'];
	$data['SEXE']         = $_POST['SEXE'];
	$data['AGE']          = $_POST['AGE'];
	$data['WILAYAN']      = $_POST['WILAYAN'];
	$data['COMMUNEN']     = $_POST['COMMUNEN'];
	$data['ADRESS']       = $_POST['ADRESS'];
	$data['POIDS']        = $_POST['POIDS'];
	$data['Rage']        = $_POST['Rage'];
	$data['deces']        = $_POST['deces'];
	$data['Vaccin']        = $_POST['Vaccin'];
	$data['Serum']        = $_POST['Serum'];
	
	$this->model->create($data);
	// echo '<pre>';print_r ($data);echo '<pre>';
	header('location: ' . URL .$this->route.'/nmors');
	}
	function imp() 
	{
	$this->view->title = 'imp mors';
	$this->view->render($this->route.'/imp');    
	}
	
	public function Evaluation() 
	{
        $this->view->title = 'Evaluation mors';
		$this->view->render($this->route.'/Evaluation');
	}
	public function Evaluation1() 
	{
        $this->view->title = 'Evaluation mors';
		$this->view->render($this->route.'/Evaluation1');
	}
	
	public function delete($id)
	{
	$this->model->deleteBordereau($id);     
	header('location: ' . URL .$this->route.'/search/0/10?o=id&q=');
	}
	
	//***editdnr***//
	public function edit($id) 
	{
        $this->view->title = 'Edit mors';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/edit');
	}
	
	public function editSave()
	{	
	$data = array();
	$data['DATEMDO']      = $_POST['DATEMDO'];
	$data['STRUCTURE']    = $_POST['STRUCTURE'];
	$data['MDO']          = $_POST['MDO'];
	$data['nom']          = $_POST['nom'];
	$data['prenom']       = $_POST['prenom'];
	$data['SEXE']         = $_POST['SEXE'];
	$data['AGE']          = $_POST['AGE'];
	$data['WILAYAN']      = $_POST['WILAYAN'];
	$data['COMMUNEN']     = $_POST['COMMUNEN'];
	$data['ADRESS']       = $_POST['ADRESS'];
	$data['OBSERVATION']  = $_POST['OBSERVATION'];
	$data['id']  = $_POST['id'];
	// echo '<pre>';print_r ($data);echo '<pre>';
	$this->model->editSave($data);
		header('location: ' . URL .$this->route.'/search/0/10?o=id&q=');
	}
	
	
	
	
	
}