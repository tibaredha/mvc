<?php

class User_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        // ancienne methode
        // $sth = $this->db->prepare('SELECT id, login, role FROM users');
        // $sth->execute();
        // return $sth->fetchAll();
        return $this->db->select('SELECT * FROM users');
    }

    public function userSingleList($id) {
        // ancienne methode 
        // $sth = $this->db->prepare('SELECT id, login, role FROM users WHERE id = :id');
        // $sth->execute(array(':id' => $id));
        // return $sth->fetch();

        return $this->db->select('SELECT * FROM users WHERE id = :id', array(':id' => $id));
    }

    public function create($data) {
        //si le login exist il faut choisir un autre 
        $db_host = "localhost";
        $db_name = "mvc";
        $db_user = "root";
        $db_pass = "";
        $cnx = mysql_connect($db_host, $db_user, $db_pass)or die('I cannot connect to the database because: ' . mysql_error());
        $db = mysql_select_db($db_name);
        mysql_query("SET NAMES 'UTF8' ");
        $sql = "SELECT * FROM users WHERE login = '" . $data['login'] . "' LIMIT 1";
        $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
        if (mysql_num_rows($query) == 1) {
            $_SESSION['error'] = "Username already exists.";
            header('location: ' . URL . 'user');
        } else {
            $this->db->insert('users', array(
                'login' => $data['login'],
                'password' => $data['password'],
                'role' => $data['role']
            ));
            header('location: ' . URL . 'user');
        }
    }

    public function editSave($data) {
        // ancienne methode 
        // $sth = $this->db->prepare('UPDATE users
        // SET `login` = :login, `password` = :password, `role` = :role
        // WHERE id = :id
        // ');
        // $sth->execute(array(
        // ':id' => $data['id'],
        // ':login' => $data['login'],
        // ':password' => md5($data['password']),
        // ':role' => $data['role']
        // ));

        $postData = array(
            'login' => $data['login'],
            'password' => md5($data['password']),
            'role' => $data['role']
        );
        $this->db->update('users', $postData, "id =" . $data['id'] . "");
    }

    public function delete($id) {
        // ancienne methode 
        // $sth = $this->db->prepare('DELETE FROM users WHERE id = :id');
        // $sth->execute(array(
        // ':id' => $id
        // ));
        // novelle methode  verifier le role avant de supprimer
        $result = $this->db->select('SELECT role FROM users WHERE id = :id', array(':id' => $id));
        if ($result[0]['role'] == 'owner')
            return false;

        $this->db->delete('users', "id = '$id'");
    }

}

// function listednr($nbr) {
        // $tab = array();
        // $requete = mysql_query("SELECT * FROM tdon  limit 1,$nbr "); //order by  NOMDNR
        // while ($result = mysql_fetch_assoc($requete))
            // $tab[] = $result;
        // mysql_free_result($requete);
        // return $tab;
    // }


// if (!empty($data)) {
// foreach ($data as $result) :
// $url="/mvc29/dnr/nouvedon1/".$result['idon'];
// $url="/mvc29/dnr/pdfdnr/".$result['idon'];
// $method='POST';
// $name='ID';$size='';$value = trim($result['idon']);
// echo "<form class=\"form\" action=\"".$url."\" method=\"".$method."\" name=\"form1\" id=\"form1\">"; 	
// echo( "<table  width=\"100%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
// echo"<tr align=\"center\"  height=\"20\" ><td align=\"center\" colspan=\"3\" bgcolor=\"white\"  align=\"left\" height=\"20\" ><strong>". trim($result['NOMDNR']) . "_" . strtolower(trim($result['PRENOMDNR']))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ ". $result['GROUPAGE'] ."_". $result['RHESUS'] ." ] </strong></td> </tr>";	
// echo"<tr align=\"center\"  height=\"20\" ><td  bgcolor=\"white\"  align=\"left\" height=\"20\" >* Vous sentez vous en forme pour donner votre sang</td> <td align=\"left\"  height=\"20\" >                                           <input type=\"radio\" name=\"q1\" value=\"1\" checked> Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q1\" value=\"2\" >Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Avez-vous d�j� donn� votre sang</td> <td align=\"left\"  height=\"20\" >                                                            <input type=\"radio\" name=\"q2\" value=\"1\" checked> Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q2\" value=\"2\" > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Date du dernier don sup a 03 mois : [ ".$result['datedon']." ] </td> <td align=\"left\"  height=\"20\" >                            <input type=\"radio\" name=\"q3\" value=\"1\" checked> Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q3\" value=\"2\" > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Etes vous a jeun</td> <td align=\"left\"  height=\"20\" >                                                                           <input type=\"radio\" name=\"q4\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q4\" value=\"2\" checked > Non</td></tr>";

