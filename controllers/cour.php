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
		$this->view->title = 'Search rds';
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
	
	function ncour1() 
	{
	$this->view->title = 'ncour';
	$this->view->render($this->route.'/ncour1');    
	}
	
	
	
	// 
	
	public function createrds() 
	{
		$data = array();
		$data['DATE']         = $_POST['DATE'];
		$data['STRUCTURE']    = $_POST['STRUCTURE'];
		$data['NATURE']       = $_POST['NATURE'];
		$data['PRODUIT']      = $_POST['PRODUIT'];
		$data['CMM']          = $_POST['CMM'];
		$data['RES']          = $_POST['RES'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createrds($data);
		header('location: ' . URL .$this->route. '/nrds/'.$last_id);	
	} 
	
	public function deleterds($id)
	{
	$this->model->deleterds($id); 
	header('location: ' . URL .$this->route. '/search/0/10?o=id&q=');
	}
	
	
	function nrtr() 
	{
	$this->view->title = 'nrtr';
	$this->view->userListview = $this->model->Listrtr() ;
	$this->view->render($this->route.'/nrtr');    
	}
	
	public function creatertr() 
	{
		$data = array();
		$data['DATE']         = $_POST['DATE'];
		$data['NLOT']         = $_POST['NLOT'];
		$data['DDP']          = $_POST['DDP'];
		$data['PRODUIT']      = $_POST['PRODUIT'];
		$data['MOTIF']        = $_POST['MOTIF'];
		$data['REF']          = $_POST['REF'];
		echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->creatertr($data);
		header('location: ' . URL .$this->route. '/nrtr/'.$last_id);	
	} 
	public function deletertr($id)
	{
	$this->model->deletertr($id);  
	header('location: ' . URL .$this->route.'/nrtr');
	}
	
	
	function evaluation() 
	{
	$this->view->title = 'evaluation';
	$this->view->render($this->route.'/evaluation');    
	}
	
	function gestion() 
	{
	$this->view->title = 'Search pha';
	$this->view->userListview = $this->model->Listproduit() ;
	$this->view->render($this->route.'/gestion');     
	}
	
	public function newpro() 
	{
		$this->view->title = 'newpro';
		//$this->view->label(25,400,'DATE HEUREhhhhhhhhhhhhhhhhhS');  
		$this->view->render($this->route.'/new'); 
	}
	
	// 
	
	public function createnewpro() 
	{
		$data = array();
		$data['mecicament']= $_POST['mecicament'];
		$data['pre']       = $_POST['pre'];
		$data['cmm']       = $_POST['cmm'];
		$data['smin']      = $_POST['smin'];
		$data['qts']       = $_POST['qts'];
		$data['smax']      = $_POST['smax'];
		$data['qte']       = $_POST['qte'];
		$data['price']     = $_POST['price'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$last_id=$this->model->create($data);
		header('location: ' . URL .$this->route.'/newpro');
	}
	
	public function delete($id)
	{
	$this->model->deleteproducts($id);  
	header('location: ' . URL .$this->route.'/gestion');
	}
	
	
	public function edit($id) 
	{
        $this->view->title = 'Edit produit';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/edit'); 
	}
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['mecicament']= $_POST['mecicament'];
		$data['pre']       = $_POST['pre'];
		$data['cmm']       = $_POST['cmm'];
		$data['smin']      = $_POST['smin'];
		$data['qts']       = $_POST['qts'];
		$data['smax']      = $_POST['smax'];
		$data['qte']       = $_POST['qte'];
		$data['price']     = $_POST['price'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL .$this->route.'/gestion');
	}
	
	
	//***ordonnace rec ***//
	function ordonnacerec($id) 
	{	
	    $this->view->title = 'ordonnacerec';
		// $this->view->user =$this->model->userSingleList($id);
		$this->view->render($this->route.'/ordonnacerec');
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
				 header('location:'.URL.$this->route.'/ordonnacerec/'.$_POST['id']);
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
	header('location:'.URL.$this->route.'/ordonnacerec/'.$_POST['id']);	  
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
				header('location: ' . URL .$this->route.'/pan');  
			}
			else
			$this->supprimerArticle($libelleProduit);
		}	
	}
	function supprimerArticle($libelleProduit)
	{
	$url1 = explode('/',$_GET['url']);	
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
			header('location: ' . URL .$this->route.'/ordonnacerec/'.$url1[3]); 
		}
	}	
	function supprimePanier(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['ordonnace']);
     header('location: ' . URL .$this->route.'/ordonnacerec/'.$url1[2]); 
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