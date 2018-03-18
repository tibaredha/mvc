<?php

class deces_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM deceshosp where $o like '$q%' order by DINS,NOM,PRENOM limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM deceshosp where $o like '$q%' order by DINS,NOM ");
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	public function listcim() {
        return $this->db->select('SELECT * FROM  chapitre  order by IDCHAP');
    }
	public function userSingleListcim($id) {
        return $this->db->select('SELECT * FROM chapitre WHERE IDCHAP = :id', array(':id' => $id));
    }
	public function editSavecim($data) {
		$postData = array(
            'CHAP'   => $data['CHAP']    
        );
		//echo '<pre>';print_r ($postData);echo '<pre>';
      $this->db->update('chapitre', $postData, "IDCHAP=" . $data['id'] . "");
    }
	public function userSingleListcatecim($id) {
        
		return $this->db->select('SELECT * FROM cim WHERE c_chapi = :id', array(':id' => $id));
    }
	public function userSingleListcatecim1($id) {
        
		return $this->db->select('SELECT * FROM cim WHERE row_id = :id', array(':id' => $id));
    }
	public function editSavecatecim1($data) {
		$postData = array(
            'diag_nom'   => $data['diag_nom'],    
            'diag_cod'   => $data['diag_cod']  
	   );
		echo '<pre>';print_r ($postData);echo '<pre>';
      $this->db->update('cim', $postData, "row_id=" . $data['id'] . "");
    }
	
	
	
	
	
	
	
	
	
	
	
	function miseajours() 
	{
	$db_host="localhost";
	$db_name="mvc"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	$sql=mysql_query("SELECT * FROM ephidrissia  order by  CODECIM");
    // echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;

 while($value=mysql_fetch_array($sql))
	{
	// echo '<tr>';
	// echo '<td>';echo $value['DINS'];echo '</td>';
    // echo '<td>';echo $value['WILAYAD'];echo '</td>';
	// echo '<td>';echo $value['COMMUNED'];echo '</td>';
	// echo '<td>';echo $value['STRUCTURED'];echo '</td>';
	// echo '<td>';echo $value['NOM'];echo '</td>';
	// echo '<td>';echo $value['PRENOM'];echo '</td>';
	// echo '<td>';echo $value['FILSDE'];echo '</td>';
	// echo '<td>';echo $value['ETDE'];echo '</td>';
	// echo '<td>';echo $value['SEX'];echo '</td>';
	// echo '<td>';echo $value['DATENAISSANCE'];echo '</td>';
	// echo '<td>';echo $value['COMMUNE'];echo '</td>';
	// echo '<td>';echo $value['WILAYA'];echo '</td>';
	// echo '<td>';echo $value['COMMUNE'];echo '</td>';
	// echo '<td>';echo $value['WILAYAR'];echo '</td>';
	// echo '<td>';echo $value['DATEHOSPI'];echo '</td>';
    // echo '<td>';echo $value['SERVICEHOSPIT'];echo '</td>';
    // echo '<td>';echo $value['CODECIM'];echo '</td>';
    // echo '<td>';echo $value['MEDECINHOSPIT'];echo '</td>';
        $Date1 = $this->dateFR2US($value['DATENAISSANCE']) ;
		$Date2 = $this->dateFR2US($value['DINS']) ;
		
		// ECHO $Date2;
		
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
	    $Date11 = $this->dateFR2US($value['DATEHOSPI']) ;
		$Date22 = $this->dateFR2US($value['DINS']) ;
		$Timestamp11 = CalculateTimestampFromCurrDatetime($Date11);
		$Timestamp22 = CalculateTimestampFromCurrDatetime($Date22);
		$DateDiff1 = CalculateDateDifference($Timestamp11, $Timestamp22);
  


  $sql1 = "INSERT INTO deceshosp ( WILAYAD,
	                                COMMUNED,
									STRUCTURED,
									NOM,
									PRENOM,
									FILSDE,
									ETDE,
									SEX,
									DATENAISSANCE,
									Days,
									Weeks,
									Months,
									Years,
									WILAYA,
									WILAYAR,
									COMMUNE,
									COMMUNER,
									ADRESSE,
									CD,	
									LD,
									AUTRES,
									CIM1,
									CIM2,
									CIM3,
									CIM4,
									CIM5,
									NDLM,
									NDLMAAP,
									DECEMAT,
									GRS,
									DATEHOSPI,
									SERVICEHOSPIT,
									DUREEHOSPIT,
									MEDECINHOSPIT,
									CODECIM0,
									CODECIM,
									DINS,
									HINS) 
	VALUES (
	        '".$value['WILAYAD']."',
			'".$value['COMMUNED']."',
	        '".$value['STRUCTURED']."',
	        '".$value['NOM']."',
	        '".$value['PRENOM']."',
			'".$value['FILSDE']."',
			'".$value['ETDE']."',
			'".$value['SEX']."',
			'".$value['DATENAISSANCE']."',

			'".$DateDiff['days']."',
			'".$DateDiff['weeks']."',
			'".$DateDiff['months']."',
			'".$DateDiff['years']."',
	
			'".$value['WILAYA']."',
			'".$value['WILAYAR']."',
			'".$value['COMMUNE']."',
			'".$value['COMMUNER']."',
			'*',
			'CN',
			'SSP',
			'*',
			'*',
			'*',
			'*',
			'*',
			'*',
			'NAT',
			'*',
			'0',
			'IDETER',
			'".dateFR2US($value['DATEHOSPI'])."',
			'".$value['SERVICEHOSPIT']."',
			'".$DateDiff1['days']."',
			'".$value['MEDECINHOSPIT']."',
		    '*',
			'".$value['CODECIM']."',
			'".dateFR2US($value['DINS'])."',
			''
			);";
			
		
    
	// $query1 = mysql_query($sql1);


	
	// echo '</tr>';'".$value['STRUCTURED']."',
	}
	
 // echo "</table>";

	}
	
	
	
