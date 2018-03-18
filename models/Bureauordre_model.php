<?php

class  Bureauordre_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
     //***search ***//
    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM message where $o like '$q%' order by Numero limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM message where $o like '$q%' order by Numero ");
    }
 
	public function createmessage($data) {
       $this->db->insert('message', array(
		
		'Date'    => $data['Date'],
		'Numero'  => $data['Numero'],
		'Etat'    => $data['Etat'],
		'Source'  => $data['Source'],
		'Objet'  => $data['Objet'],
		'Destination'  => $data['Destination']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
    }
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM message WHERE id = :id', array(':id' => $id));
    }
  
  
	 public function editSave($data) {
        $postData = array(
        'Date'    => $data['Date'],
		'Numero'  => $data['Numero'],
		'Etat'    => $data['Etat'],
		'Source'  => $data['Source'],
		'Objet'  => $data['Objet'],
		'Destination'  => $data['Destination']
        );
        $this->db->update('message', $postData, "id =" . $data['id'] . "");
    }
	
	 public function deletemessage($id) {
        $this->db->deletem('message', "id = '$id'");
    }
	
	public function listmessage($id) {
	
	switch($id)
    {
	  case 0 :  return $this->db->select('SELECT * FROM message'); break;	
      case 1 :  return $this->db->select('SELECT * FROM message order by Numero asc');break;	
      case 2 :  return $this->db->select('SELECT * FROM message order by Numero desc');break;	
      case 3 :  return $this->db->select('SELECT * FROM message order by Etat asc');break;	
      case 4 :  return $this->db->select('SELECT * FROM message order by Etat desc');break;	
      case 5 :  return $this->db->select('SELECT * FROM message order by Source asc');break;	
      case 6 :  return $this->db->select('SELECT * FROM message order by Source desc');break;	
      case 7 :  return $this->db->select('SELECT * FROM message order by Objet asc');break;	
      case 8 :  return $this->db->select('SELECT * FROM message order by Objet desc');break;	
      case 9 :  return $this->db->select('SELECT * FROM message order by Destination asc');break;	
      case 10 : return $this->db->select('SELECT * FROM message order by Destination desc');break;	
      case 11 : return $this->db->select('SELECT * FROM message order by Date asc');break;	
      case 12 : return $this->db->select('SELECT * FROM message order by Date desc');break;	
      default : return $this->db->select('SELECT * FROM message');
    }    
    }
	

	
}
