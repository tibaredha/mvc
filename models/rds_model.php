<?php
class rds_Model extends Model {
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
		return $this->db->select("SELECT * FROM rds where $o like '$q%' order by date limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM rds where $o like '$q%' order by date ");
    }
	
	 public function createrds($data) {
			
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('rds', array(
				'DATE'       => $this->dateFR2US($data['DATE']),
				'STRUCTURE'  => $data['STRUCTURE'],
				'NATURE'     => $data['NATURE'],
				'CMM'        => $data['CMM'],
				'RES'      => $data['RES'],
				'PRODUIT'     => $data['PRODUIT'] 
			));
			// echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id = $this->db->lastInsertId();
		}

	 public function creatertr($data) {
			
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('rtr', array(
				'DATE'       => $this->dateFR2US($data['DATE']),
				'NLOT'       => $data['NLOT'],
				'DDP'        => $this->dateFR2US($data['DDP']),
				'PRODUIT'    => $data['PRODUIT'],
				'MOTIF'      => $data['MOTIF'],
				'REF'        => $data['REF'] 
			));
			// echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id = $this->db->lastInsertId();
		}
	 public function Listrtr() {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM rtr order by DATE ');
    }
	public function deletertr($id) {       
        $this->db->delete('rtr', "id = '$id'");
    }
	
	
	public function deleterds($id) {       
        $this->db->delete('rds', "id = '$id'");
    }
	
	 public function Listproduit() {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pha order by mecicament ');
    }
	
	public function create($data) {
        $this->db->insert('pha', array(
			'mecicament' => $data['mecicament'],
            'pre' => $data['pre'],
			'cmm' => $data['cmm'],
			'smin' => $data['smin'],
			'qts' => $data['qts'],
			'smax' => $data['smax'],
			'qte' => $data['qte'],
            'price' => $data['price']
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
        return $last_id = $this->db->lastInsertId();
    }
	
	 public function deleteproducts($id) {
        
        $this->db->delete('pha', "id = '$id'");
    }
	
	 public function userSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pha WHERE id = :id', array(':id' => $id));
    }
	
	public function editSave($data) {
        $this->db->exec('SET NAMES utf8');
		$postData = array(
            'mecicament' => $data['mecicament'],
            'pre' => $data['pre'],
			'cmm' => $data['cmm'],
			'smin' => $data['smin'],
			'qts' => $data['qts'],
			'smax' => $data['smax'],
			'qte' => $data['qte'],
            'price' => $data['price']
        );		
		//echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('pha', $postData, "id =" . $data['id'] . "");
    }	
}
