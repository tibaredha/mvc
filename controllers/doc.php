<?php
// echo '<pre>';print_r ($data);echo '<pre>';
class doc extends Controller {

	function __construct() {
	   parent::__construct();
	}
	function run()
	{
		$this->model->run();
	}
	//***acceuil Documentation ***//
	function index(){$this->view->title = 'Documentation';$this->view->render('doc/index');}
	function C1P1(){$this->view->title = 'C1P1';$this->view->render('doc/stat/C1P1');}
	function C1P2(){$this->view->title = 'C1P2';$this->view->render('doc/stat/C1P2');}
	function C1P3(){$this->view->title = 'C1P3';$this->view->render('doc/stat/C1P3');}
	function C1P4(){$this->view->title = 'C1P4';$this->view->render('doc/stat/C1P4');}
	function C2P1(){$this->view->title = 'C2P1';$this->view->render('doc/stat/C2P1');}
	function C2P2(){$this->view->title = 'C2P2';$this->view->render('doc/stat/C2P2');}
	function C2P3(){$this->view->title = 'C2P3';$this->view->render('doc/stat/C2P3');}
	function C2P4(){$this->view->title = 'C2P4';$this->view->render('doc/stat/C2P4');}
	function C2P5(){$this->view->title = 'C2P5';$this->view->render('doc/stat/C2P5');}
	function C2P6(){$this->view->title = 'C2P6';$this->view->render('doc/stat/C2P6');}
	function C2P7(){$this->view->title = 'C2P7';$this->view->render('doc/stat/C2P7');}
	function C3P1(){$this->view->title = 'C3P1';$this->view->render('doc/stat/C3P1');}
	function C3P2(){$this->view->title = 'C3P2';$this->view->render('doc/stat/C3P2');}
	function C3P3(){$this->view->title = 'C3P3';$this->view->render('doc/stat/C3P3');}
	function C3P4(){$this->view->title = 'C3P4';$this->view->render('doc/stat/C3P4');}
	function C3P5(){$this->view->title = 'C3P5';$this->view->render('doc/stat/C3P5');}
	function C3P6(){$this->view->title = 'C3P6';$this->view->render('doc/stat/C3P6');}
	function C3P7(){$this->view->title = 'C3P7';$this->view->render('doc/stat/C3P7');}
	function C3P8(){$this->view->title = 'C3P8';$this->view->render('doc/stat/C3P8');}
	function C3P9(){$this->view->title = 'C3P9';$this->view->render('doc/stat/C3P9');}
	function C3P10(){$this->view->title = 'C3P10';$this->view->render('doc/stat/C3P10');}
	function C3P11(){$this->view->title = 'C3P11';$this->view->render('doc/stat/C3P11');}
	
	
	
	
	
	
	function trans() 
	{
	$this->view->title = 'transfusion';
	$this->view->render('doc/trans');    
	}

	function flv($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv');    
	}
	
	function flv1($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv1');    
	}
	
	function flv2($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv2');    
	}
	function flv3($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv3');    
	}
	
	function flv4($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv4');    
	}
	
	function flv5($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv5');    
	}
	function flv6($flv) 
	{
	$this->view->title = $flv;
	$this->view->flv=$flv;
	$this->view->render('doc/flv6');    
	}

}