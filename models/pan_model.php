<?php

class Pan_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function Listproduit($categorie) {
        
        return $this->db->select('SELECT * FROM products WHERE categorie = :categorie', array(':categorie' => $categorie));
    }
	public function Listcom() {
        
        return $this->db->select('SELECT * FROM products');
    }
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM products WHERE id = :id', array(':id' => $id));
    }
	
	public function editSave($data) {
        $postData = array(
           'categorie' => $data['categorie'],
		   'name' => $data['NOM'],
            'description' => $data['PRENOM'],
			'cmm' => $data['cmm'],
			'smin' => $data['smin'],
			'qts' => $data['qts'],
			'smax' => $data['smax'],
			'date' => $data['date'],
            'price' => $data['PRIX']   
        );
		
		//echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('products', $postData, "id =" . $data['id'] . "");
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
        
        $this->db->delete('products', "id = '$id'");
    }
}
