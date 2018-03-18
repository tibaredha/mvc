<?php
class Dis extends Controller {

	function __construct() {
	   parent::__construct();
	}
	function run()
	{
		$this->model->run();
	}
	//***__dis__***//
	function index() 
	{
	$this->view->title = 'Search dis';
	$this->view->render('dis/index');    
	}
	//***impdis***//
	function impdis() 
	{
	$this->view->title = 'Search dis';
	$this->view->render('dis/impdis');    
	}
	//***searchdis***//
	function search()
	{ 
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search dis';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word 
		$this->view->userListviewp = $url1[2];   //parametre 2 page                     limit 2,3
		$this->view->userListviewl =13      ;     //parametre 3 nobre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('dis/index');
	}
	//***graphedon de DIS ***//
	function CGRPFCCPS() 
	{
	$this->view->title = 'CGRPFCCPS';
	$this->view->render('dis/CGRPFCCPS');    
	}
	function CGR() 
	{
	$this->view->title = 'CGR';
	$this->view->render('dis/CGR');    
	}
	function PFC() 
	{
	$this->view->title = 'PFC';
	$this->view->render('dis/PFC');    
	}
	function CPS() 
	{
	$this->view->title = 'CPS';
	$this->view->render('dis/CPS');    
	}
	
	function STOKCGR() 
	{
	$this->view->title = 'STOKCGR';
	$this->view->render('dis/STOKCGR');    
	}
	function STOKCGR1() 
	{
	$this->view->title = 'STOKCGR';
	$this->view->render('dis/STOKCGR1');    
	}
	
	
	function STOKPFC() 
	{
	$this->view->title = 'STOKPFC';
	$this->view->render('dis/STOKPFC');    
	}
	function STOKPFC1() 
	{
	$this->view->title = 'STOKPFC';
	$this->view->render('dis/STOKPFC1');    
	}
	
	function STOKCPS() 
	{
	$this->view->title = 'STOKCPS';
	$this->view->render('dis/STOKCPS');    
	}
	function STOKCPS1() 
	{
	$this->view->title = 'STOKCPS';
	$this->view->render('dis/STOKCPS1');    
	}
	function SERVICECGR() 
	{
	$this->view->title = 'SERVICECGR';
	$this->view->render('dis/SERVICECGR');    
	}
	function SERVICEPFC() 
	{
	$this->view->title = 'SERVICEPFC';
	$this->view->render('dis/SERVICEPFC');    
	}
	function SERVICECPS() 
	{
	$this->view->title = 'SERVICECPS';
	$this->view->render('dis/SERVICECPS');    
	}	
	//***editdis ***//
	public function editdis($id)
	{
	    $this->view->title = 'Edit dis';
		$this->view->user = $this->model->editdis($id);
		$this->view->render('dis/edit'); 
	}
	public function editSavedis($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['IDP']       = $_POST['IDP'];
		$data['IDREC']     = $_POST['IDREC'];
		$data['SEX']       = $_POST['SEX'];
		$data['DATEDIS']   = $_POST['DATEDIS'];
		$data['DGC']       = $_POST['DGC'];
		$data['GROUPAGE']  = $_POST['GROUPAGE'];
		$data['RHESUS']    = $_POST['RHESUS'];
		$data['CRH2']      = $_POST['CRH2'];
		$data['ERH3']      = $_POST['ERH3'];
		$data['CRH4']      = $_POST['CRH4'];
		$data['ERH5']      = $_POST['ERH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['AGE']       = $_POST['AGE'];
		$data['MED']       = $_POST['MED'];
		$this->model->editSavedis($data);
		header('location: ' . URL . 'rec/view/'.$data['IDREC'].'');
	}
	//**deletedis**/
	public function deletedis($id)
	{
	$this->model->deletedis($id);
	}	
	
}