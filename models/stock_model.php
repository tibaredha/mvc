<?php

class Stock_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //***cgr***//
    public function userListcgr() {
        $date = date('y-01-01');
        return $this->db->select("SELECT * FROM cgr where  DATEPER >= '$date' order by NDP desc ");
    }

    public function userSingleListcgr($id) {
        return $this->db->select('SELECT * FROM cgr WHERE IDCGR = :id', array(':id' => $id));
    }

    public function editSavecgr($data) {
        $postData = array(
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS' => $data['RHESUS'],
            'DATEDON' => $data['DATEDON'],
            'DATEPER' => $data['DATEPER'],
            'NDP' => $data['NDP'],
            'DIST' => $data['DIST'],
            'DATEDIS' => $data['DATEDIS'],
            'IDREC' => $data['IDREC'],
			'SERVICE' => $data['SERVICE']
        );
        echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('cgr', $postData, "IDCGR =" . $data['IDCGR'] . "");
    }

    public function deletecgr($id) {
        $this->db->delete('cgr', "IDCGR = '$id'");
    }

    //***pfc***//
    public function userListpfc() {
        $date = date('2015-01-01');
        return $this->db->select("SELECT * FROM pfc where  DATEPER >= '$date'  order by NDP desc ");
    }

    public function userSingleListpfc($id) {
        return $this->db->select('SELECT * FROM pfc WHERE IDPFC = :id', array(':id' => $id));
    }

    public function editSavepfc($data) {
        $postData = array(
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS' => $data['RHESUS'],
            'DATEDON' => $data['DATEDON'],
            'DATEPER' => $data['DATEPER'],
            'NDP' => $data['NDP'],
            'DIST' => $data['DIST'],
            'DATEDIS' => $data['DATEDIS'],
            'IDREC' => $data['IDREC'],
			'SERVICE' => $data['SERVICE']
        );
        //echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('pfc', $postData, "IDPFC =" . $data['IDPFC'] . "");
    }

    public function deletepfc($id) {
        $this->db->delete('pfc', "IDPFC = '$id'");
    }

    //***cps***//
    public function userListcps() {
        $date = date('y-01-01');
        return $this->db->select("SELECT * FROM cps where  DATEPER >= '$date'  order by NDP desc ");
    }

    public function userSingleListcps($id) {
        return $this->db->select('SELECT * FROM cps WHERE IDCPS = :id', array(':id' => $id));
    }

    public function editSavecps($data) {
        $postData = array(
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS' => $data['RHESUS'],
            'DATEDON' => $data['DATEDON'],
            'DATEPER' => $data['DATEPER'],
            'NDP' => $data['NDP'],
            'DIST' => $data['DIST'],
            'DATEDIS' => $data['DATEDIS'],
            'IDREC' => $data['IDREC'],
			'SERVICE' => $data['SERVICE']
        );
        //echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('cps', $postData, "IDCPS =" . $data['IDCPS'] . "");
    }

    public function deletecps($id) {
        $this->db->delete('cps', "IDCPS = '$id'");
    }

}
