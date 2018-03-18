<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Pan extends Controller {

	function __construct() {
	parent::__construct();
	}
	function run(){
	$this->model->run();
	}
	//***acceuil ***//
	// function index() 
	// {
	// $categorie='B';
	// $this->view->title = 'Search pan';
	// $this->view->userListview = $this->model->Listproduit($categorie) ;
	// $this->view->render('pan/index');    
	// }
	
	function cat($categorie) 
	{
	$this->view->title = 'Search pan';
	$this->view->userListview = $this->model->Listproduit($categorie) ;
	$this->view->render('pan/categorie');    
	}
	function pan() 
	{
	$this->view->title = 'Search pan';
	$this->view->render('pan/pan');    
	}
	function gestion($categorie) 
	{
	$this->view->title = 'Search pan';
	$this->view->userListview = $this->model->Listproduit($categorie) ;
	$this->view->render('pan/gestion');    
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
		$this->view->render('pan/edit');
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
		$data['date']      = $_POST['date'];
		$data['PRIX']      = $_POST['PRIX'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL . 'pan/gestion/'.$_POST['categorie']);
	}
	//****************************************************************************************************************************//
	function newcom() 
	{
	$this->view->title = 'newcom';
	$this->view->userListview = $this->model->Listcom() ;
	$this->view->render('pan/newcom');    
	}
	function editcom() 
	{
	$this->view->title = 'editcom';
	$db_host="localhost";
	$db_name="mvc"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	$query_liste = "SELECT * FROM products  ";
	$resultat=mysql_query($query_liste);
	while($row=mysql_fetch_object($resultat))
	  {
	  $query_liste1 = 'SELECT id,name,qte FROM products where id ='.$row->id  ;
	  $requete1 = mysql_query( $query_liste1, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	  $result1 = mysql_fetch_array( $requete1 ) ;
	  mysql_free_result($requete1);
      // $valeur=$_POST["$row->name"];
	  // echo 'num : '.$row->id;  
	  // echo ' name : '.trim($row->name);    
	  // echo ' valeur : '.$valeur;    
	  // echo'</br>';
	   $QP=$_POST["$row->name"];      
	   $STOCKP=$result1["qte"]; 
	   $MAJP=$STOCKP+$QP;    
	   $sql = 'UPDATE products SET qte ='.$MAJP.' where id ='.$row->id  ;
	   $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
		   if ($QP > 0)
		   {
		   // insertion dans table stock les entres   
		   // $REGION=$_SESSION["REGION"];
		   // $WILAYA=$_SESSION["WILAYA"];
		   // $STRUCTURE=$_SESSION["STRUCTURE"];
		   // $USER=$_SESSION["USER"];
		   // $sqli = "INSERT INTO stock (DATE,IDPRODUIT,QE,RES,CRS,WRS,SRS,USER) VALUES ('".$_POST["DATE"]."','".$row->idprod."','".$QP."','".$MAJP."','".$REGION."','".$WILAYA."','".$STRUCTURE."','".$USER."')";
		   // $requete = @mysql_query($sqli, $cnx) or die($sql."<br>".mysql_error());
		   }  
	  }
	  header('location: ' . URL . 'pan/newcom/');   
	}
	//***************************************************************************************************************************//
	function creationPanier(){
	   if (!isset($_SESSION['panier'])){
		  $_SESSION['panier']=array();
		  $_SESSION['panier']['libelleProduit']   = array();
		  $_SESSION['panier']['qteProduit']       = array();
		  $_SESSION['panier']['prixProduit']      = array();
		  $_SESSION['panier']['verrou']           = false;
	   }
	   return true;
	}
	function isVerrouille(){
	   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
	   return true;
	   else
	   return false;
	}
	function ajouterArticle($libelleProduit)
	{
		session_start();
		$url1 = explode('/',$_GET['url']);
		if ($url1[5]>0)
		{
		   if ($this->creationPanier() && !$this->isVerrouille())
		   {
			  $positionProduit = array_search($libelleProduit,$_SESSION['panier']['libelleProduit']);

			  if ($positionProduit !== false)
			  {
				 $_SESSION['panier']['qteProduit'][$positionProduit] += 1 ;
			  }
			  else
			  {
				 array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
				 array_push( $_SESSION['panier']['qteProduit'],1);
				 array_push( $_SESSION['panier']['prixProduit'],$url1[3]); 
			  }
			      
		   }
		 }  
	header('location:'.URL.'pan/cat/'.$url1[4]);	  
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
			$tmp['libelleProduit'] = array();
			$tmp['qteProduit'] = array();
			$tmp['prixProduit'] = array();
			$tmp['verrou'] = $_SESSION['panier']['verrou'];
			for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
			{
				if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
				{
				array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
				array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
				array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
				}
			}
			$_SESSION['panier'] =  $tmp;
			unset($tmp);
			header('location: ' . URL .'pan/pan');  
		}
	}
	
	function supprimePanier(){
		session_start();
		unset($_SESSION['panier']);
		header('location: ' . URL .'pan/pan'); 
	}
	function compterArticles()
	{
		if (isset($_SESSION['panier']))
		return count($_SESSION['panier']['libelleProduit']);
		else
		return 0;
	}
	function MontantGlobal(){
		$total=0;
		for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
		{
			$total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
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