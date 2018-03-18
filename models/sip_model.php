<?php

class Sip_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //***__dnr__***//
    public function wilayamodel() {
        return $this->db->select('SELECT * FROM wil ');
    }

    public function userList() {
        return $this->db->select('SELECT * FROM mat limit 1000');
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM mat where $o like '$q%' and sex='F' order by NOM ");
    }

    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM mat where $o like '$q%'   and sex='F' order by NOM,id limit $p,$l  ");
    }

    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM mat WHERE id = :id', array(':id' => $id));
    }

    public function create($data) {
        $this->db->insert('mat', array(
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM']
        ));
    }

    public function editSave($data) {
        $postData = array(
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'DATE' => $data['DATE'],
            'GRABO' => $data['GRABO'],
            'GRRH' => $data['GRRH']
        );
        $this->db->update('mat', $postData, "id =" . $data['id'] . "");
    }

    public function delete($id) {
        // novelle methode  verifier le role avant de supprimer  id user 
        // $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));
        // if ($result[0]['role'] == 'owner')
        // return false;
        $this->db->delete('mat', "id = '$id'");
    }

    //***__don__***//
    public function createdon($data) {
        $this->db->insert('don', array(
            'IDDND' => $data['id'],
            'AGE' => $data['BIRTHDAY1']
        ));
    }

    public function donSingleList($id) {
        return $this->db->select('SELECT * FROM don WHERE IDDND = :id', array(':id' => $id));
    }

}
