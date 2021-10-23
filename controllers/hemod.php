<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class hemod extends Controller {

    private $route  = 'hemod';
    private $uploadLocation = "C:\\wamp/www/mvc/public/webcam/hemo/"; 

	function __construct() {
	   parent::__construct();
       $this->view->js = array('hemod/js/js.js');
	}
	function run()
	{
		$this->model->run();
	}
	function index() 
	{
	$this->view->title = 'Search hemod';
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
		$data['TPHA']        = $_POST['TPHA'];
		$data['CAUSE']       = $_POST['CAUSE'];
		$data['COMOR']       = $_POST['COMOR'];
		$data['DPD']         = $_POST['DPD'];
		$data['POIDS']       = $_POST['POIDS'];
		$data['NSS']         = $_POST['NSS'];
		$data['ASSURE']      = $_POST['ASSURE'];
		$data['REGION']      = $_POST['REGION'];
		$data['WILAYA']      = $_POST['WILAYA'];
		$data['STRUCTURE']   = $_POST['STRUCTURE'];
		$data['login']       = $_POST['login'];
		
		$data['GROUPE']      = $_POST['GROUPE'];
		$data['JOURS']       = $_POST['JOURS'];
		$data['BRANCHEMENT'] = $_POST['BRANCHEMENT'];
		$data['FORFAIT']     = $_POST['FORFAIT'];
		$data['DNASSURE']    = $_POST['DNASSURE'];
		$data['QUALITE']     = $_POST['QUALITE'];
		$data['CAISSE']      = $_POST['CAISSE'];
		$data['NCP']         = $_POST['NCP'];
		$data['ADRESSENSS']  = $_POST['ADRESSENSS'];
		$data['APP']         = $_POST['APP'];
		$data['TRANS']       = $_POST['TRANS'];
		// $this->model->create($data);
		// header('location: ' . URL .$this->route.'/'.$last_id);
		echo '<pre>';print_r ($data);echo '<pre>';
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
	
	//FACTURE //
	public function FACTURE ($id) 
	{
        $this->view->title = 'Edit Facture';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/Facture');
	}
	//***//
	public function Bordereau () 
	{
        $this->view->title = 'Edit Bordereau';
		
		$this->view->render($this->route.'/Bordereau');
	}
	public function Bilananemie () 
	{
        $this->view->title = 'Edit Bilananemie';
		
		$this->view->render($this->route.'/Bilananemie');
	}
	
	public function sbilans ($id) 
	{
        $this->view->title = 'sbilans';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/sbilans');
	}
	
	public function dbilans ($id) 
	{
        $this->view->title = 'dbilans';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/dbilans');
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
		$data['DATENS']    = $_POST['DATENS'] ;
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
		$data['GROUPE']      = $_POST['GROUPE'];
		$data['JOURS']       = $_POST['JOURS'];
		$data['BRANCHEMENT'] = $_POST['BRANCHEMENT'];
		$data['FORFAIT']     = $_POST['FORFAIT'];
		$data['DNASSURE']    = $_POST['DNASSURE'];
		$data['QUALITE']     = $_POST['QUALITE'];
		$data['CAISSE']      = $_POST['CAISSE'];
		$data['NCP']         = $_POST['NCP'];
		$data['ADRESSENSS']  = $_POST['ADRESSENSS'];
		$data['APP']         = $_POST['APP'];
		$data['TRANS']     = $_POST['TRANS'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL . 'hemod/view/'.$id.'');
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
	function Seanceok($id) 
	{
        $data = array();
		$data['id'] = $id;
		$data['DATE'] = $_POST['DATE'];
		$data['HEUR'] = $_POST['HEUR'];
		$data['FORFAIT'] = $_POST['FORFAIT'];
		$data['HEUREDD'] = $_POST['HEUREDD'];
		$data['MEDECIN'] = $_POST['MEDECIN'];
		$data['IDE'] = $_POST['IDE'];
		$data['PI'] = $_POST['PI'];
		$data['PJ'] = $_POST['PJ'];
		$data['PP'] = $_POST['PP'];
		$data['EFC'] = $_POST['EFC'];
		$data['UNIP'] = $_POST['UNIP'];
		$data['EC'] = $_POST['EC'];
		$data['TYPEDIA'] = $_POST['TYPEDIA'];
		$data['ACCSANG'] = $_POST['ACCSANG'];
		$data['HEPARINE'] = $_POST['HEPARINE'];
		$data['DDIA'] = $_POST['DDIA'];
		$data['PAP'] = $_POST['PAP'];
		$data['UFPH'] = $_POST['UFPH'];
		$data['UFT'] = $_POST['UFT'];
		$data['EPO'] = $_POST['EPO'];
		$data['FER'] = $_POST['FER'];
		$data['AUTRES'] = $_POST['AUTRES'];
		
	    $data['DEX'] = $_POST['DEX'];
		$data['TA'] = $_POST['TA'];
		$data['POO'] = $_POST['POO'];
		if (isset ($_POST['SCO'])) {$data['SCO']=1;} else {$data['SCO']=0;}
		$data['AUTRESAP'] = $_POST['AUTRESAP'];
		
		$data['HEMODIALYSEUR'] = $_POST['HEMODIALYSEUR'];
		$data['NAPP'] = $_POST['NAPP'];
		$data['BAIN'] = $_POST['BAIN'];
		$data['RINC'] = $_POST['RINC'];
		
		$data['HRD1'] = $_POST['HRD1'];
		$data['UFH1'] = $_POST['UFH1'];
	    $data['UFE1'] = $_POST['UFE1'];
		$data['TAS1'] = $_POST['TAS1'];
		$data['TAD1'] = $_POST['TAD1'];
		$data['DES1'] = $_POST['DES1'];
		$data['PRV1'] = $_POST['PRV1'];
		$data['DEB1'] = $_POST['DEB1'];
		$data['PTM1'] = $_POST['PTM1'];
		$data['CDC1'] = $_POST['CDC1'];
		$data['OBS1'] = $_POST['OBS1'];
	
		$data['HRD2'] = $_POST['HRD2'];
		$data['UFH2'] = $_POST['UFH2'];
	    $data['UFE2'] = $_POST['UFE2'];
		$data['TAS2'] = $_POST['TAS2'];
		$data['TAD2'] = $_POST['TAD2'];
		$data['DES2'] = $_POST['DES2'];
		$data['PRV2'] = $_POST['PRV2'];
		$data['DEB2'] = $_POST['DEB2'];
		$data['PTM2'] = $_POST['PTM2'];
		$data['CDC2'] = $_POST['CDC2'];
		$data['OBS2'] = $_POST['OBS2'];
	
		$data['HRD3'] = $_POST['HRD3'];
		$data['UFH3'] = $_POST['UFH3'];
	    $data['UFE3'] = $_POST['UFE3'];
		$data['TAS3'] = $_POST['TAS3'];
		$data['TAD3'] = $_POST['TAD3'];
		$data['DES3'] = $_POST['DES3'];
		$data['PRV3'] = $_POST['PRV3'];
		$data['DEB3'] = $_POST['DEB3'];
		$data['PTM3'] = $_POST['PTM3'];
		$data['CDC3'] = $_POST['CDC3'];
		$data['OBS3'] = $_POST['OBS3'];
	
		$data['HRD4'] = $_POST['HRD4'];
		$data['UFH4'] = $_POST['UFH4'];
	    $data['UFE4'] = $_POST['UFE4'];
		$data['TAS4'] = $_POST['TAS4'];
		$data['TAD4'] = $_POST['TAD4'];
		$data['DES4'] = $_POST['DES4'];
		$data['PRV4'] = $_POST['PRV4'];
		$data['DEB4'] = $_POST['DEB4'];
		$data['PTM4'] = $_POST['PTM4'];
		$data['CDC4'] = $_POST['CDC4'];
		$data['OBS4'] = $_POST['OBS4'];
	
		$data['HRD5'] = $_POST['HRD5'];
		$data['UFH5'] = $_POST['UFH5'];
	    $data['UFE5'] = $_POST['UFE5'];
		$data['TAS5'] = $_POST['TAS5'];
		$data['TAD5'] = $_POST['TAD5'];
		$data['DES5'] = $_POST['DES5'];
		$data['PRV5'] = $_POST['PRV5'];
		$data['DEB5'] = $_POST['DEB5'];
		$data['PTM5'] = $_POST['PTM5'];
		$data['CDC5'] = $_POST['CDC5'];
		$data['OBS5'] = $_POST['OBS5'];
	
		$data['HEUREFD'] = $_POST['HEUREFD'];
		$data['POIDSF'] = $_POST['POIDSF'];
		$data['PPFS'] = $_POST['PPFS'];
		$data['VST'] = $_POST['VST'];
		$data['COMM'] = $_POST['COMM'];
	    
		// $data[''] = $_POST[''];
		// $data['SYSD'] = $_POST['SYSD'];
		// $data['DIAD'] = $_POST['DIAD'];
		// $data['SYSF'] = $_POST['SYSF'];
		// $data['DIAF'] = $_POST['DIAF'];
		
		$this->view->user = $this->model->createseance($data);
		// echo '<pre>';print_r ($data);echo '<pre>';
		header('location: ' . URL .$this->route.'/search/0/10?o=NOM&q=');
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
		$data['FERS'] =$_POST["FERS"] ;
		$data['FERE'] =$_POST["FERE"] ;
		$this->view->user = $this->model->createbilan($data);
		// echo '<pre>';print_r ($data);echo '<pre>';
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
	//***SEANCE HEMODIALYSE***//
	function creationseance(){
	   if (!isset($_SESSION['seance'])){
		$_SESSION['seance']=array();
		$_SESSION['seance']['HD']    = array();
		$_SESSION['seance']['UFPH']  = array();
		$_SESSION['seance']['UFEFF'] = array();
		$_SESSION['seance']['TAS']   = array();
		$_SESSION['seance']['TAD']   = array();
		$_SESSION['seance']['DS']    = array();
		$_SESSION['seance']['PV']    = array();
		$_SESSION['seance']['DB']    = array();
		$_SESSION['seance']['PTM']   = array();
		$_SESSION['seance']['COND']  = array();
		$_SESSION['seance']['OBS']   = array();
		$_SESSION['seance']['verrou']= false;
	   }
	   return true;
	}
	function isVerrouilleseance(){
	   if (isset($_SESSION['seance']) && $_SESSION['seance']['verrou'])
	   return true;
	   else
	   return false;
	}
	function ajouterseance($id)
	{
	$HD=$_POST['HD'];
	$UFPH=$_POST['UFPH'];
	$UFEFF=$_POST['UFEFF'];
	$TAS=$_POST['TAS'];
	$TAD=$_POST['TAD'];
	$DS=$_POST['DS'];
	$PV=$_POST['PV'];
	$DB=$_POST['DB'];
	$PTM=$_POST['PTM'];
	$COND=$_POST['COND'];
	$OBS=$_POST['OBS'];
	session_start();
		   if ($this->creationseance() && !$this->isVerrouilleseance())
		   {
		   $positionProduit = array_search($HD,$_SESSION['seance']['HD']);
			  if ($positionProduit !== false)
			  {
				 header('location:'.URL.'hemod/news/'.$id);
			  }
			  else
			  {
				array_push( $_SESSION['seance']['HD'],$HD);
				array_push( $_SESSION['seance']['UFPH'],$UFPH);
				array_push( $_SESSION['seance']['UFEFF'],$UFEFF);
				array_push( $_SESSION['seance']['TAS'],$TAS);
				array_push( $_SESSION['seance']['TAD'],$TAD);
				array_push( $_SESSION['seance']['DS'],$DS);
				array_push( $_SESSION['seance']['PV'],$PV);
				array_push( $_SESSION['seance']['DB'],$DB);
				array_push( $_SESSION['seance']['PTM'],$PTM);
				array_push( $_SESSION['seance']['COND'],$COND);
				array_push( $_SESSION['seance']['OBS'],$OBS);	
			  }			      
		   }
	header('location:'.URL.'hemod/news/'.$id);
     // echo '<pre>';print_r ($_SESSION);echo '<pre>';
	}
	function compterseance()
	{
		if (isset($_SESSION['seance']))
		return count($_SESSION['seance']['HD']);
		else
		return 0;
	}
	function supprimeseance(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['seance']);
     header('location: ' . URL .'hemod/news/'.$url1[2]); 
	}
	//supprimerSurveillance
	function supprimerSurveillance($HD)
	{
	$url1 = explode('/',$_GET['url']);	
		session_start();
		if ($this->creationseance() && !$this->isVerrouilleseance())
		{
			$tmp=array();
			$tmp['HD']    = array();
			$tmp['UFPH']    = array();
			$tmp['UFEFF']    = array();
			$tmp['TAS']    = array();
			$tmp['TAD']    = array();
			$tmp['DS']    = array();
			$tmp['PV']    = array();
			$tmp['DB']    = array();
			$tmp['PTM']    = array();
			$tmp['COND']    = array();
			$tmp['OBS']    = array();
			$tmp['verrou'] = $_SESSION['seance']['verrou'];
			
			for($i = 0; $i < count($_SESSION['seance']['HD']); $i++)
			{
				if ($_SESSION['seance']['HD'][$i] !== $HD)
				{
				array_push( $tmp['HD'],$_SESSION['seance']['HD'][$i]);
				array_push( $tmp['UFPH'],$_SESSION['seance']['UFPH'][$i]);
				array_push( $tmp['UFEFF'],$_SESSION['seance']['UFEFF'][$i]);
				array_push( $tmp['TAS'],$_SESSION['seance']['TAS'][$i]);
				array_push( $tmp['TAD'],$_SESSION['seance']['TAD'][$i]);
				array_push( $tmp['DS'],$_SESSION['seance']['DS'][$i]);
				array_push( $tmp['PV'],$_SESSION['seance']['PV'][$i]);
				array_push( $tmp['DB'],$_SESSION['seance']['DB'][$i]);
				array_push( $tmp['PTM'],$_SESSION['seance']['PTM'][$i]);
				array_push( $tmp['COND'],$_SESSION['seance']['COND'][$i]);
				array_push( $tmp['OBS'],$_SESSION['seance']['OBS'][$i]);
				}
			}
			$_SESSION['seance'] =  $tmp;
			unset($tmp);
			header('location: ' . URL .'hemod/news/'.$url1[3]); 
		}
	}	
	
	
	
	
	
	//***//
	
	
	
	
	
	
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
	function news($id) 
	{	
	    $this->view->title = 'SEANCE';
		$this->view->user =$this->model->userSingleList($id);
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