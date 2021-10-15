<?php
class drh extends Controller {

    private $route  = 'drh';
    
	function __construct() {
	   parent::__construct();
	}
	function index() 
	{
	$this->view->title = 'drh';
	// $this->view->userListview = $this->model->lstructure() ;
	$this->view->render($this->route.'/index');    
	}
	
	
	
   //***searchdeces***/userSearchx
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search drh';
	    $this->view->userListviewo = $_GET['o']; // criter de choix
	    $this->view->userListviewq = $_GET['q']; // key word  
		$this->view->userListviewp =$url1[2];    // parametre 2 page                     limit 2,3
		$this->view->userListviewl =5     ;      // parametre 3 nombre de ligne par page  limit 2,3 
	    $this->view->userListviewb =20       ;   // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	
	
	function ndrh() 
	{
	$this->view->title = 'ndrh';
	$this->view->render($this->route.'/ndrh');    
	}
	public function createstructure() 
	{
		$data = array();
		$data['DATE']         = $_POST['DATE'];
		$data['STRUCTURE']    = $_POST['STRUCTURE'];
		$data['NATURE']       = $_POST['NATURE'];
		$data['SPECIALITE']   = $_POST['SPECIALITE'];
		$data['NOM']          = $_POST['NOM'];   
		$data['NOMAR']        = $_POST['NOMAR'];
		$data['PRENOM']       = $_POST['PRENOM'];
		$data['PRENOMAR']     = $_POST['PRENOMAR'];
		$data['SEXE']         = $_POST['SEXE'];
		$data['DNS']          = $_POST['DNS'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['WILAYAR']      = $_POST['WILAYAR'];
		$data['COMMUNER']     = $_POST['COMMUNER'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['ADRESSEAR']    = $_POST['ADRESSEAR'];
		$data['PROPRIETAIRE'] = $_POST['PROPRIETAIRE'];
		$data['DEBUTCONTRAT'] = $_POST['DEBUTCONTRAT'];
		$data['FINCONTRAT']   = $_POST['FINCONTRAT'];
		$data['REALISATION']  = $_POST['REALISATION'];
		$data['NREALISATION'] = $_POST['NREALISATION'];
		$data['OUVERTURE']    = $_POST['OUVERTURE'];
		$data['NOUVERTURE']   = $_POST['NOUVERTURE'];
		$data['Mobile']       = $_POST['Mobile'];
		$data['Fixe']         = $_POST['Fixe'];
		$data['Email']        = $_POST['Email'];
		$data['DIPLOME']       = $_POST['DIPLOME'];
		$data['UNIV']          = $_POST['UNIV'];
		$data['NUMORDER']      = $_POST['NUMORDER'];
		$data['DATEORDER']     = $_POST['DATEORDER'];
		$data['NUMDEM']        = $_POST['NUMDEM'];
		$data['DATEDEM']       = $_POST['DATEDEM'];
		$data['DATEDSC']         = $_POST['DATEDSC'];
		$data['SERVICECIVILE']   = $_POST['SERVICECIVILE'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createstructure($data);
        header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$last_id);	
	} 
	public function view($id) 
	{
        $this->view->title = 'editstructure';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->render($this->route.'/view');
	}
	//********************************************************************************//
	public function editstructure($id) 
	{
        $this->view->title = 'editstructure';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->render($this->route.'/editstructure');
	}
	public function editSavestructure($id)
	{
		$data = array();
		$data['id']           = $id;
		$data['DATE']         = $_POST['DATE'];
		$data['STRUCTURE']    = $_POST['STRUCTURE'];
		$data['NATURE']       = $_POST['NATURE'];
		$data['SPECIALITE']   = $_POST['SPECIALITE'];
		$data['NOM']          = $_POST['NOM'];   
		$data['NOMAR']        = $_POST['NOMAR'];
		$data['PRENOM']       = $_POST['PRENOM'];
		$data['PRENOMAR']     = $_POST['PRENOMAR'];
		$data['SEXE']         = $_POST['SEXE'];
		$data['DNS']          = $_POST['DNS'];
		$data['WILAYAN']      = $_POST['WILAYAN'];
		$data['COMMUNEN']     = $_POST['COMMUNEN'];
		$data['WILAYAR']      = $_POST['WILAYAR'];
		$data['COMMUNER']     = $_POST['COMMUNER'];
		$data['ADRESSE']      = $_POST['ADRESSE'];
		$data['ADRESSEAR']    = $_POST['ADRESSEAR'];
		$data['PROPRIETAIRE'] = $_POST['PROPRIETAIRE'];
		$data['DEBUTCONTRAT'] = $_POST['DEBUTCONTRAT'];
		$data['FINCONTRAT']   = $_POST['FINCONTRAT'];
		$data['REALISATION']  = $_POST['REALISATION'];
		$data['NREALISATION'] = $_POST['NREALISATION'];
		$data['OUVERTURE']    = $_POST['OUVERTURE'];
		$data['NOUVERTURE']   = $_POST['NOUVERTURE'];
		$data['Mobile']       = $_POST['Mobile'];
		$data['Fixe']         = $_POST['Fixe'];
		$data['Email']        = $_POST['Email'];
		$data['DIPLOME']      = $_POST['DIPLOME'];
		$data['UNIV']         = $_POST['UNIV'];
		$data['NUMORDER']     = $_POST['NUMORDER'];
		$data['DATEORDER']    = $_POST['DATEORDER'];
		$data['NUMDEM']       = $_POST['NUMDEM'];
		$data['DATEDEM']      = $_POST['DATEDEM'];
		$data['DATEDSC']         = $_POST['DATEDSC'];
		$data['SERVICECIVILE']   = $_POST['SERVICECIVILE'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavestructure($data);//search/0/10?o=STRUCTURE&q=$data['STRUCTURE']
		header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$data['id']);
	}
	//********************************************************************************//
	public function editetatstr($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['ETAT']         = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesstr($data);
		header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$data['id']);
	}
	public function editvalstr($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['val']         = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesval($data);
		header('location: ' . URL . $this->route.'/search/0/10?o=id&q='.$data['id']);
	}
	public function deletestructure($id)
	{
	$this->model->deletestructure($id); 
	header('location: ' . URL .$this->route. '/');
	}
	function ALGERIE() 
	{	
	    $this->view->title = 'ALGERIE';
		$this->view->render($this->route.'/evadjelfacom');
	}
	function ALGERIE1() 
	{	
	    $this->view->title = 'ALGERIE';
		// $id='17000';
	    // $this->view->userListview = $this->model->dnrcommune($id) ;
		//$this->view->render('dnr/ALGERIE');
		$this->view->render($this->route.'/djelfacom');
	}
	function evaluation() 
	{	
	    $this->view->title = 'evaluation';
		$this->view->render($this->route.'/evaluation');
	}
	function imp() 
	{
	$this->view->title = 'Search deces';
	$this->view->render($this->route.'/imp');    
	}
	//***inspection ***//
	public function insp($id) //id = id structure
	{
        $this->view->title = 'insp';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->userListview = $this->model->autoSingleinsp($id);
		$this->view->render($this->route.'/insp');   
	}
	public function createinsp($id) 
	{
		$data = array();
		$data['DATE']      = $_POST['DATE'];
		$data['REF']       = $_POST['REF'];
		$data['PJ']        = $_POST['PJ'];
		$data['STRUCTURE'] = $_POST['STRUCTURE'];
		$data['Commanditaire'] = $_POST['Commanditaire'];
		$data['id']        = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createinsp($data);
		header('location: ' . URL .$this->route. '/insp/'.$id);	
	} 
	public function deleteInspection($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteInspection($id); 
	header('location: ' . URL .$this->route. '/insp/'.$url1[3]);
	}
	public function anomalie($id) // id = id inspection   
	{
		$this->view->title = 'anomalie';
		$this->view->user = $this->model->userSingleinsp($id);
		$this->view->userListview = $this->model->listeanomalie($id);
		$this->view->render($this->route.'/anomalie');   
	}
	
	public function createanomalie($id) 
	{
		$data = array();
		$data['DATE']        = $_POST['DATE'];
		if ($_POST['ANOMALIE']=='') {
		$data['ANOMALIE']    = $_POST['ANOMALIEX'];
		} else {
		$data['ANOMALIE']    = $_POST['ANOMALIE'];
		}
		$data['id']          = $id;
		$data['ids']         = $_POST['ids']; //id structure
		$data['STRUCTURE']   = $_POST['STRUCTURE'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createanomalie($data);
		header('location: ' . URL .$this->route. '/anomalie/'.$id.'/'.$data['ids']);	
	} 
	public function editAnomaliesetat($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['ids']          = $url1[3];
		$data['ETAT']         = $url1[4];
		//echo '<pre>';print_r ($data);echo '<pre>';
	    $this->model->editSavesAnomalieetat($data);
		header('location: ' . URL . $this->route.'/anomalie/'.$url1[5].'/'.$data['ids'].'');
	}
	public function editAnomalies($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']           = $id;
		$data['ids']          = $url1[3];
		$data['ETAT']         = $url1[4];
		echo '<pre>';print_r ($data);echo '<pre>';
	    // $this->model->editSavesAnomalieetat($data);
		header('location: ' . URL . $this->route.'/anomalie/'.$url1[4].'/'.$data[3].'');
	}
	public function deleteAnomalies($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteAnomalies($id); 
	header('location: ' . URL .$this->route. '/anomalie/'.$url1[4].'/'.$data[3].'');
	}
	
	function MesurePrise($id) 
	{
	$this->view->title = 'MesurePrise';
	$this->view->user = $this->model->userSingleinsp($id);
	$this->view->render($this->route.'/MesurePrise');    
	}
	function createMesurePrise($id) 
	{
	$this->view->title = 'MesurePrise';
	$url1 = explode('/',$_GET['url']);
	$data = array();
	$data['MP']          = $_POST['MP'];
	$data['ids']         = $_POST['ids'];
	$data['id']          = $id;
	$this->model->editSavesMesurePrise($data);
	header('location: ' . URL . $this->route.'/insp/'.$data['ids']);   
	}
	//***inspection fin ***//
	function inspstructure($id) 
	{
	$this->view->title = 'inspstructure';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->render($this->route.'/inspstructure');    
	}
	
	
	public function inspection($id) 
	{
        $this->view->title = 'editdeces';
		$this->view->user = $this->model->userSinglestructure($id);
		$this->view->userListview = $this->model->autoSingleinspection($id);
		$this->view->render($this->route.'/inspection');   
	}
	
	public function createinspection($id) 
	{
		$data = array();
		$data['DATE']         = $_POST['DATE'];
		$data['ANOMALIE']    = $_POST['ANOMALIE'];
		$data['id']        = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createinspection($data);
		header('location: ' . URL .$this->route. '/inspection/'.$id);	
	} 
	

	function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	//*********************************************************************************************************//
	/*cesation*/	
	function cesation($id) 
	{
	$this->view->title = 'cesation';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->render($this->route.'/cesation');    
	}
	public function creatcesation($id) 
	{
		$data = array();
		$data['id']             = $id;
		$data['CAUSECESATION']  = $_POST['CAUSECESATION'];
		$data['DEBUTCESATION']  = $_POST['DEBUTCESATION'];
		//echo '<pre>';print_r ($data);echo '<pre>'; //grh.Motif_Cessation 
		$last_id=$this->model->editSavescesation($data);
		header('location: ' . URL .$this->route. '/search/0/10?o=idp&q='.$id);	
	} 
	
	/*editcesation*/	
	function editcesation($id) 
	{
	$this->view->title = 'editcesation';
	// $this->view->user = $this->model->userSinglestructure($id);
	// $this->view->render($this->route.'/cesation');    
	}
	/*editcesation*/	
	function an_cesation($id) 
	{
	$this->view->title = 'an_cesation';
	// $this->view->user = $this->model->userSinglestructure($id);
	// $this->view->render($this->route.'/cesation');    
	}
	
	
	
	
	
	//*********************************************************************************************************//
	/*service*/	
	function service($id) 
	{
	$this->view->title = 'nservice';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->userListview = $this->model->serviceSingleList($id);
	$this->view->render($this->route.'/service');    
	}
	public function creatservice($id) 
	{
		$data = array();
	    $data['SERVICEAR_A']    = $_POST['SERVICEAR_A'];
		$data['SERVICEAR_N']    = $_POST['SERVICEAR_N'];
		$data['DEBUTSERVICE']   = $_POST['DEBUTSERVICE']; 
		$data['CAUSESERVICE']   = $_POST['CAUSESERVICE']; 
		$data['idp']            = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->creatservice($data);
		header('location: ' . URL .$this->route. '/service/'.$id);	
	} 
	public function deleteservice($id)
	{
	$url1 = explode('/',$_GET['url']);
	print_r($url1);	
	$this->model->deleteservice($id); 
	header('location: ' . URL .$this->route. '/service/'.$url1[3]);
	}
	public function editservice($id) 
	{
	$url1 = explode('/',$_GET['url']);
	$this->view->title = 'editeservice';	
    $this->view->user = $this->model->userSinglestructure($url1[3]);
    $this->view->userListview = $this->model->servicelist($id);
	$this->view->render($this->route.'/editservice');
	}
	public function editSavesservice($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']             = $id;
		$data['SERVICEAR_A']    = $_POST['SERVICEAR_A'];
		$data['SERVICEAR_N']    = $_POST['SERVICEAR_N'];
		$data['DEBUTSERVICE']   = $_POST['DEBUTSERVICE']; 
		$data['CAUSESERVICE']   = $_POST['CAUSESERVICE']; 
		$data['IDP']            = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesservice($data);
		header('location: ' . URL . $this->route.'/service/'.$url1[3].'');
	}
	//*********************************************************************************************************//
	
	/*conge*/	
	function conge($id) 
	{
	$this->view->title = 'nstructure';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->userListview = $this->model->congeSingleList($id);
	$this->view->render($this->route.'/conge');    
	}
	
	public function creatconge($id) 
	{
		$data = array();
		$data['id']          = $id;
		$data['CAUSECONGE']  = $_POST['CAUSECONGE'];
		$data['DURECONGE']   = $_POST['DURECONGE']; 
		$data['DEBUTCONGE']  = $_POST['DEBUTCONGE'];
		$data['FINCONGE']    = $this->datePlus($_POST['DEBUTCONGE'],$_POST['DURECONGE']);
		$data['REMPLACANT']  = $_POST['REMPLACANT'];
		$data['RESTETOT']    = $_POST['RESTETOT'];
		$data['RESTEANNEE']  = $_POST['RESTEANNEE'];
		
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->creatconge($data);
		header('location: ' . URL .$this->route. '/conge/'.$id);	
	} 
	
	public function editconge($id) 
	{
	$url1 = explode('/',$_GET['url']);
	$this->view->title = 'editeconge';	
    $this->view->user = $this->model->userSinglestructure($url1[3]);
    $this->view->userListview = $this->model->congelist($id);
	$this->view->render($this->route.'/editconge');
	}
	
    public function editSavesconge($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		$data['id']          = $id;
		$data['CAUSECONGE']  = $_POST['CAUSECONGE'];
		$data['DURECONGE']   = $_POST['DURECONGE']; 
		$data['DEBUTCONGE']  = $_POST['DEBUTCONGE'];
		$data['FINCONGE']    = $this->datePlus($_POST['DEBUTCONGE'],$_POST['DURECONGE']);
		$data['REMPLACANT']  = $_POST['REMPLACANT'];
		$data['RESTETOT']    = $_POST['RESTETOT'];
		$data['RESTEANNEE']  = $_POST['RESTEANNEE'];
		$data['IDP']         = $url1[3];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesconge($data);
		header('location: ' . URL . $this->route.'/conge/'.$url1[3].'');
	}

	public function editetatconge($id)
	{
	    $url1 = explode('/',$_GET['url']);
		$data = array();
		//$data['id'] = $id;
		$data['id'] = $url1[3];
		$data['OK'] = $url1[4];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavesetatconge($data);
		header('location: ' . URL . $this->route.'/conge/'.$id.'');
	}
	
	public function deleteconge($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteconge($id); 
	header('location: ' . URL .$this->route. '/conge/'.$url1[3]);
	}
	
	//**CHANGER PHOTOS**//
	function upl() 
	{
	$this->view->title = 'Upload Photos';
	$this->view->render($this->route.'/upl');    
	}
	
	public $uploadLocation = "d:\\wamp/www/mvc/public/webcam/drh/"; 
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
		header('location: ' . URL . $this->route.'/search/0/10?o=idp&q='.$id);
	}
		
}