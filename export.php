<?php 
// function connect() {
	// $host = 'localhost';
	// $db_name = 'deces';
	// $db_user = 'root';
	// $db_password = '';
	// return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// }

//probleme espace et virgule son pri en charge lor de la converssion il faut regle le problem avant 
// $pdo = connect();
// header('Content-Type: text/csv; charset=utf-8');
// header('Content-Disposition: attachment; filename=deces.csv');
// $sql = 'SELECT * FROM deceshosp ORDER BY id ASC';
// $output = "id,WILAYAD,COMMUNED,STRUCTURED,NOM,PRENOM,FILSDE,ETDE,SEX,DATENAISSANCE,Days,Weeks,Months,Years,WILAYA,WILAYAR,COMMUNE,COMMUNER,ADRESSE,CD,LD,AUTRES,OMLI,MIEC,EPFP,CIM1,CIM2,CIM3,CIM4,CIM5,NDLM,NDLMAAP,GM,MN,AGEGEST,POIDNSC,AGEMERE,DPNAT,EMDPNAT,DECEMAT,GRS,POSTOPP,DATEHOSPI,HEURESHOSPI,SERVICEHOSPIT,DUREEHOSPIT,MEDECINHOSPIT,CODECIM0,CODECIM,CRS,WRS,SRS,USER,DINS,HINS,NOMAR,PRENOMAR,FILSDEAR,ETDEAR,NOMPRENOMAR,PROAR,ADAR,Profession\n";
// $query = $pdo->prepare($sql);
// $query->execute();
// $list = $query->fetchAll();//.",".$rs['']
// foreach ($list as $rs) {
	
    //$output .= trim($rs['id']).",".trim($rs['WILAYAD']).",".trim($rs['COMMUNED']).",".trim($rs['STRUCTURED']).",".trim($rs['NOM']).",".trim($rs['PRENOM']).",".trim($rs['FILSDE']).",".trim($rs['ETDE']).",".trim($rs['SEX']).",".trim($rs['DATENAISSANCE']).",".trim($rs['Days']).",".trim($rs['Weeks']).",".trim($rs['Months']).",".trim($rs['Years']).",".trim($rs['WILAYA']).",".trim($rs['WILAYAR']).",".trim($rs['COMMUNE']).",".trim($rs['COMMUNER']).",".trim($rs['ADRESSE']).",".trim($rs['CD']).",".trim($rs['LD']).",".trim($rs['AUTRES']).",".trim($rs['OMLI']).",".trim($rs['MIEC']).",".trim($rs['EPFP']).",".trim($rs['CIM1']).",".trim($rs['CIM2']).",".trim($rs['CIM3']).",".trim($rs['CIM4']).",".trim($rs['CIM5']).",".trim($rs['NDLM']).",".trim($rs['NDLMAAP']).",".trim($rs['GM']).",".trim($rs['MN']).",".trim($rs['AGEGEST']).",".trim($rs['POIDNSC']).",".trim($rs['AGEMERE']).",".trim($rs['DPNAT']).",".trim($rs['EMDPNAT']).",".trim($rs['DECEMAT']).",".trim($rs['GRS']).",".trim($rs['POSTOPP']).",".trim($rs['DATEHOSPI']).",".trim($rs['HEURESHOSPI']).",".trim($rs['SERVICEHOSPIT']).",".trim($rs['DUREEHOSPIT']).",".trim($rs['MEDECINHOSPIT']).",".trim($rs['CODECIM0']).",".trim($rs['CODECIM']).",".trim($rs['CRS']).",".trim($rs['WRS']).",".trim($rs['SRS']).",".trim($rs['USER']).",".trim($rs['DINS']).",".trim($rs['HINS']).",".trim($rs['NOMAR']).",".trim($rs['PRENOMAR']).",".trim($rs['FILSDEAR']).",".trim($rs['ETDEAR']).",".trim($rs['NOMPRENOMAR']).",".trim($rs['PROAR']).",".trim($rs['ADAR']).",".trim($rs['Profession'])."\n";
// }
// echo $output;
// exit;

//$contenu = mysql_real_escape_string(htmlspecialchars($_POST["contenu"]));
// $input = "ttt,tttt";
// $addr = strtr($input, ",", "_");
// echo $addr ;




// define variables and set to empty values
// $name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $name = test_input($_POST["name"]);
  // $email = test_input($_POST["email"]);
  // $website = test_input($_POST["website"]);
  // $comment = test_input($_POST["comment"]);
  // $gender = test_input($_POST["gender"]);
// }

// function test_input($data) { 
  // $data = trim($data);
  // $data = stripslashes($data);
  // $data = htmlspecialchars($data);
  // return $data;
// }


// echo $name = test_input("gfgfg               \ gfgdgfhhhhh");

// function securite_bdd($string)
	// {
		// On regarde si le type de string est un nombre entier (int)
		// if(ctype_digit($string))
		// {
			// $string = intval($string);
		// }
		// Pour tous les autres types
		// else
		// {
			// $string = mysql_real_escape_string(htmlspecialchars($string));
			// $string = addcslashes($string, '%_');
		// }
		
		// return $string;
	// }


// echo $name = securite_bdd("gfgfg               \ gfgdgfhhhhh");


// $dbh correspond à une connexion avec une base de données (MySQL, PostgreSQL, Oracle...)
	// $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
	// $stmt->bindParam(':name', $name);
	// $stmt->bindParam(':value', $value);

	// Insertion d'une ligne
	// $name = 'one';
	// $value = 1;
	// $stmt->execute();

    
// class Securite
	// {
		//Données entrantes
		// public static function bdd($string)
		// {
			//On regarde si le type de string est un nombre entier (int)
			// if(ctype_digit($string))
			// {
				// $string = intval($string);
			// }
			//Pour tous les autres types
			// else
			// {
				//$string = mysql_real_escape_string($string);
				// $string = addcslashes($string, '%_');
			// }
				
			// return $string;

		// }
		//Données sortantes
		// public static function html($string)
		// {
			// return htmlentities($string);
		// }
	// }


// $nom='ffgf ,,,,;;;;  ';
// $prenom='hhhhhh hhhhh';
    // echo $pseudo = Securite::bdd($nom);echo '</br>';
	// echo $password = Securite::bdd($prenom);









?>