<?php
class inspection_Model extends Model {
//$this->db->exec('SET NAMES utf8'); POUR PRISE EN CHARGE ARABE 
    public function __construct() {
        parent::__construct();
    }
	
	public function userSearch($o, $q, $p, $l) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM structure where $o like '$q%' order by COMMUNE limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM structure where $o like '$q%' order by COMMUNE ");
    }
	
	 public function createstructure($data) {
		
		$this->db->exec('SET NAMES utf8');
		$this->db->insert('structure', array(
			'DATE'       => $this->dateFR2US($data['DATE']),
            'STRUCTURE'  => $data['STRUCTURE'],
            'NATURE'     => $data['NATURE'],
            'NOM'        => $data['NOM'],
			'NOMAR'      => $data['NOMAR'],
            'PRENOM'     => $data['PRENOM'],
			'PRENOMAR'   => $data['PRENOMAR'],
			'SEX'        => $data['SEXE'],
			'WILAYA'     => $data['WILAYA'],
			'COMMUNE'    => $data['COMMUNE'],
			'ADRESSE'    => $data['ADRESSE'],
			'ADRESSEAR'  => $data['ADRESSEAR'],
			'PROPRIETAIRE'  => $data['PROPRIETAIRE'],
			'DEBUTCONTRAT'  => $this->dateFR2US($data['DEBUTCONTRAT']),
            'FINCONTRAT'    => $this->dateFR2US($data['FINCONTRAT']),
            'REALISATION'   => $this->dateFR2US($data['REALISATION']),
			'NREALISATION'  => $data['NREALISATION'],
			'OUVERTURE'     => $this->dateFR2US($data['OUVERTURE']),
			'NOUVERTURE'    => $data['NOUVERTURE'],
            'Mobile'        => $data['Mobile'],
            'Fixe'          => $data['Fixe'],
			'Email'        => $data['Email']	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	 public function editSavestructure($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'DATE'       => $this->dateFR2US($data['DATE']),
            'STRUCTURE'  => $data['STRUCTURE'],
            'NATURE'     => $data['NATURE'],
            'NOM'        => $data['NOM'],
			'NOMAR'      => $data['NOMAR'],
            'PRENOM'     => $data['PRENOM'],
			'PRENOMAR'   => $data['PRENOMAR'],
			'SEX'        => $data['SEXE'],
			'WILAYA'     => $data['WILAYA'],
			'COMMUNE'    => $data['COMMUNE'],
			'ADRESSE'    => $data['ADRESSE'],
			'ADRESSEAR'  => $data['ADRESSEAR'],
			'PROPRIETAIRE'  => $data['PROPRIETAIRE'],
			'DEBUTCONTRAT'  => $this->dateFR2US($data['DEBUTCONTRAT']),
            'FINCONTRAT'    => $this->dateFR2US($data['FINCONTRAT']),
            'REALISATION'   => $this->dateFR2US($data['REALISATION']),
			'NREALISATION'  => $data['NREALISATION'],
			'OUVERTURE'     => $this->dateFR2US($data['OUVERTURE']),
			'NOUVERTURE'    => $data['NOUVERTURE'],
            'Mobile'        => $data['Mobile'],
            'Fixe'          => $data['Fixe'],
			'Email'         => $data['Email']		
        );
        // echo '<pre>';print_r ($postData);echo '<pre>';
		$this->db->update('structure', $postData, "id =" . $data['id'] . "");
    }
	public function editSavesstr($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'id'        => $data['id'],	
		    'ETAT'       => $data['ETAT']   
        );
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('structure', $postData, "id =" . $data['id'] . "");
    }
	
	public function lstructure() {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM  structure order by commune ');
        // return $this->db->select('SELECT * FROM don  order by id     ');order by DINS  desc limit 50
    }
	
	public function deletestructure($id) {       
        $this->db->delete('structure', "id = '$id'");
    }

    public function dnrcommune($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM com WHERE IDWIL = :id  order by COMMUNE asc ', array(':id' => $id));
       
    }

	public function autoSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM auto WHERE idt = :id  order by Categorie asc ', array(':id' => $id));    
    }
	public function autoSingleList1($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM auto WHERE id = :id  order by DATE asc ', array(':id' => $id));    
    }
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	 public function creatautodb($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('auto', array(
			'idt'        => $data['id'],	
			'Date'       => $this->dateFR2US($data['Date']),
		    'WILAYA'     => $data['WILAYA'],
		    'COMMUNE'    => $data['COMMUNE'],
			'Categorie'  => $data['Categorie'],
			'Type'       => $data['Type'],
		    'Serie_Type' => $data['Serie_Type'],
		    'Marque'     => $data['Marque'],
		    'Immatri'    => $data['Immatri'],
		    'Precedent'  => $data['Precedent'],
		    'Annee'      => $data['Annee'],	  
			'NASS'       => $data['NASS'],
			'DUNASS'     => $this->dateFR2US($data['DUNASS']),
			'AUNASS'     => $this->dateFR2US($data['AUNASS']),
			'CTRL'       => $data['CTRL'],
			'DUCTRL'     => $this->dateFR2US($data['DUCTRL']),
			'AUCTRL'     => $this->dateFR2US($data['AUCTRL'])
			));
			//echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id = $this->db->lastInsertId();
		}
	public function deleteauto($id) {       
        $this->db->delete('auto', "id = '$id'");
    }
	
	public function editSavesauto($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'idt'        => $data['idt'],	
		    'Date'       => $this->dateFR2US($data['Date']),
		    'WILAYA'     => $data['WILAYA'],
		    'COMMUNE'    => $data['COMMUNE'],
			'Categorie'  => $data['Categorie'],
			'Type'       => $data['Type'],
		    'Serie_Type' => $data['Serie_Type'],
		    'Marque'     => $data['Marque'],
		    'Immatri'    => $data['Immatri'],
		    'Precedent'  => $data['Precedent'],
		    'Annee'      => $data['Annee'],	 
			'NASS'       => $data['NASS'],
			'DUNASS'     => $this->dateFR2US($data['DUNASS']),
			'AUNASS'     => $this->dateFR2US($data['AUNASS']),
			'CTRL'       => $data['CTRL'],
			'DUCTRL'     => $this->dateFR2US($data['DUCTRL']),
			'AUCTRL'     => $this->dateFR2US($data['AUCTRL'])	
        );
       // echo '<pre>';print_r ($postData);echo '<pre>';
		$this->db->update('auto', $postData, "id =" . $data['id'] . "");
    }
	public function editSavesetat($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'idt'        => $data['idt'],	
		    'ETAT'       => $data['ETAT']   
        );
       echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('auto', $postData, "id =" . $data['id'] . "");
    }
	
	 public function creatpersdb($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('pers', array(
			'idt'        => $data['id'],	
			'NOMAR'      => $data['NOMAR'],
		    'PRENOMAR'   => $data['PRENOMAR'],
			'Categorie'  => $data['Categorie'],
			'CASNOS'       => $data['CASNOS'],
			'DEBUTCONTRAT' => $data['DEBUTCONTRAT'],
			'FINCONTRAT'   => $data['FINCONTRAT']
			));
			// echo '<pre>';print_r ($data);echo '<pre>';
			return $last_id = $this->db->lastInsertId();
		}
		
	public function editSavespers($data) {
	$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'idt'          => $data['idt'],	
			'NOMAR'        => $data['NOMAR'],
		    'PRENOMAR'     => $data['PRENOMAR'],
			'Categorie'    => $data['Categorie'],
			'CASNOS'       => $data['CASNOS'],
			'DEBUTCONTRAT' => $data['DEBUTCONTRAT'],
			'FINCONTRAT'   => $data['FINCONTRAT']  
        );
       echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('pers', $postData, "id =" . $data['id'] . "");
    }	
		
		
	public function editSavesetatpers($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'idt'        => $data['idt'],	
		    'ETAT'       => $data['ETAT']   
        );
       echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('pers', $postData, "id =" . $data['id'] . "");
    }
	public function persSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pers WHERE idt = :id  order by Categorie asc ', array(':id' => $id));    
    }
	
	public function userpersSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pers WHERE id = :id  order by Categorie asc ', array(':id' => $id));    
    }
	public function deletepers($id) {       
        $this->db->delete('pers', "id = '$id'");
    }
	
	
	public function autoSingleinspection($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM inspection WHERE ids = :id  order by DATE asc ', array(':id' => $id));    
    }
	
	//***inspection ***//
	public function Listview() {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM insp order by DATE asc ');    
    }
	
	public function userSingleinspecteur($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM insp WHERE id = :id', array(':id' => $id));
    }
	
	public function editinspecteurx($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'DATE'        => dateFR2US($data['DATE']),
			'REF'        => $data['REF'],
			'PJ'        => $data['PJ'],
		    'Commanditaire'       => $data['Commanditaire']   
        );
      // echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('insp', $postData, "id =" . $data['id'] . "");
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function userSinglestructure($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM structure WHERE id = :id', array(':id' => $id));
    }
	public function autoSingleinsp($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM insp WHERE ids = :id  order by DATE asc ', array(':id' => $id));    
    }
	 public function createinsp($data) {
		
		$this->db->exec('SET NAMES utf8');
		$this->db->insert('insp', array(
			'DATE'       => $this->dateFR2US($data['DATE']),
            'REF'        => $data['REF'],
			'PJ'         => $data['PJ'],
			'ids'        => $data['id'],
			'STRUCTURE'  => $data['STRUCTURE'],'Commanditaire'  => $data['Commanditaire']

			
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	public function userSingleinsp($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM insp WHERE id = :id', array(':id' => $id));
    }
	
	 public function createanomalie($data) {
		
		$this->db->exec('SET NAMES utf8');
		$this->db->insert('inspection', array(
			'DATE'       => $data['DATE'],
            'ANOMALIE'   => $data['ANOMALIE'],
            'ids'        => $data['ids'],
		    'idinsp'     => $data['id'],
			'STRUCTURE'  => $data['STRUCTURE'] 
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	public function listeanomalie($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM inspection WHERE idinsp = :id  order by DATE asc ', array(':id' => $id));    
    }
	
	
	public function editSavesAnomalieetat($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'ids'        => $data['ids'],	
		    'ETAT'       => $data['ETAT']   
        );
       echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('inspection', $postData, "id =" . $data['id'] . "");
    }
	
	public function deleteAnomalies($id) {       
        $this->db->delete('inspection', "id = '$id'");
    }
	public function deleteInspection($id) {    //delete inspection + anomalie       
		$this->db->delete('insp', "id = '$id'");
		$this->db->deletem('inspection', "idinsp =".$id);	
    }
	
	
	public function editSavesMesurePrise($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			 'MP'        => $data['MP']	    
        );
       echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('insp', $postData, "id =" . $data['id'] . "");
    }

	
}
