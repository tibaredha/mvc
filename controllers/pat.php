<?php
// echo '<pre>';print_r ($data);echo '<pre>';

//A AVANT HOSPITALISATION

//B ENCOURS HOSPITALISATION
//1 psl*
//2 surveillance
//3 ordonnace
//4 scorpionisme
//5 bilaa
//6 perinat
//7 med act*
//8 act pm*
//9 act med*
//10 change service*
//13 autorisatio opp*
//15 silverman*
//16 apgar*
//17 iss*
//18 sg*
//19 ddr*
//20 morssure*
//21 rx*
//22 cim*

//A APRES SORTI HOSPITALISATION
//11 evacuation
//12 certificat sejour
//14 FN
//24 deces
//23 RSCS
//25 protocol opp*
//26 CONGE*
//27 fiche medical*
//28 

class Pat extends Controller {
//******************************1ere partie****************************************//
	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}

	
	
	
	//***acceuil pat ***//
	function index() 
	{
	$this->view->title = 'Search pat';
	$this->view->render('pat/index');    
	}
	//***acceuil pat ***//
	function Rapport() 
	{
	$this->view->title = 'Rapport';
	$this->view->render('pat/Rapport');    
	}
	
	//****malade hospitalise***//
	function MALHOSP() 
	{	
	    $this->view->title = 'hosp';
		$this->view->user =$this->model->MALHOSP();
		$this->view->render('pat/MALHOSP');
	}
	//***new pat ***//
	public function newpat() 
	{
		$this->view->title = 'create pat';
		//$this->view->label(25,400,'DATE HEUREhhhhhhhhhhhhhhhhhS');  
		$this->view->render('pat/new');	
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
		// echo '<pre>';print_r ($data);echo '<pre>';
		if($data['WILAYAN']=='1' or $data['WILAYAR']=='1' ) 
		{
		header('location: ' . URL . 'pat/newpat/');
		}
		else
		{
		$last_id=$this->model->create($data);
		//create table vaccination
		$this->model->createidvac($last_id);
		header('location: ' . URL . 'pat/Hosp/'.$last_id);
		}	
	}
	//***search pat ***//
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search pat';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =5     ; // parametre 3 nobre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('pat/index');
	}
		//***imprimer dnr ***//
	function imp() 
	{
	$this->view->title = 'Search pat';
	$this->view->render('pat/imp');    
	}
	
	
	
//******************************2eme partie****************************************//
    //**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render('pat/upl');    
	}
	
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
				//upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				// $uploadLocation = "d:\\mvc/public/webcam/pat/"; 
				$target_path = uploadLocationpat.trim($id).".jpg";      
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
		header('location: ' . URL . 'pat/search/0/10?q=&o=NOM');
		   
	}		
	//***view pat ***//
	public function view($id) 
	{
        $this->view->title = 'view pat';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->donSingleList($id);
		$this->view->userListview1 = $this->model->donSingleList1($id);
		$this->view->render('pat/view');
	}
	
	//***hospitalisation pat ***//
	function hosp($id) 
	{	
	    $this->view->title = 'hosp';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('pat/hosp');
	}
	function HOSPOK() 
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
		$data['TYPEDONNEUR']= $_POST['TYPEDONNEUR'];
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
		$data['MOTIF']     = $_POST['MOTIF'];
		$data['DGC']       = $_POST['DGC'];
		$data['SERVICE']   = $_POST['SERVICE'];
		$data['NLIT']      = $_POST['NLIT'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];		
	    $this->view->title = 'hospitalisationok';
		if ($_POST['HOSP']=='OUI'){
		$this->view->user = $this->model->createhosp($data);
		}
		if ($_POST['HOSP']=='NON'){
		$this->view->user = $this->model->createcons($data);
		}
		// echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .'pat/view/'.$data['id']);	
	}

	//***editpat***//
	public function edit($id) 
	{
        $this->view->title = 'Edit pat';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('pat/edit');
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
		header('location: ' . URL . 'pat/view/'.$id.'');
	}
	//***deletepat***//
	public function delete($id)
	{
	$this->model->deletepat($id);     
	$this->model->deletepatcon($id);  
	$this->model->deletevaccin($id);
	
        //$this->model->deletednrdoncpc($id);//la suppression des poche dans la banque de sang table cgr pfc cps 		
	    //echo '<pre>';print_r ($this->view->user);echo '<pre>';	      
		// $url = explode('/',$_GET['url']);// prevoire retour apres suppression avec le meme critere de recherche  	
		// $_GET['o']; //criter de choix
	    // $_GET['q']; //key word  
		// $url1[2]; // parametre 2 page                     limit 2,3
		// 5      ; // parametre 3 nobre de ligne par page  limit 2,3 
		// 15     ; // parametre nombre de chiffre dan la barre  navigation
		// Dnr/search/0/10?q=tiba&o=NOM
	header('location: ' . URL . 'pat/search/0/10?q=&o=NOM');
	}
