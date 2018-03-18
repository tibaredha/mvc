<?php

class Don_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM don where $o like '$q%'  and IND='IND' order by IDP desc limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM don where $o like '$q%' and IND='IND' order by IDP desc ");
    }

    //***serologie+ des don ***//
    public function userListdon($virus) {
        return $this->db->select("SELECT * FROM don  WHERE $virus='Positif'  or   $virus='douteux'  ORDER BY DATEDON");
    }

    //***compagne de don ***//
    public function compList() {
        return $this->db->select("SELECT * FROM compagne order by DATEDON desc");
    }

    public function createcomp($data) {
        $this->db->insert('compagne', array(
            'DATEDON' => $data['DATEDON'],
            'STR' => $data['STR'],
            'WILAYA' => $data['WILAYAR'],
            'COMMUNE' => $data['COMMUNER'],
            'ADRESSE' => $data['ADRESSE'],
            'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
    }

    public function deletecomp($id) {
        $this->db->delete('compagne', "id = '$id'");
    }

    public function editcomp($id) {
        return $this->db->select('SELECT * FROM compagne WHERE id = :id', array(':id' => $id));
    }

    //***editdon ***//
    public function editdon($id) {
        return $this->db->select('SELECT * FROM don WHERE id = :id', array(':id' => $id));
    }

    public function editSavedon($data) {
        $postData = array(
			'IDDNR' => $data['IDDNR'],
            'TDNR' => $data['TYPEDONNEUR'],
            'TDON' => $data['TYPEDON'],
            'POIDS' => $data['POIDS'],
            'Taille' => $data['Taille'],
            'TAS' => $data['TAS'],
            'TAD' => $data['TAD'],
            'STR' => $data['LIEUX'],
            'DATEDON' => $data['DATEDON'],
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS' => $data['RHESUS'],
            'CRH2' => $data['GRRH2'],
            'ERH3' => $data['GRRH3'],
            'CRH4' => $data['GRRH4'],
            'ERH5' => $data['GRRH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'AGEDNR' => $data['AGEDNR'],
            'IND' => $data['IND']
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';	
        $this->db->update('don', $postData, "id =" . $data['id'] . "");
    }

    //***deletedon ***//
    public function deletedon($id) {
        $this->db->delete('don', "id = '$id'");
    }

    public function editSavecomp($data) {
        $postData = array(
            'WILAYA' => $data['WILAYAR'],
            'COMMUNE' => $data['COMMUNER'],
            'ADRESSE' => $data['ADRESSE'],
            'STR' => $data['STR'],
            'DATEDON' => $data['DATEDON']
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';	
        $this->db->update('compagne', $postData, "id =" . $data['id'] . "");
    }

}
