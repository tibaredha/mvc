<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class scolaire extends Controller {

    private $route  = 'scolaire';

    private $uploadLocation = "C:\\wamp/www/mvc/public/webcam/ss/"; 

	function __construct() {
	   parent::__construct();
    
	}
	function run()
	{
		$this->model->run();
	}
	
	//******************************************************1ere partie********************************************************//
	//***acceuil scolaire ***//
	function index() 
	{
	$this->view->title = 'Search scolaire';
	$this->view->render($this->route.'/index');    
	}
	
	//***search eleve ***//
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search scolaire';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl = 13     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb = 15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	
	function eleve () 
	{	
	    $this->view->title = 'eleve';	
		$this->view->render($this->route.'/new');
	}
	
	public function createeleve() 
	{
		$data = array();
		// $data['']      = $_POST[''];
		$data['NOM']      = $_POST['NOM'];
		$data['PRENOM']   = $_POST['PRENOM'];
		$data['FILSDE']   = $_POST['FILSDE'];
		$data['ETDE']     = $_POST['ETDE'];
		$data['SEXE']     = $_POST['SEXE'];
		$data['DATENS']   = $_POST['DATENS'];
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['TEL']      = $_POST['TEL'];
		$data['TELF']     = $_POST['TELF'];
		$data['EMAIL']    = $_POST['EMAIL'];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ADRESSE']  = $_POST['ADRESSE'];
		$data['GRABO']    = $_POST['GRABO'];
		$data['GRRH']     = $_POST['GRRH'];
		$data['NEC']      = $_POST['NEC'];
		$data['DATEINS']  = $_POST['DATEINS'];
		$data['WILAYASS'] = $_POST['WILAYASS'];
		$data['COMMUNESS']= $_POST['COMMUNESS'];
		$data['ETASS']    = $_POST['ETASS'];
		$this->model->createeleve($data);
        // echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/eleve/');	
	}
	function imp() 
	{
	$this->view->title = 'Search dnr';
	$this->view->render($this->route.'/imp');    
	}
	//graphe
	//searche scolaire
	
	
	//******************************************************2eme partie********************************************************//
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
				//upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				//
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
	public function view($id) 
	{
        $this->view->title = 'view eleve';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->scolSingleList($id);
		$this->view->render($this->route.'/view');
	}
	function vmsid($id) 
	{
	$this->view->title = 'vms';
	$this->view->user = $this->model->userSingleList($id);
	$this->view->render($this->route.'/vmsid');    
	}
	function vms() 
	{
	$this->view->title = 'vms';
	$this->view->render($this->route.'/vms');    
	}
	
	
	public function create() 
	{
		$data = array();
		// $data['']      = $_POST[''];
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['NEC']      = $_POST['NEC'];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ETA']      = $_POST['ETA'];
		$data['DATE']     = $_POST['DATE'];
		$data['PALIER']     = $_POST['PALIER'];
		
		if (isset ($_POST['CPS'])) {$data['CPS']=1;} else {$data['CPS']=0;}
		if (isset ($_POST['PPS'])) {$data['PPS']=1;} else {$data['PPS']=0;}
		if (isset ($_POST['OS'])) {$data['OS']=1;}   else {$data['OS']=0;}
		if (isset ($_POST['PS'])) {$data['PS']=1;}   else {$data['PS']=0;}
		if (isset ($_POST['AD1'])) {$data['AD1']=1;} else {$data['AD1']=0;}
		if (isset ($_POST['AD2'])) {$data['AD2']=1;} else {$data['AD2']=0;}
		if (isset ($_POST['AD3'])) {$data['AD3']=1;} else {$data['AD3']=0;}
		if (isset ($_POST['AD4'])) {$data['AD4']=1;} else {$data['AD4']=0;}
		if (isset ($_POST['AD5'])) {$data['AD5']=1;} else {$data['AD5']=0;}
		if (isset ($_POST['AD6'])) {$data['AD6']=1;} else {$data['AD6']=0;}
		if (isset ($_POST['AD7'])) {$data['AD7']=1;} else {$data['AD7']=0;}
		if (isset ($_POST['AD8'])) {$data['AD8']=1;} else {$data['AD8']=0;}
		if (isset ($_POST['AD9'])) {$data['AD9']=1;} else {$data['AD9']=0;}
		if (isset ($_POST['AD10'])) {$data['AD10']=1;} else {$data['AD10']=0;}
		
		if (isset ($_POST['AD11'])) {$data['AD11']=1;} else {$data['AD11']=0;}
		if (isset ($_POST['AD12'])) {$data['AD12']=1;} else {$data['AD12']=0;}
		if (isset ($_POST['AD13'])) {$data['AD13']=1;} else {$data['AD13']=0;}
		if (isset ($_POST['AD14'])) {$data['AD14']=1;} else {$data['AD14']=0;}
		if (isset ($_POST['AD15'])) {$data['AD15']=1;} else {$data['AD15']=0;}
		if (isset ($_POST['AD16'])) {$data['AD16']=1;} else {$data['AD16']=0;}
		if (isset ($_POST['AD17'])) {$data['AD17']=1;} else {$data['AD17']=0;}
		if (isset ($_POST['AD18'])) {$data['AD18']=1;} else {$data['AD18']=0;}
		if (isset ($_POST['AD19'])) {$data['AD19']=1;} else {$data['AD19']=0;}
		if (isset ($_POST['AD20'])) {$data['AD20']=1;} else {$data['AD20']=0;}
		
		if (isset ($_POST['AD21'])) {$data['AD21']=1;} else {$data['AD21']=0;}
		if (isset ($_POST['AD22'])) {$data['AD22']=1;} else {$data['AD22']=0;}
		if (isset ($_POST['AD23'])) {$data['AD23']=1;} else {$data['AD23']=0;}
		if (isset ($_POST['AD24'])) {$data['AD24']=1;} else {$data['AD24']=0;}
		if (isset ($_POST['AD25'])) {$data['AD25']=1;} else {$data['AD25']=0;}
		$this->model->create($data);
        //echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/vms/');	
	}
	public function createid($id) 
	{
		$data = array();
		$data['id']       = $_POST['id'];
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['NEC']      = $id;
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ETA']      = $_POST['ETA'];
		$data['DATE']     = $_POST['DATE'];
		$data['PALIER']   = $_POST['PALIER'];
		
		if (isset ($_POST['CPS'])) {$data['CPS']=1;} else {$data['CPS']=0;}
		if (isset ($_POST['PPS'])) {$data['PPS']=1;} else {$data['PPS']=0;}
		if (isset ($_POST['OS'])) {$data['OS']=1;}   else {$data['OS']=0;}
		if (isset ($_POST['PS'])) {$data['PS']=1;}   else {$data['PS']=0;}
		
		if (isset ($_POST['AD1'])) {$data['AD1']=1;} else {$data['AD1']=0;}
		if (isset ($_POST['AD2'])) {$data['AD2']=1;} else {$data['AD2']=0;}
		if (isset ($_POST['AD3'])) {$data['AD3']=1;} else {$data['AD3']=0;}
		if (isset ($_POST['AD4'])) {$data['AD4']=1;} else {$data['AD4']=0;}
		if (isset ($_POST['AD5'])) {$data['AD5']=1;} else {$data['AD5']=0;}
		if (isset ($_POST['AD6'])) {$data['AD6']=1;} else {$data['AD6']=0;}
		if (isset ($_POST['AD7'])) {$data['AD7']=1;} else {$data['AD7']=0;}
		if (isset ($_POST['AD8'])) {$data['AD8']=1;} else {$data['AD8']=0;}
		if (isset ($_POST['AD9'])) {$data['AD9']=1;} else {$data['AD9']=0;}
		if (isset ($_POST['AD10'])) {$data['AD10']=1;} else {$data['AD10']=0;}
		
		if (isset ($_POST['AD11'])) {$data['AD11']=1;} else {$data['AD11']=0;}
		if (isset ($_POST['AD12'])) {$data['AD12']=1;} else {$data['AD12']=0;}
		if (isset ($_POST['AD13'])) {$data['AD13']=1;} else {$data['AD13']=0;}
		if (isset ($_POST['AD14'])) {$data['AD14']=1;} else {$data['AD14']=0;}
		if (isset ($_POST['AD15'])) {$data['AD15']=1;} else {$data['AD15']=0;}
		if (isset ($_POST['AD16'])) {$data['AD16']=1;} else {$data['AD16']=0;}
		if (isset ($_POST['AD17'])) {$data['AD17']=1;} else {$data['AD17']=0;}
		if (isset ($_POST['AD18'])) {$data['AD18']=1;} else {$data['AD18']=0;}
		if (isset ($_POST['AD19'])) {$data['AD19']=1;} else {$data['AD19']=0;}
		if (isset ($_POST['AD20'])) {$data['AD20']=1;} else {$data['AD20']=0;}
		
		if (isset ($_POST['AD21'])) {$data['AD21']=1;} else {$data['AD21']=0;}
		if (isset ($_POST['AD22'])) {$data['AD22']=1;} else {$data['AD22']=0;}
		if (isset ($_POST['AD23'])) {$data['AD23']=1;} else {$data['AD23']=0;}
		if (isset ($_POST['AD24'])) {$data['AD24']=1;} else {$data['AD24']=0;}
		if (isset ($_POST['AD25'])) {$data['AD25']=1;} else {$data['AD25']=0;}
		$this->model->create($data);
		$this->model->updateeleve($data);
        echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/view/'.$id);	
	}
	
	//***editeleve***//
	public function edit($id) 
	{
        $this->view->title = 'Edit dnr';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->route.'/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
		$data['NOM']      = $_POST['NOM'];
		$data['PRENOM']   = $_POST['PRENOM'];
		$data['FILSDE']   = $_POST['FILSDE'];
		$data['ETDE']     = $_POST['ETDE'];
		$data['SEXE']     = $_POST['SEXE'];
		$data['DATENS']   = $_POST['DATENS'];
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['TEL']      = $_POST['TEL'];
		$data['TELF']     = $_POST['TELF'];
		$data['EMAIL']    = $_POST['EMAIL'];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ADRESSE']  = $_POST['ADRESSE'];
		$data['GRABO']    = $_POST['GRABO'];
		$data['GRRH']     = $_POST['GRRH'];
		$data['NEC']      = $_POST['NEC'];
		$data['DATEINS']  = $_POST['DATEINS'];
		$data['WILAYASS'] = $_POST['WILAYASS'];
		$data['COMMUNESS']= $_POST['COMMUNESS'];
		$data['ETASS']    = $_POST['ETASS'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL .$this->route.'/view/'.$id.'');
	}
	//***deleteeleve***//
	public function delete($id)
	{
	$this->model->deleteeleve($id);     //la supression eleve 
	$this->model->deletevmseleve($id);  //la supression des visite  eleve       
	header('location: ' . URL .$this->route.'/search/0/10?q=&o=NOM');
	}
	//******************************************************3eme partie********************************************************//
	function Etablissement() 
	{	
	    $this->view->title = 'Etablissement';	
		$this->view->render($this->route.'/Etablissement');
	}
	
	public function createetabscolaire() 
	{
		$data = array();
		// $data['']      = $_POST[''];
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['ETA']      = $_POST['ETA'];
		$data['DATE']     = $_POST['DATE'];
		$data['ADRESSE']  = $_POST['ADRESSE'];
		$data['TYPEETA']  = $_POST['TYPEETA'];
		$data['CLASES']   = $_POST['CLASES'];
		$data['CANTINE']  = $_POST['CANTINE'];
		$data['AEP']      = $_POST['AEP'];
		$data['SANITAIRE']= $_POST['SANITAIRE'];
		$this->model->createetabscolaire($data);
        //echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: '.URL .$this->route.'/Etablissement/');	
	}
	function Effectif() 
	{	
	    $this->view->title = 'Effectif';	
		$this->view->render($this->route.'/Effectif');
	}
	
	public function createeffectif() 
	{
		$data = array();
		// $data['']      = $_POST[''];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		if (isset($_POST['ETA'])){$data['ETA']= $_POST['ETA'];} else {$data['ETA']= '1';};    
		$data['DATE']     = $_POST['DATE'];
		$data['1ap']      = $_POST['1ap'];
		$data['2ap']      = $_POST['2ap'];
		$data['3ap']      = $_POST['3ap'];
		$data['4ap']      = $_POST['4ap'];
		$data['5ap']      = $_POST['5ap'];
		$data['1am']      = $_POST['1am'];
		$data['2am']      = $_POST['2am'];
		$data['3am']      = $_POST['3am'];
		$data['4am']      = $_POST['4am'];
		$data['1as']      = $_POST['1as'];
		$data['2as']      = $_POST['2as'];
		$data['3as']      = $_POST['3as'];
		$this->model->createeffectif($data);
        // echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: '.URL .$this->route.'/Effectif/');	
	}
	//******************************************************4eme partie********************************************************//
	function Suivi() 
	{	
	    $this->view->title = 'Suivi';
		$this->view->userListview = $this->model->suiviemedical() ;
		$this->view->render($this->route.'/Suivi');
	}

	//******************************************************5eme partie********************************************************//
	function chsl() 
	{	
	    $this->view->title = 'chsl';	
		$this->view->render($this->route.'/chsl');
	}
	
	public function createchsl() 
	{
		$data = array();
		// $data['']      = $_POST[''];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ETA']      = $_POST['ETA'];
		$data['STCLASES']   = $_POST['STCLASES'];
		$data['STCANTINE']  = $_POST['STCANTINE'];
		$data['STAEP']      = $_POST['STAEP'];
		$data['STSANITAIRE']= $_POST['STSANITAIRE'];
		$data['STENVIRONNEMENT']= $_POST['STENVIRONNEMENT'];
		$data['RGCLASES']   = $_POST['RGCLASES'];
		$data['RGCANTINE']  = $_POST['RGCANTINE'];
		$data['RGAEP']      = $_POST['RGAEP'];
		$data['RGSANITAIRE']= $_POST['RGSANITAIRE'];
		$data['RGENVIRONNEMENT']= $_POST['RGENVIRONNEMENT'];
		$data['DATE']     = $_POST['DATE'];
		$this->model->createchsl($data);
        //echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/chsl/');	
	}
	//******************************************************6eme partie********************************************************//
	function Evaluation() 
	{	
	    $this->view->title = 'Evaluation';	
		$this->view->render($this->route.'/Evaluation');
	}
	
	//******************************************************7eme partie********************************************************//
	//***ordonnace scolaire ***//
	
	public $route1 = 'ordonnance';
	function ordonnance($id) 
	{	
	    $this->view->title = 'ordonnance';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render($this->route.'/'.$this->route1);
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
		$totaltrt=$doseparprise*$nbrdrfoisparjours*$nbrdejours; 	
		session_start();
		   if ($this->creationPanier() && !$this->isVerrouille())
		   {
		   $positionProduit = array_search($libelleProduit,$_SESSION['ordonnace']['libelleProduit']);
			  if ($positionProduit !== false)
			  {
				 header('location:'.URL.$this->route.'/'.$this->route1.'/'.$_POST['id']);
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
	 header('location:'.URL.$this->route.'/'.$this->route1.'/'.$_POST['id']);
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
			header('location:'.URL.$this->route.'/'.$this->route1.'/'.$url1[3]);	
		}
	}	
	function supprimePanier(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['ordonnace']);
     header('location:'.URL.$this->route.'/'.$this->route1.'/'.$url1[2]);	
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
	//***fin ordonnace ***//
	//******************************************************8eme partie********************************************************//
	public function editscolaire($id) 
	{
        $this->view->title = 'editscolaire';
		$this->view->user = $this->model->userSingleLists($id);
		$this->view->render($this->route.'/editscolaire');
	}
	
	public function editscolaireok($id) 
	{
		$data = array();
		$data['id']      = $id;
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['NEC']      = $_POST['NEC'];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ETA']      = $_POST['ETA'];
		$data['DATE']     = $_POST['DATE'];
		$data['PALIER']     = $_POST['PALIER'];

		if (isset ($_POST['CPS'])) {$data['CPS']=1;} else {$data['CPS']=0;}
		if (isset ($_POST['PPS'])) {$data['PPS']=1;} else {$data['PPS']=0;}
		if (isset ($_POST['OS'])) {$data['OS']=1;}   else {$data['OS']=0;}
		if (isset ($_POST['PS'])) {$data['PS']=1;}   else {$data['PS']=0;}
		
		if (isset ($_POST['AD1'])) {$data['AD1']=1;} else {$data['AD1']=0;}
		if (isset ($_POST['AD2'])) {$data['AD2']=1;} else {$data['AD2']=0;}
		if (isset ($_POST['AD3'])) {$data['AD3']=1;} else {$data['AD3']=0;}
		if (isset ($_POST['AD4'])) {$data['AD4']=1;} else {$data['AD4']=0;}
		if (isset ($_POST['AD5'])) {$data['AD5']=1;} else {$data['AD5']=0;}
		if (isset ($_POST['AD6'])) {$data['AD6']=1;} else {$data['AD6']=0;}
		if (isset ($_POST['AD7'])) {$data['AD7']=1;} else {$data['AD7']=0;}
		if (isset ($_POST['AD8'])) {$data['AD8']=1;} else {$data['AD8']=0;}
		if (isset ($_POST['AD9'])) {$data['AD9']=1;} else {$data['AD9']=0;}
		if (isset ($_POST['AD10'])) {$data['AD10']=1;} else {$data['AD10']=0;}
		
		if (isset ($_POST['AD11'])) {$data['AD11']=1;} else {$data['AD11']=0;}
		if (isset ($_POST['AD12'])) {$data['AD12']=1;} else {$data['AD12']=0;}
		if (isset ($_POST['AD13'])) {$data['AD13']=1;} else {$data['AD13']=0;}
		if (isset ($_POST['AD14'])) {$data['AD14']=1;} else {$data['AD14']=0;}
		if (isset ($_POST['AD15'])) {$data['AD15']=1;} else {$data['AD15']=0;}
		if (isset ($_POST['AD16'])) {$data['AD16']=1;} else {$data['AD16']=0;}
		if (isset ($_POST['AD17'])) {$data['AD17']=1;} else {$data['AD17']=0;}
		if (isset ($_POST['AD18'])) {$data['AD18']=1;} else {$data['AD18']=0;}
		if (isset ($_POST['AD19'])) {$data['AD19']=1;} else {$data['AD19']=0;}
		if (isset ($_POST['AD20'])) {$data['AD20']=1;} else {$data['AD20']=0;}
		
		if (isset ($_POST['AD21'])) {$data['AD21']=1;} else {$data['AD21']=0;}
		if (isset ($_POST['AD22'])) {$data['AD22']=1;} else {$data['AD22']=0;}
		if (isset ($_POST['AD23'])) {$data['AD23']=1;} else {$data['AD23']=0;}
		if (isset ($_POST['AD24'])) {$data['AD24']=1;} else {$data['AD24']=0;}
		if (isset ($_POST['AD25'])) {$data['AD25']=1;} else {$data['AD25']=0;}
		$this->model->editscolaireok($data);
        // echo '<pre>';print_r ($data);echo '<pre>';	
		header('location: ' . URL .$this->route.'/view/'.$_POST['NEC']);	
	}
	
	public function deletescolaire($id)//la supression de la visite medicale
	{
	$url = explode('/',$_GET['url']);	
	$this->model->deletescolaire($id);     
	header('location: ' . URL .$this->route.'/view/'.$url[3]);
	}
	//******************************************************9eme partie********************************************************//
	
	function vac() 
	{
	$this->view->title = 'vms';
	$this->view->render($this->route.'/vac');    
	}
	
	
	public function createvac() 
	{
		$data = array();
		// $data['']      = $_POST[''];
		$data['WILAYAN']  = $_POST['WILAYAN'];
		$data['COMMUNEN'] = $_POST['COMMUNEN'];
		$data['NEC']      = $_POST['NEC'];
		$data['WILAYAR']  = $_POST['WILAYAR'];
		$data['COMMUNER'] = $_POST['COMMUNER'];
		$data['ETA']      = $_POST['ETA'];
		$data['DATE']     = $_POST['DATE'];
		$data['PALIER']     = $_POST['PALIER'];
		
		if (isset ($_POST['CPS'])) {$data['CPS']=1;} else {$data['CPS']=0;}
		if (isset ($_POST['PPS'])) {$data['PPS']=1;} else {$data['PPS']=0;}
		if (isset ($_POST['OS'])) {$data['OS']=1;}   else {$data['OS']=0;}
		if (isset ($_POST['PS'])) {$data['PS']=1;}   else {$data['PS']=0;}
	
		//$this->model->createvac($data);
        echo '<pre>';print_r ($data);echo '<pre>';	
		//header('location: ' . URL .$this->route.'/vac/');	
	}
	
	//******************************************************10eme partie********************************************************//
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
	
	//******************************************************11eme partie********************************************************//
	
	
	
	
	
	
	
	
	
}