//******************************3eme partie****************************************//	
	//***Perinat ***//
	function Perinat($id) 
	{	
	    $this->view->title = 'Périnatalite';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->GESTATION($id);
		$this->view->render('pat/Perinat');
	}
	function PERINATOK() 
	{
        $data = array();
		$data['IDDNR'] = $_POST['IDDNR'];//IDMERE
		$data['NOMP'] = $_POST['NOMP'];
		$data['PRENOMP'] = $_POST['PRENOMP'];
        $data['DATENAISSANCE'] = $_POST['DATENAISSANCE'];
		$data['HEURES']   = $_POST['HEURES'];	
		
		
		$data['SEXEG1'] = $_POST['SEXEG1'];
		$data['PRENOMG1'] = $_POST['PRENOMG1'];
		
		$data['WILAYAN']   = $_POST['WILAYAN'];
		$data['COMMUNEN']  = $_POST['COMMUNEN'];
		$data['WILAYAR']   = $_POST['WILAYAR'];
		$data['COMMUNER']  = $_POST['COMMUNER'];
		$data['ADRESSE']   = $_POST['ADRESSE'];	
		$data['TELEPHONE'] = $_POST['TELEPHONE'];	
		
		
	   
	    //$last_id=$this->model->create($data);
		//create table vaccination
		//$this->model->createidvac($last_id);
		
		// echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .'Pat/Perinat/'.$_POST['IDDNR']);
	}
	//***Bilan pat ***//
	function Bilan($id) 
	{	
	    $this->view->title = 'Bilan';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->bilanSingleList($id);
		$this->view->render('pat/Bilan');
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
		header('location: ' . URL .'pat/Bilan/'.$_POST['id']);
	}
	public function deletebilan($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletebilan($id);
	header('location: ' . URL . 'pat/Bilan/'.$url[3]);    
	}
	public function editbilan($id) 
	{
        $this->view->title = 'Edit bilanpat';
		// $this->view->user = $this->model->bilanSingleList($id);
		$this->view->render('pat/editbilan');
	}
	//***fin Bilan pat ***//
	
	//***radio pat ***//
	function Radio($id) 
	{	
	    $this->view->title = 'radio';
		$this->view->user =$this->model->userSingleList($id);
		// $this->view->userListview = $this->model->radioSingleList($id);
		$this->view->render('pat/radio');
	}
	//***fin radio pat ***//
	//***************************************************************************************************************************//
	//***ordonnace pat ***//
	function ordonnacepat($id) 
	{	
	    $this->view->title = 'ordonnacepat';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('pat/ordonnacepat');
	}
	
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
		//envoyer le resultat a la base de donnees ********************//
		$url = explode('/',$_GET['url']);
		$data = array();
		$data['DATE'] = date('Y-m-d');
		$data['MED1'] = $_POST['libelleProduit'];
		$data['QUT1'] = $_POST['qteProduit'];
        $data['idp']  = $url[2];
		$this->model->createlistmed($data);
		//*********************************************************//
		$totaltrt=$doseparprise*$nbrdrfoisparjours*$nbrdejours; 	
		session_start();
		   if ($this->creationPanier() && !$this->isVerrouille())
		   {
		   $positionProduit = array_search($libelleProduit,$_SESSION['ordonnace']['libelleProduit']);
			  if ($positionProduit !== false)
			  {
				 header('location:'.URL.'pat/ordonnacepat/'.$_POST['id']);
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
	header('location:'.URL.'pat/ordonnacepat/'.$_POST['id']);	  
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
			header('location: ' . URL .'pat/ordonnacepat/'.$url1[3]); 
		}
	}	
	function supprimePanier(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['ordonnace']);
     header('location: ' . URL .'pat/ordonnacepat/'.$url1[2]); 
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
	//***fin ordonnace pat ***//
	
	//***vaccination pat ***//
	function vaccin($id) 
	{	
	    $this->view->title = 'vaccin';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->vaccinSingleList($id);
		$this->view->userListviewr = $this->model->rabsinglelist($id);
		$this->view->userListviews = $this->model->sassinglelist($id);
		
		//base de  donne vaccination c, c,bbbbb
		$this->view->render('pat/vaccin');
	}
	function vaccinok($id) 
	{
        $data = array();
		$data['id'] = $id;
		$data['1'] = $_POST['1'];
		$data['2'] = $_POST['2'];
	    $data['3'] = $_POST['3'];
	    $data['4'] = $_POST['4'];
	    $data['5'] = $_POST['5'];
	    $data['6'] = $_POST['6'];
	    $data['7'] = $_POST['7'];
	    $data['8'] = $_POST['8'];
	    $data['9'] = $_POST['9'];
	    $data['10'] = $_POST['10'];
	    $data['11'] = $_POST['11'];
	    $data['12'] = $_POST['12'];
	    $data['13'] = $_POST['13'];
	    $data['14'] = $_POST['14'];
	    $data['15'] = $_POST['15'];
	    $data['16'] = $_POST['16'];
	    $data['17'] = $_POST['17'];
	    $data['18'] = $_POST['18'];
	    $data['19'] = $_POST['19'];
	    $data['20'] = $_POST['20'];
	    $data['21'] = $_POST['21'];
	    $data['22'] = $_POST['22'];
	    $data['23'] = $_POST['23'];
	    $data['24'] = $_POST['24'];
	    $data['25'] = $_POST['25'];
	    $data['26'] = $_POST['26'];
	    $data['27'] = $_POST['27'];
	    $data['28'] = $_POST['28'];
	    $data['29'] = $_POST['29'];
	    $data['30'] = $_POST['30'];
	    $data['31'] = $_POST['31'];
	    $data['32'] = $_POST['32'];
	    $data['33'] = $_POST['33'];
	    $data['34'] = $_POST['34'];
	    $data['35'] = $_POST['35'];
	    $data['36'] = $_POST['36'];
	    $data['37'] = $_POST['37'];
	    $data['38'] = $_POST['38'];
	    $data['39'] = $_POST['39'];
	    $data['40'] = $_POST['40'];
	    $data['41'] = $_POST['41'];
	    $data['42'] = $_POST['42'];
		$this->view->user = $this->model->updatevaccin($data);
		//echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .'pat/vaccin/'.$id);
	}
	//***fin vaccination pat ***//	
	//***dialyse ***//
	function dial($id) 
	{	
	    $this->view->title = 'dial';
		$this->view->user =$this->model->userSingleList($id);
		// $this->view->userListview = $this->model->dialSingleList($id);
		$this->view->render('pat/dial');
	}	
