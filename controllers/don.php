<?php
class Don extends Controller {

	function __construct() {
	   parent::__construct();
	}
	function index() 
	{
	$this->view->title = 'Search don';
	$this->view->render('don/index');    
	}
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search don';
	    $this->view->userListviewo =trim($_GET['o']); //criter de choix
	    $this->view->userListviewq =trim($_GET['q']); //key word  
		$this->view->userListviewp =$url1[2];  // parametre 2 page                     limit 2,3
		$this->view->userListviewl =13      ;   // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('don/index');
	}
	//***editdon ***//
	public function editdon($id)
	{
	    $this->view->title = 'Edit don';
		$this->view->user = $this->model->editdon($id);
		$this->view->render('don/editdon'); 
	}
	public function editSavedon($id)
	{
		$data = array();
		$data['id']      = $id;
		$data['IDP']     = $_POST['IDP'];
		$data['IDDNR']   = $_POST['IDDNR'];
		$data['TYPEDONNEUR'] = $_POST['TYPEDONNEUR'];
		$data['TYPEDON']   = $_POST['TYPEDON'];
		$data['POIDS']     = $_POST['POIDS'];
		$data['Taille']    = $_POST['Taille'];
		$data['TAS']       = $_POST['TAS'];
		$data['TAD']       = $_POST['TAD'];
		$data['LIEUX']     = $_POST['LIEUX'];
		$data['DATEDON']   = $_POST['DATEDON'];
		$data['GROUPAGE']  = $_POST['GROUPAGE'];
		$data['RHESUS']    = $_POST['RHESUS'];
		$data['GRRH2']     = $_POST['GRRH2'];
		$data['GRRH3']     = $_POST['GRRH3'];
		$data['GRRH4']     = $_POST['GRRH4'];
		$data['GRRH5']     = $_POST['GRRH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['AGEDNR']    = $_POST['AGEDNR'];
		$data['IND']       = $_POST['IND'];
		$this->model->editSavedon($data);
		header('location: ' . URL . 'Dnr/view/'.$data['IDDNR'].'');
	}
	//***deletedon ***// 2type de delete don la liste des don total et la liste des  dons individuelle 
	public function deletedon($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletedon($id);
	header('location: ' . URL . 'Don/search/0/10?q=&o=IDP');//   header('location: ' . URL . 'Dnr/view/'.$url[3]);
	}
	//***imprimer les don ***//
	function impdon() 
	{
	$this->view->title = 'Search don';
	$this->view->render('dnr/impdon');    
	}
	//***serologie+ des don ***//
	function HVB() 
	{
	$this->view->title = 'Search HVB';
	$this->view->userListview = $this->model->userListdon('HVB') ;
	$this->view->render('DNR/HVB');    
	}
	function HVC() 
	{
	$this->view->title = 'Search HVC';
	$this->view->userListview = $this->model->userListdon('HVC') ;
	$this->view->render('DNR/HVC');    
	}
	function HIV() 
	{
	$this->view->title = 'Search HIV';
	$this->view->userListview = $this->model->userListdon('HIV') ;
	$this->view->render('DNR/HIV');    
	}
	function SYS() 
	{
	$this->view->title = 'Search SYS';
	$this->view->userListview = $this->model->userListdon('TPHA') ;
	$this->view->render('DNR/SYS');    
	}
	//***graphedon de don ***//
	function AGE() 
	{
	$this->view->title = 'AGE';
	$this->view->render('don/AGE');    
	}
	function IND() 
	{
	$this->view->title = 'IND';
	$this->view->render('don/IND');    
	}
	function CIDT() 
	{
	$this->view->title = 'CIDT';
	$this->view->render('don/CIDT');    
	}
	function CIDD() 
	{
	$this->view->title = 'CIDD';
	$this->view->render('don/CIDD');    
	}
	function F() 
	{
	$this->view->title = 'graphedonfixe';
	$this->view->render('don/DF');    
	}
	function M() 
	{
	$this->view->title = 'graphedonmobile';
	$this->view->render('don/DM');    
	}
	function DFM() 
	{
	$this->view->title = 'DFM';
	$this->view->render('don/DFM');    
	}
	function OCC() 
	{
	$this->view->title = 'OCC';
	$this->view->render('don/OCC');    
	}
	function REG() 
	{
	$this->view->title = 'REG';
	$this->view->render('don/REG');    
	}
	function DOR() 
	{
	$this->view->title = 'DOR';
	$this->view->render('don/DOR');    
	}
	function A() 
	{
	$this->view->title = 'A';
	$this->view->render('don/A');    
	}
	function B() 
	{
	$this->view->title = 'B';
	$this->view->render('don/B');    
	}
	function AB() 
	{
	$this->view->title = 'AB';
	$this->view->render('don/AB');    
	}
	function O() 
	{
	$this->view->title = 'O';
	$this->view->render('don/O');    
	}
	function ABO() 
	{
	$this->view->title = 'ABO';
	$this->view->render('don/ABO');    
	}
	function RHP() 
	{
	$this->view->title = 'RHP';
	$this->view->render('don/RHP');    
	}
	function RHN() 
	{
	$this->view->title = 'RHN';
	$this->view->render('don/RHN');    
	}
	function RHNP() 
	{
	$this->view->title = 'RHNP';
	$this->view->render('don/RHNP');    
	}
	function SM() 
	{
	$this->view->title = 'M';
	$this->view->render('don/M');    
	}
	function SF() 
	{
	$this->view->title = 'F';
	$this->view->render('don/F');    
	}
	function SMF() 
	{
	$this->view->title = 'SMF';
	$this->view->render('don/SMF');    
	}
	function ST() 
	{
	$this->view->title = 'ST';
	$this->view->render('don/ST');    
	}
	function AP() 
	{
	$this->view->title = 'AP';
	$this->view->render('don/AP');    
	}
	function STA() 
	{
	$this->view->title = 'STA';
	$this->view->render('don/STA');    
	}
	function HIVP() 
	{
	$this->view->title = 'HIVP';
	$this->view->render('don/HIVP');    
	}
	function HVBP() 
	{
	$this->view->title = 'HVBP';
	$this->view->render('don/HVBP');    
	}
	function HVCP() 
	{
	$this->view->title = 'HVCP';
	$this->view->render('don/HVCP');    
	}
	function TPHAP() 
	{
	$this->view->title = 'TPHAP';
	$this->view->render('don/TPHAP');    
	}
	//***compagne de don ***//
	function COMP() 
	{
	$this->view->title = 'Search COMP';
	$this->view->userListview = $this->model->compList() ;
	$this->view->render('don/COMP');    
	}
	function COMP1() 
	{  
	    $data = array();
		$data['DATEDON']   = $_POST['DATEDON'];
		$data['STR']       = $_POST['STR'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->createcomp($data);
		header('location: ' . URL . 'don/COMP');   
	}
	public function deletecomp($id)
	{
		$this->model->deletecomp($id);
		header('location: ' . URL . 'don/COMP');
	}
	public function editcomp($id)
	{
	    $this->view->title = 'Edit comp';
		$this->view->user = $this->model->editcomp($id);
		$this->view->render('don/editcom');	
	}
	
	public function editSavecomp($id)
	{
		$data = array();
		$data['id']      = $id;
		$data['DATEDON'] = $_POST['DATEDON'];
		$data['STR']     = $_POST['STR'];
		$data['WILAYAR'] = $_POST['WILAYAR'];
		$data['COMMUNER']= $_POST['COMMUNER'];
		$data['ADRESSE']= $_POST['ADRESSE'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		
		
		$this->model->editSavecomp($data);
		header('location: ' . URL . 'don/COMP');
	}
	
	
	
	
}