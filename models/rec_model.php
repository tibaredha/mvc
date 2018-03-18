<?php

class Rec_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //***newrec***//
    public function create($data) {
        // echo'<pre>';print_r ($data);echo '<pre>';
        $this->db->insert('rec', array(
            'DINS' => $data['DINS'],
            'HINS' => $data['HINS'],
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILSDE' => $data['FILSDE'],
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

    //***searchreceveur***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM rec where $o like '$q%' order by NOM,id limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM rec where $o like '$q%' order by NOM ");
    }

    //***viewreceveur***//
    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM rec WHERE id = :id', array(':id' => $id));
    }

    public function nbrdispsl($id) {
        $link = mysql_connect("localhost", "root", "");
        mysql_select_db("mvc", $link);
        $result = mysql_query("SELECT * FROM dis where IDREC='$id' ", $link);
        $num_rows = mysql_num_rows($result);
        //echo "$num_rows Rows\n";
        return $num_rows;
    }

    public function donSingleList($id) {
        return $this->db->select('SELECT * FROM dis WHERE IDREC = :id', array(':id' => $id));
    }
	
	//***createbilan***//
    public function createbilan($data) {
	echo '<pre>';print_r ($data);echo '<pre>';
	 $this->db->insert('bio', array(
        'ID' =>$data['id'] ,
		'SEXEDNR' =>$data['SEXEDNR'],
		'AGEDNR' =>$data['AGEDNR'] ,
		'GB' =>$data['GB'] ,
		'PNN' =>$data['PNN'] ,
		'PNE' =>$data['PNE'] ,
		'PNB' =>$data['PNB'] ,
		'LYM' =>$data['LYM'] ,
		'MON' =>$data['MON'] ,
		'GR' =>$data['GR'] ,
		'HT' =>$data['HT'] ,
		'HB' =>$data['HB'] ,
		'VGM' =>$data['VGM'] ,
		'CCMH' =>$data['CCMH'] ,
		'TCMH' =>$data['TCMH'] ,
		'PLQ' =>$data['PLQ'] ,
		'VMP' =>$data['VMP'] ,
		'IDP' =>$data['IDP'] ,
		'PCT' =>$data['PCT'] ,
		'TP' =>$data['TP'] ,
		'INR' =>$data['INR'] ,
		'NA' =>$data['NA'] ,
		'K' =>$data['K'] ,
		'PHO' =>$data['PHO'] ,
		'CL' =>$data['CL'] ,
		'CA' =>$data['CA'] ,
		'PH' =>$data['PH'] ,
		'CRP' =>$data['CRP'] ,
		'VS1' =>$data['VS1'] ,
		'VS2' =>$data['VS2'] ,
		'FIB' =>$data['FIB'] ,
		'GLY' =>$data['GLY'] ,
		'HBGLY' =>$data['HBGLY'] ,
		'CT' =>$data['CT'] ,
		'HDL' =>$data['HDL'] ,
		'LDL' =>$data['LDL'] ,
		'TGL' =>$data['TGL'] ,
		'CTHDL' =>$data['CTHDL'] ,
		'LDLHDL' =>$data['LDLHDL'] ,
		'ASPECT' =>$data['ASPECT'] ,
		'UREE' =>$data['UREE'] ,
		'CREAT' =>$data['CREAT'] ,
		'ACU' =>$data['ACU'] ,
		'DATEDON' =>$data['DATEDON'],
		'HEUREDON' =>$data['HEUREDON'],
		'CRS' => $data['REGION'],
        'WRS' => $data['WILAYA'],
        'SRS' => $data['STRUCTURE'],
        'USER' => $data['login'],
		'TYPEID' => 'REC'
         )); 
	}
	public function bilanSingleList($id) {
        return $this->db->select('SELECT * FROM bio WHERE ID = :id and TYPEID ="rec" order by DATEDON asc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	 //***deletebilan ***//
    public function deletebilan($id) {
        $this->db->delete('bio', "idbio = '$id'");
    }
    //***editreceveur***//
    public function editSave($data) {
        $postData = array(
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILSDE' => $data['FILSDE'],
			'SEX' => $data['SEXE'],
            'WILAYA' => $data['WILAYAN'],
            'COMMUNE' => $data['COMMUNEN'],
            'WILAYAR' => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE' => $data['ADRESSE'],
            'DATENAISSANCE' => $data['DATENS'],
            'TELEPHONE' => $data['TEL'],
            'DDT' => $data['DATE'],
            'GRABO' => $data['GRABO'],
            'GRRH' => $data['GRRH1'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2']
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('rec', $postData, "id =" . $data['id'] . "");
    }
    //***deletereceveur***//
    public function delete($id) {
        $this->db->delete('rec', "id = '$id'");
    }

    public function deletedisrec($id) {
        $this->db->deletem('dis', "IDREC = '$id'");
    }

    //***DIS psl cgr pfc cps  ***//	
    public function creatediscgr($data) {
        $this->db->insert('dis', array(
            'DATEDIS' => $data['DATEDIS'],
            'HEUREDIS' => $data['HEUREDIS'],
            
			'IDREC' => $data['id'],
            'SEX' => $data['SEX'],
            'AGE' => $data['AGE'],
            
			'GROUPAGE' => $data['GRABO'],
            'RHESUS' => $data['GRRH'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            
			'PSL' => $data['PSL'],
            'IDP' => $data['NDP'],
            'SERVICE' => $data['SERVICE'],
            'MED' => $data['MED'],
            'DGC' => $data['DGC'],
           
			'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        ));
        $ok = '1';
        $postData = array(
            'DIST' => $ok,
            'DATEDIS' => $data['DATEDIS'],
			'SERVICE' => $data['SERVICE'],
            'IDREC' => $data['id']
        );
        if ($data['PSL'] == 'CGR') {
            $this->db->update('cgr', $postData, "NDP =" . $data['NDP'] . ""); // MISE AJOUR AVEC TABLE cgr
            $DATEDIS = $data['DATEDIS'];
            $postData1 = array(
                'DDT' => $DATEDIS
            );
            $this->db->update('rec', $postData1, "id =" . $data['id'] . ""); // MISE  AJOUR  DDT  AVEC TABLE RECEVEUR
        }
        if ($data['PSL'] == 'PFC') {
            $this->db->update('pfc', $postData, "NDP =" . $data['NDP'] . ""); // MISE AJOUR AVEC TABLE pfc
            $DATEDIS = $data['DATEDIS'];
            $postData1 = array(
                'DDT' => $DATEDIS
            );
            $this->db->update('rec', $postData1, "id =" . $data['id'] . ""); // MISE  AJOUR  DDT  AVEC TABLE RECEVEUR
        }
        if ($data['PSL'] == 'CPS') {
            $this->db->update('cps', $postData, "NDP =" . $data['NDP'] . ""); // MISE AJOUR AVEC TABLE cps
            $DATEDIS = $data['DATEDIS'];
            $postData1 = array(
                'DDT' => $DATEDIS
            );
            $this->db->update('rec', $postData1, "id =" . $data['id'] . ""); // MISE  AJOUR  DDT  AVEC TABLE RECEVEUR
        }
    }

    //**dis par receveur **//
    public function userlistdpr() {
        return $this->db->select('SELECT COUNT(IDREC) as NBRDON,IDREC,GROUPAGE,RHESUS,DATEDIS   FROM dis GROUP BY IDREC HAVING COUNT( IDREC ) >1 order by NBRDON desc    ');
    }

}