//******************************4eme partie hospitalisation****************************************//		
	//***changement de service  pat ***//
	function editservice($id) 
	{
		$url = explode('/',$_GET['url']);
		if ($url[4] =='') 
		{
		$this->view->title = 'changement de service';
		$this->view->user = $this->model->edithosp($id);
		$this->view->render('pat/editservice');
		}
		else
		{
			header('location: ' . URL . 'pat/view/'.$url[3]);
		}	   
	 }

	public function editSaveservice($id)
	{
		// $data = array();
		// $data['id']      = $id;
		// $data['IDDNR']   = $_POST['IDDNR'];
		// $data['AGEDNR']  = $_POST['AGEDNR'];
		// $data['SEXEDNR'] = $_POST['SEXEDNR'];
		// $data['MAT'] = $_POST['MAT'];
		// $data['NDOS'] = $_POST['NDOS'];
		// $data['DATEDON'] = $_POST['DATEDON'];
		// $data['SERVICE'] = $_POST['SERVICE'];
		// $data['NLIT']    = $_POST['NLIT'];
		// $data['MOTIF']   = $_POST['MOTIF'];
		// $data['DGC']     = $_POST['DGC'];
		// $data['DATESORTI']  = $_POST['DATESORTI'];
		// $data['HEURESORTI'] = $_POST['HEURESORTI'];
		// $data['MODESORTI']  = $_POST['MODESORTI'];
		// $data['POIDS']     = $_POST['POIDS'];
		// $data['Taille']    = $_POST['Taille'];
		// $data['TAS']       = $_POST['TAS'];
		// $data['TAD']       = $_POST['TAD'];
		// $data['GROUPAGE']  = $_POST['GROUPAGE'];
		// $data['RHESUS']    = $_POST['RHESUS'];
		// $data['GRRH2']     = $_POST['GRRH2'];
		// $data['GRRH3']     = $_POST['GRRH3'];
		// $data['GRRH4']     = $_POST['GRRH4'];
		// $data['GRRH5']     = $_POST['GRRH5'];
		// $data['KELL1']     = $_POST['KELL1'];
		// $data['KELL2']     = $_POST['KELL2'];
		// $this->model->editSavehosp($data);
		// header('location: ' . URL . 'pat/view/'.$data['IDDNR'].'');
	}




	
	//***Envenimation pat ***//
	function sas($id) 
	{
		$url = explode('/',$_GET['url']);
		if ($url[4] =='') 
		{
			$this->view->title = 'Envenimation Scorpionique';
			$this->view->user =$this->model->userSingleList($id);
			$this->view->render('pat/sas');
		}
		else
		{
			header('location: ' . URL . 'pat/view/'.$id);
		}	   
	}
	//***morssures pat ***//
	function mors($id) 
	{
		$url = explode('/',$_GET['url']);
		if ($url[4] =='') 
		{
			$this->view->title = 'morssures';
			$this->view->user =$this->model->userSingleList($id);
			$this->view->render('pat/mors');
		}
		else
		{
			header('location: ' . URL . 'pat/view/'.$id);
		}	   
	}
	//sorti hosp pat
	public function editsortihosp($id)
	{
	    $this->view->title = 'Edit sortihosp';
		$this->view->user = $this->model->edithosp($id);
		$this->view->render('pat/editsortihosp'); 
	}
	function datediff($datei,$dates,$type)
	{
		if  ($type=='j') 
		{
		// $timeStampi = (((strtotime($datei)/60)/60)/24);
		// $timeStamps = (((strtotime($dates)/60)/60)/24);
		// return  $timeStamp=$timeStamps-$timeStampi;
		return  $timeStamp=round (((((strtotime($dates)-strtotime($datei))/60)/60)/24));
		}
		if  ($type=='m') 
		{
		// $timeStampi = ((((strtotime($datei)/60)/60)/24)/30);
		// $timeStamps = ((((strtotime($dates)/60)/60)/24)/30);
		// return  $timeStamp=$timeStamps-$timeStampi;
		return  $timeStamp= round ((((((strtotime($dates)-strtotime($datei))/60)/60)/24)/30));
		}

	}
	public function editSavesortihosp($id)
	{
		$data = array();
		$data['id']         = $id;
		$data['IDDNR']      = $_POST['IDDNR'];
		$data['DATEDON']    = $_POST['DATEDON'];
		$data['DATESORTI']  = $_POST['DATESORTI'];
		$data['HEURESORTI'] = $_POST['HEURESORTI'];
		$data['MODESORTI']  = $_POST['MODESORTI'];
		$data['SERVICE']    = $_POST['SERVICE'];
		$data['NLIT']       = $_POST['NLIT'];
	    $data['CHAPITRE']   = $_POST['CHAPITRE'];
		$data['CATEGORIECIM'] = $_POST['CATEGORIECIM'];
		$data['MAT']        = $_POST['MAT'];
		$data['NDOS']       = $_POST['NDOS'];
		$data['DH']         = $this->datediff($_POST['DATEDON'],$_POST['DATESORTI'],'j');
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editsortihosp($data);
		header('location: ' . URL . 'pat/view/'.$data['IDDNR'].'');
	}
	
	//evacuation
	public function editevacuation($id)
	{
	    $url = explode('/',$_GET['url']);
	    $this->view->title = 'Edit evacuation';
		$this->view->user = $this->model->edithosp($url[2]);
		if ($url[4]==3) {
		$this->view->render('pat/editevacuation'); 
		}
		else {
		header('location: ' . URL . 'pat/view/'.$url[3]);
		}
	}
	
	//***editpatdeces***//
	public function deces($id) 
	{
	    $url = explode('/',$_GET['url']);
        $this->view->title = 'Edit deces';
		$this->view->user = $this->model->userSingleList($url[3]);
		if ($url[4]==2) {
		$this->view->render('pat/deces');
		}
		else {
		header('location: ' . URL . 'pat/view/'.$url[3]);
		}
		
	}
	
	//edit hospitalisation 
	public function edithosp($id)
	{
	    $this->view->title = 'Edit hosp';
		$this->view->user = $this->model->edithosp($id);
		$this->view->render('pat/edithosp'); 
	}
	public function editSavehosp($id)
	{
		$data = array();
		$data['id']      = $id;
		$data['IDDNR']   = $_POST['IDDNR'];
		$data['AGEDNR']  = $_POST['AGEDNR'];
		$data['SEXEDNR'] = $_POST['SEXEDNR'];
		$data['MAT'] = $_POST['MAT'];
		$data['NDOS'] = $_POST['NDOS'];
		$data['DATEDON'] = $_POST['DATEDON'];
		$data['SERVICE'] = $_POST['SERVICE'];
		$data['NLIT']    = $_POST['NLIT'];
		$data['MOTIF']   = $_POST['MOTIF'];
		$data['DGC']     = $_POST['DGC'];
		$data['DATESORTI']  = $_POST['DATESORTI'];
		$data['HEURESORTI'] = $_POST['HEURESORTI'];
		$data['MODESORTI']  = $_POST['MODESORTI'];
		$data['POIDS']     = $_POST['POIDS'];
		$data['Taille']    = $_POST['Taille'];
		$data['TAS']       = $_POST['TAS'];
		$data['TAD']       = $_POST['TAD'];
		$data['GROUPAGE']  = $_POST['GROUPAGE'];
		$data['RHESUS']    = $_POST['RHESUS'];
		$data['GRRH2']     = $_POST['GRRH2'];
		$data['GRRH3']     = $_POST['GRRH3'];
		$data['GRRH4']     = $_POST['GRRH4'];
		$data['GRRH5']     = $_POST['GRRH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$this->model->editSavehosp($data);
		header('location: ' . URL . 'pat/view/'.$data['IDDNR'].'');
	}
	//***deletehosp ***// 2type de delete don la liste des don total et la liste des dons individuelle 
	public function deletehosp($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletehosp($id);
	header('location: ' . URL . 'pat/view/'.$url[3]);    
	}
	
//******************************4eme partie consultation****************************************//	
	//***consul pat ***//
	// function cons($id) 
	// {	
	    // $this->view->title = 'consulte';
		// $this->view->user =$this->model->userSingleList($id);
		// $this->view->render('pat/cons');
	// }
	// function CONSOK() 
	// {
        // $data = array();
		// $data['id'] = $_POST['id'];
		// $data['NOM'] = $_POST['NOM'];
		// $data['PRENOM'] = $_POST['PRENOM'];
        // $data['BIRTHDAY'] = $_POST['BIRTHDAY'];
		// $data['SEXEDNR'] = $_POST['SEXEDNR'];
		// $data['AGEDNR'] = $_POST['AGEDNR'];
		// $data['GRABO'] = $_POST['GRABO'];
		// $data['GRRH'] = $_POST['GRRH'];
		// $data['CRH2'] = $_POST['CRH2'];
		// $data['ERH3'] = $_POST['ERH3'];
		// $data['CRH4'] = $_POST['CRH4'];
		// $data['ERH5'] = $_POST['ERH5'];
		// $data['KELL1'] = $_POST['KELL1'];
		// $data['KELL2'] = $_POST['KELL2'];
		// $data['LIEUX'] = $_POST['LIEUX'];
		// $data['TYPEDONNEUR']= $_POST['TYPEDONNEUR'];
		// $data['TYPEDON'] = $_POST['TYPEDON'];
		// $data['DATEDON'] = $_POST['DATEDON'];
		// $data['HEUREDON'] = $_POST['HEUREDON'];
		// $data['TEMP'] = $_POST['TEMP'];
		// $data['PULSE'] = $_POST['PULSE'];
		// $data['TA'] = $_POST['TA'];
		// $data['TA1'] = $_POST['TA1'];
		// $data['POIDS'] = $_POST['POIDS'];
		// $data['Taille'] = $_POST['Taille'];
		// $data['HEMOGLOBIN'] = $_POST['HEMOGLOBIN'];
		// $data['HEMATOCRIT'] = $_POST['HEMATOCRIT'];
		// $data['IND'] = $_POST['IND'];
		// $data['TYPEPOCHE'] = $_POST['TYPEPOCHE'];
		// if ($_POST['IND']=='IND')
		// {
		// $data['IDP'] = $_POST['IDP'];
		// }
		// else
		// {
		// $data['IDP'] = '0';
		// }
		// $data['MOTIF']     = $_POST['MOTIF'];
		// $data['DGC']       = $_POST['DGC'];
		// $data['REGION']    = $_POST['REGION'];
		// $data['WILAYA']    = $_POST['WILAYA'];
		// $data['STRUCTURE'] = $_POST['STRUCTURE'];
		// $data['login']     = $_POST['login'];		
	    // $this->view->title = 'consultationeok';
		// $this->view->user = $this->model->createcons($data);
		// echo '<pre>';print_r ($data);echo '<pre>';
		// header('location: ' . URL .'pat/');
	// }
	
	//***deletecons ***// 2type de delete don la liste des don total et la liste des dons individuelle 
	public function deletecons($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletecons($id);
	header('location: ' . URL . 'pat/view/'.$url[3]);    
	}
}