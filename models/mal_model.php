<?php

// echo '<pre>';print_r ($data);echo '<pre>';
class Mal_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM mal where $o like '$q%'  order by NOM,id limit $p,$l  ");//and qua= 0
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM mal where $o like '$q%'  order by NOM ");//and qua= 0
    }

    public function create($data) {
        // echo '<pre>';print_r ($data);echo '<pre>';
		$this->db->insert('mal', array(
            'QUA' => 0,
			'DINS' => $data['DINS'],
            'NUM' => $data['NUM'],
            'SERVICE' => $data['SERVICE'],
		    'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'SEX' => $data['SEXE'],
            'DATENAISSANCE' => $data['DATENS'],
            'WILAYA' => $data['WILAYAN'],
            'COMMUNE' => $data['COMMUNEN'],
            'WILAYAR' => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE' => $data['ADRESSE'],
            'TELEPHONE' => $data['TEL'],
            'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        ));
        return $last_id = $this->db->lastInsertId();
    }

    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM mal WHERE id = :id', array(':id' => $id));
    }
	 public function editSave($data) {
        $postData = array(
			'QUA' =>1,
			'DQ' =>$data['DATEQUA'],
			'GRABO' =>$data['GRABO'],
			'GRRH' =>$data['GRRH'],
			'CRH2' =>$data['CRH2'],
			'CRH4' =>$data['CRH4'],
			'ERH3' =>$data['ERH3'],
			'ERH5' =>$data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'HVB' => $data['HVB'],
            'HVC' => $data['HVC'],
            'HIV' => $data['HIV'],
            'TPHA' => $data['TPHA']
            
        );
        // echo '<pre>'; print_r($postData);echo '<pre>';
		$this->db->update('mal', $postData, "id =" . $data['id'] . "");
    }
    public function editSave1($data) {
        $postData = array(
			'QUA' =>1,
			'DQ' =>$data['DINS'],
			'FILSDE' =>$data['FILSDE'],
			'NUM' =>$data['NUM'],
			'SERVICE' =>$data['SERVICE'],
			'NOM' =>$data['NOM'],
			'PRENOM' =>$data['PRENOM'],
			'SEX' =>$data['SEXE'],
			'DATENAISSANCE' =>$data['DATENS'],
			'WILAYA' =>$data['WILAYAN'],
			'COMMUNE' =>$data['COMMUNEN'],
			'WILAYAR' =>$data['WILAYAR'],
			'COMMUNER' =>$data['COMMUNER'],
			'ADRESSE' =>$data['ADRESSE'],
			'TELEPHONE' =>$data['TEL'],
			'GRABO' =>$data['GRABO'],
			'GRRH' =>$data['GRRH'],
			'CRH2' =>$data['CRH2'],
			'CRH4' =>$data['CRH4'],
			'ERH3' =>$data['ERH3'],
			'ERH5' =>$data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'HVB' => $data['HVB'],
            'HVC' => $data['HVC'],
            'HIV' => $data['HIV'],
            'TPHA' => $data['TPHA']
            
        );
        // echo '<pre>'; print_r($postData);echo '<pre>';
		$this->db->update('mal', $postData, "id =" . $data['id'] . "");
    }

    public function delete($id) {
        $this->db->delete('mal', "id = '$id'");
    }

}
