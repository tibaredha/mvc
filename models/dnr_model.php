<?php

class Dnr_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //***new dnr ***//
    public function create($data) {
        $this->db->insert('dnr', array(
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

        // echo '<pre>';print_r ($data);echo '<pre>';
        return $last_id = $this->db->lastInsertId();
    }

    //***search dnr ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM dnr where $o like '$q%' order by NOM,PRENOM limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM dnr where $o like '$q%' order by NOM ");
    }

    //***view dnr ***//
    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM dnr WHERE id = :id', array(':id' => $id));
    }

    public function donSingleList($id) {
        return $this->db->select('SELECT * FROM don WHERE IDDNR = :id  order by DATEDON asc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
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
		'TYPEID' => 'DNR'
         )); 
	}
	public function bilanSingleList($id) {
        return $this->db->select('SELECT * FROM bio WHERE ID = :id and TYPEID ="dnr" order by DATEDON asc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	 //***deletebilan ***//
    public function deletebilan($id) {
        $this->db->delete('bio', "idbio = '$id'");
    } 
	 
	 
    //***createdon ***//
    public function createdon($data) {
        $this->db->insert('don', array(
            'IDP' => $data['IDP'],
            'IDDNR' => $data['id'],
            'AGEDNR' => $data['AGEDNR'],
            'SEXEDNR' => $data['SEXEDNR'],
            'TDNR' => $data['TYPEDONNEUR'],
            'TDON' => $data['TYPEDON'],
            'POIDS' => $data['POIDS'],
            'Taille' => $data['Taille'],
            'TAS' => $data['TA'],
            'TAD' => $data['TA1'],
            'STR' => $data['LIEUX'],
            'DATEDON' => $data['DATEDON'],
            'HEUREDON' => $data['HEUREDON'],
            'IND' => $data['IND'],
            'GROUPAGE' => $data['GRABO'],
            'RHESUS' => $data['GRRH'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'q1' => $data['q1'],
            'q2' => $data['q2'],
            'q3' => $data['q3'],
            'q4' => $data['q4'],
            'q5' => $data['q5'],
            'q6' => $data['q6'],
            'q7' => $data['q7'],
            'q8' => $data['q8'],
            'q9' => $data['q9'],
            'q10' => $data['q10'],
            'q11' => $data['q11'],
            'q12' => $data['q12'],
            'q13' => $data['q13'],
            'q14' => $data['q14'],
            'q15' => $data['q15'],
            'q16' => $data['q16'],
            'q17' => $data['q17'],
            'q18' => $data['q18'],
            'q19' => $data['q19'],
            'q20' => $data['q20'],
            'q21' => $data['q21'],
            'q22' => $data['q22'],
            'q23' => $data['q23'],
            'q24' => $data['q24'],
            'q25' => $data['q25'],
            'IND' => $data['IND'],
            'TYPEPOCHE' => $data['TYPEPOCHE'],
            'IDP' => $data['IDP'],
            'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
			'IDDNRCOMRES' => $data['COMMUNER'],
            'USER' => $data['login']
        ));

        // MISE AJOUR  DDD   DDD   AVEC TABLE DONNEUR 
        // $id=$data['id'];
        // $NBRDONS=$this->db->rowCount($id);
        $NBRDONS = 0;
        $DATEDON = $data['DATEDON'];
        $DPD = $this->addDayswithdate($DATEDON, 90); //
        $postData = array(
            'DDD' => $DATEDON,
            'DPD' => $DPD,
            'NBRDONS' => $NBRDONS
        );
        //echo '<pre>';print_r ($data);echo '<pre>';
        $this->db->update('dnr', $postData, "id =" . $data['id'] . "");
        // MISE AJOUR  NBRDONS   AVEC TABLE DONNEUR	rowCount()	
    }

    //***editdnr***//
    public function editSave($data) {
        $postData = array(
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
			'FILSDE' => $data['FILSDE'],
		    'DDD' => $data['DATE'],
            'GRABO' => $data['GRABO'],
            'GRRH' => $data['GRRH'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'DATENAISSANCE' => $data['DATENS'],
            'SEX' => $data['SEXE'],
            'WILAYA' => $data['WILAYAN'],
            'COMMUNE' => $data['COMMUNEN'],
            'WILAYAR' => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE' => $data['ADRESSE'],
            'TELEPHONE' => $data['TEL']
        );
        $this->db->update('dnr', $postData, "id =" . $data['id'] . "");
    }

    //***deletednr***//
    public function deletednr($id) {
        //table don avoire les numero de poche avec le dnr 
        //efface lee numero de poche table cgr 
        //efface les don 
        //pui effacer le dnr 
        // novelle methode  verifier le role avant de supprimer  id user 
        // $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));
        // if ($result[0]['role'] == 'owner')
        // return false;
        $this->db->delete('dnr', "id = '$id'");
    }

    //la supression des dons du donneur  avec deletem plusier enrengistrements 
    public function deletednrdon($id) {
        $this->db->deletem('don', "IDDNR = '$id'");
    }

    //***deletedon ***//
    public function deletedon($id) {
        $this->db->delete('don', "id = '$id'");
    }
	
    //**don par donneur **//
    public function userlistdpd() {
        return $this->db->select('SELECT COUNT(IDDNR) as NBRDON,IDDNR,GROUPAGE,RHESUS,DATEDON   FROM don GROUP BY IDDNR HAVING COUNT( IDDNR ) >2 order by NBRDON desc    ');
    }
	public function dnrwilaya() {
        return $this->db->select('SELECT * FROM wil   order by WILAYAS asc');
       
    }
	public function dnrcommune($id) {
        return $this->db->select('SELECT * FROM com WHERE IDWIL = :id  order by COMMUNE asc ', array(':id' => $id));
       
    }
	public function dnradresse($id) {
        return $this->db->select('SELECT * FROM adr WHERE IDCOM = :id  order by Adresse asc ', array(':id' => $id));
       
    }
	 public function userlistdoublons() {
        return $this->db->select('SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,id,DATENAISSANCE,GRABO,GRRH,TELEPHONE FROM DNR GROUP BY NOM,PRENOM HAVING COUNT(*) > 1');
    }
	

// * from dnr
//
//SELECT COUNT(IDDNR) as NBRDON,IDDNR,GROUPAGE,RHESUS,DATEDON   FROM don GROUP BY IDDNR HAVING COUNT( IDDNR ) >2 order by NBRDON desc    	
	
    //********************************************************//

    function addDayswithdate($date, $days) {
        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);
    }

}
