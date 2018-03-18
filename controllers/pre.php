<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Pre extends Controller {

	function __construct() {
	   parent::__construct();
	}
	function run()
	{
		$this->model->run();
	}
	function index() 
	{
	$this->view->title = 'Search pre';
	$this->view->userListview = $this->model->userList() ;
	$this->view->render('pre/index');    
	}
	function search() 
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'listpre';
	    $this->view->userListviewo =trim($_GET['o']); //criter de choix
	    $this->view->userListviewq =trim($_GET['q']); //key word  
		$this->view->userListviewp =$url1[2];  // parametre 2 page                     limit 2,3
		$this->view->userListviewl =10      ;   // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('pre/listpre');   
	}
	function imp() 
	{
	$this->view->title = 'Search pre';
	$this->view->render('pre/imp');    
	}
	public function edit($id) 
	{
        $this->view->title = 'Edit pre';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('pre/edit');
	}
	public function editpre($id) 
	{
        $this->view->title = 'Edit pre';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('pre/editpre');
	}
	public function editSave($id)//prevoire 2 edite save pour chaque edite ????
	{
	$data = array();
	$data['VI']       = isset($_POST['VI']); 
	$data['FDS']      = isset($_POST['FDS']);
	$data['AC']       = isset($_POST['AC']);
	$data['PCC']      = isset($_POST['PCC']);
	$data['PL']       = isset($_POST['PL']);
	$data['AUTRES']   = isset($_POST['AUTRES']);
	$data['GROUPAGE'] = $_POST['GRABO'];
	$data['RHESUS']   = $_POST['GRRH1'];
	$data['HVB']      = $_POST['HVB'];
	$data['HVC']      = $_POST['HVC'];
	$data['HIV']      = $_POST['HIV'];
	$data['TPHA']     = $_POST['TPHA'];
	$data['id']       = $id;
	$data['DATEPRE']  = $_POST['DATEPRE'];
	$data['CGR']      = isset($_POST['CGR']);
	$data['PFC']      = isset($_POST['PFC']);
	$data['CPS']      = isset($_POST['CPS']);
	$data['IDDNR']    = $_POST['IDDNR'];
	$data['CRH2']     = $_POST['CRH2'];
	$data['ERH3']     = $_POST['ERH3'];
	$data['CRH4']     = $_POST['CRH4'];
	$data['ERH5']     = $_POST['ERH5'];
	$data['KELL1']    = $_POST['KELL1'];
	$data['KELL2']    = $_POST['KELL2'];
	$data['DATEDON']  = $_POST['DATEDON'];
	$data['IDP']      = $_POST['IDP'];
	$data['REGION']   = $_POST['REGION'];
	$data['WILAYA']   = $_POST['WILAYA'];
	$data['STRUCTURE']= $_POST['STRUCTURE'];
	$data['login']    = $_POST['login'];
	
	if ($data['VI']=='' AND $data['FDS']=='' AND $data['AC']=='' AND $data['AUTRES']=='') 
	{
	        // echo 'DONS CONFORMES';
	        // echo '<pre>';print_r ($data);echo '<pre>';	    
			
			if ($_POST['GRABO']=='' or  $_POST['GRRH1']=='' ) 
			{
			    // echo 'GROUPAGE -';
			    header('location: ' . URL . 'pre/');
			}
			else
			{
			    // echo 'GROUPAGE +';
				// echo '<br>';echo $_POST['GRABO'] ;
	            // echo '<br>';echo $_POST['GRRH1'] ;
				
				if ($_POST['HVB']=='negatif' AND  $_POST['HVC']=='negatif' AND  $_POST['HIV']=='negatif' AND  $_POST['TPHA']=='negatif') 
				{
					// echo '<br>';echo 'serologie -';
					// echo '<br>';echo $_POST['HVB'] ;
					// echo '<br>';echo $_POST['HVC'] ;
					// echo '<br>';echo $_POST['HIV'] ;
					// echo '<br>';echo $_POST['TPHA'] ;
					$this->model->editSave($data);
			        header('location: ' . URL . 'pre/');
				}
				else 
				{
				    // echo '<br>';echo 'serologie +/d';
					// echo '<br>';echo $_POST['HVB'] ;
					// echo '<br>';echo $_POST['HVC'] ;
					// echo '<br>';echo $_POST['HIV'] ;
					// echo '<br>';echo $_POST['TPHA'] ;
				}
			    
			    
			}
	}
	else 
	{
	// echo 'DONS NON CONFORMES';
	// echo '<pre>';print_r ($data);echo '<pre>';
	$this->model->editSave1($data); //IL FAUT ELEMINE CETTE POCHE 
	header('location: ' . URL . 'pre/');
	}	
	}
	

}