//***deces ***//
    public function createdeces($data) {
		$Date1 = dateFR2US($data['DATENS']) ;
		$Date2 = $data['DINS'];
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
	    $Date11 = dateFR2US($data['DATEHOSPI']) ;
		$Date22 = $data['DINS'];
		$Timestamp11 = CalculateTimestampFromCurrDatetime($Date11);
		$Timestamp22 = CalculateTimestampFromCurrDatetime($Date22);
		$DateDiff1 = CalculateDateDifference($Timestamp11, $Timestamp22);
		$this->db->insert('deceshosp', array(
			'WILAYAD'    => $data['WILAYAD'],
            'COMMUNED'   => $data['COMMUNED'],
            'STRUCTURED' => $data['STRUCTURED'],
			'DINS'   => $data['DINS'],
            'HINS'   => $data['HINS'],
            'NOM'    => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILSDE' => $data['FILSDE'],
			'ETDE'   => $data['ETDE'],
			'SEX'    => $data['SEXE'],
			'DATENAISSANCE' => $data['DATENS'],
			'Days' => $DateDiff['days'],
            'Weeks' => $DateDiff['weeks'],
            'Months' => $DateDiff['months'],
            'Years' => $DateDiff['years'],
			'WILAYA'   => $data['WILAYAN'],
            'COMMUNE'  => $data['COMMUNEN'],
            'WILAYAR'  => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE'  => $data['ADRESSE'],
			'CD'  => $data['CD'],
			'LD'  => $data['LD'],
			'AUTRES'  => $data['AUTRES'],
			'OMLI'  => $data['OMLI'],
			'MIEC'  => $data['MIEC'],
			'EPFP'  => $data['EPFP'],
			'CIM1'  => $data['CIM1'],
			'CIM2'  => $data['CIM2'],
			'CIM3'  => $data['CIM3'],
			'CIM4'  => $data['CIM4'],
			'CIM5'  => $data['CIM5'],
			'NDLM'  => $data['NDLM'],
			'NDLMAAP'  => $data['NDLMAAP'],
			'GM'  => $data['GM'],
			'MN'  => $data['MN'],
			'AGEGEST'  => $data['AGEGEST'],
			'POIDNSC'  => $data['POIDNSC'],
			'AGEMERE'  => $data['AGEMERE'],
			'DPNAT'  => $data['DPNAT'],
			'EMDPNAT'  => $data['EMDPNAT'],
			'DECEMAT'  => $data['DECEMAT'],
			'GRS'  => $data['GRS'],
			'POSTOPP'  => $data['POSTOPP'],
		    'DATEHOSPI'  => $data['DATEHOSPI'],
		    'HEURESHOSPI'  => $data['HEURESHOSPI'],
			'SERVICEHOSPIT'  => $data['SERVICEHOSPIT'],
		    'DUREEHOSPIT'  => $DateDiff1['days'],
            'MEDECINHOSPIT'  => $data['MEDECINHOSPIT'],
			'CODECIM0'  => $data['CODECIM0'],
			'CODECIM'  => $data['CODECIM'],
			'CRS'=> $data['REGION'],
            'WRS'=> $data['WILAYA'],
            'SRS'=> $data['STRUCTURE'],
            'USER'=> $data['login']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	public function deletedeces($id) {       
        $this->db->delete('deceshosp', "id = '$id'");
    }	
	public function userSingleListdeces($id) {
        return $this->db->select('SELECT * FROM deceshosp WHERE id = :id', array(':id' => $id));
    }	
	public function editSavedeces($data) {
        $Date1 = dateFR2US($data['DATENS']) ;
		$Date2 = $data['DINS'];
		$Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		$Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		$DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
	    $Date11 = dateFR2US($data['DATEHOSPI']) ;
		$Date22 = $data['DINS'];
		$Timestamp11 = CalculateTimestampFromCurrDatetime($Date11);
		$Timestamp22 = CalculateTimestampFromCurrDatetime($Date22);
		$DateDiff1 = CalculateDateDifference($Timestamp11, $Timestamp22);
		$postData = array(
			'WILAYAD'    => $data['WILAYAD'],
            'COMMUNED'   => $data['COMMUNED'],
            'STRUCTURED' => $data['STRUCTURED'],
		    'DINS'=>$data['DINS'],
            'HINS'=>$data['HINS'],
            'NOM'=>$data['NOM'],
            'PRENOM'=>$data['PRENOM'],
            'FILSDE'=>$data['FILSDE'],
			'ETDE'=>$data['ETDE'],
			'SEX'=>$data['SEXE'],
            'DATENAISSANCE'=>$data['DATENS'],
			'Days' => $DateDiff['days'],
            'Weeks' => $DateDiff['weeks'],
            'Months' => $DateDiff['months'],
            'Years' => $DateDiff['years'],
			'WILAYA'=>$data['WILAYAN'],
            'COMMUNE'=>$data['COMMUNEN'],
            'WILAYAR'=>$data['WILAYAR'],
            'COMMUNER'=>$data['COMMUNER'],
            'ADRESSE'=>$data['ADRESSE'],
            'CD'  => $data['CD'],
			'LD'  => $data['LD'],
			'AUTRES'  => $data['AUTRES'],
			'OMLI'  => $data['OMLI'],
			'MIEC'  => $data['MIEC'],
			'EPFP'  => $data['EPFP'],
			'CIM1'  => $data['CIM1'],
			'CIM2'  => $data['CIM2'],
			'CIM3'  => $data['CIM3'],
			'CIM4'  => $data['CIM4'],
			'CIM5'  => $data['CIM5'],
			'NDLM'  => $data['NDLM'],
			'NDLMAAP'  => $data['NDLMAAP'],
			'GM'  => $data['GM'],
			'MN'  => $data['MN'],
			'AGEGEST'  => $data['AGEGEST'],
			'POIDNSC'  => $data['POIDNSC'],
			'AGEMERE'  => $data['AGEMERE'],
			'DPNAT'  => $data['DPNAT'],
			'EMDPNAT'  => $data['EMDPNAT'],
			'DECEMAT'  => $data['DECEMAT'],
			'GRS'  => $data['GRS'],
			'POSTOPP'  => $data['POSTOPP'],
			'DATEHOSPI'  => $data['DATEHOSPI'],
			'HEURESHOSPI'  => $data['HEURESHOSPI'],
			'SERVICEHOSPIT'  => $data['SERVICEHOSPIT'],
			'DUREEHOSPIT'  => $DateDiff1['days'],
			'MEDECINHOSPIT'  => $data['MEDECINHOSPIT'],
			'CODECIM0'  => $data['CODECIM0'],
			'CODECIM'  => $data['CODECIM']	
        );
		//echo '<pre>';print_r ($postData);echo '<pre>';
       $this->db->update('deceshosp', $postData, "id =" . $data['id'] . "");
    }	
	public function listdeces() {
        return $this->db->select('SELECT * FROM  deceshosp  order by DINS  desc limit 50');
        // return $this->db->select('SELECT * FROM don  order by id     ');
    }
	public function dnrcommune($id) {
        return $this->db->select('SELECT * FROM com WHERE IDWIL = :id  order by COMMUNE asc ', array(':id' => $id));
       
    }
}
