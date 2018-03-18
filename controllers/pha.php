<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Pha extends Controller {
	function __construct() {
	parent::__construct();
	}
	function run(){
	$this->model->run();
	}
	//***acceuil dnr ***//
	function index() 
	{
	$this->view->title = 'Search med';
	$this->view->render('pha/index');    
	}
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search med';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =5     ; // parametre 3 nobre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('pha/index');
	}
	
	
	
	
	//***acceuil ***//
	function pha() 
	{
	$this->view->title = 'Search pha';
	$this->view->render('pha/pha');    
	}
	function ord() 
	{
	$this->view->title = 'Search ord';
	$this->view->render('pha/ord');    
	}
	function cat($categorie) 
	{
	$this->view->title = 'Search cat';
	$this->view->userListview = $this->model->Listproduit($categorie) ;
	$this->view->render('pha/categorie');    
	}
	function gestion() 
	{
	$this->view->title = 'Search pha';
	$this->view->userListview = $this->model->Listproduit() ;
	$this->view->render('pha/gestion');    
	}
	//newpro
	public function newpro() 
	{
		$this->view->title = 'create dnr';
		//$this->view->label(25,400,'DATE HEUREhhhhhhhhhhhhhhhhhS');  
		$this->view->render('pan/new');	
	}
	public function create() 
	{
		$data = array();
		$data['DATE']      = $_POST['DATE'];
		$data['categorie'] = $_POST['categorie'];
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['cmm']       = $_POST['cmm'];
		$data['smin']      = $_POST['smin'];
		$data['qts']       = $_POST['qts'];
		$data['smax']      = $_POST['smax'];
		$data['date']      = $_POST['date'];
		$data['PRIX']      = $_POST['PRIX'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$last_id=$this->model->create($data);
		header('location: ' . URL . 'pan/gestion/A');
	}
	public function delete($id)
	{
	$this->model->deleteproducts($id);  
	header('location: ' . URL . 'pan/gestion/A');
	}
	public function edit($id) 
	{
        $this->view->title = 'Edit produit';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('pha/edit');
	}
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['categorie'] = $_POST['categorie'];
	    $data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['cmm']       = $_POST['cmm'];
		$data['smin']      = $_POST['smin'];
		$data['qts']       = $_POST['qts'];
		$data['smax']      = $_POST['smax'];
		$data['qte']      = $_POST['qte'];
		// $data['date']      = $_POST['date'];
		$data['PRIX']      = $_POST['PRIX'];
		echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL . 'pha/gestion/');
	}
	//***************************************************************************************************************************//
	function creationPanier(){
	   if (!isset($_SESSION['ordonnace'])){
		  $_SESSION['ordonnace']=array();
		  $_SESSION['ordonnace']['libelleProduit']    = array();
		  $_SESSION['ordonnace']['doseparprise']      = array();
		  $_SESSION['ordonnace']['nbrdrfoisparjours'] = array();
		  $_SESSION['ordonnace']['nbrdejours']        = array();
		  $_SESSION['ordonnace']['totaltrt']          = array();
		  $_SESSION['ordonnace']['qteProduit']        = array();
		  $_SESSION['ordonnace']['prixProduit']       = array();
		  $_SESSION['ordonnace']['verrou']            = false;
	   }
	   return true;
	}
	function isVerrouille(){
	   if (isset($_SESSION['ordonnace']) && $_SESSION['ordonnace']['verrou'])
	   return true;
	   else
	   return false;
	}
	function ajouterArticle()
	{   
	    $libelleProduit=$_POST['libelleProduit'];
		$doseparprise=$_POST['doseparprise'];
		$nbrdrfoisparjours=$_POST['nbrdrfoisparjours'];
		$nbrdejours=$_POST['nbrdejours'];
		$qteProduit=$_POST['qteProduit'];
		$prixProduit=$_POST['prixProduit'];
		$totaltrt=$doseparprise*$nbrdrfoisparjours*$nbrdejours; 	
		session_start();
		   if ($this->creationPanier() && !$this->isVerrouille())
		   {
		   $positionProduit = array_search($libelleProduit,$_SESSION['ordonnace']['libelleProduit']);
			  if ($positionProduit !== false)
			  {
				 header('location:'.URL.'pha/pha');
			  }
			  else
			  {
				 array_push( $_SESSION['ordonnace']['libelleProduit'],$libelleProduit);
				 array_push( $_SESSION['ordonnace']['doseparprise'],$doseparprise);
				 array_push( $_SESSION['ordonnace']['nbrdrfoisparjours'],$nbrdrfoisparjours);
				 array_push( $_SESSION['ordonnace']['nbrdejours'],$nbrdejours);
				 array_push( $_SESSION['ordonnace']['qteProduit'],$qteProduit);
				 array_push( $_SESSION['ordonnace']['prixProduit'],$prixProduit);
				 array_push( $_SESSION['ordonnace']['totaltrt'],$totaltrt);
			  }			      
		   }
	header('location:'.URL.'pha/pha');	  
	}
	function modifierQTeArticle($libelleProduit,$qteProduit)
	{
		session_start();
		if ($this->creationPanier() && !$this->isVerrouille())
		{
			if ($qteProduit > 0)
			{
				$positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
				if ($positionProduit !== false)
				{
				$_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
				}
				header('location: ' . URL .'pan/pan');  
			}
			else
			$this->supprimerArticle($libelleProduit);
		}	
	}
	function supprimerArticle($libelleProduit)
	{
		session_start();
		if ($this->creationPanier() && !$this->isVerrouille())
		{
			$tmp=array();
			$tmp['libelleProduit']    = array();
			$tmp['doseparprise']      = array();
			$tmp['nbrdrfoisparjours'] = array();
			$tmp['nbrdejours']        = array();
			$tmp['totaltrt']          = array();
			$tmp['qteProduit']        = array();
			$tmp['prixProduit']       = array();
			$tmp['verrou'] = $_SESSION['ordonnace']['verrou'];
			for($i = 0; $i < count($_SESSION['ordonnace']['libelleProduit']); $i++)
			{
				if ($_SESSION['ordonnace']['libelleProduit'][$i] !== $libelleProduit)
				{
				array_push( $tmp['libelleProduit'],$_SESSION['ordonnace']['libelleProduit'][$i]);
				array_push( $tmp['doseparprise'],$_SESSION['ordonnace']['doseparprise'][$i]);
				array_push( $tmp['nbrdrfoisparjours'],$_SESSION['ordonnace']['nbrdrfoisparjours'][$i]);
				array_push( $tmp['nbrdejours'],$_SESSION['ordonnace']['nbrdejours'][$i]);
				array_push( $tmp['totaltrt'],$_SESSION['ordonnace']['totaltrt'][$i]);
				array_push( $tmp['qteProduit'],$_SESSION['ordonnace']['qteProduit'][$i]);
				array_push( $tmp['prixProduit'],$_SESSION['ordonnace']['prixProduit'][$i]);
				}
			}
			$_SESSION['ordonnace'] =  $tmp;
			unset($tmp);
			header('location: ' . URL .'pha/ord');  
		}
	}	
	function supprimePanier(){
		session_start();
		unset($_SESSION['ordonnace']);
		header('location: ' . URL .'pha/pha'); 
	}
	function compterArticles()
	{
		if (isset($_SESSION['ordonnace']))
		return count($_SESSION['ordonnace']['libelleProduit']);
		else
		return 0;
	}
	function MontantGlobal(){
		$total=0;
		for($i = 0; $i < count($_SESSION['ordonnace']['libelleProduit']); $i++)
		{
			$total += $_SESSION['ordonnace']['qteProduit'][$i] * $_SESSION['ordonnace']['prixProduit'][$i];
		}
		return $total;
	}
	function miseajour(){
		session_start();
		for ($i = 0 ; $i < count($_POST['q']) ; $i++)
		{
			$this->modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],$_POST['q'][$i]);
		}    
	}	
}