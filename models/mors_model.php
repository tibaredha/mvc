<?php

class mors_Model extends Model {

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
	
	//***search hemod ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM mors where $o like '$q%' order by DATEMORS limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM mors where $o like '$q%' order by DATEMORS ");
    }
	
	 public function deleteBordereau($id) {   
        $this->db->delete('mors', "id = '$id'");
    }
	
	
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM mdo1 WHERE id = :id', array(':id' => $id));
    }
	
	
	public function create($data) {
	
        $sth = $this->db->prepare("SELECT * FROM mors WHERE NOMPRENOM = :NOMPRENOM    ");
		$sth->execute(array(
			':NOMPRENOM' => $data['nom'].'_'.$data['prenom']
		));
		$data1 = $sth->fetch();
		$count =  $sth->rowCount();
        if ($count > 0) 
		{
		// echo '<pre>';print_r ($data);echo '<pre>';and  SEXE = :SEXE  and  AGE = :AGE    and  COMMUNE = :COMMUNE,':SEXE' => $data['SEXE'],':AGE' => $data['AGE'],':COMMUNE' => $data['COMMUNE']
		}
		else
		{
			$this->db->insert('mors', array(		
			'DATEMORS' =>dateFR2US($data['DATEMORS']),
			'STRUCTURE' =>$data['STRUCTURE'],
			'ANIMAL' =>$data['ANIMAL'],
			'MORSGRIF' =>$data['MORSGRIF'],
			'GRADE' =>$data['GRADE'],
			'SIEGE' =>$data['SIEGE'],
			'Rage' =>$data['Rage'],
			'deces' =>$data['deces'],
			'Vaccin' =>$data['Vaccin'],
			'Serum' =>$data['Serum'],
			'NOMPRENOM' =>$data['nom'].'_'.$data['prenom'],
			'SEXE' =>$data['SEXE'],
			'AGE' =>$data['AGE'],
			'WILAYAN' =>$data['WILAYAN'],
			'COMMUNE' =>$data['COMMUNEN'],
			'ADRESS' =>$data['ADRESS'],
			'POIDS' =>$data['POIDS']
			));		
		}    
        echo '<pre>';print_r ($data);echo '<pre>';
        //return $last_id = $this->db->lastInsertId();
    }
	public function editSave($data) {
		$postData = array(
       'DATEMDO' =>dateFR2US($data['DATEMDO']),
			'STRUCTURE' =>$data['STRUCTURE'],
			'MDO' =>$data['MDO'],
			'NOMPRENOM' =>$data['nom'].'_'.$data['prenom'],
			'SEXE' =>$data['SEXE'],
			'AGE' =>$data['AGE'],
			'WILAYAN' =>$data['WILAYAN'],
			'COMMUNE' =>$data['COMMUNEN'],
			'ADRESS' =>$data['ADRESS'],
			'OBSERVATION' =>$data['OBSERVATION']   
        );
       $this->db->update('mdo1', $postData, "id =" . $data['id'] . "");
	    // echo '<pre>';print_r ($postData);echo '<pre>';
    }
	
}
