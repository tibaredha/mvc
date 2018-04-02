<?php
class cour extends Controller {

    private $route  = 'cour';
   
	function __construct() {
	   parent::__construct();
	}

    function index() 
	{
	$this->view->title = 'cour';
	$this->view->render($this->route.'/index');    
	}

     //***searchdeces***/
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search cour';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =10     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	
	function ncour() 
	{
	$this->view->title = 'ncour';
	$this->view->render($this->route.'/ncour');    
	}
	public function createcour() 
	{
		$data = array();
		$data['DATEAR']       = $_POST['DATEAR'];
		$data['NAR']          = $_POST['NAR'];
		$data['DATECR']       = $_POST['DATECR'];
		$data['NCR']          = $_POST['NCR'];
		$data['EXP']          = $_POST['EXP'];
		$data['OBJ']          = $_POST['OBJ'];
		$data['NA']           = $_POST['NA'];
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createcour($data);
		header('location: ' . URL .$this->route. '/ncour/'.$last_id);	
	} 
	
	public function editcour($id) 
	{
        $this->view->title = 'Edit cour';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/editcour'); 
	}
	public function editcourSave($id)
	{
		$data = array();
		$data['DATEAR']       = $_POST['DATEAR'];
		$data['NAR']          = $_POST['NAR'];
		$data['DATECR']       = $_POST['DATECR'];
		$data['NCR']          = $_POST['NCR'];
		$data['EXP']          = $_POST['EXP'];
		$data['OBJ']          = $_POST['OBJ'];
		$data['NA']           = $_POST['NA'];
		$data['id']           = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL .$this->route.'/editcour/'.$id);
	}
	
	function ncour1() 
	{
	$this->view->title = 'ncour';
	$this->view->render($this->route.'/ncour1');    
	}
	
	public function createcour1() 
	{
		$data = array();
		$data['DATEDP']       = $_POST['DATEDP'];
		$data['NDP']          = $_POST['NDP'];
		$data['NP']           = $_POST['NP'];
		$data['DEST']         = $_POST['DEST'];
		$data['OBJ']          = $_POST['OBJ'];
		$data['NA']           = $_POST['NA'];
		$data['OBS']          = $_POST['OBS'];
		$data['REF']          = $_POST['REF'];
		$data['EXP']          = $_POST['EXP'];
		
		echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createcour1($data);
		header('location: ' . URL .$this->route. '/ncour1/'.$last_id);	
	} 
	
	
	function diffcour($id) 
	{
	$this->view->title = 'diffcour';
	$this->view->id =$id; 
	$this->view->render($this->route.'/diffcour');    
	}
	
	public function diffcour1() 
	{
	    $url1 = explode('/',$_GET['url']);	
		$data = array();
		$data['DATE'] = $_POST['DATE'];
		if (isset($_POST['DSP'])){$data['DSP']='1';}else{$data['DSP']='0';}		
		if (isset($_POST['INSP'])){$data['INSP']='1';}else{$data['INSP']='0';}		
		if (isset($_POST['SAS'])){$data['SAS']='1';}else{$data['SAS']='0';}		
		if (isset($_POST['PRV'])){$data['PRV']='1';}else{$data['PRV']='0';}		
		if (isset($_POST['DRH'])){$data['DRH']='1';}else{$data['DRH']='0';}		
		if (isset($_POST['PLF'])){$data['PLF']='1';}else{$data['PLF']='0';}		
		$data['id'] = $_POST['id'];
		echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->diffcour1($data);
	    header('location: ' . URL .$this->route.'/search/0/10?o=id&q=');	
	} 
	
	
	
	function odm() 
	{
	$this->view->title = 'odm';
	$this->view->render($this->route.'/odm');    
	}
	
	function evaluation() 
	{
	$this->view->title = 'evaluation';
	$this->view->render($this->route.'/evaluation');    
	}
	
	
		
}