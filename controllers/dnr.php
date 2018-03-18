<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Dnr extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function stat() 
	{
	$this->view->title = 'stat';
	$this->view->render('dnr/stat');    
	}
	function ND() 
	{
	$this->view->title = 'ND';
	$this->view->render('dnr/ND');    
	}
	function TD() 
	{
	$this->view->title = 'TD';
	$this->view->render('dnr/TD');    
	}
	function XD() 
	{
	$this->view->title = 'XD';
	$this->view->render('dnr/XD');    
	}
	function BD() 
	{
	$this->view->title = 'BD';
	$this->view->render('dnr/BD');    
	}
	
	//***acceuil dnr ***//
	function searchajax() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render('dnr/searchajax');    
	}
	
	
	//***ALGERIE dnr ***//
	function ALGERIE() 
	{	
	    $this->view->title = 'ALGERIE';
		$id='17000';
	    $this->view->userListview = $this->model->dnrcommune($id) ;
		//$this->view->render('dnr/ALGERIE');
		$this->view->render('dnr/djelfacom');
	}
	function AFRIQUE() 
	{	
	    $this->view->title = 'AFRIQUE';
		//$this->view->user =$this->model->userSingleList($id);
		$this->view->render('dnr/AFRIQUE');
	}
	function run()
	{
		$this->model->run();
	}
	//***dnr par wilaya ***//
	function wilaya() 
	{
	$this->view->title = 'dnr par wilaya';
	$this->view->userListview = $this->model->dnrwilaya() ;
	$this->view->render('dnr/dnrwilaya');    
	}
	//***dnr par commune ***//
	function commune() 
	{
	$this->view->title = 'dnr par commune';
	$id='17000';
	$this->view->userListview = $this->model->dnrcommune($id) ;
	$this->view->render('dnr/commune');    
	}
	//***dnr par adresse ***//
	function adresse() 
	{
	$this->view->title = 'dnr par adresse';
	$id='924';
	$this->view->userListview = $this->model->dnradresse($id) ;
	$this->view->render('dnr/adresse');    
	}
	//***dump dnr ***//
	function dump() 
	{
	$this->view->title = 'dmp dnr';
	$this->view->render('dnr/dump');    
	}
	//***acceuil dnr ***//
	function index() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render('dnr/index');    
	}
	//***new dnr ***//
	public function newdnr() 
	{
		$this->view->title = 'create dnr';
		//$this->view->label(25,400,'DATE HEUREhhhhhhhhhhhhhhhhhS');  
		$this->view->render('dnr/new');	
	}
	public function create() 
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
		$data['CRH2']      = $_POST['CRH2'];
		$data['ERH3']      = $_POST['ERH3'];
		$data['CRH4']      = $_POST['CRH4'];
		$data['ERH5']      = $_POST['ERH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		echo '<pre>';print_r ($data);echo '<pre>';
		if($data['WILAYAN']=='1' or $data['WILAYAR']=='1' ) 
		{
		header('location: ' . URL . 'dnr/newdnr/');
		}
		else
		{
		$last_id=$this->model->create($data);
		header('location: ' . URL . 'dnr/Donate/'.$last_id);
		}
		
		
	}
	//***imprimer dnr ***//
	function imp() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render('dnr/imp');    
	}
	//***search dnr ***//
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search dnr';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =13     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('dnr/index');
	}
	//***doub dnr ***//
	function doublons() 
	{
        $this->view->title = 'doublons dnr';
		$this->view->userListview = $this->model->userlistdoublons() ;
		$this->view->render('dnr/doublons');
	}
	
	
	
	
	
	//***view dnr ***//
	public function view($id) 
	{
        $this->view->title = 'view dnr';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->donSingleList($id);
		$this->view->render('dnr/view');
	}
	//***Bilan dnr ***//
	function Bilan($id) 
	{	
	    $this->view->title = 'Bilan';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->bilanSingleList($id);
		$this->view->render('dnr/Bilan');
	}
	function BILANOK() 
	{
        $data = array();
		$data['id'] = $_POST['id'];
		$data['NOM'] = $_POST['NOM'];
		$data['PRENOM'] = $_POST['PRENOM'];
        $data['BIRTHDAY'] = $_POST['BIRTHDAY'];
		$data['SEXEDNR'] = $_POST['SEXEDNR'];
		$data['AGEDNR'] = $_POST['AGEDNR'];
		
		$data['GB'] = $_POST['GB'];
		$data['PNN'] = $_POST['PNN'];
		$data['PNE'] = $_POST['PNE'];
		$data['PNB'] = $_POST['PNB'];
		$data['LYM'] = $_POST['LYM'];
		$data['MON'] = $_POST['MON'];
		
		$data['GR'] = $_POST['GR'];
		$data['HT'] = $_POST['HT'];
		$data['HB'] = $_POST['HB'];
		$data['VGM'] = $_POST['VGM'];
		$data['CCMH'] = $_POST['CCMH'];
		$data['TCMH'] = $_POST['TCMH'];
		
		$data['PLQ'] = $_POST['PLQ'];
		$data['VMP'] = $_POST['VMP'];
		$data['IDP'] = $_POST['IDP'];
		$data['PCT'] = $_POST['PCT'];
		$data['TP'] = $_POST['TP'];
		$data['INR'] = $_POST['INR'];
		
		$data['NA'] = $_POST['NA'];
		$data['K'] = $_POST['K'];
		$data['PHO'] = $_POST['PHO'];
		$data['CL'] = $_POST['CL'];
		$data['CA'] = $_POST['CA'];
		$data['PH'] = $_POST['PH'];
		
		$data['CRP'] = $_POST['CRP'];
		$data['VS1'] = $_POST['VS1'];
		$data['VS2'] = $_POST['VS2'];
		$data['FIB'] = $_POST['FIB'];
		$data['GLY'] = $_POST['GLY'];
		$data['HBGLY'] = $_POST['HBGLY'];
		
		$data['CT'] = $_POST['CT'];
		$data['HDL'] = $_POST['HDL'];
		$data['LDL'] = $_POST['LDL'];
		$data['TGL'] = $_POST['TGL'];
		$data['CTHDL'] = $_POST['CTHDL'];
		$data['LDLHDL'] = $_POST['LDLHDL'];
		$data['ASPECT'] = $_POST['ASPECT'];
		
		$data['UREE'] = $_POST['UREE'];
		$data['CREAT'] = $_POST['CREAT'];
		$data['ACU'] = $_POST['ACU'];
		
		$data['DATEDON'] = $_POST['DATEDON'];
		$data['HEUREDON'] = $_POST['HEUREDON'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];		
	    $this->view->title = 'bilanok';
		$this->view->user = $this->model->createbilan($data);
		//echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .'dnr/Bilan/'.$_POST['id']);
	}
	public function deletebilan($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletebilan($id);
	header('location: ' . URL . 'dnr/Bilan/'.$url[3]);    
	}
	public function editbilan($id) 
	{
        $this->view->title = 'Edit bilandnr';
		// $this->view->user = $this->model->bilanSingleList($id);
		$this->view->render('dnr/editbilan');
	}
	//***fin Bilan dnr ***//
	//***ordonnace dnr ***//
	function ordonnacednr($id) 
	{	
	    $this->view->title = 'ordonnacednr';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('dnr/ordonnacednr');
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
				 header('location:'.URL.'dnr/ordonnacednr/'.$_POST['id']);
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
	header('location:'.URL.'dnr/ordonnacednr/'.$_POST['id']);	  
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
			header('location: ' . URL .'dnr/ordonnacednr/'.$url1[3]); 
		}
	}	
	function supprimePanier(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['ordonnace']);
     header('location: ' . URL .'dnr/ordonnacednr/'.$url1[2]); 
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
	//***fin ordonnace dnr ***//
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//***Donate dnr ***//
	function Donate($id) 
	{	
	    $this->view->title = 'Donate';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('dnr/Donate');
	}
	function DONATEOK() 
	{
        $data = array();
		$data['id'] = $_POST['id'];
		$data['NOM'] = $_POST['NOM'];
		$data['PRENOM'] = $_POST['PRENOM'];
        $data['BIRTHDAY'] = $_POST['BIRTHDAY'];
		$data['SEXEDNR'] = $_POST['SEXEDNR'];
		$data['AGEDNR'] = $_POST['AGEDNR'];
		$data['GRABO'] = $_POST['GRABO'];
		$data['GRRH'] = $_POST['GRRH'];
		$data['CRH2'] = $_POST['CRH2'];
		$data['ERH3'] = $_POST['ERH3'];
		$data['CRH4'] = $_POST['CRH4'];
		$data['ERH5'] = $_POST['ERH5'];
		$data['KELL1'] = $_POST['KELL1'];
		$data['KELL2'] = $_POST['KELL2'];
		$data['LIEUX'] = $_POST['LIEUX'];
		$data['TYPEDONNEUR']= $_POST['TYPEDONNEUR'];
		$data['TYPEDON'] = $_POST['TYPEDON'];
		$data['DATEDON'] = $_POST['DATEDON'];
		$data['HEUREDON'] = $_POST['HEUREDON'];
		$data['TEMP'] = $_POST['TEMP'];
		$data['PULSE'] = $_POST['PULSE'];
		$data['TA'] = $_POST['TA'];
		$data['TA1'] = $_POST['TA1'];
		$data['POIDS'] = $_POST['POIDS'];
		$data['Taille'] = $_POST['Taille'];
		$data['HEMOGLOBIN'] = $_POST['HEMOGLOBIN'];
		$data['HEMATOCRIT'] = $_POST['HEMATOCRIT'];
		$data['q1'] = $_POST['q1'];
	    $data['q2'] = $_POST['q2'];
	    $data['q3'] = $_POST['q3'];
	    $data['q4'] = $_POST['q4'];
	    $data['q5'] = $_POST['q5'];
	    $data['q6'] = $_POST['q6'];
	    $data['q7'] = $_POST['q7'];
	    $data['q8'] = $_POST['q8'];
	    $data['q9'] = $_POST['q9'];
	    $data['q10'] = $_POST['q10'];
	    $data['q11'] = $_POST['q11'];
	    $data['q12'] = $_POST['q12'];
	    $data['q13'] = $_POST['q13'];
	    $data['q14'] = $_POST['q14'];
	    $data['q15'] = $_POST['q15'];
	    $data['q16'] = $_POST['q16'];
	    $data['q17'] = $_POST['q17'];
	    $data['q18'] = $_POST['q18'];
	    $data['q19'] = $_POST['q19'];
	    $data['q20'] = $_POST['q20'];
	    $data['q21'] = $_POST['q21'];
	    $data['q22'] = $_POST['q22'];
	    $data['q23'] = $_POST['q23'];
	    $data['q24'] = $_POST['q24'];
	    $data['q25'] = $_POST['q25'];
		$data['IND'] = $_POST['IND'];
		$data['TYPEPOCHE'] = $_POST['TYPEPOCHE'];
		if ($_POST['IND']=='IND')
		{
		$data['IDP'] = $_POST['IDP'];
		}
		else
		{
		$data['IDP'] = '0';
		}
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['login']     = $_POST['login'];		
	    $this->view->title = 'Donateok';
		$this->view->user = $this->model->createdon($data);
		// echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .'dnr/');
	}
	public function prenuptial($id) 
	{
        $this->view->title = 'Edit dnr';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('dnr/prenuptial');
	}
	
	
	
	//***editdnr***//
	public function edit($id) 
	{
        $this->view->title = 'Edit dnr';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('dnr/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['NOM']       = $_POST['NOM'];
		$data['PRENOM']    = $_POST['PRENOM'];
		$data['FILSDE']    = $_POST['FILSDE'];
		$data['DATE']      = $_POST['DINS'];
	    $data['GRABO']     = $_POST['GRABO'];
	    $data['GRRH']      = $_POST['GRRH'];
		$data['CRH2']      = $_POST['CRH2'];
		$data['ERH3']      = $_POST['ERH3'];
		$data['CRH4']      = $_POST['CRH4'];
		$data['ERH5']      = $_POST['ERH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['DATENS']    = $_POST['DATENS'];
		$data['SEXE']      = $_POST['SEXE'];
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];
		$data['TEL']       = $_POST['TEL'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL . 'Dnr/view/'.$id.'');
	}
	//***deletednr***//
	public function delete($id)
	{
	$this->model->deletednr($id);     //la supression du donneur 
	$this->model->deletednrdon($id);  //la supression des dons du donneur
        //$this->model->deletednrdoncpc($id);//la suppression des poche dans la banque de sang table cgr pfc cps 		
	    //echo '<pre>';print_r ($this->view->user);echo '<pre>';	      
		// $url = explode('/',$_GET['url']);// prevoire retour apres suppression avec le meme critere de recherche  	
		// $_GET['o']; //criter de choix
	    // $_GET['q']; //key word  
		// $url1[2]; // parametre 2 page                     limit 2,3
		// 5      ; // parametre 3 nobre de ligne par page  limit 2,3 
		// 15     ; // parametre nombre de chiffre dan la barre  navigation
		// Dnr/search/0/10?q=tiba&o=NOM
	header('location: ' . URL . 'Dnr/search/0/10?q=&o=NOM');
	}
	//***graphedon de dnr ***//
	function dnr() 
	{
	$this->view->title = 'dnr';
	$this->view->render('dnr/dnr');    
	}
	//***graphedon de dnr ***//
	function dnranne() 
	{
	$this->view->title = 'dnranne';
	$this->view->render('dnr/dnranne');    
	}
	function donanne() 
	{
	$this->view->title = 'donanne';
	$this->view->render('dnr/donanne');    
	}
	function donanne1() 
	{
	$this->view->title = 'donanne1';
	$this->view->render('dnr/donanne1');    
	}
	function donanne2() 
	{
	$this->view->title = 'donanne2';
	$this->view->render('dnr/donanne2');    
	}
	function donanne3() 
	{
	$this->view->title = 'donanne2';
	$this->view->render('dnr/donanne3');    
	}
	
	function donaborh() 
	{
	$this->view->title = 'donaborh';
	$this->view->render('dnr/donaborh');    
	}
	//**don par donneur **//
	function DPD() 
	{	
	    $this->view->title = 'DPD';
		$this->view->userListview = $this->model->userlistdpd() ;
		$this->view->render('dnr/dpd');
	}
	//***deletedon ***// 2type de delete don la liste des don total et la liste des dons individuelle 
	public function deletedon($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletedon($id);
	header('location: ' . URL . 'Dnr/view/'.$url[3]);    
	}
	//**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render('dnr/upl');    
	}
	
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
				//upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				//$uploadLocation = "d:\\mvc/public/webcam/dnr/"; 
				$target_path = uploadLocationdnr.trim($id).".jpg";      
				if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) 
				{	
				$this->view->msg ='le fichier :  '.basename( $_FILES['upfile']['name']).'  a été corectement envoyer merci';
				} 
				else
				{
				$this->view->msg ='il ya une erreur d\'envoie du fichier :  '.basename( $_FILES['upfile']['name']).'  veillez recomencer svp';	
				}
			}	
		}
		header('location: ' . URL . 'Dnr/search/0/10?q=&o=NOM');
		//$this->view->render('dnr/upl');    
	}	
}