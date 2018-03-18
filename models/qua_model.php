<?php

class Qua_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM don where $o like '$q%'  and IND='IND' order by IDP desc limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM don where $o like '$q%' and IND='IND' order by IDP desc ");
    }

    public function userList() {
        return $this->db->select('SELECT * FROM don where   IDP!="0"  AND IDP!=""  AND HVB="" AND IND="IND"  order by IDP    ');
    }

    public function userList1() {
        return $this->db->select('SELECT * FROM don where   IDP!="0"  AND IDP!=""    order by IDP desc   ');
    }

    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM don WHERE id = :id', array(':id' => $id));
    }

    public function editSave($data) {
        $postData = array(
            'GROUPAGE' => $data['GRABO'],
            'RHESUS' => $data['GRRH1'],
            'CRH2' => $data['GRRH2'],
            'ERH3' => $data['GRRH3'],
            'CRH4' => $data['GRRH4'],
            'ERH5' => $data['GRRH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'HVB' => $data['HVB'],
            'HVC' => $data['HVC'],
            'HIV' => $data['HIV'],
            'TPHA' => $data['TPHA'],
            'DATEQUA' => $data['DATEQUA']
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('don', $postData, "id =" . $data['id'] . "");
        $postData1 = array(
            'GRABO' => $data['GRABO'],
            'GRRH' => $data['GRRH1'],
            'CRH2' => $data['GRRH2'],
            'ERH3' => $data['GRRH3'],
            'CRH4' => $data['GRRH4'],
            'ERH5' => $data['GRRH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'HVB' => $data['HVB'],
            'HVC' => $data['HVC'],
            'HIV' => $data['HIV'],
            'TPHA' => $data['TPHA']
        );
        $this->db->update('dnr', $postData1, "id =" . $data['IDDNR'] . "");
    }

}
