<?php
class cour_Model extends Model {
//$this->db->exec('SET NAMES utf8'); POUR PRISE EN CHARGE ARABE 
    public function __construct() {
        parent::__construct();
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
	public function userSearch($o, $q, $p, $l) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM courar where $o like '$q%' order by DATEAR limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM courar where $o like '$q%' order by DATEAR");
    }
	 public function userSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM courar WHERE id = :id', array(':id' => $id));
    }
	 public function createcour($data) {
			
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('courar', array(
				'DATEAR'    => $this->dateFR2US($data['DATEAR']),
				'NAR'       => $data['NAR'],
				'DATECR'    => $this->dateFR2US($data['DATECR']),
				'NCR'       => $data['NCR'],
				'EXP'       => $data['EXP'],
				'OBJ'       => $data['OBJ'],
				'NA'        => $data['NA']
			));
			$last_id = $this->db->lastInsertId();
			
			//2eme inser dans archive 
			$this->db->insert('courarch', array(
				'DATEARCH'    => $this->dateFR2US($data['DATEAR']),
				'IDCOUR'      => $last_id , 
				'CATCOUR'     => '1'
			));
			// echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id ;
		}
		
	public function editSave($data) {
        $this->db->exec('SET NAMES utf8');
		$postData = array(
                'DATEAR'    => $this->dateFR2US($data['DATEAR']),
				'NAR'       => $data['NAR'],
				'DATECR'    => $this->dateFR2US($data['DATECR']),
				'NCR'       => $data['NCR'],
				'EXP'       => $data['EXP'],
				'OBJ'       => $data['OBJ'],
				'NA'        => $data['NA']
        );		
		echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('courar', $postData, "id =" . $data['id'] . "");
    }		
		
      
	  public function createcour1($data) {
			
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('courdep', array(
				'DATEDP'    => $this->dateFR2US($data['DATEDP']),
				'NDP'       => $data['NDP'],
				'NP'        => $data['NP'],
				'DEST'      => $data['DEST'],
				'OBJ'       => $data['OBJ'],
				'NA'        => $data['NA'],
				'OBS'       => $data['OBS'],
				'REF'       => $data['REF'],
				'EXP'       => $data['EXP']
			));
			$last_id = $this->db->lastInsertId();
			//2eme inser dans archive  
			$this->db->insert('courarch', array(
				'DATEARCH'    => $this->dateFR2US($data['DATEDP']),
				'IDCOUR'      => $last_id , 
				'CATCOUR'     => '2',
				'EXP'         => $data['EXP']
			));
			$postData = array(
            'DATERP' => $this->dateFR2US($data['DATEDP']),
            'NRP' => $data['NDP']
        );		
        $this->db->update('courar', $postData, "id =" . $data['REF'] . "");
			// echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id;
		}
		
		public function diffcour1($data) {
        $this->db->exec('SET NAMES utf8');
		$postData = array(
            'DATERP' => $this->dateFR2US($data['DATE']),
			'DSP' => $data['DSP'],
            'INSP' => $data['INSP'],
			'SAS' => $data['SAS'],
			'PRV' => $data['PRV'],
			'DRH' => $data['DRH'],
			'PLF' => $data['PLF']	
        );		
		echo '<pre>';print_r ($postData);echo '<pre>';
        //1ere mise ajour dans cour arrivé  
		$this->db->update('courar', $postData, "id =" . $data['id'] . "");
		//2eme mise ajour dans archive  
		$postData = array(
			'DSP' => $data['DSP'],
            'INSP' => $data['INSP'],
			'SAS' => $data['SAS'],
			'PRV' => $data['PRV'],
			'DRH' => $data['DRH'],
			'PLF' => $data['PLF']	
        );		
		$this->db->update('courarch', $postData," IDCOUR =".$data['id']."" );//CATCOUR=1 and
    }
	

	
	// public function Listrtr() {
        // $this->db->exec('SET NAMES utf8');
		// return $this->db->select('SELECT * FROM rtr order by DATE ');
    // }
	// public function deletertr($id) {       
        // $this->db->delete('rtr', "id = '$id'");
    // }
	// public function deleterds($id) {       
        // $this->db->delete('rds', "id = '$id'");
    // }
	
	 // public function Listproduit() {
        // $this->db->exec('SET NAMES utf8');
		// return $this->db->select('SELECT * FROM pha order by mecicament ');
    // }
	
	
}
