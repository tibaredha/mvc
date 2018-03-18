<?php
class deces extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function miseajours() 
	{
	$this->view->title = 'miseajours';
	$this->model->miseajours() ;
	$this->view->render('deces/NDECES');    
	}
	function dump() 
	{
	    $this->view->title = 'dump';
		$this->view->render('deces/dump');
	}
	function CIM() 
	{
	$this->view->title = 'CIM';
	$this->view->userListview =$this->model->listcim() ;
	$this->view->render('deces/LCIM');    
	}
	public function editcim($id) 
	{
        $this->view->title = 'editcim';
		$this->view->user = $this->model->userSingleListcim($id);
		$this->view->render('deces/editcim');
	}
	public function editSavecim()
	{
		$data = array();//$id
		$data['id']     = $_POST['IDCHAP'];
		$data['CHAP']   = $_POST['CHAP'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavecim($data);
		header('location: ' . URL . 'deces/CIM/');
	}
	function catecim($id) 
	{
	$this->view->title = 'catecim';
	$this->view->userListview =$this->model->userSingleListcatecim($id) ;
	$this->view->render('deces/catecim');    
	}
	
	public function editcatecim($id) 
	{	
        $this->view->title = 'editcatecim';
		$this->view->user = $this->model->userSingleListcatecim1($id);
		$this->view->render('deces/editcatecim');
	}
	public function editSavecatecim()
	{
		$data = array();//$id
		$data['id']     = $_POST['row_id'];
		$data['diag_nom']   = $_POST['diag_nom'];
		$data['diag_cod']   = $_POST['diag_cod'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavecatecim1($data);
		header('location: ' . URL . 'deces/catecim/'.$_POST['row']);
	}
	
	
	
	
	
	
	//***acceuil pat ***//
	function index() 
	{
	$this->view->title = 'Search deces';
	$this->view->render('deces/index');    
	}
	function decesanne() 
	{
	$this->view->title = 'decesanne';
	$this->view->render('deces/decesanne');    
	}
	function eva() 
	{
	$this->view->title = 'evaluation';
	$this->view->render('deces/evaluation');    
	}
	
	
	
	
	//***searchdeces***/
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search deces';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =13     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('deces/index');
	}
	
	//***ADDDECES***//
	function NDECES() 
	{
	$this->view->title = 'NDECES';
	$this->view->render('deces/NDECES');    
	}
	public function createdeces() 
	{
		$data = array();
		$data['WILAYAD']      = $_POST['WILAYAD'];
		$data['COMMUNED']     = $_POST['COMMUNED'];
		$data['STRUCTURED']   = $_POST['STRUCTURED'];
		$data['DINS']         = $_POST['DINS'];
		$data['HINS']         = $_POST['HINS'];
		$data['NOM']          = $_POST['NOM'];
		$data['PRENOM']       = $_POST['PRENOM'];
		$data['FILSDE']       = $_POST['FILSDE'];
		$data['ETDE']         = $_POST['ETDE'];
		$data['SEXE']         = $_POST['SEXE'];
		$data['DATENS']       = $_POST['DATENS'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['WILAYAR']      = $_POST['WILAYAR'];
		$data['COMMUNER']     = $_POST['COMMUNER'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['CD']           = $_POST['CD'];
		$data['LD']           = $_POST['LD'];
		$data['AUTRES']       = $_POST['AUTRES'];
		if (isset($_POST['OMLI'])){$data['OMLI']='1';}else{$data['OMLI']='';}
		if (isset($_POST['MIEC'])){$data['MIEC']='1';}else{$data['MIEC']='';}
		if (isset($_POST['EPFP'])){$data['EPFP']='1';}else{$data['EPFP']='';}
		$data['CIM1']           = $_POST['CIM1'];
		$data['CIM2']           = $_POST['CIM2'];
		$data['CIM3']           = $_POST['CIM3'];
		$data['CIM4']           = $_POST['CIM4'];
		$data['CIM5']           = $_POST['CIM5'];
		$data['NDLM']           = $_POST['NDLM'];
        $data['NDLMAAP']        = $_POST['NDLMAAP'];
		if (isset($_POST['GM'])){$data['GM']='1'; }else{$data['GM']='';}
		if (isset($_POST['MN'])){$data['MN']='1';}else{$data['MN']='';}
		$data['AGEGEST']           = $_POST['AGEGEST'];
		$data['POIDNSC']           = $_POST['POIDNSC'];
		$data['AGEMERE']           = $_POST['AGEMERE'];
		if (isset($_POST['DPNAT'])){$data['DPNAT']='1'; }else{$data['DPNAT']='';}
		$data['EMDPNAT']           = $_POST['EMDPNAT'];
		if (isset($_POST['DECEMAT'])){$data['DECEMAT']='1'; }else{$data['DECEMAT']='';}
		$data['GRS']     = $_POST['GRS'];
		if (isset($_POST['POSTOPP'])){$data['POSTOPP']='1';}else{$data['POSTOPP']='';}
		$data['DATEHOSPI']        = $_POST['DATEHOSPI'];
		$data['HEURESHOSPI']      = $_POST['HEURESHOSPI'];
		$data['SERVICEHOSPIT']    = $_POST['SERVICEHOSPIT'];
		$data['MEDECINHOSPIT']    = $_POST['MEDECINHOSPIT'];
		$data['CODECIM0']          = $_POST['CODECIM0'];
		$data['CODECIM']          = $_POST['CODECIM'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createdeces($data);
		header('location: ' . URL . 'deces/OKNDECES/'.$last_id);		
	}
	function OKNDECES($id) 
	{
	$this->view->title = 'NDECES';
	$this->view->userListview = $this->model->userSingleListdeces($id);
	$this->view->render('deces/OKNDECES');    
	}
	
	function LDECES() 
	{
	$this->view->title = 'NDECES';
	$this->view->userListview = $this->model->listdeces() ;
	$this->view->render('deces/LDECES');    
	}

	//***editdeces***//
	public function editdeces($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/editdeces');
	}
	
	public function editSavedeces()
	{
		$data = array();//$id
		$data['id']        = $_POST['id'];
		$data['WILAYAD']   = $_POST['WILAYAD'];
		$data['COMMUNED']  = $_POST['COMMUNED'];
		$data['STRUCTURED'] = $_POST['STRUCTURED'];
		$data['DINS']      = $_POST['DINS'];
		$data['HINS']      = $_POST['HINS'];
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['FILSDE']    = $_POST['FILSDE'];
		$data['ETDE']      = $_POST['ETDE'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['DATENS']    = $_POST['DATENS'];
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		// $data['']       = $_POST[''];
		$data['CD']        = $_POST['CD'];
		$data['LD']        = $_POST['LD'];
		$data['AUTRES']    = $_POST['AUTRES'];
		if (isset($_POST['OMLI'])){$data['OMLI']='1';}else{$data['OMLI']='';}
		if (isset($_POST['MIEC'])){$data['MIEC']='1';}else{$data['MIEC']='';}
		if (isset($_POST['EPFP'])){$data['EPFP']='1';}else{$data['EPFP']='';}
		$data['CIM1']           = $_POST['CIM1'];
		$data['CIM2']           = $_POST['CIM2'];
		$data['CIM3']           = $_POST['CIM3'];
		$data['CIM4']           = $_POST['CIM4'];
		$data['CIM5']           = $_POST['CIM5'];
		$data['NDLM']           = $_POST['NDLM'];
        $data['NDLMAAP']        = $_POST['NDLMAAP'];
		if (isset($_POST['GM'])){$data['GM']='1'; }else{$data['GM']='';}
		if (isset($_POST['MN'])){$data['MN']='1';}else{$data['MN']='';}
		$data['AGEGEST']           = $_POST['AGEGEST'];
		$data['POIDNSC']           = $_POST['POIDNSC'];
		$data['AGEMERE']           = $_POST['AGEMERE'];
		if (isset($_POST['DPNAT'])){$data['DPNAT']='1'; }else{$data['DPNAT']='';}
		$data['EMDPNAT']           = $_POST['EMDPNAT'];
		if (isset($_POST['DECEMAT'])){$data['DECEMAT']='1'; }else{$data['DECEMAT']='';}
		$data['GRS']     = $_POST['GRS'];
		if (isset($_POST['POSTOPP'])){$data['POSTOPP']='1';}else{$data['POSTOPP']='';}
		$data['DATEHOSPI']        = $_POST['DATEHOSPI'];
		$data['HEURESHOSPI']      = $_POST['HEURESHOSPI'];
		$data['SERVICEHOSPIT']    = $_POST['SERVICEHOSPIT'];
		$data['MEDECINHOSPIT']    = $_POST['MEDECINHOSPIT'];
		$data['CODECIM0']         = $_POST['CODECIM0'];
		$data['CODECIM']          = $_POST['CODECIM'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavedeces($data);
		//header('location: ' . URL . 'pat/MNPE/'.$id.'');
		header('location: ' . URL . 'deces/LDECES/');
	}
	//***deletedeces***//
	public function deletedeces($id)
	{
	$this->model->deletedeces($id);    
	header('location: ' . URL . 'deces/LDECES');
	}
	function HTML() 
	{
	$this->view->title = 'EVALUATION';
	
	$this->view->render('deces/HTML');    
	}
	
	
	
	
	//***EVALUATIONDECES***//
	function EVALUATION() 
	{
	$this->view->title = 'EVALUATION';
	//$this->view->userListview = $this->model->listmnpem() ;
	$this->view->render('deces/RPTDECES');    
	}
	function EVALUATION1() 
	{
	$this->view->title = 'EVALUATION';
	//$this->view->userListview = $this->model->listmnpem() ;
	$this->view->render('deces/RPTDECES1');    
	}
	//***SIG DECES ***//
	function ALGERIE() 
	{	
	    $this->view->title = 'ALGERIE';
		$this->view->render('deces/evadjelfacom');
	}
	function ALGERIE1() 
	{	
	    $this->view->title = 'ALGERIE';
		$id='17000';
	    $this->view->userListview = $this->model->dnrcommune($id) ;
		//$this->view->render('dnr/ALGERIE');
		$this->view->render('deces/djelfacom');
	}
	
	//***imprimer deces ***//
	function imp() 
	{
	$this->view->title = 'Search deces';
	$this->view->render('deces/imp');    
	}
	
	
	//***editdeces***//
	public function STEP1($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/STEP1');
	}
	
	public function STEP2($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/STEP2');
	}
	
	public function STEP3($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/STEP3');
	}
	
	public function STEP4($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/STEP4');
	}
	
	public function STEP5($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/STEP5');
	}
	
	public function STEP6($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSingleListdeces($id);
		$this->view->render('deces/STEP6');
	}
	
	
	
	
	
}