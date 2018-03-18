<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Rec extends Controller {

	function __construct() {
	   parent::__construct(); 
	}
	function run()
	{
		$this->model->run();
	}
	//***rec***//
	function index() 
	{
	$this->view->title = 'Search rec';
	$this->view->render('rec/index');    
	}
	//***searchreceveur***//
	function search()
	{ 
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search rec';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word 
		$this->view->userListviewp = $url1[2];   //parametre 2 page                     limit 2,3
		$this->view->userListviewl =13;           //parametre 3 nobre de ligne par page  limit 2,3 
		$this->view->userListviewb =15;          //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render('rec/index');
	}
	//***newrec***//
	public function newrec() 
	{
		$this->view->title = 'create rec';
		$this->view->render('rec/new');
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
		$data['GRABO']     = $_POST['GRABO'];
		$data['GRRH']      = $_POST['GRRH'];
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
		header('location: ' . URL . 'rec/newrec/');
		}
		else
		{
		$last_id=$this->model->create($data);
		header('location: ' . URL . 'rec/discgr/'.$last_id);
		}	
	}
	//***impreceveur***//
	function imp() 
	{
	$this->view->title = 'imp receveur';
	$this->view->render('rec/imp');    
	}
	//***viewreceveur***//
	public function view($id) 
	{
        $this->view->title = 'view rec';
		$this->view->user  = $this->model->userSingleList($id);
		$this->view->user1 = $this->model->nbrdispsl($id);
		$this->view->userListview = $this->model->donSingleList($id);
		$this->view->render('rec/view');
	}
	//***editreceveur***//
	public function edit($id) 
	{
        $this->view->title = 'Edit rec';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render('rec/edit');
	}
	public function editSave($id)
	{
		$data = array();
		$data['id']        = $id;
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
		$data['DATE']      = $_POST['DINS'];
	    $data['GRABO']     = $_POST['GRABO'];
		$data['GRRH1']     = $_POST['GRRH'];
		$data['CRH2'] = $_POST['CRH2'];
		$data['ERH3'] = $_POST['ERH3'];
		$data['CRH4'] = $_POST['CRH4'];
		$data['ERH5'] = $_POST['ERH5'];
		$data['KELL1'] = $_POST['KELL1'];
		$data['KELL2'] = $_POST['KELL2'];
		$this->model->editSave($data);
		header('location: ' . URL . 'rec/view/'.$id.'');
	}
	//***deletereceveur***//
	public function delete($id)           
	{
		$this->model->delete($id);        //la supression du receveur 
		$this->model->deletedisrec($id);  //la supression des transfusions du receveur
		//?????????????????????????????   //reste la mise a jour des poche dans la banque de sang table cgr pfc cps   dis='' datedis=''
		header('location: ' . URL . 'rec');
	}
	
	//***DIS psl cgr pfc cps  ***//
	function discgr($id) 
	{	
	    $this->view->title = 'distribution cgr';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('rec/discgr');
	}
	function dispfc($id) 
	{	
	    $this->view->title = 'distribution pfc';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('rec/dispfc');
	}
	function discps($id) 
	{	
	    $this->view->title = 'distribution cps';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('rec/discps');
	}
	function DISOK() 
	{
        $data = array();
		$data['DATEDIS']    = $_POST['DINS'];
		$data['HEUREDIS']   = $_POST['HINS'];
		
		$data['id']         = $_POST['id'];
	    $data['SEX']        = $_POST['SEXE'];
        $data['AGE']        = $_POST['AGE'];
		
		$data['GRABO']      = $_POST['GRABO'];
		$data['GRRH']       = $_POST['GRRH'];
		$data['CRH2']       = $_POST['CRH2'];
		$data['ERH3']       = $_POST['ERH3'];
		$data['CRH4']       = $_POST['CRH4'];
		$data['ERH5']       = $_POST['ERH5'];
		$data['KELL1']      = $_POST['KELL1'];
		$data['KELL2']      = $_POST['KELL2'];
		
		$data['PSL']        = $_POST['PSL'];
		$data['NDP']        = $_POST['NDP'];
		$data['SERVICE']    = $_POST['SERVICE'];
	    $data['MED']        = $_POST['MED'];
	    $data['DGC']        = $_POST['DGC'];
		
		
		$data['REGION']     = $_POST['REGION'];
		$data['WILAYA']     = $_POST['WILAYA'];
		$data['STRUCTURE']  = $_POST['STRUCTURE'];
		$data['login']      = $_POST['login'];
		
		$id=$_POST['id'];		
	    $this->view->title = 'disok';
		$this->view->user  = $this->model->creatediscgr($data);
		header('location: ' . URL .'rec/discgr/'.$id.'');
		
		echo '<pre>';print_r ($data);echo '<pre>';
		
		
	}

    //**dis par receveur **//
	function DPR() 
	{	
	    $this->view->title = 'DPR';
		$this->view->userListview = $this->model->userlistdpr() ;
		$this->view->render('rec/dpr');
	}


	//**hospitalisation**//
	public function hos() 
	{
		$this->view->title = 'hospitalisation';
		$this->view->render('rec/hos');
	}
	//***ordonnace rec ***//
	function ordonnacerec($id) 
	{	
	    $this->view->title = 'ordonnacerec';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render('rec/ordonnacerec');
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
				 header('location:'.URL.'rec/ordonnacerec/'.$_POST['id']);
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
	header('location:'.URL.'rec/ordonnacerec/'.$_POST['id']);	  
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
			header('location: ' . URL .'rec/ordonnacerec/'.$url1[3]); 
		}
	}	
	function supprimePanier(){
	 $url1 = explode('/',$_GET['url']);	
	 session_start();unset($_SESSION['ordonnace']);
     header('location: ' . URL .'rec/ordonnacerec/'.$url1[2]); 
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
	//***Bilan rec ***//
	function Bilan($id) 
	{	
	    $this->view->title = 'Bilan';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->userListview = $this->model->bilanSingleList($id);
		$this->view->render('rec/Bilan');
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
		header('location: ' . URL .'rec/Bilan/'.$_POST['id']);
	}
	public function deletebilan($id)
	{
    $url = explode('/',$_GET['url']);	
	$this->model->deletebilan($id);
	header('location: ' . URL . 'rec/Bilan/'.$url[3]);    
	}
	
	//**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render('rec/upl');    
	}
	
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		
			if (isset($_FILES))
			{
				//upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				//$uploadLocation = "d:\\mvc/public/webcam/rec/"; 
				$target_path = uploadLocationrec.trim($id).".jpg";      
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
		header('location: ' . URL . 'rec/search/0/10?q=&o=NOM');
		    
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}