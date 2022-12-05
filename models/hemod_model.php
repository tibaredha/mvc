<?php

class hemod_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
    //***new hemod ***//
    public function create($data) {
		$Date1 = $this->dateFR2US($data['DATENS']) ;
		$Date2 = $data['DPD'] ;
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
	    // $Date11 = $this->dateFR2US($value['DATEHOSPI']) ;
		// $Date22 = $this->dateFR2US($value['DINS']) ;
		// $Timestamp11 = CalculateTimestampFromCurrDatetime($Date11);
		// $Timestamp22 = CalculateTimestampFromCurrDatetime($Date22);
		// $DateDiff1 = CalculateDateDifference($Timestamp11, $Timestamp22);
        
		
		$this->db->insert('hemo', array(
		    //'DINS' => $this->dateFR2US($data['DINS']),
		    //'HINS' => $data['HINS'],
			
			'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILS' => $data['FILSDE'],
			'ETDE' => $data['ETDE'],
			
			'SEX' => $data['SEXE'],
			
			// 'DATENAISSA' => $this->dateFR2US($data['DATENS']),
			// 'WILAYA' => $data['WILAYAN'],
            // 'COMMUNE' => $data['COMMUNEN'],
            // 'WILAYAR' => $data['WILAYAR'],
            // 'COMMUNER' => $data['COMMUNER'],
            // 'ADRESSE' => $data['ADRESSE'],
            // 'TELEPHONE' => $data['TEL'],
            
			
			// 'GRABO' => $data['GRABO'],
			// 'GRRH' => $data['GRRH'],
            // 'CRH2' => $data['CRH2'],
            // 'ERH3' => $data['ERH3'],
            // 'CRH4' => $data['CRH4'],
            // 'ERH5' => $data['ERH5'],
            // 'KELL1' => $data['KELL1'],
            // 'KELL2' => $data['KELL2'],
            // 'HIV' => $data['HIV'],
			// 'HVB' => $data['HVB'],
			// 'HVC' => $data['HVC'],
			// 'TPHA' => $data['TPHA'],
		    // 'DATE1ERSEA' => $data['DPD'],
			// 'POIDS' => $data['POIDS'],
			// 'NSS' => $data['NSS'],
			// 'ASSURE' => $data['ASSURE'],
			// 'CAUSEMALAD' => $data['CAUSE'],
			// 'CODGC' => $data['COMOR'],
		    // 'AGE1SEANCE' => $DateDiff['years'], 
			// 'GROUPE' => $data['GROUPE'],
			// 'JOURS' => $data['JOURS'],
			// 'BRANCHEMENT' => $data['BRANCHEMENT'],
			// 'FORFAIT' => $data['FORFAIT'],
		    
			// 'DNASSURE' => $data['DNASSURE'],
			// 'QUALITE' => $data['QUALITE'],
			// 'CAISSE' => $data['CAISSE'],
			// 'NCP' => $data['NCP'],
			// 'ADRESSENSS' => $data['ADRESSENSS'],
			// 'APP' => $data['APP'],
			// 'TRANS' => $data['TRANS']
		));
	         
         //echo '<pre>';print_r ($data);echo '<pre>';
        return $last_id = $this->db->lastInsertId();
    }
	public function editSave($data) {
        $Date1 = $this->dateFR2US($data['DATENS']) ;
		$Date2 = $data['DPD'] ;
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
		
		$postData = array(
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILS' => $data['FILSDE'],
			'ETDE' => $data['ETDE'],
			'SEX' => $data['SEXE'],
			'DATENAISSA' =>$this->dateFR2US($data['DATENS']),
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
            'HIV' => $data['HIV'],
			'HVB' => $data['HVB'],
			'HVC' => $data['HVC'],
			'TPHA' => $data['TPHA'],
		    'DATE1ERSEA' => $data['DPD'],
			'POIDS' => $data['POIDS'],
			'NSS' => $data['NSS'],
			'ASSURE' => $data['ASSURE'],
			'CAUSEMALAD' => $data['CAUSE'],
			'CODGC' => $data['COMOR'],
		    'AGE1SEANCE' => $DateDiff['years'], 
			'GROUPE' => $data['GROUPE'],
			'JOURS' => $data['JOURS'],
			'BRANCHEMENT' => $data['BRANCHEMENT'],
			'FORFAIT' => $data['FORFAIT'],
			//'DINS' => $data['DINS'],
		    //'HINS' => $data['HINS'],
			'DNASSURE' => $data['DNASSURE'],
			'QUALITE' => $data['QUALITE'],
			'CAISSE' => $data['CAISSE'],
			'NCP' => $data['NCP'],
			'ADRESSENSS' => $data['ADRESSENSS'],
			'APP' => $data['APP'],
			'TRANS' => $data['TRANS']
        );
       $this->db->update('hemo', $postData, "id =" . $data['id'] . "");
	    // echo '<pre>';print_r ($postData);echo '<pre>';
    }
    //***search hemod ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM hemo where $o like '$q%' order by NOM,PRENOM limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM hemo where $o like '$q%' order by NOM ");
    }

    //***view hemod ***//
    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM hemo WHERE id = :id', array(':id' => $id));
    }

    public function SeanceSingleList($id) {
        return $this->db->select('SELECT * FROM hemoseance WHERE id = :id   ', array(':id' => $id));
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
	//***deletehemod***//
    public function deletehemod($id) {   
        $this->db->delete('hemo', "id = '$id'");
    }
	
	 //***createseance ***//
    public function createseance($data) {
		// $Date1 = $this->dateFR2US($data['DATENS']) ;
		// $Date2 = $data['DPD'] ;
		// $Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		// $Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		// $DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
        $this->db->insert('hemoseance', array( 
			'dateseance' => $data['DATE'],
			'heures'     => $data['HEUR'],
            'id'         => $data['id'],
			'TYPEDIA'    => $data['TYPEDIA'],
			'NAPP'       => $data['NAPP'],
			'ACCSANG'    => $data['ACCSANG'],
			'IDE'        => $data['IDE'],
			'MEDECIN'    => $data['MEDECIN'],
			'HEUREDD'    => $data['HEUREDD'],
			'HEUREFD'    => $data['HEUREFD'],
			'POIDS'      => $data['PI'] ,
			'POIDSD'     => $data['PJ'] ,
			'PP'         => $data['PP'] ,
			'POIDSF'     => $data['POIDSF'],
			'PPFS'       => $data['PPFS'] ,
			'EPO'        =>$data['EPO'] ,
		    'FER'        =>$data['FER'] ,
			
			// '' =>$data[''] ,
		// '' =>$data['UNIP'] ,
		// '' =>$data['EC'] ,
		// '' =>$data['TYPEDIA'] ,
		// '' =>$data['ACCSANG'] ,
		// '' =>$data['HEPARINE'] ,
		// '' =>$data['DDIA'] ,
		// '' =>$data['PAP'] ,
		// '' =>$data['UFPH'] ,
		// '' =>$data['UFT'] ,
		// '' =>$data['EPO'] ,
		// '' =>$data['FER'] ,
		// '' =>$data['AUTRES'] ,
		
		// '' =>$data['DEX'],
		// '' =>$data['TA'],
		// '' =>$data['POO'],
		// '' =>$data['SCO'],
		
		// '' =>$data['AUTRESAP'] ,
		// '' =>$data['HEMODIALYSEUR'] ,
		// '' =>$data['NAPP'] ,
		// '' =>$data['BAIN'] ,
		// '' =>$data['RINC'] ,
		
		// '' =>$data['HRD1'] ,
		// '' =>$data['UFH1'] ,
	    // '' =>$data['UFE1'] ,
		// '' =>$data['TAS1'] ,
		// '' =>$data['TAD1'] ,
		// '' =>$data['DES1'] ,
		// '' =>$data['PRV1'] ,
		// '' =>$data['DEB1'] ,
		// '' =>$data['PTM1'] ,
		// '' =>$data['CDC1'] ,
		// '' =>$data['OBS1'] ,
	
		// '' =>$data['HRD2'] ,
		// '' =>$data['UFH2'] ,
	    // '' =>$data['UFE2'] ,
		// '' =>$data['TAS2'] ,
		// '' =>$data['TAD2'] ,
		// '' =>$data['DES2'] ,
		// '' =>$data['PRV2'] ,
		// '' =>$data['DEB2'] ,
		// '' =>$data['PTM2'] ,
		// '' =>$data['CDC2'] ,
		// '' =>$data['OBS2'] ,
	
		// '' =>$data['HRD3'] ,
		// '' =>$data['UFH3'] ,
	    // '' =>$data['UFE3'] ,
		// '' =>$data['TAS3'] ,
		// '' =>$data['TAD3'] ,
		// '' =>$data['DES3'] ,
		// '' =>$data['PRV3'] ,
		// '' =>$data['DEB3'] ,
		// '' =>$data['PTM3'] ,
		// '' =>$data['CDC3'] ,
		// '' =>$data['OBS3'] ,
	
		// '' =>$data['HRD4'] ,
		// '' =>$data['UFH4'] ,
	    // '' =>$data['UFE4'] ,
		// '' =>$data['TAS4'] ,
		// '' =>$data['TAD4'] ,
		// '' =>$data['DES4'] ,
		// '' =>$data['PRV4'] ,
		// '' =>$data['DEB4'] ,
		// '' =>$data['PTM4'] ,
		// '' =>$data['CDC4'] ,
		// '' =>$data['OBS4'] ,
	
		// '' =>$data['HRD5'] ,
		// '' =>$data['UFH5'] ,
	    // '' =>$data['UFE5'] ,
		// '' =>$data['TAS5'] ,
		// '' =>$data['TAD5'] ,
		// '' =>$data['DES5'] ,
		// '' =>$data['PRV5'] ,
		// '' =>$data['DEB5'] ,
		// '' =>$data['PTM5'] ,
		// '' =>$data['CDC5'] ,
		// '' =>$data['OBS5'] ,
		// '' =>$data['VST'] ,
		// '' =>$data['COMM'] ,	
			
			
			
			// '' => $data[''],
			// 'SYSD'   => $data['SYSD'],
            // 'DIAD'   => $data['DIAD'], 
            // 'SYSF' => $data['SYSF'],
            // 'DIAF' => $data['DIAF'],
            // 'AGE1SEANCE' => $DateDiff['years'], 
		    'FORFAIT' =>$data['FORFAIT']    
        ));
		echo '<pre>';print_r ($data);echo '<pre>';
		$postData = array(
            'DDD' => $data['DATE'],
			'FORFAIT' => $data['FORFAIT']	
        );
		////echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('hemo', $postData, "id =" . $data['id'] . "");
		//// return $last_id = $this->db->lastInsertId();    
    }
	//***createbilan***//
    public function createbilan($data) {
	// echo '<pre>';print_r ($data);echo '<pre>';
	 $this->db->insert('HEMOBIO', array(
        'DATE' =>$data['DATE'] ,
		'id' =>$data['id'] ,
		'GB' =>$data['GB'] ,
		'GR' =>$data['GR'] ,
		'HB' =>$data['HB'] ,
		'HT' =>$data['HT'] ,
		'PLQT' =>$data['PLQT'] ,
		'TP' =>$data['TP'] ,
		'INR' =>$data['INR'] ,
		'VS1H' =>$data['VS1H'] ,
		'VS2H' =>$data['VS2H'] ,
		'BILIT' =>$data['BILIT'] ,
		'BILID' =>$data['BILID'] ,
		'TGO' =>$data['TGO'] ,
		'TGP' =>$data['TGP'] ,
		'ASLO' =>$data['ASLO'] ,
		'CRP' =>$data['CRP'] ,
		'TG' =>$data['TG'] ,
		'CHOLES' =>$data['CHOLES'] ,
		'HVB' =>$data['HVB'] ,
		'HVC' =>$data['HVC'] ,
		'HIV' =>$data['HIV'] ,
		'TPHA' =>$data['TPHA'] ,
		'ACURIQUE' =>$data['ACURIQUE'] ,
		'UREE' =>$data['UREE'] ,
		'CREAT' =>$data['CREAT'] ,
		'GLYCE' =>$data['GLYCE'] ,
		'NA' =>$data['NA'], 
		'K' =>$data['K'] ,
		'CA' =>$data['CA'] ,
		'PHOS' =>$data['PHOS'] ,
		'FERS' =>$data['FERS'] ,
		'FERE' =>$data['FERE'] ,
		'CL' =>$data['CL'] 
         )); 
	}
	
	public function hemodSortirok($data) {
        $postData = array(
            'DATESORTI' => $data['DATE'],
            'SORTI' => $data['MOTIF']    
        );
		echo '<pre>';print_r ($postData);echo '<pre>';
        $this->db->update('hemo', $postData, "id =" . $data['id'] . "");
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




//*************seance*************//

//***search hemod ***//
    public function userSearchs($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM hemoseance where $o like '$q%' order by ids limit $p,$l  ");
    }

    public function userSearchs1($o, $q) {
        return $this->db->select("SELECT * FROM hemoseance where $o like '$q%' order by ids ");
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
