<?php
class Pha_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function Listproduit() {
	
        return $this->db->select('SELECT * FROM pha order by mecicament ');
        //return $this->db->select('SELECT * FROM pha WHERE categorie = :categorie', array(':categorie' => $categorie));
    }
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM pha WHERE id = :id', array(':id' => $id));
    }
	public function editSave($data) {
        $postData = array(
            'categorie' => $data['categorie'],
		    'mecicament' => $data['NOM'],
			'code' => $data['PRENOM'],
			'cmm' => $data['cmm'],
			'smin' => $data['smin'],
			'qts' => $data['qts'],
			'smax' => $data['smax'],
			'qte' => $data['qte'],
			'price' => $data['PRIX']   
        );		
		//echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('pha', $postData, "id =" . $data['id'] . "");
    }
	 public function create($data) {
        $this->db->insert('products', array(
			'categorie' => $data['categorie'],
			'name' => $data['NOM'],
            'description' => $data['PRENOM'],
			'cmm' => $data['cmm'],
			'smin' => $data['smin'],
			'qts' => $data['qts'],
			'smax' => $data['smax'],
			'date' => $data['date'],
            'price' => $data['PRIX']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
        return $last_id = $this->db->lastInsertId();
    }	
    public function deleteproducts($id) {
        
        $this->db->delete('pha', "id = '$id'");
    }
	
	 //***search dnr ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM pha where $o like '$q%' order by mecicament,id limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM pha where $o like '$q%' order by mecicament ");
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
