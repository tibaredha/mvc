<?php

class Pat_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	    //***new pat ***//
    public function createlistmed($data) {
        $this->db->insert('medfn', array(
           'DATE' => $data['DATE'],
           'MED1' => $data['MED1'],
           'QUT1' => $data['QUT1'],
           'idp' => $data['idp'],
		   'USER' => 'tiba'
        ));   
    }
	
//******************************1ere partie****************************************//	
		 //***LIST MALADE HOSPITALISE ***//
    public function MALHOSP() {
        return $this->db->select('SELECT * FROM LIT ');
    }
//******************************2eme partie****************************************//		
    //***new pat ***//
    public function create($data) {
        $this->db->insert('pat', array(
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

	//***search pat ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM pat where $o like '$q%' order by NOM,id limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM pat where $o like '$q%' order by NOM ");
    }

    //***view pat ***//
    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM pat WHERE id = :id', array(':id' => $id));
    }

    public function donSingleList($id) {
        return $this->db->select('SELECT * FROM cons WHERE IDDNR = :id  order by DATEDON desc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	 public function donSingleList1($id) {
        return $this->db->select('SELECT * FROM hosp WHERE IDDNR = :id  order by DATEDON desc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	//***createhosp ***//
    public function createhosp($data) {
        $this->db->insert('hosp', array(
            'IDDNR' => $data['id'],
            'AGEDNR' => $data['AGEDNR'],
            'SEXEDNR' => $data['SEXEDNR'],
            'TDNR' => $data['TYPEDONNEUR'],
            'POIDS' => $data['POIDS'],
            'Taille' => $data['Taille'],
            'TAS' => $data['TA'],
            'TAD' => $data['TA1'],
            'DATEDON' => $data['DATEDON'],
            'HEUREDON' => $data['HEUREDON'],
            'GROUPAGE' => $data['GRABO'],
            'RHESUS' => $data['GRRH'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'MOTIF' => $data['MOTIF'],
            'DGC' => $data['DGC'],
            'SERVICE' => $data['SERVICE'],
            'NLIT' => $data['NLIT'],
		    'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        ));

        // MISE AJOUR  DDD   DDD   AVEC TABLE DONNEUR 
        // $id=$data['id'];
        // $NBRDONS=$this->db->rowCount($id);
        $NBRDONS = 0;
        $DATEDON = $data['DATEDON'];
        $DPD = $this->addDayswithdate($DATEDON, 10); //
        $postData = array(
            'DDD' => $DATEDON,
            'DPD' => $DPD,
            'NBRDONS' => $NBRDONS
        );
        //echo '<pre>';print_r ($data);echo '<pre>';
        $this->db->update('pat', $postData, "id =" . $data['id'] . "");
        // MISE AJOUR  NBRDONS   AVEC TABLE DONNEUR	rowCount()
		
		// MISE AJOUR table lit 
		 $postData1 = array(
            'idpt' => $data['id']    
        );
        //echo '<pre>';print_r ($data);echo '<pre>';
        $this->db->update('lit', $postData1, "idlit =" . $data['NLIT'] . "");	
    }

	//***createcons ***//
    public function createcons($data) {
        $this->db->insert('cons', array(
            'IDDNR' => $data['id'],
            'AGEDNR' => $data['AGEDNR'],
            'SEXEDNR' => $data['SEXEDNR'],
            'TDNR' => $data['TYPEDONNEUR'],
            'POIDS' => $data['POIDS'],
            'Taille' => $data['Taille'],
            'TAS' => $data['TA'],
            'TAD' => $data['TA1'],
            'DATEDON' => $data['DATEDON'],
            'HEUREDON' => $data['HEUREDON'],
            'GROUPAGE' => $data['GRABO'],
            'RHESUS' => $data['GRRH'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
			'MOTIF' => $data['MOTIF'],
            'DGC' => $data['DGC'],
			'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        ));

        // MISE AJOUR  DDD   DDD   AVEC TABLE DONNEUR 
        // $id=$data['id'];
        // $NBRDONS=$this->db->rowCount($id);
        $NBRDONS = 0;
        $DATEDON = $data['DATEDON'];
        $DPD = $this->addDayswithdate($DATEDON, 10); //
        $postData = array(
            'DDD' => $DATEDON,
            'DPD' => $DPD,
            'NBRDONS' => $NBRDONS
        );
        //echo '<pre>';print_r ($data);echo '<pre>';
        $this->db->update('pat', $postData, "id =" . $data['id'] . "");
        // MISE AJOUR  NBRDONS   AVEC TABLE DONNEUR	rowCount()	
    }

	//***editpat***//
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
        $this->db->update('pat', $postData, "id =" . $data['id'] . "");
    }
	 //***deletepat***//
    public function deletepat($id) {
        //table don avoire les numero de poche avec le dnr 
        //efface lee numero de poche table cgr 
        //efface les don 
        //pui effacer le dnr 
        // novelle methode  verifier le role avant de supprimer  id user 
        // $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));
        // if ($result[0]['role'] == 'owner')
        // return false;
        $this->db->delete('pat', "id = '$id'");
    }
	 //la supression des dons du donneur  avec deletem plusier enrengistrements 
    public function deletepatcon($id) {
        $this->db->deletem('cons', "IDDNR = '$id'");
    }
//******************************3eme partie****************************************//	
	
	public function GESTATION($id) {
        return $this->db->select("SELECT * FROM pat WHERE IDMERE = :id   order by  DATENAISSANCE asc ", array(':id' => $id));
    }
	
	
	public function bilanSingleList($id) {
        return $this->db->select('SELECT * FROM bio WHERE ID = :id and TYPEID ="PAT" order by DATEDON asc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	//***createbilan***//
    public function createbilan($data) {
	//echo '<pre>';print_r ($data);echo '<pre>';
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
		'TYPEID' => 'PAT'
         )); 
	}
	 //***deletebilan ***//
    public function deletebilan($id) {
        $this->db->delete('bio', "idbio = '$id'");
    } 
	public function radioSingleList($id) {
        return $this->db->select('SELECT * FROM radio WHERE ID = :id and TYPEID ="PAT" order by DATEDON asc ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	//vaccination
	public function createidvac($id) {
	//echo '<pre>';print_r ($data);echo '<pre>';
	 $this->db->insert('vaccin', array(
        'idpat' =>$id
         )); 
	}
	public function updatevaccin($data) {
        $postData = array(
			'idpat' => $data['id'],
            '1' => $data['1'],
			'2' => $data['2'],
			'3' => $data['3'],
			'4' => $data['4'],
			'5' => $data['5'],
			'6' => $data['6'],
			'7' => $data['7'],
			'8' => $data['8'],
			'9' => $data['9'],
			'10' => $data['10'],
			'11' => $data['11'],
			'12' => $data['12'],
			'13' => $data['13'],
			'14' => $data['14'],
			'15' => $data['15'],
			'16' => $data['16'],
			'17' => $data['17'],
			'18' => $data['18'],
			'19' => $data['19'],
			'20' => $data['20'],
			'21' => $data['21'],
			'22' => $data['22'],
			'23' => $data['23'],
			'24' => $data['24'],
			'25' => $data['25'],
			'26' => $data['26'],
			'27' => $data['27'],
			'28' => $data['28'],
			'29' => $data['29'],
			'30' => $data['30'],
			'31' => $data['31'],
			'32' => $data['32'],
			'33' => $data['33'],
			'34' => $data['34'],
			'35' => $data['35'],
			'36' => $data['36'],
			'37' => $data['37'],
			'38' => $data['38'],
			'39' => $data['39'],
			'40' => $data['40'],
			'41' => $data['41'],
			'42' => $data['42']	
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';	
        $this->db->update('vaccin', $postData, "idpat=" . $data['id'] . "");
    }
	public function deletevaccin($id) {
        $this->db->delete('vaccin', "idpat = '$id'");
    }
	public function vaccinSingleList($id) {
        return $this->db->select('SELECT * FROM vaccin WHERE idpat = :id ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	public function sassinglelist($id) {
        return $this->db->select('SELECT * FROM scor WHERE idpat = :id ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	public function rabsinglelist($id) {
        return $this->db->select('SELECT * FROM rab WHERE idpat = :id ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
//******************************4eme partie hospitalisation****************************************//	
	
	 //edit hospitalisation 
    public function edithosp($id) {
        return $this->db->select('SELECT * FROM hosp WHERE id = :id', array(':id' => $id));
    }
	public function editsortihosp($data) {
        $postData = array(
			'DATESORTI'  => $data['DATESORTI'],
			'HEURESORTI' => $data['HEURESORTI'],
			'MODESORTI'  => $data['MODESORTI'],
			'DH'         => $data['DH'],
			'CHAPITRE'   => $data['CHAPITRE'],
			'CATEGORIECIM' => $data['CATEGORIECIM'],
			'MAT' => $data['MAT'],
			'NDOS' => $data['NDOS'],
			'id' => $data['id']
			
        );
        //echo '<pre>';print_r ($postData);echo '<pre>';	
        $this->db->update('hosp', $postData, "id =" . $data['id'] . "");
		
		 $postData1 = array(
     	'idpt' => '0'
        );
	
         // echo '<pre>';print_r ($postData1);echo '<pre>';
		 // echo '<pre>';print_r ($data);echo '<pre>';
        $this->db->update('lit', $postData1, "idlit =" . $data['NLIT'] . "");//mise ajour table lit en liberant le lit 
    }
	
	 public function editSavehosp($data) {
        $postData = array(
			'IDDNR' => $data['IDDNR'],
            'AGEDNR' => $data['AGEDNR'],
            'SEXEDNR' => $data['SEXEDNR'],
			'MAT' => $data['MAT'],
            'NDOS' => $data['NDOS'],
			'DATEDON' => $data['DATEDON'],
			'SERVICE' => $data['SERVICE'],
			'NLIT' => $data['NLIT'],
			'MOTIF' => $data['MOTIF'],
			'DGC' => $data['DGC'],
			'DATESORTI' => $data['DATESORTI'],
			'HEURESORTI' => $data['HEURESORTI'],
			'MODESORTI' => $data['MODESORTI'],
			'POIDS' => $data['POIDS'],
            'Taille' => $data['Taille'],
            'TAS' => $data['TAS'],
            'TAD' => $data['TAD'],
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS' => $data['RHESUS'],
            'CRH2' => $data['GRRH2'],
            'ERH3' => $data['GRRH3'],
            'CRH4' => $data['GRRH4'],
            'ERH5' => $data['GRRH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2']   
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';	
        $this->db->update('hosp', $postData, "id =" . $data['id'] . "");
    }
	
	  //***deletehosp ***//
    public function deletehosp($id) {
        $this->db->delete('hosp', "id = '$id'");
    }
	
	 //***deletecons ***//
    public function deletecons($id) {
        $this->db->delete('cons', "id = '$id'");
    }
	
	function addDayswithdate($date, $days) {
        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);
    }

}
