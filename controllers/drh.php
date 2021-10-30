<?php
class drh extends Controller {

    private $route  = 'drh';
    
	function __construct() {
	   parent::__construct();
	}
	function index() 
	{
	$this->view->title = 'drh';
	$this->view->render($this->route.'/index');    
	}
   //*********************************************************************************************************//
   //***searchdeces***/
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search drh';
	    $this->view->userListviewo = $_GET['o']; // criter de choix
	    $this->view->userListviewq = $_GET['q']; // key word  
		$this->view->userListviewp = $url1[2];    // parametre 2 page                     limit 2,3
		$this->view->userListviewl =5     ;      // parametre 3 nombre de ligne par page  limit 2,3 
	    $this->view->userListviewb =20       ;   // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->route.'/index');
	}
	//*********************************************************************************************************//
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
	//*********************************************************************************************************//
	/*grade*/	
	function grade($id) 
	{
	$this->view->title = 'avance';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->userListview = $this->model->gradeSingleList($id);
	$this->view->render($this->route.'/grade');    
	}
	public function creatgrade($id) 
	{
		$data = array();
		$data['IDP']         = $id;
		$data['A_grade']     = $_POST['A_grade'];
		$data['D_grade']     = $_POST['D_grade']; 
		$data['N_grade']     = $_POST['N_grade'];
		$data['CATEGORIE']   = $_POST['CATEGORIE'];
		$data['ECHELON']     = $_POST['ECHELON'];
		$last_id=$this->model->creatgrade($data);
		//echo '<pre>';print_r ($data);echo '<pre>'; 
		header('location: ' . URL .$this->route. '/grade/'.$id);
		
	} 
	public function deletegrade($id)
	{
		$url1 = explode('/',$_GET['url']);	
		$this->model->deletegrade($id); 
		header('location: ' . URL .$this->route. '/grade/'.$url1[3]);
	}
	
	
	//*********************************************************************************************************//
	/*avance*/	
	function avance($id) 
	{
	$this->view->title = 'avance';
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->userListview = $this->model->avanceSingleList($id);
	$this->view->render($this->route.'/avance');    
	}
	public function deleteavance($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteavance($id); 
	header('location: ' . URL .$this->route. '/avance/'.$url1[3]);
	}
	public function creatavance($id) 
	{
		$data = array();
		$data['IDP']          = $id;
		$data['NPV']         = $_POST['NPV'];
		$data['DATEPV']      = $_POST['DATEPV']; 
		$data['ANNEEPV']     = $_POST['ANNEEPV'];
		$data['DUREE']       = $_POST['DUREE'];
		$data['CATEGORIE']   = $_POST['CATEGORIE'];
		$data['ECHELON']     = $_POST['ECHELON'];
		$data['DATEDEFFET']  = $_POST['DATEDEFFET'];
		$data['NDECISION']   = $_POST['NDECISION'];
		$data['DATEDECISION']= $_POST['DATEDECISION'];
		$data['INDICEB']     = $_POST['INDICEB'];
		if($_POST['ECHELON']>12)
		{
			header('location: ' . URL .$this->route. '/avance/'.$id);}
		else 
		{
			//echo '<pre>';print_r ($data);echo '<pre>';  
			$last_id=$this->model->creatavance($data);
			header('location: ' . URL .$this->route. '/avance/'.$id);		
		}
		
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
	$this->view->user = $this->model->userSinglestructure($id);
	$this->view->render($this->route.'/editcesation');    
	}

	/*editcesation*/	
	function an_cesation($id) 
	{
	$data = array();
	$data['id']             = $id;
	$this->view->title = 'an_cesation';
	$last_id=$this->model->an_cesation($data);
    header('location: ' . URL .$this->route. '/search/0/10?o=idp&q='.$id);	
	}
	
	//*********************************************************************************************************//
	/*admin*/	
	function admin($id) 
	{
	$this->view->title = 'nstructure';
	$this->view->user = $this->model->userSinglestructure($id);
	//$this->view->userListview = $this->model->congeSingleList($id);
	$this->view->render($this->route.'/admin');    
	}
	//*********************************************************************************************************//
	function evaluation() 
	{	
	    $this->view->title = 'evaluation';
		$this->view->render($this->route.'/evaluation');
	}
		
}