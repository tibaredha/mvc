<?php

class mnpe_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	
	//***pa***//	
	public function createpa($data) {
        $this->db->insert('pa', array(    
		'AGE'  => $data['AGE'],      
		'SEXE' => $data['SEXE'],      
		'M3ET' => $data['M3ET'],      
		'M2ET' => $data['M2ET'],     
		'M1ET' => $data['M1ET'],     
		'MED'  => $data['MED'],       
		'P1ET' => $data['P1ET'],      
		'P2ET' => $data['P2ET'],      
		'P3ET' => $data['P3ET']         
        ));
    }
//***ta***//	
	public function createta($data) {
        $this->db->insert('ta', array(    
		'AGE'  => $data['AGE'],      
		'SEXE' => $data['SEXE'],      
		'M3ET' => $data['M3ET'],      
		'M2ET' => $data['M2ET'],     
		'M1ET' => $data['M1ET'],     
		'MED'  => $data['MED'],       
		'P1ET' => $data['P1ET'],      
		'P2ET' => $data['P2ET'],      
		'P3ET' => $data['P3ET']         
        ));
    }

//***PT***//	
	public function creatept($data) {
        $this->db->insert('pt', array(    
		'AGE'  => $data['AGE'],      
		'SEXE' => $data['SEXE'],      
		'M3ET' => $data['M3ET'],      
		'M2ET' => $data['M2ET'],     
		'M1ET' => $data['M1ET'],     
		'MED'  => $data['MED'],       
		'P1ET' => $data['P1ET'],      
		'P2ET' => $data['P2ET'],      
		'P3ET' => $data['P3ET']         
        ));
    }
//***mnpe ***//
    public function createmnpe($data) {
		$Date1 = dateFR2US($data['DATENS']) ;
		$Date2 = $data['DINS'];
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
        $IPA  = mnpe('pa',$DateDiff['months'],$data['SEXE'],$data['POIDS']);
        $ISTA = mnpe('ta',$DateDiff['months'],$data['SEXE'],$data['TAILLE']);
        $IPT  = mnpept('pt',trim($data['TAILLE']),$data['SEXE'],trim($data['POIDS']));
	    $this->db->insert('mnpe', array(
            'DINS' => $data['DINS'],
            'HINS' => $data['HINS'],
            'NOM' => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILSDE' => $data['FILSDE'],
			'SEX' => $data['SEXE'],
            'DATENAISSANCE' => $data['DATENS'],
			'Days' => $DateDiff['days'],
            'Weeks' => $DateDiff['weeks'],
            'Months' => $DateDiff['months'],
            'Years' => $DateDiff['years'],
			'WILAYA' => $data['WILAYAN'],
            'COMMUNE' => $data['COMMUNEN'],
            'WILAYAR' => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE' => $data['ADRESSE'],
            'TELEPHONE' => $data['TEL'],
            'POIDS' => $data['POIDS'],
            'TAILLE' => $data['TAILLE'],
            'HB'=> $data['HB'],
            'HT'=> $data['HT'],
			'IPA'=>$IPA,
            'ISTA'=>$ISTA,
			'IPT'=> $IPT,
            'CRS'=> $data['REGION'],
            'WRS'=> $data['WILAYA'],
            'SRS'=> $data['STRUCTURE'],
            'USER'=> $data['login']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';   
    }
public function deletemnpe($id) {       
        $this->db->delete('mnpe', "id = '$id'");
    }	
public function userSingleListmnpe($id) {
        return $this->db->select('SELECT * FROM mnpe WHERE id = :id', array(':id' => $id));
    }	
public function editSavemnpe($data) {
        $Date1 = dateFR2US($data['DATENS']) ;
		$Date2 = $data['DINS'];
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
        $IPA  = mnpe('pa',$DateDiff['months'],$data['SEXE'],$data['POIDS']);
        $ISTA = mnpe('ta',$DateDiff['months'],$data['SEXE'],$data['TAILLE']);
        $IPT  = mnpept('pt',trim($data['TAILLE']),$data['SEXE'],trim($data['POIDS']));
		$postData = array(
		    'DINS'=>$data['DINS'],
            'HINS'=>$data['HINS'],
            'NOM'=>$data['NOM'],
            'PRENOM'=>$data['PRENOM'],
            'FILSDE'=>$data['FILSDE'],
			'SEX'=>$data['SEXE'],
            'DATENAISSANCE'=>$data['DATENS'],
			'Days'=>$DateDiff['days'],
            'Weeks'=>$DateDiff['weeks'],
            'Months'=>$DateDiff['months'],
            'Years'=>$DateDiff['years'],
			'WILAYA'=>$data['WILAYAN'],
            'COMMUNE'=>$data['COMMUNEN'],
            'WILAYAR'=>$data['WILAYAR'],
            'COMMUNER'=>$data['COMMUNER'],
            'ADRESSE'=>$data['ADRESSE'],
            'TELEPHONE'=>$data['TEL'],
            'POIDS'=>$data['POIDS'],
            'TAILLE'=>$data['TAILLE'],
            'HB'=>$data['HB'],
            'HT'=>$data['HT'],
			'IPA'=>$IPA,
            'ISTA'=>$ISTA,
			 'IPT'=>$IPT
        );
		echo '<pre>';print_r ($postData);echo '<pre>';
       $this->db->update('mnpe', $postData, "id =" . $data['id'] . "");
    }	
	
public function listmnpe() {
        return $this->db->select('SELECT * FROM pa  where SEXE="M"  ');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
public function listmnpe1() {
        return $this->db->select('SELECT * FROM pa where SEXE="F"');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
public function listmnpeta() {
        return $this->db->select('SELECT * FROM ta  where SEXE="M" order by age');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
public function listmnpeta1() {
        return $this->db->select('SELECT * FROM ta where SEXE="F" order by age');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }

public function listmnpept() {
        return $this->db->select('SELECT * FROM pt  where SEXE="M" ');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
public function listmnpept1() {
        return $this->db->select('SELECT * FROM pt where SEXE="F"');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }
public function listmnpem() {
        return $this->db->select('SELECT * FROM  mnpe  order by id  desc');
        // return $this->db->select('SELECT * FROM don  order by id  limit 100   ');
    }	

}
