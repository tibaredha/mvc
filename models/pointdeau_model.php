<?php

class pointdeau_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM OAEP where $o like '$q%' order by NOMPRENOM limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM OAEP where $o like '$q%' order by NOMPRENOM ");
    }
	
//***OAEP ***//
    public function createoaep($data) {
		
		$this->db->insert('oaep', array(
			'TOAEP'     => $data['TOAEP'],
			'NUM'       => $data['NUM'],
			'WILAYAN'   => $data['WILAYAN'],
			'COMMUNEN'  => $data['COMMUNEN'],
			'ADRESSE'   => $data['ADRESSE'],
			'NOMPRENOM' => $data['NOMPRENOM'],
			'DATEN'     => $data['DATEN'],
			'POPDES'    => $data['POPDES'],
			'DES'       => $data['DES'],
            'DATEI'     => $data['DATEI'],
            'EPSP'     => $data['EPSP']	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';	
    }
	public function deleteoaep($id) {       
        $this->db->delete('oaep', "id = '$id'");
    }	
	public function userSingleListoaep($id) {
        return $this->db->select('SELECT * FROM oaep WHERE id = :id', array(':id' => $id));
    }	
	public function editSaveoaep($data) {
		$postData = array(
			'TOAEP'     => $data['TOAEP'],
			'NUM'       => $data['NUM'],
			'WILAYAN'   => $data['WILAYAN'],
			'COMMUNEN'  => $data['COMMUNEN'],
			'ADRESSE'   => $data['ADRESSE'],
			'NOMPRENOM' => $data['NOMPRENOM'],
			'DATEN'     => $data['DATEN'],
			'POPDES'    => $data['POPDES'],
			'DES'       => $data['DES'],
            'DATEI'     => $data['DATEI'],
            'EPSP'     => $data['EPSP']	
	   );
		// echo '<pre>';print_r ($postData);echo '<pre>';
       $this->db->update('oaep', $postData, "id =" . $data['id'] . "");
    }	
	public function listoaep() {
        return $this->db->select('SELECT * FROM  oaep  order by id  desc limit 100');
        //return $this->db->select('SELECT * FROM don  order by id     ');
    }
	
	//***OAEP ***//
    public function screateoaep($data) {
		
		$this->db->insert('soaep', array(
			'TOAEP'     => $data['TOAEP'],
			'NUM'       => $data['NUM'],
			'WILAYAN'   => $data['WILAYAN'],
			'COMMUNEN'  => $data['COMMUNEN'],
			'CR'        => $data['CR'],
			'BC'        => $data['BC'],
            'DATEI'     => $data['DATEI'],
            'EPSP'         => $data['EPSP']	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';	
    }
	
	public function listsoaep() {
        return $this->db->select('SELECT * FROM  soaep  order by id  desc limit 100');
    }
	
	public function userSingleListsoaep($id) {
        return $this->db->select('SELECT * FROM soaep WHERE id = :id', array(':id' => $id));
    }	
	
	public function deletesoaep($id) {       
        $this->db->delete('soaep', "id = '$id'");
    }	
	
	public function editSavesoaep($data) {
		$postData = array(
			'TOAEP'     => $data['TOAEP'],
			'NUM'       => $data['NUM'],
			'WILAYAN'   => $data['WILAYAN'],
			'COMMUNEN'  => $data['COMMUNEN'],
			'CR'        => $data['CR'],
			'BC'        => $data['BC'],
            'DATEI'     => $data['DATEI'],
            'EPSP'      => $data['EPSP']	
	   );
		// echo '<pre>';print_r ($postData);echo '<pre>';
       $this->db->update('soaep', $postData, "id =" . $data['id'] . "");
    }	
	
	
	
	
	
	
	
	
	
	
	

}
