<?php

class scolaire_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
     //***search ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM eleve where $o like '$q%' order by NOM,PRENOM limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM eleve where $o like '$q%' order by NOM ");
    }
 
	public function createeleve($data) {
       $this->db->insert('eleve', array(
		'NOM'  =>$data['NOM'],
		'PRENOM'  =>$data['PRENOM'],
		'FILSDE'  =>$data['FILSDE'],
		'ETDE'  =>$data['ETDE'],
		'SEXE'  =>$data['SEXE'],
		'DATENS'  =>$data['DATENS'],
		'WILAYAN'  =>$data['WILAYAN'],
		'COMMUNEN'  =>$data['COMMUNEN'],
		'TEL'  =>$data['TEL'],
		'TELF'  =>$data['TELF'],
		'EMAIL'  =>$data['EMAIL'],
		'WILAYAR'  =>$data['WILAYAR'],
		'COMMUNER'  =>$data['COMMUNER'],
		'ADRESSE'  =>$data['ADRESSE'],
		'GRABO'  =>$data['GRABO'],
		'GRRH'  =>$data['GRRH'],
		'NEC'  =>$data['NEC'],
		'DATEINS'  =>$data['DATEINS'],
		'WILAYASS'  =>$data['WILAYASS'],
		'COMMUNESS'  =>$data['COMMUNESS'],
		'ETASS'  =>$data['ETASS']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
        // return $last_id = $this->db->lastInsertId();
    }
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM eleve WHERE id = :id', array(':id' => $id));
    }
  
  
	public function scolSingleList($id) {
        return $this->db->select('SELECT * FROM scolaire WHERE NEC = :id  order by DATE asc ', array(':id' => $id));    
    }

    //***new *** ***//
    public function create($data) {
       $this->db->insert('scolaire', array(    
			'WILAYAN'  => $data['WILAYAN'],
			'COMMUNEN' => $data['COMMUNEN'],
			'NEC'      => $data['NEC'],
			'WILAYAR'  => $data['WILAYAR'],
			'COMMUNER' => $data['COMMUNER'],
			'ETA'      => $data['ETA'],
			'DATE'     => $data['DATE'],
			'CPS' => $data['CPS'],
			'PPS' => $data['PPS'],
			'OS'  => $data['OS'],
			'PS'  => $data['PS'],
			'CPS' => $data['CPS'],
			'PPS' => $data['PPS'],
			'OS'  => $data['OS'],
			'PS'  => $data['PS'],
			'AD1' => $data['AD1'],
			'AD2' => $data['AD2'],
			'AD3' => $data['AD3'],
			'AD4' => $data['AD4'],
			'AD5' => $data['AD5'],
			'AD6' => $data['AD6'],
			'AD7' => $data['AD7'],
			'AD8' => $data['AD8'],
			'AD9' => $data['AD9'],
			'AD10' => $data['AD10'],
			'AD11' => $data['AD11'],
			'AD12' => $data['AD12'],
			'AD13' => $data['AD13'],
			'AD14' => $data['AD14'],
			'AD15' => $data['AD15'],
			'AD16' => $data['AD16'],
			'AD17' => $data['AD17'],
			'AD18' => $data['AD18'],
			'AD19' => $data['AD19'],
			'AD20' => $data['AD20'],
			'AD21' => $data['AD21'],
			'AD22' => $data['AD22'],
			'AD23' => $data['AD23'],
			'AD24' => $data['AD24'],
			'AD25' => $data['AD25'],
			'TAD'  => $data['AD1']+$data['AD2']+$data['AD3']+$data['AD4']+$data['AD5']+$data['AD6']+$data['AD7']+$data['AD8']+$data['AD9']+$data['AD10']+$data['AD11']+$data['AD12']+$data['AD13']+$data['AD14']+$data['AD15']+$data['AD16']+$data['AD17']+$data['AD18']+$data['AD19']+$data['AD20']+$data['AD21']+$data['AD22']+$data['AD23']+$data['AD24']+$data['AD25'],
			'PALIER' => $data['PALIER']	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
        // return $last_id = $this->db->lastInsertId();
    }
	 public function updateeleve($data) {
        $postData = array(
        'DDE'  =>$data['DATE'],
		'ETASS'  =>$data['ETA']
        );
        $this->db->update('eleve', $postData, "id =" . $data['id'] . "");
    }
	 public function editSave($data) {
        $postData = array(
        'NOM'  =>$data['NOM'],
		'PRENOM'  =>$data['PRENOM'],
		'FILSDE'  =>$data['FILSDE'],
		'ETDE'  =>$data['ETDE'],
		'SEXE'  =>$data['SEXE'],
		'DATENS'  =>$data['DATENS'],
		'WILAYAN'  =>$data['WILAYAN'],
		'COMMUNEN'  =>$data['COMMUNEN'],
		'TEL'  =>$data['TEL'],
		'TELF'  =>$data['TELF'],
		'EMAIL'  =>$data['EMAIL'],
		'WILAYAR'  =>$data['WILAYAR'],
		'COMMUNER'  =>$data['COMMUNER'],
		'ADRESSE'  =>$data['ADRESSE'],
		'GRABO'  =>$data['GRABO'],
		'GRRH'  =>$data['GRRH'],
		'NEC'  =>$data['NEC'],
		'DATEINS'  =>$data['DATEINS'],
		'WILAYASS'  =>$data['WILAYASS'],
		'COMMUNESS'  =>$data['COMMUNESS'],
		'ETASS'  =>$data['ETASS']
        );
        $this->db->update('eleve', $postData, "id =" . $data['id'] . "");
    }
	 public function deleteeleve($id) {
        //table don avoire les numero de poche avec le dnr 
        //efface lee numero de poche table cgr 
        //efface les don 
        //pui effacer le dnr 
        // novelle methode  verifier le role avant de supprimer  id user 
        // $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));
        // if ($result[0]['role'] == 'owner')
        // return false;
        $this->db->delete('eleve', "id = '$id'");
    }
	 public function deletevmseleve($id) {
        $this->db->deletem('scolaire', "NEC = '$id'");
    }
	
	
	 public function createetabscolaire($data) {
       $this->db->insert('etabscolaire', array(
	        'WILAYAN'  => $data['WILAYAN'],
			'COMMUNEN' => $data['COMMUNEN'],
			'ETA'      => $data['ETA'],
			'DATE'     => $data['DATE'],
			'ADRESSE'  => $data['ADRESSE'],
			'TYPEETA'  => $data['TYPEETA'],
			'CLASES'   => $data['CLASES'],
			'CANTINE'  => $data['CANTINE'],
			'AEP'      => $data['AEP'],
			'SANITAIRE'=> $data['SANITAIRE']
		));
        // echo '<pre>';print_r ($data);echo '<pre>';
        // return $last_id = $this->db->lastInsertId();
    }
	public function createeffectif($data) {
       $this->db->insert('scol_effectif', array(
	        'WILAYAR'  => $data['WILAYAR'],
			'COMMUNER' => $data['COMMUNER'],
			'ETA'      => $data['ETA'],
			'DATE'     => $data['DATE'],
			'ap1'      => $data['1ap'],
		    'ap2'      => $data['2ap'],
		    'ap3'      => $data['3ap'],
		    'ap4'      => $data['4ap'],
		    'ap5'      => $data['5ap'],
		    'am1'      => $data['1am'],
		    'am2'      => $data['2am'],
		    'am3'      => $data['3am'],
		    'am4'      => $data['4am'],
		    'as1'      => $data['1as'],
		    'as2'      => $data['2as'],
		    'as3'      => $data['3as']	
		));
        echo '<pre>';print_r ($data);echo '<pre>';
        // return $last_id = $this->db->lastInsertId();
    }
	 public function suiviemedical() {
        return $this->db->select("SELECT * FROM scolaire ");
    }
	
	public function createchsl($data) {
       $this->db->insert('chsl', array(   
		'WILAYAR'  =>$data['WILAYAR'],
		'COMMUNER'  => $data['COMMUNER'],
		'ETA'  => $data['ETA'],
		'CH'  => 1 ,
		'STCLASES'  => $data['STCLASES'],
		'STCANTINE'  => $data['STCANTINE'],
		'STAEP'  => $data['STAEP'],
		'STSANITAIRE'  => $data['STSANITAIRE'],
		'STENVIRONNEMENT'  => $data['STENVIRONNEMENT'],
		'RGCLASES'  => $data['RGCLASES'],
		'RGCANTINE'  => $data['RGCANTINE'],
		'RGAEP'  => $data['RGAEP'],
		'RGSANITAIRE'  => $data['RGSANITAIRE'],
		'RGENVIRONNEMENT'  => $data['RGENVIRONNEMENT'],
		'DATE'  => $data['DATE']	
		));
        // echo '<pre>';print_r ($data);echo '<pre>';
        // return $last_id = $this->db->lastInsertId();
    }

	public function userSingleLists($id) {
        return $this->db->select('SELECT * FROM scolaire WHERE id = :id', array(':id' => $id));
    }

	 public function editscolaireok($data) {
        $postData = array(
            'WILAYAN'  => $data['WILAYAN'],
			'COMMUNEN' => $data['COMMUNEN'],
			'NEC'      => $data['NEC'],
			'WILAYAR'  => $data['WILAYAR'],
			'COMMUNER' => $data['COMMUNER'],
			'ETA'      => $data['ETA'],
			'DATE'     => $data['DATE'],
			'CPS' => $data['CPS'],
			'PPS' => $data['PPS'],
			'OS'  => $data['OS'],
			'PS'  => $data['PS'],
			'AD1' => $data['AD1'],
			'AD2' => $data['AD2'],
			'AD3' => $data['AD3'],
			'AD4' => $data['AD4'],
			'AD5' => $data['AD5'],
			'AD6' => $data['AD6'],
			'AD7' => $data['AD7'],
			'AD8' => $data['AD8'],
			'AD9' => $data['AD9'],
			'AD10' => $data['AD10'],
			'AD11' => $data['AD11'],
			'AD12' => $data['AD12'],
			'AD13' => $data['AD13'],
			'AD14' => $data['AD14'],
			'AD15' => $data['AD15'],
			'AD16' => $data['AD16'],
			'AD17' => $data['AD17'],
			'AD18' => $data['AD18'],
			'AD19' => $data['AD19'],
			'AD20' => $data['AD20'],
			'AD21' => $data['AD21'],
			'AD22' => $data['AD22'],
			'AD23' => $data['AD23'],
			'AD24' => $data['AD24'],
			'AD25' => $data['AD25'],
			'TAD'  => $data['AD1']+$data['AD2']+$data['AD3']+$data['AD4']+$data['AD5']+$data['AD6']+$data['AD7']+$data['AD8']+$data['AD9']+$data['AD10']+$data['AD11']+$data['AD12']+$data['AD13']+$data['AD14']+$data['AD15']+$data['AD16']+$data['AD17']+$data['AD18']+$data['AD19']+$data['AD20']+$data['AD21']+$data['AD22']+$data['AD23']+$data['AD24']+$data['AD25'],
			'PALIER' => $data['PALIER']	
        );
		// echo '<pre>';print_r ($data);echo '<pre>';
        $this->db->update('scolaire', $postData, "id =" . $data['id'] . "");
    }
	
	
	 public function deletescolaire($id) {
        $this->db->delete('scolaire', "id = '$id'");
    }
	public function createrdv($data) {
       $this->db->insert('rdv', array(
		 'TIRDV'    => $data['TIRDV'],
		 'TYRDV'    => $data['TYRDV'],
		 'TXRDV'    => $data['TXRDV'],
		 'DATERDV'  => $data['DATERDV']
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
        // return $last_id = $this->db->lastInsertId();
    }
	 public function deleterdv($id) {
        $this->db->delete('rdv', "id = '$id'");
    }
	
	
	
	
	
	//**************************************************fin*****************************************************************//
	
	
	
	
	
   
   
   

   
	
	//***createbilan***//
    // public function createbilan($data) {
	// 
	 // $this->db->insert('bio', array(
        // 'ID' =>$data['id'] ,
		// 'SEXEDNR' =>$data['SEXEDNR'],
		// 'AGEDNR' =>$data['AGEDNR'] ,
		// 'GB' =>$data['GB'] ,
		// 'PNN' =>$data['PNN'] ,
		// 'PNE' =>$data['PNE'] ,
		// 'PNB' =>$data['PNB'] ,
		// 'LYM' =>$data['LYM'] ,
		// 'MON' =>$data['MON'] ,
		// 'GR' =>$data['GR'] ,
		// 'HT' =>$data['HT'] ,
		// 'HB' =>$data['HB'] ,
		// 'VGM' =>$data['VGM'] ,
		// 'CCMH' =>$data['CCMH'] ,
		// 'TCMH' =>$data['TCMH'] ,
		// 'PLQ' =>$data['PLQ'] ,
		// 'VMP' =>$data['VMP'] ,
		// 'IDP' =>$data['IDP'] ,
		// 'PCT' =>$data['PCT'] ,
		// 'TP' =>$data['TP'] ,
		// 'INR' =>$data['INR'] ,
		// 'NA' =>$data['NA'] ,
		// 'K' =>$data['K'] ,
		// 'PHO' =>$data['PHO'] ,
		// 'CL' =>$data['CL'] ,
		// 'CA' =>$data['CA'] ,
		// 'PH' =>$data['PH'] ,
		// 'CRP' =>$data['CRP'] ,
		// 'VS1' =>$data['VS1'] ,
		// 'VS2' =>$data['VS2'] ,
		// 'FIB' =>$data['FIB'] ,
		// 'GLY' =>$data['GLY'] ,
		// 'HBGLY' =>$data['HBGLY'] ,
		// 'CT' =>$data['CT'] ,
		// 'HDL' =>$data['HDL'] ,
		// 'LDL' =>$data['LDL'] ,
		// 'TGL' =>$data['TGL'] ,
		// 'CTHDL' =>$data['CTHDL'] ,
		// 'LDLHDL' =>$data['LDLHDL'] ,
		// 'ASPECT' =>$data['ASPECT'] ,
		// 'UREE' =>$data['UREE'] ,
		// 'CREAT' =>$data['CREAT'] ,
		// 'ACU' =>$data['ACU'] ,
		// 'DATEDON' =>$data['DATEDON'],
		// 'HEUREDON' =>$data['HEUREDON'],
		// 'CRS' => $data['REGION'],
        // 'WRS' => $data['WILAYA'],
        // 'SRS' => $data['STRUCTURE'],
        // 'USER' => $data['login'],
		// 'TYPEID' => 'DNR'
         // )); 
	// }
	// public function bilanSingleList($id) {
        // return $this->db->select('SELECT * FROM bio WHERE ID = :id and TYPEID ="dnr" order by DATEDON asc ', array(':id' => $id));
        
    // }
	 //***deletebilan ***//
    // public function deletebilan($id) {
        // $this->db->delete('bio', "idbio = '$id'");
    // } 
	 
	 function addDayswithdate($date, $days) {
        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);
    } 
   
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

   
	 // public function userlistdoublons() {
        // return $this->db->select('SELECT COUNT(*) AS nbr_doublon,NOM,PRENOM,id,DATENAISSANCE,GRABO,GRRH,TELEPHONE FROM DNR GROUP BY NOM,PRENOM HAVING COUNT(*) > 1');
    // }
	

// * from dnr
//
//SELECT COUNT(IDDNR) as NBRDON,IDDNR,GROUPAGE,RHESUS,DATEDON   FROM don GROUP BY IDDNR HAVING COUNT( IDDNR ) >2 order by NBRDON desc    	
	
    //********************************************************//

   

}
