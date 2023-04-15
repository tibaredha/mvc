<?php
class inspection_Model extends Model {
//$this->db->exec('SET NAMES utf8'); POUR PRISE EN CHARGE ARABE 
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
	
	
	
	public function userSearch($o, $q, $p, $l) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM structure where $o like '$q%' order by NOM,PRENOM limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM structure where $o like '$q%' order by $o ");
    }
	
	public function userSearchx($o, $q, $p, $l) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select("SELECT * FROM structure where $o = '$q' order by $o,PRENOM limit $p,$l  ");
    }
	
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
			'FERMETURE'     => $this->dateFR2US($data['FERMETURE']),
			'NFERMETURE'    => $data['NFERMETURE'],
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
			'WSC'           => $data['WSC'],
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
			'FERMETURE'     => $this->dateFR2US($data['FERMETURE']),
			'NFERMETURE'    => $data['NFERMETURE'],
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
			'WSC'           => $data['WSC'],
			'SERVICECIVILE' => $data['SERVICECIVILE']
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
	
	public function editSavesval($data) {
		$this->db->exec('SET NAMES utf8');
		$postData = array(		
			'id'        => $data['id'],	
		    'val'       => $data['val']   
        );
       // echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('structure', $postData, "id =" . $data['id'] . "");
    }
	
	public function lstructure() {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM  structure order by commune ');
        // return $this->db->select('SELECT * FROM don  order by id     ');order by DINS  desc limit 50
    }
	
	public function deletestructure($id) {       
        $this->db->delete('structure', "id = '$id'");   
		$this->db->deletem("insp", "ids =".$id);
		$this->db->deletem('inspection', "idinsp =".$id);
		$this->db->delete('auto', "idt = '$id'");
		$this->db->delete('pers', "idt = '$id'");
		$this->db->delete('home', "idstructure = '$id'");
    }

    public function dnrcommune($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM com WHERE IDWIL = :id  order by COMMUNE asc ', array(':id' => $id));
       
    }

	public function autoSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM auto WHERE idt = :id  and ETAT = 0    order by Categorie asc ', array(':id' => $id));    
    }
	public function autoSingleList2($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM auto WHERE idt = :id  and ETAT = 1    order by Categorie asc ', array(':id' => $id));    
    }
	
	public function autoSingleList1($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM auto WHERE id = :id  order by DATE asc ', array(':id' => $id));    
    }
	
	public function doubleemploi($Serie_Type,$id) {
        $this->db->exec('SET NAMES utf8');
		//return $this->db->select('SELECT COUNT(*) AS nbr_doublon,Type,Serie_Type,Immatri,Marque FROM auto  GROUP BY Type,Serie_Type   HAVING COUNT(*) > 1'); //   
        return $this->db->select(" SELECT  * FROM auto WHERE Serie_Type='$Serie_Type' and  idt !=$id "); //
	}
		// SELECT   COUNT(*) AS nbr_doublon, champ1, champ2, champ3
		// FROM     table
		// GROUP BY champ1, champ2, champ3
		// HAVING   COUNT(*) > 1
	
	
	 public function creatautodb($data) 
	 {
		   
			
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
			'AUCTRL'     => $this->dateFR2US($data['AUCTRL']),
			
			'sieges'    => $data['sieges'],
			'ess'       => $data['ess'],
			'die'       => $data['die'],
			'gaz'       => $data['gaz']
			
			));
			// echo '<pre>';print_r ($data);echo '<pre>';
			//return $last_id = $this->db->lastInsertId();
			//verification des doublons 
			$doub = $this->db->prepare("SELECT * FROM auto WHERE Serie_Type = :Serie_Type ");
			$doub->execute(array( ':Serie_Type' => $data['Serie_Type']	));
			$data1 = $doub->fetch();	
			$count = $doub->rowCount();
			if (isset($count) and $count > 0) 
			{
				return $data['Serie_Type'];  
			}	
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
			'AUCTRL'     => $this->dateFR2US($data['AUCTRL']),

            'sieges'    => $data['sieges'],
			'ess'       => $data['ess'],
			'die'       => $data['die'],
			'gaz'       => $data['gaz']
	
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
			'NOMFR'      => $data['NOMFR'],
		    'PRENOMFR'   => $data['PRENOMFR'],
			'Categorie'  => $data['Categorie'],
			'CASNOS'       => $data['CASNOS'],
			'DEBUTCONTRAT' => $this->dateFR2US($data['DEBUTCONTRAT']),
			'FINCONTRAT'   => $this->dateFR2US($data['FINCONTRAT']),
			'SPECIALITE'   => $data['SPECIALITE'],
			'TP'           => $data['TP']
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
			'NOMFR'      => $data['NOMFR'],
		    'PRENOMFR'   => $data['PRENOMFR'],
			'Categorie'    => $data['Categorie'],
			'CASNOS'       => $data['CASNOS'],
			'DEBUTCONTRAT' => $this->dateFR2US($data['DEBUTCONTRAT']),
			'FINCONTRAT'   => $this->dateFR2US($data['FINCONTRAT']),  
            'SPECIALITE'   => $data['SPECIALITE'],
			'TP'           => $data['TP']

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
	
	public function homeSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM home WHERE idstructure = :id  order by idstructure asc ', array(':id' => $id));    
    }
	
	public function userhomeSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM home WHERE id = :id  order by id asc ', array(':id' => $id));
    }
	
	
	public function persSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pers WHERE idt = :id and ETAT = 0 and TP=0 order by PRENOMFR asc ', array(':id' => $id));    
    }
	
	public function persSingleList1($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pers WHERE idt = :id and ETAT = 0 and TP=1 order by PRENOMFR asc ', array(':id' => $id));    
    }
	
	
	public function persSingleList2($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM pers WHERE idt = :id and ETAT = 1 order by PRENOMFR asc ', array(':id' => $id));    
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
	
	public function deleteinspecteur($id) {       
        $this->db->delete('insp', "id = '$id'");
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
        //echo '<pre>';print_r ($data);echo '<pre>';
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
       //echo '<pre>';print_r ($postData);echo '<pre>';
	   $this->db->update('insp', $postData, "id =" . $data['id'] . "");
    }

	public function creathome($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('home', array('idstructure'=> $data['id'],'DATEP'=> $this->dateFR2US($data['DATEP']),'NAT'=> $data['NAT'],'WILAYA'=>$data['WILAYA'],'COMMUNE'=>$data['COMMUNE'],'ADRESSE'=>$data['ADRESSE'],'ADRESSEAR'=>$data['ADRESSEAR'],'NUMD'=> $data['NUMD'],'DATED'=> $this->dateFR2US($data['DATED']),'PROPRIETAIRE'=> $data['PROPRIETAIRE'],'DEBUTCONTRAT'=> $this->dateFR2US($data['DEBUTCONTRAT']),'FINCONTRAT'=> $this->dateFR2US($data['FINCONTRAT']),'PHA1'=> $data['PHA1'],'DIST1'=> $data['DIST1'],'PHA2'=> $data['PHA2'],'DIST2'=> $data['DIST2'],'PHA3'=> $data['PHA3'],'DIST3'=> $data['DIST3'],'CDS0'=> $data['CDS0'],'SDS0'=> $data['SDS0'],'SAH0'=> $data['SAH0'],'SAF0'=> $data['SAF0'],'SAN0'=> $data['SAN0'], 'STL'=> $data['STL'] , 'ZE'=> $data['ZE'] ,'NUMCOM'=> $data['NUMCOM'] ,'DATECOM'=> $this->dateFR2US($data['DATECOM'])  ));
			// echo '<pre>';print_r ($data);echo '<pre>';
			$postData = array('WILAYA'=> $data['WILAYA'],'COMMUNE'=> $data['COMMUNE'],'ADRESSE'=> $data['ADRESSE'],'ADRESSEAR'=> $data['ADRESSEAR']);
			// echo '<pre>';print_r ($postData);echo '<pre>';  
			$this->db->update('structure', $postData, "id =" . $data['id'] . ""); 
			$this->db->insert('insp', array('DATE' => $this->dateFR2US($data['DATEP']),'ids' => $data['id'],'STRUCTURE' => $data['STRUCTURE'],'Commanditaire' => "DSP"	));  
			return $last_id = $this->db->lastinsertid();
	}
	
	public function edithome($data) {
			$this->db->exec('SET NAMES utf8');
			$postData = array('DATEP'=> $this->dateFR2US($data['DATEP']),'NAT'=> $data['NAT'],'WILAYA'=>$data['WILAYA'],'COMMUNE'=>$data['COMMUNE'],'ADRESSE'=>$data['ADRESSE'],'ADRESSEAR'=>$data['ADRESSEAR'],'NUMD'=> $data['NUMD'],'DATED'=> $this->dateFR2US($data['DATED']),'PROPRIETAIRE'=> $data['PROPRIETAIRE'],'DEBUTCONTRAT'=> $this->dateFR2US($data['DEBUTCONTRAT']),'FINCONTRAT'=> $this->dateFR2US($data['FINCONTRAT']),'PHA1'=> $data['PHA1'],'DIST1'=> $data['DIST1'],'PHA2'=> $data['PHA2'],'DIST2'=> $data['DIST2'],'PHA3'=> $data['PHA3'],'DIST3'=> $data['DIST3'],'CDS0'=> $data['CDS0'],'SDS0'=> $data['SDS0'],'SAH0'=> $data['SAH0'],'SAF0'=> $data['SAF0'],'SAN0'=> $data['SAN0'], 'STL'=> $data['STL'], 'ZE'=> $data['ZE'] , 'groupe'=> $data['groupe'], 'PHA4'=> $data['PHA4'] ,'NUMCOM'=> $data['NUMCOM'] ,'DATECOM'=> $this->dateFR2US($data['DATECOM']));
			$this->db->update('home', $postData, "id =" . $data['id'] . "");	
	        $postData1 = array('WILAYA'=> $data['WILAYA'],'COMMUNE'=> $data['COMMUNE'],'ADRESSE'=> $data['ADRESSE'],'ADRESSEAR'=> $data['ADRESSEAR']);
			$this->db->update('structure', $postData1, "id =" . $data['idstructure'] . ""); 
			$this->db->insert('insp', array('DATE' => $this->dateFR2US($data['DATEP']),'ids' => $data['id'],'STRUCTURE' => $data['STRUCTURE'],'Commanditaire' => "DSP"	));  
			return $last_id = $this->db->lastinsertid();
	}
	
	public function creathomex($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('home', 
			array(
			'idstructure'=> $data['id'],
			'DATEP'=> $this->dateFR2US($data['DATEP']),
			'NAT'=> $data['NAT'],
			'WILAYA'=>$data['WILAYA'],
			'COMMUNE'=>$data['COMMUNE'],
			'ADRESSE'=>$data['ADRESSE'],
			'ADRESSEAR'=>$data['ADRESSEAR'],
			'NUMD'=> $data['NUMD'],
			'DATED'=> $this->dateFR2US($data['DATED']),
			'PROPRIETAIRE'=> $data['PROPRIETAIRE'],
			'DEBUTCONTRAT'=> $this->dateFR2US($data['DEBUTCONTRAT']),
			'FINCONTRAT'=> $this->dateFR2US($data['FINCONTRAT']),
			'PHA1'=> $data['PHA1'],'DIST1'=> $data['DIST1'],
			'PHA2'=> $data['PHA2'],'DIST2'=> $data['DIST2'],
			'PHA3'=> $data['PHA3'],'DIST3'=> $data['DIST3'],
			'CDS0'=> $data['CDS0'],'SDS0'=> $data['SDS0'],
			'SAH0'=> $data['SAH0'],'SAF0'=> $data['SAF0'],
			'SAN0'=> $data['SAN0'],'STL'=> $data['STL'],
			'EXTA'=> $data['EXTA'],'EXTB'=> $data['EXTB'],
			'EXTC'=> $data['EXTC'],'EXTD'=> $data['EXTD'],
            'EXTE'=> $data['EXTE']
			));
			//echo '<pre>';print_r ($data);echo '<pre>';
			$postData = array('WILAYA'=> $data['WILAYA'],'COMMUNE'=> $data['COMMUNE'],'ADRESSE'=> $data['ADRESSE'],'ADRESSEAR'=> $data['ADRESSEAR']);
			// echo '<pre>';print_r ($postData);echo '<pre>';  
			$this->db->update('structure', $postData, "id =" . $data['id'] . ""); 
			$this->db->insert('insp', array('DATE' => $this->dateFR2US($data['DATEP']),'ids' => $data['id'],'STRUCTURE' => $data['STRUCTURE'],'Commanditaire' => "DSP"	));  
			return $last_id = $this->db->lastinsertid();
	}
	
	public function edithomex($data) {
			$this->db->exec('SET NAMES utf8');
			$postData = array('DATEP'=> $this->dateFR2US($data['DATEP']),'NAT'=> $data['NAT'],'WILAYA'=>$data['WILAYA'],'COMMUNE'=>$data['COMMUNE'],'ADRESSE'=>$data['ADRESSE'],'ADRESSEAR'=>$data['ADRESSEAR'],'NUMD'=> $data['NUMD'],'DATED'=> $this->dateFR2US($data['DATED']),'PROPRIETAIRE'=> $data['PROPRIETAIRE'],'DEBUTCONTRAT'=> $this->dateFR2US($data['DEBUTCONTRAT']),'FINCONTRAT'=> $this->dateFR2US($data['FINCONTRAT']),'PHA1'=> $data['PHA1'],'DIST1'=> $data['DIST1'],'PHA2'=> $data['PHA2'],'DIST2'=> $data['DIST2'],'PHA3'=> $data['PHA3'],'DIST3'=> $data['DIST3'],'CDS0'=> $data['CDS0'],'SDS0'=> $data['SDS0'],'SAH0'=> $data['SAH0'],'SAF0'=> $data['SAF0'],'SAN0'=> $data['SAN0'],
			'STL'=> $data['STL'],
			'EXTA'=> $data['EXTA'],'EXTB'=> $data['EXTB'],
			'EXTC'=> $data['EXTC'],'EXTD'=> $data['EXTD'],
            'EXTE'=> $data['EXTE']
			);
			$this->db->update('home', $postData, "id =" . $data['id'] . "");	
	        $postData1 = array('WILAYA'=> $data['WILAYA'],'COMMUNE'=> $data['COMMUNE'],'ADRESSE'=> $data['ADRESSE'],'ADRESSEAR'=> $data['ADRESSEAR']);
			$this->db->update('structure', $postData1, "id =" . $data['idstructure'] . ""); 
			// $this->db->insert('insp', array('DATE' => $this->dateFR2US($data['DATEP']),'ids' => $data['id'],'STRUCTURE' => $data['STRUCTURE'],'Commanditaire' => "DSP"	));  
			return $last_id = $this->db->lastinsertid();
	}
	public function deletehome($id) {       
        $this->db->delete('home', "id = '$id'");
    }
//************************************************************//
    public function createpsp($data) {
			$this->db->exec('SET NAMES utf8');
			$this->db->insert('epsp', array(
			'idstructure'=> $data['id'],
			'DATEP'=> $this->dateFR2US($data['DATEP']),
			'NAT'=> $data['NAT'],
			'WILAYA'=>$data['WILAYA'],
			'COMMUNE'=>$data['COMMUNE'],
			'ADRESSE'=>$data['ADRESSE'],
			'ADRESSEAR'=>$data['ADRESSEAR'],
			'NUMD'=> $data['NUMD'],
			'DATED'=> $this->dateFR2US($data['DATED']),
			'PROPRIETAIRE'=> $data['PROPRIETAIRE'],
			'MG'=> $data['MG'],
			'SD'=> $data['SD'],
			'CG'=> $data['CG'],
			'MI'=> $data['MI'],
			'OB'=> $data['OB'],
			'PE'=> $data['PE'],
			'SP'=> $data['SP'],
			'UMC'=> $data['UMC'],
			'LA'=> $data['LA'],
			'RA'=> $data['RA'],
			'PH'=> $data['PH'],
			'MA'=> $data['MA']
			));
			echo '<pre>';print_r ($data);echo '<pre>';
			// $postData = array('WILAYA'=> $data['WILAYA'],'COMMUNE'=> $data['COMMUNE'],'ADRESSE'=> $data['ADRESSE'],'ADRESSEAR'=> $data['ADRESSEAR']);
			////echo '<pre>';print_r ($postData);echo '<pre>';  
			// $this->db->update('structure', $postData, "id =" . $data['id'] . ""); 
			// $this->db->insert('insp', array('DATE' => $this->dateFR2US($data['DATEP']),'ids' => $data['id'],'STRUCTURE' => $data['STRUCTURE'],'Commanditaire' => "DSP"	));  
			// return $last_id = $this->db->lastinsertid();
	}

    public function homeepspSingleList($id) {
        $this->db->exec('SET NAMES utf8');
		return $this->db->select('SELECT * FROM epsp WHERE idstructure = :id  order by idstructure asc ', array(':id' => $id));    
    }
	
	public function deletehomeepsp($id) {       
        $this->db->delete('epsp', "id = '$id'");
    }			
}
