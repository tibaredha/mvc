<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class Stock extends Controller {

	function __construct() {
	   parent::__construct();
    
	}
	function index() 
	{
	$this->view->title = 'Search pat';
	$this->view->render('stock/index');    
	}
	function index1() 
	{
	$this->view->title = 'Search pat';
	$this->view->render('stock/index1');    
	}
	//***cgr***//
	function cgr() 
	{
	$this->view->title = 'stock cgr';
	$this->view->userListview = $this->model->userListcgr() ;
	$this->view->render('stock/cgr');    
	}
	public function editcgr($id) 
	{
        $this->view->title = 'Edit cgr';
		$this->view->user = $this->model->userSingleListcgr($id);
		$this->view->render('stock/editcgr');
	}
	public function editSavecgr($id)
	{
		$data = array();
		$data['IDCGR']         = $id;
		$data['GROUPAGE']      = $_POST['GROUPAGE'];
		$data['RHESUS']        = $_POST['RHESUS'];
		$data['DATEDON']       = $_POST['DATEDON'];
		$data['DATEPER']       = $_POST['DATEPER'];
		$data['NDP']           = $_POST['NDP'];
	    $data['DIST']          = $_POST['DIST'];
	    $data['DATEDIS']       = $_POST['DATEDIS'];
		$data['IDREC']         = $_POST['IDREC'];
	    $data['SERVICE']       = $_POST['SERVICE'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavecgr($data);
		header('location: ' . URL . 'stock/cgr/');
	}
	public function deletecgr($id)
	{
		$this->model->deletecgr($id); 
		header('location: ' . URL . 'stock/cgr/');
	}
	
	//***PFC***//
	function pfc() 
	{
	$this->view->title = 'stock pfc';
	$this->view->userListview = $this->model->userListpfc() ;
	$this->view->render('stock/pfc');    
	}
	public function editpfc($id) 
	{
        $this->view->title = 'Edit pfc';
		$this->view->user = $this->model->userSingleListpfc($id);
		$this->view->render('stock/editpfc');
	}
	public function editSavepfc($id)
	{
		$data = array();
		$data['IDPFC']         = $id;
		$data['GROUPAGE']      = $_POST['GROUPAGE'];
		$data['RHESUS']        = $_POST['RHESUS'];
		$data['DATEDON']       = $_POST['DATEDON'];
		$data['DATEPER']       = $_POST['DATEPER'];
		$data['NDP']           = $_POST['NDP'];
	    $data['DIST']          = $_POST['DIST'];
	    $data['DATEDIS']       = $_POST['DATEDIS'];
		$data['IDREC']         = $_POST['IDREC'];
	    $data['SERVICE']       = $_POST['SERVICE'];
		//echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavepfc($data);
		header('location: ' . URL . 'stock/pfc/');
	}
	public function deletepfc($id)
	{
		$this->model->deletepfc($id); 
		header('location: ' . URL . 'stock/pfc/');
	}
	//***cps***//
	function cps() 
	{
	$this->view->title = 'stock cps';
	$this->view->userListview = $this->model->userListcps() ;
	$this->view->render('stock/cps');    
	}
	public function editcps($id) 
	{
        $this->view->title = 'Edit cps';
		$this->view->user = $this->model->userSingleListcps($id);
		$this->view->render('stock/editcps');
	}
	public function editSavecps($id)
	{
		$data = array();
		$data['IDCPS']         = $id;
		$data['GROUPAGE']      = $_POST['GROUPAGE'];
		$data['RHESUS']        = $_POST['RHESUS'];
		$data['DATEDON']       = $_POST['DATEDON'];
		$data['DATEPER']       = $_POST['DATEPER'];
		$data['NDP']           = $_POST['NDP'];
	    $data['DIST']          = $_POST['DIST'];
	    $data['DATEDIS']       = $_POST['DATEDIS'];
		$data['IDREC']         = $_POST['IDREC'];
	    $data['SERVICE']       = $_POST['SERVICE'];
	   //echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSavecps($data);
		header('location: ' . URL . 'stock/cps/');
	}
	public function deletecps($id)
	{
		$this->model->deletecps($id); 
		header('location: ' . URL . 'stock/cps/');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// function listqual() 
	// {
	// $this->view->title = 'listqual';
	// $this->view->userListview = $this->model->userList1() ;
	// $this->view->render('qua/listqual');    
	// }
	// public function editqua($id) 
	// {
        // $this->view->title = 'Edit qua';
		// $this->view->user = $this->model->userSingleList($id);
		// $this->view->render('qua/editqua');
	// }
	// function imp() 
	// {
	// $this->view->title = 'Search dnr';
	// $this->view->render('qua/imp');    
	// }
	// function run()
	// {
		// $this->model->run();
	// }
	// public function edit($id) 
	// {
        // $this->view->title = 'Edit qua';
		// $this->view->user = $this->model->userSingleList($id);
		// $this->view->render('qua/edit');
	// }
	// public function editSave($id)
	// {
		// $data = array();
		// $data['id']     = $id;
		// $data['GRABO']  = $_POST['GRABO'];
		// $data['GRRH1']  = $_POST['GRRH1'];
		// $data['GRRH2']  = $_POST['GRRH2'];
		// $data['GRRH3']  = $_POST['GRRH3'];
		// $data['GRRH4']  = $_POST['GRRH4'];
		// $data['GRRH5']  = $_POST['GRRH5'];
		// $data['KELL1']  = $_POST['KELL1'];
		// $data['KELL2']  = $_POST['KELL2'];
		// $data['HVB']    = $_POST['HVB'];
		// $data['HVC']    = $_POST['HVC'];
		// $data['HIV']    = $_POST['HIV'];
		// $data['TPHA']   = $_POST['TPHA'];
		// $data['IDDNR']  = $_POST['IDDNR'];
		// $data['DATEQUA']= $_POST['DATEQUA'];
		// $this->model->editSave($data);
		// header('location: ' . URL . 'qua/');
	// }
	

}