<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class vaccinvet extends Controller {

    private $route  = 'vaccinvet';
    private $uploadLocation = "C:\\wamp/www/mvc/public/webcam/vaccinvet/"; 

	function __construct() {
	   parent::__construct();
       $this->view->js = array('vaccinvet/js/js.js');
	}
	function run()
	{
		$this->model->run();
	}
	function index() 
	{
	$this->view->title = 'Search vaccinvet';
	$this->view->render($this->route.'/index');    
	}
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search hemodialyse';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page    limit 2,3
		$this->view->userListviewl =10; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =20; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	public function newhemod() 
	{
		$this->view->title = 'create hemod';
		$this->view->render($this->route.'/new');	
	}
	public function create() 
	{
		$data = array();
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
		$data['TEL']       = $_POST['TEL'];
		$data['GRABO']     = $_POST['GRABO'];
		$data['GRRH']      = $_POST['GRRH'];
		$data['CRH2']      = $_POST['CRH2'];
		$data['ERH3']      = $_POST['ERH3'];
		$data['CRH4']      = $_POST['CRH4'];
		$data['ERH5']      = $_POST['ERH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['HVB']       = $_POST['HVB'];
		$data['HVC']       = $_POST['HVC'];
		$data['HIV']       = $_POST['HIV'];
		$data['TPHA']       = $_POST['TPHA'];
		$data['CAUSE']     = $_POST['CAUSE'];
		$data['COMOR']     = $_POST['COMOR'];
		$data['DPD']       = $_POST['DPD'];
		$data['POIDS']     = $_POST['POIDS'];
		$data['NSS']       = $_POST['NSS'];
		$data['ASSURE']    = $_POST['ASSURE'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		$this->model->create($data);
		header('location: ' . URL .$this->route.'/'.$last_id);
	}
	function imp() 
	{
	$this->view->title = 'imp hemod';
	$this->view->render($this->route.'/imp');    
	}
	public function delete($id)
	{
	$this->model->deletehemod($id);     
	header('location: ' . URL . 'hemod/');
	}
	
	//***editdnr***//
	public function edit($id) 
	{
        $this->view->title = 'Edit hemod';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
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
		$data['TEL']       = $_POST['TEL'];
		$data['GRABO']     = $_POST['GRABO'];
		$data['GRRH']      = $_POST['GRRH'];
		$data['CRH2']      = $_POST['CRH2'];
		$data['ERH3']      = $_POST['ERH3'];
		$data['CRH4']      = $_POST['CRH4'];
		$data['ERH5']      = $_POST['ERH5'];
		$data['KELL1']     = $_POST['KELL1'];
		$data['KELL2']     = $_POST['KELL2'];
		$data['HVB']       = $_POST['HVB'];
		$data['HVC']       = $_POST['HVC'];
		$data['HIV']       = $_POST['HIV'];
		$data['TPHA']       = $_POST['TPHA'];
		$data['CAUSE']     = $_POST['CAUSE'];
		$data['COMOR']     = $_POST['COMOR'];
		$data['DPD']       = $_POST['DPD'];
		$data['POIDS']     = $_POST['POIDS'];
		$data['NSS']       = $_POST['NSS'];
		$data['ASSURE']    = $_POST['ASSURE'];
		$data['REGION']    = $_POST['REGION'];
		$data['WILAYA']    = $_POST['WILAYA'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['login']     = $_POST['login'];
		echo '<pre>';print_r ($data);echo '<pre>';
		// $this->model->editSave($data);
		// header('location: ' . URL . 'Dnr/view/'.$id.'');
	}
	//***view hemod ***//
	public function view($id) 
	{
        $this->view->title = 'view hemod';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->SeanceSingleList($id);
		$this->view->render($this->route.'/view');
	}
	
	function Seance() 
	{	
	    $this->view->title = 'SEANCE';
		$this->view->render($this->route.'/seance');
	}
	function Seanceok() 
	{
        $data = array();
		$data['DATE'] = $_POST['DATE'];
		$data['HEUR'] = $_POST['HEUR'];
		$data['id'] = $_POST['id'];
		$data['HEUREDD'] = $_POST['HEUREDD'];
		$data['POIDSD'] = $_POST['POIDSD'];
		$data['SYSD'] = $_POST['SYSD'];
		$data['DIAD'] = $_POST['DIAD'];
		$data['HEUREFD'] = $_POST['HEUREFD'];
		$data['POIDSF'] = $_POST['POIDSF'];
		$data['SYSF'] = $_POST['SYSF'];
		$data['DIAF'] = $_POST['DIAF'];
		$data['TYPEDIA'] = $_POST['TYPEDIA'];
		$data['NAPP'] = $_POST['NAPP'];
		$data['ACCSANG'] = $_POST['ACCSANG'];
		$data['IDE'] = $_POST['IDE'];
		$data['MEDECIN'] = $_POST['MEDECIN'];
		$this->view->user = $this->model->createseance($data);
		//echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .$this->route.'/Seance');
	}
	function Bilan() 
	{	
	    $this->view->title = 'Bilan';
		
		$this->view->render($this->route.'/Bilan');
	}
	function Bilanok() 
	{
        $data = array(); 
		$data['DATE'] = $_POST['DATE'];
		$data['HEUR'] = $_POST['HEUR'];
		$data['id'] = $_POST['id'];
		$data['HVB'] =$_POST["HVB"] ;
		$data['HVC'] =$_POST["HVC"] ;
		$data['HIV'] =$_POST["HIV"] ;
		$data['TPHA'] =$_POST["TPHA"] ;
		$data['GB'] =$_POST["GB"] ;
		$data['GR'] =$_POST["GR"] ;
		$data['HB'] =$_POST["HB"] ;
		$data['HT'] =$_POST["HT"] ;
		$data['PLQT'] =$_POST["PLQT"] ;
		$data['TP'] =$_POST["TP"] ;
		$data['INR'] =$_POST["INR"] ;
		$data['VS1H'] =$_POST["VS1H"] ;
		$data['VS2H'] =$_POST["VS2H"] ;
		$data['GLYCE'] =$_POST["GLYCE"] ;
		$data['UREE'] =$_POST["UREE"] ;
		$data['CREAT'] =$_POST["CREAT"] ;
		$data['ACURIQUE'] =$_POST["ACURIQUE"] ;
		$data['BILIT'] =$_POST["BILIT"] ;
		$data['BILID'] =$_POST["BILID"] ;
		$data['TGO'] =$_POST["TGO"] ;
		$data['TGP'] =$_POST["TGP"] ;
		$data['ASLO'] =$_POST["ASLO"] ;
		$data['CRP'] =$_POST["CRP"] ;
		$data['TG'] =$_POST["TG"] ;
		$data['CHOLES'] =$_POST["CHOLES"] ;
		$data['NA'] =$_POST["NA"] ;
		$data['K'] =$_POST["K"] ;
		$data['CA'] =$_POST["CA"] ;
		$data['PHOS'] =$_POST["PHOS"] ;
		$data['CL'] =$_POST["CL"] ;
		$data['CLR'] =2;                 
		$this->view->user = $this->model->createbilan($data);
		//echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .$this->route.'/Bilan');
	}
	
	public function Sortir($id) 
	{
        $this->view->title = 'Sortir hemod';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render($this->route.'/Sortir');
	}
	
	
	
	function Sortirok() 
	{
        $data = array(); 
		$data['DATE'] = $_POST['DATE'];
		$data['MOTIF'] = $_POST['MOTIF'];
		$data['id'] = $_POST['id'];    
		$this->view->user = $this->model->hemodSortirok($data);
		echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .$this->route.'/view/'.$data['id']);
	}
	
	public function Evaluation() 
	{
        $this->view->title = 'Evaluation hemod';
		$this->view->render($this->route.'/Evaluation');
	}
	
	//******************************************************Agenda********************************************************//
	function Agenda() 
	{
	$this->view->title = 'Agenda';
	$url = explode('/',$_GET['url']);
    $this->view->userListviewd = $url[2]; 
	$this->view->userListviewm = $url[3]; 
	$this->view->userListviewa = $url[4]; 
	$this->view->render($this->route.'/Agenda');    
	}
	
	public function createrdv() 
	{
		$data = array();
		 $data['TIRDV']  = $_POST['TIRDV'];
		 $data['TYRDV']  = $_POST['TYRDV'];
		 $data['TXRDV']  = $_POST['TXRDV'];
		 $data['DATERDV'] = $_POST['url4'].'-'.$_POST['url3'].'-'.$_POST['url2'];
		 $this->model->createrdv($data);
        // echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/Agenda/'.$_POST['url2'].'/'.$_POST['url3'].'/'.$_POST['url4']);	
	}
	
	public function deleterdv($id)//la supression de la visite medicale
	{
	$url = explode('/',$_GET['url']);	
	$this->model->deleterdv($id);     
	header('location: ' . URL .$this->route.'/Agenda/'.$url[3].'/'.$url[4].'/'.$url[5]);
	}
	
	//******************************************************CHANGER PHOTOS********************************************************//
	//**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render($this->route.'/upl');    
	}
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
			
				$target_path = $this->uploadLocation.trim($id).".jpg";      
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
		// header('location: ' . URL .$this->route.'/search/0/10?q=&o=NOM');
		$this->view->render($this->route.'/upl');    
	}	
	
	
	
	
	
	
	
	
	
	
	//***ordonnace  ***//
	function ordonnace($id) 
	{	
	    $this->view->title = 'ordonnace';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('hemod/ordonnace');
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
				 header('location:'.URL.'hemod/ordonnace/'.$_POST['id']);
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
	header('location:'.URL.'hemod/ordonnace/'.$_POST['id']);	  
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
			header('location: ' . URL .'hemod/ordonnace/'.$url1[3]); 
		}
	}	
	function supprimePanier(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['ordonnace']);
     header('location: ' . URL .'hemod/ordonnace/'.$url1[2]); 
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
	//***fin ordonnace***//
	
	//***seance hemodialyse  ****//
	
	function searchs()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search seance hemodialyse';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page    limit 2,3
		$this->view->userListviewl =10; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =20; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchs($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchs1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/seance');
	}
	function news() 
	{	
	    $this->view->title = 'SEANCE';
		$this->view->render($this->route.'/news');
	}
	
	function imps() 
	{
	$this->view->title = 'imps';
	$this->view->render($this->route.'/imps');    
	}
	
	public function PROGRAMME() 
	{
        $this->view->title = 'SEANCE  P';
		$this->view->render($this->route.'/PROGRAMME');
	}
	
	
	
	public function URGENCE() 
	{
        $this->view->title = 'SEANCE  P';
		$this->view->render($this->route.'/URGENCE');
	}
	
	public function FAV() 
	{
        $this->view->title = 'SEANCE  FAV';
		$this->view->render($this->route.'/FAV');
	}
	
	
	
	
	
	
	
	//***Donate dnr ***//
	
	public function prenuptial($id) 
	{
        $this->view->title = 'Edit dnr';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('dnr/prenuptial');
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
	
	
	
	
	
	
	
}