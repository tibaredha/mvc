<?php
class mnpe extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	//***acceuil pat ***//
	function index() 
	{
	$this->view->title = 'Search pat';
	$this->view->render('mnpe/index');    
	}
		//***MNPE***//
	function MNPE() 
	{
	$this->view->title = 'MNPE';
	$this->view->userListview = $this->model->listmnpem() ;
	$this->view->render('mnpe/MNPE');    
	}
	public function createmnpe() 
	{
		$data = array();
		$data['DINS']      = $_POST['DINS'];
		$data['HINS']      = $_POST['HINS'];
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['FILSDE']    = $_POST['FILSDE'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['DATENS']    = $_POST['DATENS'];
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		$data['TEL']       = $_POST['TEL'];
		$data['POIDS']     = $_POST['POIDS'];
		$data['TAILLE']    = $_POST['TAILLE'];
		$data['HB']        = $_POST['HB'];
		$data['HT']        = $_POST['HT'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		$this->model->createmnpe($data);
		header('location: ' . URL . 'mnpe/MNPE/');		
	}
	//***editpat***//
	public function editmnpe($id) 
	{
        $this->view->title = 'Edit pat';
		$this->view->user = $this->model->userSingleListmnpe($id);
		$this->view->render('mnpe/editmnpe');
	}
	
	public function editSavemnpe($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['DINS']      = $_POST['DINS'];
		$data['HINS']      = $_POST['HINS'];
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['FILSDE']    = $_POST['FILSDE'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['DATENS']    = $_POST['DATENS'];
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		$data['TEL']       = $_POST['TEL'];
		$data['POIDS']     = $_POST['POIDS'];
		$data['TAILLE']    = $_POST['TAILLE'];
		$data['HB']        = $_POST['HB'];
		$data['HT']        = $_POST['HT'];
		 //echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavemnpe($data);
		//header('location: ' . URL . 'pat/MNPE/'.$id.'');
		header('location: ' . URL . 'mnpe/MNPE/');
	}
	
	
	
	public function deletemnpe($id)
	{
	$this->model->deletemnpe($id);     //la supression du donneur 
	header('location: ' . URL . 'mnpe/MNPE');
	}
	
	function PA() 
	{
	$this->view->title = 'POID AGE';
	$this->view->userListview = $this->model->listmnpe() ;
	$this->view->userListview1 = $this->model->listmnpe1() ;
	$this->view->render('mnpe/PA');    
	}
	public function createpa() 
	{
		$data = array();
		$data['AGE']      = $_POST['AGE'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['M3ET']      = $_POST['M3ET'];
		$data['M2ET']      = $_POST['M2ET'];
		$data['M1ET']      = $_POST['M1ET'];
		$data['MED']       = $_POST['MED'];
		$data['P1ET']      = $_POST['P1ET'];
		$data['P2ET']      = $_POST['P2ET'];
		$data['P3ET']      = $_POST['P3ET'];
		$this->model->createpa($data);
		header('location: ' . URL . 'mnpe/PA/');		
	}
	function TA() 
	{
	$this->view->title = 'TAILLE AGE';
	$this->view->userListview = $this->model->listmnpeta() ;
	$this->view->userListview1 = $this->model->listmnpeta1() ;
	$this->view->render('mnpe/TA');    
	}
	public function createta() 
	{
		$data = array();
		$data['AGE']      = $_POST['AGE'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['M3ET']      = $_POST['M3ET'];
		$data['M2ET']      = $_POST['M2ET'];
		$data['M1ET']      = $_POST['M1ET'];
		$data['MED']       = $_POST['MED'];
		$data['P1ET']      = $_POST['P1ET'];
		$data['P2ET']      = $_POST['P2ET'];
		$data['P3ET']      = $_POST['P3ET'];
		$this->model->createta($data);
		header('location: ' . URL . 'mnpe/TA/');		
	}
	
	function PT() 
	{
	$this->view->title = 'POIDS TAILLE';
	$this->view->userListview = $this->model->listmnpept() ;
	$this->view->userListview1 = $this->model->listmnpept1() ;
	$this->view->render('mnpe/PT');    
	}
	public function creatept() 
	{
		$data = array();
		$data['AGE']      = $_POST['AGE'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['M3ET']      = $_POST['M3ET'];
		$data['M2ET']      = $_POST['M2ET'];
		$data['M1ET']      = $_POST['M1ET'];
		$data['MED']       = $_POST['MED'];
		$data['P1ET']      = $_POST['P1ET'];
		$data['P2ET']      = $_POST['P2ET'];
		$data['P3ET']      = $_POST['P3ET'];
		$this->model->creatept($data);
		header('location: ' . URL . 'mnpe/PT/');		
	}
	function RPTMNPE() 
	{
	$this->view->title = 'MNPE';
	$this->view->render('mnpe/RPTMNPE');    
	}
	
	
	
	
	
}