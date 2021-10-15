<?php
class drh_Model extends Model {
//$this->db->exec('SET NAMES utf8'); POUR PRISE EN CHARGE ARABE 
    public function __construct() {
        parent::__construct();
    }
	
	public function userSearch($o, $q, $p, $l) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM grh where $o like '$q%' order by Nomlatin limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM grh where $o like '$q%' order by $o ");
    }
	
	// public function userSearchx($o, $q, $p, $l) {
        // $this->db->exec('SET NAMES utf8');
		// return $this->db->select("SELECT * FROM grh where $o = '$q' order by $o,PRENOM limit $p,$l  ");
    // }
	
	public function userSinglestructure($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM grh WHERE idp = :id', array(':id' => $id));
    }
	
	//*********************************************************************************************************//
	 public function creatconge($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('regconge', array(
			'CAUSECONGE'      => $data['CAUSECONGE'],
			'DURECONGE'       => $data['DURECONGE'],
			'DEBUTCONGE'      => $this->dateFR2US($data['DEBUTCONGE']),
			'FINCONGE'        => $data['FINCONGE'],
			'REMPLACANT'      => $data['REMPLACANT'],
			'RESTETOT'        => $data['RESTETOT'],
			'RESTEANNEE'      => $data['RESTEANNEE'],
			'IDP'             => $data['id']	
			));
			//echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id = $this->db->lastInsertId();
		}
	public function congeSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM regconge WHERE idp = :id  order by DEBUTCONGE asc ', array(':id' => $id));    
    }
	public function congelist($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM regconge WHERE id = :id ', array(':id' => $id));    
    }
	public function editSavesconge($data) {
	$this->db->exec('SET NAMES utf8');
		$postData = array(	
		    'IDP'             => $data['IDP'],	
			'CAUSECONGE'      => $data['CAUSECONGE'],
			'DURECONGE'       => $data['DURECONGE'],
			'DEBUTCONGE'      => $this->dateFR2US($data['DEBUTCONGE']),
			'FINCONGE'        => $data['FINCONGE'],
			'REMPLACANT'      => $data['REMPLACANT'],
			'RESTETOT'        => $data['RESTETOT'],
			'RESTEANNEE'      => $data['RESTEANNEE']
	   );
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('regconge', $postData, "id =" . $data['id'] . "");
    }
	public function editSavesetatconge($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'id'         => $data['id'],	
		    'OK'         => $data['OK']   
        );
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('regconge', $postData, "id =" . $data['id'] . "");
    }
	
	public function deleteconge($id) {       
        $this->db->delete('regconge', "id = '$id'");
    }
		
		
	//*********************************************************************************************************//
	
	public function serviceSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM regservice WHERE idp = :id  order by DEBUTSERVICE asc ', array(':id' => $id));    
    }
	public function creatservice($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('regservice', array(
			'SERVICEAR_A'      => $data['SERVICEAR_A'],
			'SERVICEAR_N'      => $data['SERVICEAR_N'],
			'DEBUTSERVICE'     => $this->dateFR2US($data['DEBUTSERVICE']),
			'CAUSESERVICE'     => $data['CAUSESERVICE'],
			'IDP'              => $data['idp']	
			));
			$postData_grh = array(
			'SERVICEAR'        => $data['SERVICEAR_N'],
			'SERVICEFR'        => $data['SERVICEAR_N']
	        );
	        $this->db->update('grh', $postData_grh, "idp =" . $data['idp'] . "");
			//echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id = $this->db->lastInsertId();
	}
		
	public function deleteservice($id) {       
        $this->db->delete('regservice', "id = '$id'");
    }
	public function servicelist($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM regservice WHERE id = :id ', array(':id' => $id));    
    }
	public function editSavesservice($data) {
	$this->db->exec('SET NAMES utf8');
		$postData = array(	
		    'SERVICEAR_A'      => $data['SERVICEAR_A'],
			'SERVICEAR_N'      => $data['SERVICEAR_N'],
			'DEBUTSERVICE'     => $this->dateFR2US($data['DEBUTSERVICE']),
			'CAUSESERVICE'     => $data['CAUSESERVICE'],
			'IDP'              => $data['IDP']
	   );
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('regservice', $postData, "id =" . $data['id'] . "");
	   
	   $postData_grh = array(
			'SERVICEAR'        => $data['SERVICEAR_N'],
			'SERVICEFR'        => $data['SERVICEAR_N']
	   );
	   $this->db->update('grh', $postData_grh, "idp =" . $data['IDP'] . "");
    }	
	
	//*********************************************************************************************************//
	public function editSavescesation($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'Motif_Cessation'        => $data['CAUSECESATION'],	
		    'Date_Cessation'         => $data['DEBUTCESATION'],
            'cessation'			     =>'y'
        );
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('grh', $postData, "idp =" . $data['id'] . "");
    }

    public function an_cesation($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
            'cessation'			     =>''
        );
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('grh', $postData, "idp =" . $data['id'] . "");
    }

	//*********************************************************************************************************//
	
	 public function createstructure($data) {
		
		$this->db->exec('SET NAMES utf8');
		$this->db->insert('structure', array(
			'DATE'          => $this->dateFR2US($data['DATE']),
            'STRUCTURE'     => $data['STRUCTURE'],
            'NATURE'        => $data['NATURE'],
			'SPECIALITEX'   => $data['SPECIALITE'],
            'NOM'           => $data['NOM'],
			'NOMAR'         => $data['NOMAR'],
            'PRENOM'        => $data['PRENOM'],
			'PRENOMAR'      => $data['PRENOMAR'],
			'SEX'           => $data['SEXE'],
			'DNS'           => $this->dateFR2US($data['DNS']),
			'WILAYAN'       => $data['WILAYAN'],
			'COMMUNEN'      => $data['COMMUNEN'],
			'WILAYA'        => $data['WILAYAR'],
			'COMMUNE'       => $data['COMMUNER'],
			'ADRESSE'       => $data['ADRESSE'],
			'ADRESSEAR'     => $data['ADRESSEAR'],
			'PROPRIETAIRE'  => $data['PROPRIETAIRE'],
			'DEBUTCONTRAT'  => $this->dateFR2US($data['DEBUTCONTRAT']),
            'FINCONTRAT'    => $this->dateFR2US($data['FINCONTRAT']),
            'REALISATION'   => $this->dateFR2US($data['REALISATION']),
			'NREALISATION'  => $data['NREALISATION'],
			'OUVERTURE'     => $this->dateFR2US($data['OUVERTURE']),
			'NOUVERTURE'    => $data['NOUVERTURE'],
            'Mobile'        => $data['Mobile'],
            'Fixe'          => $data['Fixe'],
			'Email'         => $data['Email'],
            'DIPLOME'       => $this->dateFR2US($data['DIPLOME']),
            'UNIV'          => $data['UNIV'],
			'NUMORDER'      => $data['NUMORDER'],
			'DATEORDER'     => $this->dateFR2US($data['DATEORDER']),
			'NUMDEM'        => $data['NUMDEM'],
			'DATEDEM'       => $this->dateFR2US($data['DATEDEM']),
			'DATEDSC'       => $this->dateFR2US($data['DATEDSC']),
			'SERVICECIVILE' => $data['SERVICECIVILE']
			
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	 public function editSavestructure($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'DATE'          => $this->dateFR2US($data['DATE']),
            'STRUCTURE'     => $data['STRUCTURE'],
            'NATURE'        => $data['NATURE'],
			'SPECIALITEX'   => $data['SPECIALITE'],
            'NOM'           => $data['NOM'],
			'NOMAR'         => $data['NOMAR'],
            'PRENOM'        => $data['PRENOM'],
			'PRENOMAR'      => $data['PRENOMAR'],
			'SEX'           => $data['SEXE'],
			'DNS'           => $this->dateFR2US($data['DNS']),
			'WILAYAN'       => $data['WILAYAN'],
			'COMMUNEN'      => $data['COMMUNEN'],
			'WILAYA'        => $data['WILAYAR'],
			'COMMUNE'       => $data['COMMUNER'],
			'ADRESSE'       => $data['ADRESSE'],
			'ADRESSEAR'     => $data['ADRESSEAR'],
			'PROPRIETAIRE'  => $data['PROPRIETAIRE'],
			'DEBUTCONTRAT'  => $this->dateFR2US($data['DEBUTCONTRAT']),
            'FINCONTRAT'    => $this->dateFR2US($data['FINCONTRAT']),
            'REALISATION'   => $this->dateFR2US($data['REALISATION']),
			'NREALISATION'  => $data['NREALISATION'],
			'OUVERTURE'     => $this->dateFR2US($data['OUVERTURE']),
			'NOUVERTURE'    => $data['NOUVERTURE'],
            'Mobile'        => $data['Mobile'],
            'Fixe'          => $data['Fixe'],
			'Email'         => $data['Email'],
            'DIPLOME'       => $this->dateFR2US($data['DIPLOME']),
            'UNIV'          => $data['UNIV'],
			'NUMORDER'      => $data['NUMORDER'],
			'DATEORDER'     => $this->dateFR2US($data['DATEORDER']),
			'NUMDEM'        => $data['NUMDEM'],
			'DATEDEM'       => $this->dateFR2US($data['DATEDEM']),
			'DATEDSC'       => $this->dateFR2US($data['DATEDSC']),
			'SERVICECIVILE' => $data['SERVICECIVILE']
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';
		$this->db->update('structure', $postData, "id =" . $data['id'] . "");
    }

	
	
	
				
}
