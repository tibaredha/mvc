<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Eva extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	//***__dnr__***//
	function index() 
	{
	$this->view->title = 'evaluation';
	$this->view->render('eva/index');    
	}
	
	function eph() 
	{
	$this->view->title = 'evaluation eph';
	$this->view->render('eva/eph');    
	}
	
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render('eva/upl');    
	}
	function download() 
	{
	$this->view->title = 'download';
	$this->view->render('eva/download');    
	}
	function upl1() 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
		//echo 'ok post ';
			if (isset($_FILES))
			{
				// echo 'ok  fille ';
				// echo '<pre>';
				// print_r ($_FILES);
				// echo '<pre>';
				// echo $_FILES['upfile']['name'];echo '<br/>';
				// upload_max_filesize=10M   A MODIFIER DANS PHP.INI
				$uploadLocation = "d:\\mvc/upload/";
				$target_path = $uploadLocation.basename($_FILES['upfile']['name']);
				// echo $target_path;echo '<br/>';
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
		$this->view->render('eva/upl');    
	}
	
	// function imp() 
	// {
	// $this->view->title = 'Search dnr';
	// $this->view->render('dnr/imp');    
	// }
	// public function pdf() 
	// {
	// require 'pdf.php';	
	// }
	// function run()
	// {
		// $this->model->run();
	// }
	// function search()
	// {
	    // $url1 = explode('/',$_GET['url']);	
		// $this->view->title = 'Search dnr';
	    // $this->view->userListviewo = $_GET['o']; //criter de choix
	    // $this->view->userListviewq = $_GET['q']; //key word  
		// $this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		// $this->view->userListviewl =5      ; // parametre 3 nobre de ligne par page  limit 2,3 
		// $this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		// $this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		// $this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		// $this->view->render('dnr/index');
	// }
	// public function edit($id) 
	// {
        // $this->view->title = 'Edit dnr';
		// $this->view->user = $this->model->userSingleList($id);
		// $this->view->render('dnr/edit');
	// }
	// public function editSave($id)
	// {
		// $data = array();
		// $data['id']      = $id;
		// $data['NOM']     = $_POST['NOM'];
		// $data['PRENOM']  = $_POST['PRENOM'];
		// $data['DATE']    = $_POST['DATE'];
	    // $data['GRABO']   = $_POST['GRABO'];
	    // $data['GRRH']    = $_POST['GRRH1'];
		// $data['TELEPHONE']    = $_POST['TELEPHONE'];
		
		// $this->model->editSave($data);
		// header('location: ' . URL . 'Dnr/view/'.$id.'');
	// }
	// public function delete($id)
	// {
		// $this->model->delete($id);      // la supression du donneur 
		// $this->model->deletednrdon($id);// la supression des dons du donneur
                                       // reste la suppression des poche dans la banque de sang  table cgr pfc cps 		
		// header('location: ' . URL . 'Dnr');
	// }
	// public function newdnr() 
	// {
		// $this->view->title = 'create dnr';
		// $this->view->wilayaview = $this->model->wilayamodel();
		// $this->view->render('dnr/new');
	// }
	// public function create() 
	// {
		// $data = array();
		// $data['DINS']      = $_POST['DINS'];
		// $data['HINS']      = $_POST['HINS'];
		// $data['NOM']       = $_POST['NOM'];
		// $data['PRENOM']    = $_POST['PRENOM'];
		// $data['SEXE']      = $_POST['SEXE'];
		// $data['DATENS']    = $_POST['DATENS'];
		// $data['WILAYAN']   = $_POST['WILAYAN'];
		// $data['COMMUNEN']  = $_POST['COMMUNEN'];
		// $data['WILAYAR']   = $_POST['WILAYAR'];
		// $data['COMMUNER']  = $_POST['COMMUNER'];
		// $data['ADRESSE']   = $_POST['ADRESSE'];
		// $data['TEL']       = $_POST['TEL'];
		// $data['REGION']    = $_POST['REGION'];
		// $data['WILAYA']    = $_POST['WILAYA'];
		// $data['STRUCTURE'] = $_POST['STRUCTURE'];
		// $data['login']     = $_POST['login'];
		// $last_id=$this->model->create($data);
		// header('location: ' . URL . 'dnr/Donate/'.$last_id);
	// }
	// public function view($id) 
	// {
        // $this->view->title = 'view dnr';
		// $this->view->user =$this->model->userSingleList($id);
		// $this->view->userListview = $this->model->donSingleList($id);
		// $this->view->render('dnr/view');
	// }
	// function HVB() 
	// {
	// $this->view->title = 'Search HVB';
	// $this->view->userListview = $this->model->userListdon('HVB') ;
	// $this->view->render('DNR/HVB');    
	// }
	// function HVC() 
	// {
	// $this->view->title = 'Search HVC';
	// $this->view->userListview = $this->model->userListdon('HVC') ;
	// $this->view->render('DNR/HVC');    
	// }
	// function HIV() 
	// {
	// $this->view->title = 'Search HIV';
	// $this->view->userListview = $this->model->userListdon('HIV') ;
	// $this->view->render('DNR/HIV');    
	// }
	// function SYS() 
	// {
	// $this->view->title = 'Search SYS';
	// $this->view->userListview = $this->model->userListdon('TPHA') ;
	// $this->view->render('DNR/SYS');    
	// }
	
	
	
	
	//***__don__***//
	// function impdon() 
	// {
	// $this->view->title = 'Search don';
	// $this->view->render('dnr/impdon');    
	// }
	// function graphedon() 
	// {
	// $this->view->title = 'graphedon';
	// $this->view->render('dnr/graphedon');    
	// }
	// function graphedon1() 
	// {
	// $this->view->title = 'graphedon1';
	// $this->view->render('dnr/graphedon1');    
	// }
	// function graphedon2() 
	// {
	// $this->view->title = 'graphedon2';
	// $this->view->render('dnr/graphedon2');    
	// }
	
	// function FM() 
	// {
	// $this->view->title = 'graphedon2';
	// $this->view->render('dnr/dfm');    
	// }
	
	// function DONOCCREG() 
	// {
	// $this->view->title = 'DONOCCREG';
	// $this->view->render('dnr/DONOCCREG');    
	// }
	
	// function Donate($id) 
	// {	
	    // $this->view->title = 'Donate';
		// $this->view->user =$this->model->userSingleList($id);
		// $this->view->render('dnr/Donate');
	// }
	// function DONATEOK() 
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
		// $data['q1'] = $_POST['q1'];
	    // $data['q2'] = $_POST['q2'];
	    // $data['q3'] = $_POST['q3'];
	    // $data['q4'] = $_POST['q4'];
	    // $data['q5'] = $_POST['q5'];
	    // $data['q6'] = $_POST['q6'];
	    // $data['q7'] = $_POST['q7'];
	    // $data['q8'] = $_POST['q8'];
	    // $data['q9'] = $_POST['q9'];
	    // $data['q10'] = $_POST['q10'];
	    // $data['q11'] = $_POST['q11'];
	    // $data['q12'] = $_POST['q12'];
	    // $data['q13'] = $_POST['q13'];
	    // $data['q14'] = $_POST['q14'];
	    // $data['q15'] = $_POST['q15'];
	    // $data['q16'] = $_POST['q16'];
	    // $data['q17'] = $_POST['q17'];
	    // $data['q18'] = $_POST['q18'];
	    // $data['q19'] = $_POST['q19'];
	    // $data['q20'] = $_POST['q20'];
	    // $data['q21'] = $_POST['q21'];
	    // $data['q22'] = $_POST['q22'];
	    // $data['q23'] = $_POST['q23'];
	    // $data['q24'] = $_POST['q24'];
	    // $data['q25'] = $_POST['q25'];
		// $data['IND'] = $_POST['IND'];
		// $data['TYPEPOCHE'] = $_POST['TYPEPOCHE'];
		// $data['IDP'] = $_POST['IDP'];
        // $data['REGION']    = $_POST['REGION'];
		// $data['WILAYA']    = $_POST['WILAYA'];
		// $data['STRUCTURE'] = $_POST['STRUCTURE'];
		// $data['login']     = $_POST['login'];
	    // $id=$_POST['id'];		
	    // $this->view->title = 'Donateok';
		// $this->view->user = $this->model->createdon($data);
		// header('location: ' . URL .'dnr/view/'.$id.'');
	// }
	// public function editdon($id)
	// {
	    // $this->view->title = 'Edit don';
		// $this->view->user = $this->model->editdon($id);
		// $this->view->render('dnr/editdon'); 
	// }
	// public function editSavedon($id)
	// {
		// $data = array();
		// $data['id']      = $id;
		// $data['NOM']     = $_POST['NOM'];
		// $data['PRENOM']  = $_POST['PRENOM'];
		// $data['DATE']    = $_POST['DATE'];
	    // $data['GRABO']   = $_POST['GRABO'];
	    // $data['GRRH']    = $_POST['GRRH1'];
		// $data['TELEPHONE']    = $_POST['TELEPHONE'];
		
		// $this->model->editSave($data);
		// header('location: ' . URL . 'Dnr/view/'.$id.'');
	// }
	// public function deletedon($id)
	// {
		// $this->model->deletedon($id);
		// header('location: ' . URL . 'Dnr/');
	// }
	
	
	

}