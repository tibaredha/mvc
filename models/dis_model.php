<?php
// echo '<pre>';print_r ($postData);echo '<pre>';
class Dis_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    //***searchdis***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM dis where $o like '$q%'     order by DATEDIS desc limit $p,$l  ");//and DATEDIS >='2016-01-01'
    }
    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM dis where $o like '$q%'     order by DATEDIS desc ");//and DATEDIS >='2016-01-01'
    }
    //***DIS psl cgr pfc cps  ***//
    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM rec WHERE id = :id', array(':id' => $id));
    }
    //***********************************************************************************************************///
    public function editSave($data) {
        $postData = array(
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'DATENAISSANCE' => $data['DATENAISSANCE'],
            'TELEPHONE' => $data['TELEPHONE'],
            'DDT' => $data['DATE'],
            'GRABO' => $data['GRABO'],
            'GRRH' => $data['GRRH1'],
            'CRH2' => $data['GRRH2'],
            'ERH3' => $data['GRRH3'],
            'CRH4' => $data['GRRH4'],
            'ERH5' => $data['GRRH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2']
        );
        $this->db->update('rec', $postData, "id =" . $data['id'] . "");
    }
    public function delete($id) {
        $this->db->delete('rec', "id = '$id'");
    }
    public function userList() {
        return $this->db->select('SELECT * FROM rec limit 1000');
    }
    public function create($data) {
        // echo'<pre>';print_r ($data);echo '<pre>';
        $this->db->insert('rec', array(
            'DINS' => $data['DINS'],
            'HINS' => $data['HINS'],
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
            'GRABO' => $data['GRABO'],
            'GRRH' => $data['GRRH'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        ));
        return $last_id = $this->db->lastInsertId();
    }
	//***edit distribution***//
	 public function editdis($id) {
        return $this->db->select('SELECT * FROM dis WHERE id = :id', array(':id' => $id));
    }
	 public function editSavedis($data) {
        $postData = array(
            'IDP'      => $data['IDP'],
            'IDREC'    => $data['IDREC'],
            'SEX'      => $data['SEX'],
            'DATEDIS'  => $data['DATEDIS'],
            'DGC'      => $data['DGC'],
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS'   => $data['RHESUS'],
            'CRH2'     => $data['CRH2'],
            'ERH3'     => $data['ERH3'],
            'CRH4'     => $data['CRH4'],
            'ERH5'     => $data['ERH5'],
            'KELL1'    => $data['KELL1'],
            'KELL2'    => $data['KELL2'],
			'AGE'      => $data['AGE'],
			'MED'      => $data['MED']	
        );	
        $this->db->update('dis', $postData, "id =" . $data['id'] . "");
    }
	/**deletedis**/
	 public function deletedis($id) {
        $link = mysql_connect("localhost", "root", "");
        mysql_select_db("mvc", $link);
        $result = mysql_query("SELECT * FROM dis where id='$id' ", $link); //
        $row = mysql_fetch_array($result);
        $IDREC = trim($row["IDREC"]);
        $postData = array(
            'DIST' => '',
            'DATEDIS' => '0000-00-00',
            'IDREC' => '',
        );
		//delete distribution  
		//rendre disponible la poche distribuee au niveau de la table psl cgr pfc cps 
		//delete la distribution
		//metre ajour la table receveur pour la date derniere distribution 
        if ($row["PSL"] == 'CGR') {
            $this->db->update('cgr', $postData, "NDP =" . $row["IDP"] . "");
            $this->db->delete('dis', "id = '$id'");
            $result1 = mysql_query("SELECT * FROM dis where IDREC='$IDREC'   order by id desc limit 1 ", $link); //
            $row1 = mysql_fetch_array($result1);
            $postData1 = array(
                'DDT' => $row1["DATEDIS"]
            );
            $this->db->update('rec', $postData1, "id =" . $row["IDREC"] . "");
            header('location: ' . URL . 'rec/view/' . $row["IDREC"]);
        }
        if ($row['PSL'] == 'PFC') {
            $this->db->update('pfc', $postData, "NDP =" . $row["IDP"] . "");
            $this->db->delete('dis', "id = '$id'");
            $result1 = mysql_query("SELECT * FROM dis where IDREC='$IDREC'   order by id desc limit 1 ", $link); //
            $row1 = mysql_fetch_array($result1);
            $postData1 = array(
                'DDT' => $row1["DATEDIS"]
            );
            $this->db->update('rec', $postData1, "id =" . $row["IDREC"] . "");
            header('location: ' . URL . 'rec/view/' . $row["IDREC"]);
        }
        if ($row['PSL'] == 'CPS') {
            $this->db->update('cps', $postData, "NDP =" . $row["IDP"] . "");
            $this->db->delete('dis', "id = '$id'");
            $result1 = mysql_query("SELECT * FROM dis where IDREC='$IDREC'   order by id desc limit 1 ", $link); //
            $row1 = mysql_fetch_array($result1);
            $postData1 = array(
                'DDT' => $row1["DATEDIS"]
            );
            $this->db->update('rec', $postData1, "id =" . $row["IDREC"] . "");
            header('location: ' . URL . 'rec/view/' . $row["IDREC"]);
        }
    }	
    //*** non verifier***//
    public function donSingleList($id) {
        return $this->db->select('SELECT * FROM dis WHERE IDREC = :id', array(':id' => $id));
    }
    public function nbrdispsl($id) {
        $link = mysql_connect("localhost", "root", "");
        mysql_select_db("mvc", $link);
        $result = mysql_query("SELECT * FROM dis where IDREC='$id' ", $link);
        $num_rows = mysql_num_rows($result);
        //echo "$num_rows Rows\n";
        return $num_rows;
    }
    public function wilayamodel() {
        return $this->db->select('SELECT * FROM wil ');
    }

}