// echo"<tr align=\"center\"  height=\"20\" ><td colspan=\"3\" bgcolor=\"yellow\"   align=\"left\"  height=\"20\" >Avez-vous dans votre vie</td> ";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Et� hospitalis�(e)</td> <td align=\"left\"  height=\"20\" >                                                                         <input type=\"radio\" name=\"q5\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q5\" value=\"2\" checked > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Et� transfus�(e)</td> <td align=\"left\"  height=\"20\" >                                                                           <input type=\"radio\" name=\"q6\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q6\" value=\"2\" checked > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM �.) / HTA</td> <td align=\"left\"  height=\"20\" >  <input type=\"radio\" name=\"q7\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q7\" value=\"2\" checked > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Eu une affection allergique grave et/ou de l�asthme</td> <td align=\"left\"  height=\"20\" >                                         <input type=\"radio\" name=\"q8\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q8\" value=\"2\" checked > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Eu le diab�te</td> <td align=\"left\"  height=\"20\" >                                                                               <input type=\"radio\" name=\"q9\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q9\" value=\"2\" checked > Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Eu un ulc�re gastro-duod�nale </td> <td align=\"left\"  height=\"20\" >                                                              <input type=\"radio\" name=\"q10\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q10\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Eu une maladie dermatologique (acn� � roaccutane �,psoriasis � soriatane �) </td> <td align=\"left\"  height=\"20\" >                <input type=\"radio\" name=\"q11\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q11\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Et� trait�(e) par hormone de croissance </td> <td align=\"left\"  height=\"20\" >                                                    <input type=\"radio\" name=\"q12\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q12\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Voyager en Afrique, en Asie, en Am�rique Latin </td> <td align=\"left\"  height=\"20\" >                                             <input type=\"radio\" name=\"q13\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q13\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Eu des relations sexuelles extra-conjugales non prot�g�es </td> <td align=\"left\"  height=\"20\" >                                  <input type=\"radio\" name=\"q14\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q14\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Pris des drogues par voie injectable ou nasale</td> <td align=\"left\"  height=\"20\" >                                              <input type=\"radio\" name=\"q15\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q15\" value=\"2\" checked> Non</td></tr>";

// echo"<tr align=\"center\"  height=\"20\" ><td colspan=\"3\" bgcolor=\"yellow\"   align=\"left\"  height=\"20\" >Dans les 4 derniers mois, avez-vous :</td> ";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Et� op�r�(e) au cours d�une hospitalisation et/ou subiune anesth�sie g�n�rale ou locor�gionale</td> <td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q16\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q16\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Et� vaccin�(e)</td> <td align=\"left\"  height=\"20\" >                                                                                <input type=\"radio\" name=\"q17\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q17\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Subi une endoscopie</td> <td align=\"left\"  height=\"20\" >                                                                           <input type=\"radio\" name=\"q18\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q18\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Subi un tatouage ou un piercing</td> <td align=\"left\"  height=\"20\" >                                                               <input type=\"radio\" name=\"q19\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q19\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Eu une infection urinaire</td> <td align=\"left\"  height=\"20\" >                                                                     <input type=\"radio\" name=\"q20\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q20\" value=\"2\" checked> Non</td></tr>";

// echo"<tr align=\"center\"  height=\"20\" ><td colspan=\"3\" bgcolor=\"yellow\"   align=\"left\"  height=\"20\" >Pour la femme :</td> ";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Etes vous enceinte</td> <td align=\"left\"  height=\"20\" >                                                                            <input type=\"radio\" name=\"q21\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q21\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Avez-vous accouch� ou fait une fausse couche</td> <td align=\"left\"  height=\"20\" >                                                  <input type=\"radio\" name=\"q22\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q22\" value=\"2\" checked> Non</td></tr>";

// echo"<tr align=\"center\"  height=\"20\" ><td colspan=\"3\" bgcolor=\"yellow\"   align=\"left\"  height=\"20\" >Depuis une semaine, avez-vous :</td> ";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Pris des m�dicaments ATB, CTC, Aspirine</td> <td align=\"left\"  height=\"20\" >                                                       <input type=\"radio\" name=\"q23\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q23\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >*Subi des soins dentaires ?.</td> <td align=\"left\"  height=\"20\" >                                                                   <input type=\"radio\" name=\"q24\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q24\" value=\"2\" checked> Non</td></tr>";
// echo"<tr align=\"center\"  height=\"20\" ><td bgcolor=\"white\"  align=\"left\"  height=\"20\" >* Eu de la fi�vre</td> <td align=\"left\"  height=\"20\" >                                                                              <input type=\"radio\" name=\"q25\" value=\"1\" > Oui</td><td align=\"left\"  height=\"20\" ><input type=\"radio\" name=\"q25\" value=\"2\" checked> Non</td></tr>";	
// echo"<tr align=\"center\"  height=\"20\" ><td align=\"center\" colspan=\"3\" bgcolor=\"yellow\"   align=\"left\"  height=\"20\" ><input  type=\"submit\"  value=\"Confirmer Le Don \"></td> ";
// echo( "</table><br>\n" );
// echo " <input type=\"hidden\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\" />";
// echo " <input type=\"hidden\" name=\"TDNR\"  value=\"REGULIER\" />";
// echo " <input type=\"hidden\" name=\"HDP\"   value=\"".date("H:i")."\" />";
// echo " <input type=\"hidden\" name=\"DATE\"  value=\"".date('d/m/Y')."\" />";
// echo " <input type=\"hidden\" name=\"AGE\"   value=\"".(substr(date('d/m/Y'),6,4)-substr($result['DATENAISSANCE'],6,4))."\" />";
// echo " <input type=\"hidden\" name=\"idon\"  value=\"".$result['idon']."\" />";
// endforeach;
// }		










