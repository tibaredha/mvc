<?php

class Pre_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userSearch($o, $q, $p, $l) {
        return $this->db->select("SELECT * FROM don where $o like '$q%'  and IND='IND' order by IDP desc limit $p,$l  ");
    }

    public function userSearch1($o, $q) {
        return $this->db->select("SELECT * FROM don where $o like '$q%' and IND='IND' order by IDP desc ");
    }

    public function userList() {
        return $this->db->select('SELECT * FROM don where  CGR ="" AND  PFC ="" AND IDP!="0"  AND IDP!=""  order by IDP    ');
    }

    public function userSingleList($id) {
        return $this->db->select('SELECT * FROM don WHERE id = :id', array(':id' => $id));
    }

    public function editSave($data) {
        $postData = array(
            'DATEPRE' => $data['DATEPRE'],
            'VI' => $data['VI'],
            'FDS' => $data['FDS'],
            'AC' => $data['AC'],
            'PCC' => $data['PCC'],
			'PL' => $data['PL'],
            'AUTRES' => $data['AUTRES'],
            'CGR' => $data['CGR'],
            'PFC' => $data['PFC'],
            'CPS' => $data['CPS'],
            'IDDNR' => $data['IDDNR'],
			'DATEDON' => $data['DATEDON'],
            'GROUPAGE' => $data['GROUPAGE'],
			'RHESUS' => $data['RHESUS'],
			'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
			'IDP' => $data['IDP'],
            'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
			 );
		 echo '<pre>';print_r ($postData);echo '<pre>';	
		 $this->db->update('don', $postData, "id =" . $data['id'] . "");		
        echo '<br>';
		// si pas de probleme 
		echo '<br>';echo 'separation ok ';
            function datePlus($dateDo, $nbrJours) {
                $timeStamp = strtotime($dateDo);
                $timeStamp += 24 * 60 * 60 * $nbrJours;
                $newDate = date("Y-m-d", $timeStamp);
                return $newDate;
            }
            if ($data['CGR'] == '1') { //AJOUTER DANS TABLE STOCK cgr si psl separe
                echo '<br>';echo 'separation ok CGR';
                $DPCGR = datePlus($data['DATEDON'], 35); //35 jours
                echo '<br>';echo 'date peremption CGR +35 jours : ';echo $DPCGR;
                echo '<pre>';print_r ($data);echo '<pre>';
				$this->db->insert('cgr', array(
                    'DATEDON' => $data['DATEDON'],
                    'DATEPER' => $DPCGR,
                    'GROUPAGE' => $data['GROUPAGE'],
                    'RHESUS' => $data['RHESUS'],
                    'CRH2' => $data['CRH2'],
                    'ERH3' => $data['ERH3'],
                    'CRH4' => $data['CRH4'],
                    'ERH5' => $data['ERH5'],
                    'KELL1' => $data['KELL1'],
                    'KELL2' => $data['KELL2'],
                    'NDP' => $data['IDP'],
                    'CRS' => $data['REGION'],
                    'WRS' => $data['WILAYA'],
                    'SRS' => $data['STRUCTURE'],
                    'USER' => $data['login']
                ));
            }
            if ($data['PFC'] == '1') { //AJOUTER DANS TABLE STOCK PFC si psl separe
                echo '<br>';echo 'separation ok PFC';
				$DPPFC = datePlus($data['DATEDON'], 90); //90 jours
                echo '<br>';echo 'date peremption PFC +90 jours : ';echo $DPPFC;
               echo '<pre>';print_r ($data);echo '<pre>';
			   $this->db->insert('pfc', array(
                    'DATEDON' => $data['DATEDON'],
                    'DATEPER' => $DPPFC,
                    'GROUPAGE' => $data['GROUPAGE'],
                    'RHESUS' => $data['RHESUS'],
                    'CRH2' => $data['CRH2'],
                    'ERH3' => $data['ERH3'],
                    'CRH4' => $data['CRH4'],
                    'ERH5' => $data['ERH5'],
                    'KELL1' => $data['KELL1'],
                    'KELL2' => $data['KELL2'],
                    'NDP' => $data['IDP'],
                    'CRS' => $data['REGION'],
                    'WRS' => $data['WILAYA'],
                    'SRS' => $data['STRUCTURE'],
                    'USER' => $data['login']
                ));
            }
            if ($data['CPS'] == '1') {//AJOUTER DANS TABLE STOCK CPS si psl separe
                echo '<br>';echo 'separation ok CPS';
				$DPCPS = datePlus($data['DATEDON'], 4); //04 jours
                echo '<br>';echo 'date peremption CPS +04 jours : '; echo $DPCPS;
                echo '<pre>';print_r ($data);echo '<pre>';
				$this->db->insert('cps', array(
                    'DATEDON' => $data['DATEDON'],
                    'DATEPER' => $DPCPS,
                    'GROUPAGE' => $data['GROUPAGE'],
                    'RHESUS' => $data['RHESUS'],
                    'CRH2' => $data['CRH2'],
                    'ERH3' => $data['ERH3'],
                    'CRH4' => $data['CRH4'],
                    'ERH5' => $data['ERH5'],
                    'KELL1' => $data['KELL1'],
                    'KELL2' => $data['KELL2'],
                    'NDP' => $data['IDP'],
                    'CRS' => $data['REGION'],
                    'WRS' => $data['WILAYA'],
                    'SRS' => $data['STRUCTURE'],
                    'USER' => $data['login']
                ));
            }   
    }

    public function editSave1($data) {
        $postData = array(
            'DATEPRE' => $data['DATEPRE'],
            'VI' => $data['VI'],
            'FDS' => $data['FDS'],
            'AC' => $data['AC'],
            'PCC' => $data['PCC'],
            'AUTRES' => $data['AUTRES'],
            'CGR' => '0',
            'PFC' => '0',
            'CPS' => '0',
            'PL' => $data['PL'],
            'IDDNR' => $data['IDDNR'],
            'GROUPAGE' => $data['GROUPAGE'],
            'RHESUS' => $data['RHESUS'],
            'CRH2' => $data['CRH2'],
            'ERH3' => $data['ERH3'],
            'CRH4' => $data['CRH4'],
            'ERH5' => $data['ERH5'],
            'KELL1' => $data['KELL1'],
            'KELL2' => $data['KELL2'],
            'DATEDON' => $data['DATEDON'],
            'IDP' => $data['IDP'],
            'CRS' => $data['REGION'],
            'WRS' => $data['WILAYA'],
            'SRS' => $data['STRUCTURE'],
            'USER' => $data['login']
        );
        //echo 'serologie probleme solution en cours   ';
        $this->db->update('don', $postData, "id =" . $data['id'] . "");
    }

}
