function ouinon($ouinon)
	{
	if ($ouinon==1)
	{
	$resultat='Oui';
	}
	else 
	{
	$resultat='Nom';
	}
	return $resultat;
	}
	
	function QESDNRPDF($idon,$IDDNR) 
	{
	$this->mysqlconnect();
	$query = "select * from don WHERE  idon = '$idon'";
	$resultat=mysql_query($query);
	$row = mysql_fetch_array($resultat); 
	$this->enteteques();
	$this->SetFillColor(250); //elle fonctionne avec 3 parametre si le 2et 3 sont absent  la couleurvarie du noire  au gris //sinon 1=rouge 2vert 3 bleu 
	$this->setxy(159,18);
	$this->Cell(40,10,'Nouveau donneur',0,1,'C',true,'http://pcephao/gpts/index.php?uc=CHDNR'); //A MODIFIER EN RESEAU  EN CHANGANT LOCALHOSTE PAR ADRESSE IP DU SERVEUR   
	$this->Text(10,45,'* Vous sentez vous en forme pour donner votre sang ......................................................................');$this->Text(180,45,$this->ouinon($row["q1"]));
	$this->Text(10,52,"* Avez-vous déjà donné votre sang .....................................................................................................");$this->Text(180,52,$this->ouinon($row["q2"]));
	$this->Text(10,59,'* Date du dernier don ');$this->Text(180,59,$this->ouinon($row["q3"]));
	$this->Text(10,66,'* Etes vous a jeun ..................................................................................................................................'); $this->Text(180,66,$this->ouinon($row["q4"]));
	$this->Text(10,73,'Avez-vous dans votre vie :');
	$this->Text(10,80,'* Eté hospitalisé(e) ................................................................................................................................');$this->Text(180,80,$this->ouinon($row["q5"]));
	$this->Text(10,87,'* Eté transfusé(e) ..................................................................................................................................');$this->Text(180,87,$this->ouinon($row["q6"]));
	$this->Text(10,94,'* Eu une maladie cardiaque (trouble du rythme cardiaque,valvulopaties, angor, IDM ...) et/ou HTA  ');$this->Text(180,94,$this->ouinon($row["q7"]));
	$this->Text(10,101,'* Eu une affection allergique grave et/ou de l\'asthme ......................................................................'); $this->Text(180,101,$this->ouinon($row["q8"]));
	$this->Text(10,108,'* Eu le diabète .......................................................................................................................................');$this->Text(180,108,$this->ouinon($row["q9"]));
	$this->Text(10,115,'* Eu un ulcere gastro-duodénale ........................................................................................................');$this->Text(180,115,$this->ouinon($row["q10"]));
	$this->Text(10,122,'* Eu une maladie dermatologique (acné =roaccutane=,psoriasis =soriatane=) ............................'); $this->Text(180,122,$this->ouinon($row["q11"]));
	$this->Text(10,129,'* Eté traité(e) par hormone de croissance .........................................................................................');$this->Text(180,129,$this->ouinon($row["q12"]));
	$this->Text(10,136,'* Voyager en Afrique, en Asie, en Amerique Latine ..........................................................................'); $this->Text(180,136,$this->ouinon($row["q13"]));
	$this->Text(10,143,'* Eu des relations sexuelles extra-conjugales non protégées ........................................................');$this->Text(180,143,$this->ouinon($row["q14"]));
	$this->Text(10,150,'* Pris des drogues par voie injectable ou nasale ..............................................................................'); $this->Text(180,150,$this->ouinon($row["q15"]));
	$this->Text(10,157,'Dans les 4 derniers mois, avez-vous :');                                                            
	$this->Text(10,164,'* Eté opéré(e) au cours d\'une hospitalisation et/ou subi une anesthésie genérale ou locorégionale ');$this->Text(180,164,$this->ouinon($row["q16"]));
	$this->Text(10,171,'* Eté vacciné(e).....................................................................................................................................');$this->Text(180,171,$this->ouinon($row["q17"]));
	$this->Text(10,178,'* Subi une endoscopie .......................................................................................................................');$this->Text(180,178,$this->ouinon($row["q18"]));
	$this->Text(10,185,'* Subi un tatouage ou un piercing .....................................................................................................'); $this->Text(180,185,$this->ouinon($row["q19"]));
	$this->Text(10,192,'* Eu une infection urinaire ..................................................................................................................');$this->Text(180,192,$this->ouinon($row["q20"]));
	$this->Text(10,199,'Pour la femme :');                                                                                  
	$this->Text(10,206,'* Etes vous enceinte............................................................................................................................'); $this->Text(180,206,$this->ouinon($row["q21"]));
	$this->Text(10,213,'* Avez-vous accouché ou fait une fausse couche depuis moins de 06 mois ...............................');$this->Text(180,213,$this->ouinon($row["q22"]));
	$this->Text(10,220,'Depuis une semaine, avez-vous :');                                                                  
	$this->Text(10,227,'* Pris des médicaments ATB, CTC, Aspirine ....................................................................................'); $this->Text(180,227,$this->ouinon($row["q23"]));
	$this->Text(10,234,'* Subi des soins dentaires ?................................................................................................................'); $this->Text(180,234,$this->ouinon($row["q24"]));
	$this->Text(10,241,'* Eu de la fièvre ....................................................................................................................................');$this->Text(180,241,$this->ouinon($row["q25"]));
	$this->Text(10,256,'le donneur Nom et Prenom');
	//$this->Text(10,256+8,strtoupper($_POST["NOMDNR"]).'_'.ucwords($_POST["PRENOMDNR"]));
	$this->SetXY(150,250);				 
	$this->cell(40,5,"Signature  médecin:",1,0,'C',0);
	$this->SetXY(150,260);				 
	$this->cell(40,5,"DR : ".$this->USER() ,1,0,'C',0);
	// 2EME PAGE  FICHE DONNEUR
	$this->entete();
	$this->corps($row["POIDS"],$row["IDP"],$row["TYPEPOCHE"]);
	$query1 = "select * from DNR WHERE  IDDNR = '$IDDNR'";
	$resultat1=mysql_query($query1);
	$row1 = mysql_fetch_array($resultat1); 
	$this->Text(22,80,strtoupper($row1["NOM"]));
	$this->Text(100,80,ucwords($row1["PRENOM"]));
	$this->Text(180,80,$row1["SEXE"]);
	$this->Text(22,90,$row1["DATENAISSANCE"]);
	$this->Text(178,90,substr(date('Y-m-d'),0,4)-substr($row1['DATENAISSANCE'],6,4)."Ans");
	$this->Text(45,110,$this->nbrtostring('gpts2012','wil','IDWIL',$row1["WILAYA"],'WILAYAS'));
	$this->Text(130,110,$this->nbrtostring('gpts2012','com','IDCOM',$row1["COMMUNE"],'COMMUNE'));
	$this->Text(45,120,$this->nbrtostring('gpts2012','wil','IDWIL',$row1["WILAYAR"],'WILAYAS'));
	$this->Text(130,120,$this->nbrtostring('gpts2012','com','IDCOM',$row1["COMMUNER"],'COMMUNE'));
	$this->Text(45,130,$row1["ADRESSE"]);
	$this->Text(167,130,$row1["TELEPHONE"]);
	$this->Text(65,40,date('d/m/Y'));
	$this->text(136,40,$row["STR"]);
	$this->Text(37,160,$row["TDNR"]);
	$this->SetFont('Arial','B',10);
	$this->Text(20,170,$row["POIDS"]);                $this->Text(35,170,'Taille en cm : '.$row["Taille"]);   $this->Text(65,170,'PI M : '.$this->PI($row["Taille"]));  $this->Text(90,170,'BSA : '.round($this->BSA($row["POIDS"],$row["Taille"]), 2) );//Body Mass Index 
	$this->Text(15,180,$row["TAS"].'/'.$row["TAD"]);  $this->Text(50,180,'PAM : '.round(($row["TAS"]+(2*$row["TAD"]))/3,2).' mmhg');                
	$this->Text(32,190,$row["TDON"]);
	$this->Text(45,210,$row["HEUREDON"]);
	$this->Code39(5,43,$idon,1,12); 
	$this->Output();
	}
   
	function RESDONPDF($idon,$iddnr,$DATEDON)
	{
	$this->mysqlconnect();
	$sql = "SELECT * FROM dnr WHERE IDDNR = ".$iddnr ;
	$requete = mysql_query( $sql ) ; 
	if( $result = mysql_fetch_object( $requete ) )
	{ 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->AddPage('p','A5');
	$this->SetFont('Times','B',10);
	$this->SetTextColor(225,0,0); 
	$this->RoundedRect(5, 2, 135, 24, 2, $style = '');
	$this->SetXY(5,2);
	$this->Cell(135,8,'Etablissement Public Hospitalier Ain-Oussera',0,1,'C');
	$this->SetXY(5,2+8);
	$this->Cell(135,8,'Poste De Transfusion Sanguine',0,1,'C');
	$this->SetXY(5,2+8+8);
	$this->Cell(135,8,'Resultat De La Qualification Biologique',0,1,'C');
	$this->Line(5, 30, 140, 30);
	//$this->Image('../IMAGES/LOGOAO.GIF',10,7,15,15,0);$this->Image('../IMAGES/LOGOAO.GIF',120,7,15,15,0);
	//$this->Image('../IMAGES/grife.jpg',85,150,55,22,0);//85,143
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',8);
	$this->RoundedRect(5, 35, 60, 42, 2, $style = '');
	$this->SetFillColor(255,246,143);//https://vela.astro.ulg.ac.be/Vela/Colors/rgb.html
	$this->RoundedRect(80, 35, 60, 42, 2, $style = '');
	$this->SetXY(82,40);
	$this->Cell(55,8,'Nom : '.$result->NOM,0,1,1,'r');
	$this->SetXY(82,48);
	$this->Cell(55,8,'Prenom : '.$result->PRENOM,0,1,1,'r');
	$this->SetXY(82,56);
	$d1=substr($result->DATENAISSANCE,6,4);
	$d2=substr(date('d/m/Y'),6,4);
	$d3=$d2-$d1;
	$this->Cell(55,8,'Age : '.$d3." Ans ",0,1,1,'r');
	$this->SetXY(82,56+8);
	$this->Cell(55,8,'Adresse : '.$result->ADRESSE,0,1,1,'r');
	$this->SetFont('Arial','B',8);
	$this->RoundedRect(5, 80, 135, 58, 2, $style = ''); 
	$this->SetXY(6,85);
	$this->Cell(30,8,'Examens Demandes',1,1,'C'); 
	$this->SetXY(36,85);
	$this->Cell(30,8,'Resultats',1,1,'C'); 
	$this->SetXY(66,85);
	$this->Cell(40,8,'Valeurs de Référence',1,1,'C'); 
	$this->SetXY(106,85);
	$this->Cell(32,8,'Anteriorités',1,1,'C'); 
	$this->SetXY(6,85+8);
	$this->Cell(30,8,'Groupage Rhesus:',0,1,'r'); 
	$sql1 = "SELECT * FROM don WHERE idon = ".$idon ;
	$requete1 = mysql_query( $sql1 ) ; 
	if( $result1 = mysql_fetch_object( $requete1 ) )
	{ 
	$this->SetXY(5,40);
	$this->Cell(20,8,'Code Prelevement : ',0,1,'r');
	$idp=$result1->IDP;
	$this->Code39(33,40 ,$result1->IDP, $baseline=0.5, $height=5);
	$this->SetXY(5,48);$this->Cell(20,8,'Poids : '.$result1->POIDS.' '.'kg',0,1,'r');
	$this->SetXY(5,56);$this->Cell(20,8,'SYS/DIA : '.$result1->TAS.'/'.$result1->TAD.' '.'mmhg',0,1,'r');
	$this->SetXY(5,56+8);$this->Cell(20,8,'Date Prelevement : '.$this->dateUS2FR($result1->DATEDON),0,1,'r');
	$this->SetXY(36,85+8);
	$this->Cell(30,8,$result1->GROUPAGE.' / '.$result1->RHESUS,0,1,'C'); 
	$this->SetXY(66,85+8);
	$this->Cell(40,8,'***',0,1,'C');  
	$this->SetXY(106,85+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8);
	$this->Cell(30,8,'HVB:',0,1,'r'); 
	$this->SetXY(36,85+8+8);
	$this->Cell(30,8,ucfirst($result1->HVB),0,1,'C'); 
	$this->SetXY(66,85+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8);
	$this->Cell(30,8,'HVC:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8);
	$this->Cell(30,8,ucfirst($result1->HVC),0,1,'C'); 
	$this->SetXY(66,85+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8+8);
	$this->Cell(30,8,'HIV:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8+8);
	$this->Cell(30,8,ucfirst($result1->HIV),0,1,'C'); 
	$this->SetXY(66,85+8+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8+8+8);
	$this->Cell(30,8,'VDRL:',0,1,'r'); 
	$this->SetXY(34,85+8+8+8+8+8);
	$this->Cell(30,8,trim(ucfirst($result1->TPHA)),0,1,'C'); 
	$this->SetXY(66,85+8+8+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8+8+8);
	$this->Cell(32,8,'***',0,1,'C'); 
	}
	$this->RoundedRect(5, 143, 55, 30, 2, $style = ''); 
	$this->SetXY(5,143);
	$this->Cell(55,8,'DATE: ',0,1,'C'); 
	$this->SetXY(5,143+8);
	$this->Cell(55,8,date('d-m-Y'),0,1,'C'); 
	$this->RoundedRect(85, 143, 55, 30, 2, $style = ''); 
	$this->SetXY(85,143);
	$this->Cell(55,8,'Le Poste De Transfusion Sanguine ',0,1,'C');
	$this->SetFont('Arial','B',8);
	$this->SetFillColor(220);
	$this->SetXY(5,176);
	$this->Cell(135,6,'NB: les resultats figurants ci dessus ne doivent etre consideres definitives ',0,0,1,'C');
	$this->SetXY(5,176+6);
	$this->Cell(135,6,'qu\'apres une deuxieme qualification effectuee sur un second prelevement',0,0,1,'C');
	$this->Output();
	}
	}
	
//*******************************************************************************************************************//
	function resqual($id)
	{
	$this->mysqlconnect();
	$sql = "SELECT * FROM tdon WHERE idon = ".$id ;
	$requete = mysql_query( $sql ) ; 
	if( $result = mysql_fetch_object( $requete ) )
	{ 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->AddPage('p','A5');
	$this->SetFont('Times','B',10);
	$this->SetTextColor(225,0,0); 
	$this->RoundedRect(5, 2, 135, 24, 2, $style = '');
	$this->SetXY(5,2);
	$this->Cell(135,8,'Etablissement Public Hospitalier Ain-Oussera',0,1,'C');
	$this->SetXY(5,2+8);
	$this->Cell(135,8,'Poste De Transfusion Sanguine',0,1,'C');
	$this->SetXY(5,2+8+8);
	$this->Cell(135,8,'Resultat De La Qualification Biologique',0,1,'C');
	$this->Line(5, 30, 140, 30);
	//$this->Image('../IMAGES/LOGOAO.GIF',10,7,15,15,0);$this->Image('../IMAGES/LOGOAO.GIF',120,7,15,15,0);
	//$this->Image('../IMAGES/grife.jpg',85,150,55,22,0);//85,143
	$this->SetTextColor(0,0,0);
	$this->SetFont('Arial','B',8);
	$this->RoundedRect(5, 35, 60, 42, 2, $style = '');
	$this->SetXY(5,40);
	$this->Cell(20,8,'NDP : ',0,1,'r');
	$this->Code39(15,40 , $result->IDP, $baseline=0.5, $height=5);
	$this->SetXY(5,48);
	$this->Cell(20,8,'N°Prelevement : '.$result->IDP,0,1,'r');
	$this->SetXY(5,56);
	$this->Cell(20,8,'Date Prelevement : '.$this->dateUS2FR($result->datedon),0,1,'r');
	$this->SetXY(5,56+8);
	$this->Cell(20,8,'Adresse : '.$result->ADRESSE,0,1,'r');
	$this->SetFillColor(255,246,143);//https://vela.astro.ulg.ac.be/Vela/Colors/rgb.html
	$this->RoundedRect(80, 35, 60, 42, 2, $style = '');
	$this->SetXY(85,40);
	$this->Cell(50,8,'Nom : '.$result->NOMDNR,0,1,1,'r');
	$this->SetXY(85,48);
	$this->Cell(50,8,'Prenom : '.$result->PRENOMDNR,0,1,1,'r');
	$this->SetXY(85,56);
	$this->Cell(50,8,'Age : '.$result->AGE." Ans ",0,1,1,'r');
	$this->SetXY(85,56+8);
	$this->Cell(50,8,'Sexe : '.$result->SEXE,0,1,1,'r');
	$this->SetFont('Arial','B',8);
	$this->RoundedRect(5, 80, 135, 58, 2, $style = ''); 
	$this->SetXY(6,85);
	$this->Cell(30,8,'Examens Demandes',1,1,'C'); 
	$this->SetXY(36,85);
	$this->Cell(30,8,'Resultats',1,1,'C'); 
	$this->SetXY(66,85);
	$this->Cell(40,8,'Valeurs de Référence',1,1,'C'); 
	$this->SetXY(106,85);
	$this->Cell(32,8,'Anteriorités',1,1,'C'); 
	$this->SetXY(6,85+8);
	$this->Cell(30,8,'Groupage Rhesus:',0,1,'r'); 
	$this->SetXY(36,85+8);
	$this->Cell(30,8,$result->GROUPAGE.$result->RHESUS,0,1,'C'); 
	$this->SetXY(66,85+8);
	$this->Cell(40,8,'***',0,1,'C');  
	$this->SetXY(106,85+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8);
	$this->Cell(30,8,'HVB:',0,1,'r'); 
	$this->SetXY(36,85+8+8);
	$this->Cell(30,8,ucfirst($result->HVB),0,1,'C'); 
	$this->SetXY(66,85+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8);
	$this->Cell(30,8,'HVC:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8);
	$this->Cell(30,8,ucfirst($result->HVC),0,1,'C'); 
	$this->SetXY(66,85+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8+8);
	$this->Cell(30,8,'HIV:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8+8);
	$this->Cell(30,8,ucfirst($result->HIV),0,1,'C'); 
	$this->SetXY(66,85+8+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8+8);
	$this->Cell(32,8,'***',0,1,'C');  
	$this->SetXY(6,85+8+8+8+8+8);
	$this->Cell(30,8,'VDRL:',0,1,'r'); 
	$this->SetXY(36,85+8+8+8+8+8);
	$this->Cell(30,8,ucfirst($result->TPHA),0,1,'C'); 
	$this->SetXY(66,85+8+8+8+8+8);
	$this->Cell(40,8,'Négatif',0,1,'C');  
	$this->SetXY(106,85+8+8+8+8+8);
	$this->Cell(32,8,'***',0,1,'C'); 
	$this->RoundedRect(5, 143, 55, 30, 2, $style = ''); 
	$this->SetXY(5,143);
	$this->Cell(55,8,'DATE: ',0,1,'C'); 
	$this->SetXY(5,143+8);
	$this->Cell(55,8,date('d-m-Y'),0,1,'C'); 
	$this->RoundedRect(85, 143, 55, 30, 2, $style = ''); 
	$this->SetXY(85,143);
	$this->Cell(55,8,'Le Poste De Transfusion Sanguine ',0,1,'C');
	$this->SetFont('Arial','B',8);
	$this->SetFillColor(220);
	$this->SetXY(5,176);
	$this->Cell(135,6,'NB: les resultats figurants ci dessus ne doivent etre consideres definitives ',0,0,1,'C');
	$this->SetXY(5,176+6);
	$this->Cell(135,6,'qu\'apres une deuxieme qualification effectuee sur un second prelevement',0,0,1,'C');
	$this->Output();
	}
	} 
	//********************//
	
    
	function entetecarte1($idon,$IDDNR,$TYPECARTE)
    {
	//2ere page
	//face gauche
	$this->mysqlconnect();
	$this->AddPage('p','A5');
	//$this->SetFont('Arial','B',10);//$this->Image('../IMAGES/grife.jpg',15,80,55,22,0);
	$this->RoundedRect(1, 1, 70, 100, 2, $style = '');
	$this->Text(4,10,"GROUPAGE:");
	$this->Text(7,20,"RHESUS:");
	$this->Text(6,30,"Phenotype:");
	$this->Line(1 ,50 ,71 ,50);
	$this->SetFillColor(255,246,143);
	$this->SetXY(3,52);
	$this->Cell(50+15,8,'Nom : ',0,1,1,'r');
	$this->SetXY(3,52+8);
	$this->Cell(50+15,8,'Prénom : ',0,1,1,'r');
	$this->SetXY(3,52+8+8);
	$this->Cell(50+15,8,'Date de naissance : ',0,1,1,'r');
	$this->SetXY(3,52+8+8+8);
	$this->Cell(50+15,8,'Carte établie le: ',0,1,1,'r');
	$this->SetFillColor(255,246,143);
	
	$this->Text(25,90,"le responsable:");
	$this->Text(30,95,"Dr TIBA");
	$filename='../public/images/photos/'.$idon.'.jpg';
	if (file_exists($filename)) 
	{
	$this->Image('../public/images/photos/'.$idon.'.jpg', $x='35', $y='6', $w=35, $h=40, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	} 
	else
	{
	$idpp='lb';
	$this->Image('../public/images/photos/'.$idpp.'.jpg', $x='35', $y='6', $w=35, $h=40, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
	$this->RoundedRect(35, 2, 35, 45, 2, $style = '');
	$query4 = "select * from tdon WHERE  idon = '$idon'";
	$resultat4=mysql_query($query4);
	$row4 = mysql_fetch_array($resultat4);
	$this->SetTextColor(225,0,0);
	$this->SetFont('Arial','B',14);
	$this->Text(13,15,$row4['GROUPAGE']);
	$this->Text(8,25,$row4['RHESUS']);
	$this->SetFont('Arial','B',10);
	$this->Text(8,35,"********");
	$this->SetTextColor(0,0,0);
	$this->Text(15,55+2,$row4['NOMDNR']);
	$this->Text(20,60+5,$row4['PRENOMDNR']);
	$this->Text(38,65+8,$row4['DATENAISSANCE']);
	$this->Text(31,65+8+8,date('d/m/Y'));
	}
    function cartedonneur($idon,$TYPECARTE)
    {
	$this->mysqlconnect();
	$query0 = "select * from tdon WHERE  idon = '$idon'";
	$resultat0=mysql_query($query0);
	$row0 = mysql_fetch_array($resultat0); 
	$IDDNR=$row0['IDDNR'];
	$idon=$row0['idon'];
	//1ere page droite
	$this->entetecarte($IDDNR,$TYPECARTE);
	//1ere page gauche
	$this->RoundedRect(1, 1, 70, 100, 2, $style = '');
	$h=01;
	$this->SetXY(01,$h); 	  
	$this->cell(23,05,"Date",1,0,'C',0);
	$this->SetXY(01+23,$h); 	  
	$this->cell(24,05,"N°don",1,0,'C',0);
	$this->SetXY(01+23+24,$h); 	  
	$this->cell(23,05,"TA",1,0,'C',0);
	$this->SetXY(01,06); // marge sup 13
	$query1 = "select datedon,IDP,ta,IDDNR,idon from tdon WHERE  IDDNR='$IDDNR'  order by  idon asc    LIMIT 15, 30 ";
	$resultat1=mysql_query($query1);
	$totalmbr1=mysql_num_rows($resultat1);
	while($row1=mysql_fetch_object($resultat1))
	  {
	   $this->cell(23,5,$this->dateUS2FR($row1->datedon),1,0,'L',0);//5  =hauteur de la cellule origine =7
	   $this->cell(24,5,$row1->idon,1,0,'C',0);
	   $this->cell(23,5,$row1->ta,1,0,'C',0);
	   $this->SetXY(01,$this->GetY()+5); 
	  }
	for( $compteur = 0 ; $compteur < 19-$totalmbr1 ; $compteur++)
	  {
	   $this->cell(23,5,'',1,0,'L',0);
	   $this->cell(24,5,'',1,0,'C',0);
	   $this->cell(23,5,'',1,0,'C',0);
	   $this->SetXY(01,$this->GetY()+5); 
	  } 
	//2eme page
	//face gauche 
    $this->entetecarte1($idon,$IDDNR,$TYPECARTE);
	//face droite 
	$this->RoundedRect(78, 1, 70, 100, 2, $style = '');
	$h=15.8;
	$this->SetXY(78,$h); 	  
	$this->cell(23,05,"Date",1,0,'C',0);
	$this->SetXY(78+23,$h); 	  
	$this->cell(24,05,"N°don",1,0,'C',0);
	$this->SetXY(78+23+24,$h); 	  
	$this->cell(23,05,"TA",1,0,'C',0);
	$this->SetXY(78,20.8); 
	$query2 = "select datedon,IDP,ta,IDDNR,idon from tdon WHERE  IDDNR='$IDDNR' order by  idon asc LIMIT 0, 15 ";
	$resultat2=mysql_query($query2);
	$totalmbr2=mysql_num_rows($resultat2);
	while($row2=mysql_fetch_object($resultat2))
	  {
	   $this->cell(23,5,$this->dateUS2FR($row2->datedon),1,0,'L',0);
	   $this->cell(24,5,$row2->idon,1,0,'C',0);
	   $this->cell(23,5,$row2->ta,1,0,'C',0);
	   $this->SetXY(78,$this->GetY()+5); 
	  } 
	 for( $compteur = 0 ; $compteur < 16-$totalmbr2 ; $compteur++)
	  {
	   $this->cell(23,5,'',1,0,'L',0);
	   $this->cell(24,5,'',1,0,'C',0);
	   $this->cell(23,5,'',1,0,'C',0);
	   $this->SetXY(78,$this->GetY()+5); 
	  }
	$query3 = "select datedon,IDP,ta,IDDNR,idon from tdon WHERE  IDDNR='$IDDNR' order by idon asc LIMIT 0, 1 ";
	$resultat3=mysql_query($query3);
	$row3 = mysql_fetch_array($resultat3); 
	$datedon=$row3['datedon'];
	$this->Text(82,8,"Date Du Premier Don:");
	$this->Text(120,8,$this->dateUS2FR($datedon));
	$this->Text(82,13,"Nombre De Don Antérieur:");
	$this->Text(128,13,$totalmbr2);
	$this->Output();
	}
    function cartereceveur($idon,$TYPECARTE)
    {
	$this->mysqlconnect();
	$query1 = "select * from tdon WHERE  idon = '$idon'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$IDDNR=$row['IDDNR'];
	//1ere page droite
	$this->entetecarte($IDDNR,$TYPECARTE);
	//1ere page gauche
	$this->RoundedRect(1, 1,70, 100 ,2, $style = '');
	$this->SetFont('Arial','B',8);
	$this->Text(2,13,"Date");
	$this->Line(15,8 ,15 ,101);
	$this->Text(16,13,"NBR°/GR.RH");
	$this->Line(34,8 ,34 ,101);
	$this->Text(38,13,"RAI");
	$this->Line(49,8 ,49 ,101);
	$this->Text(50,13,"OBSERVATION");
	$this->Text(5,6,"Transfusion De Sang Nbr De Flacon Et Groupe");
	$this->Line(1 ,8 ,71 ,8 );
	$this->Line(1 ,16 ,71 ,16 );
	$this->Line(1 ,24 ,71 ,24 );
	$this->Line(1 ,32 ,71 ,32);
	$this->Line(1 ,40 ,71 ,40 );
	$this->Line(1 ,48 ,71 ,48 );
	$this->Line(1 ,56 ,71 ,56 );
	$this->Line(1 ,64 ,71 ,64 );
	$this->Line(1 ,72 ,71 ,72 );
	$this->Line(1 ,80 ,71 ,80 );
	$this->Line(1 ,88 ,71 ,88 );
	//2eme page
	//face gauche
	$this->entetecarte1($idon,$IDDNR,$TYPECARTE);
	//face droite
	$this->RoundedRect(78, 1,70, 100 ,2, $style = '');
	$this->SetFont('Arial','B',8);
	$this->Text(80,5,"1ERE détermination:");
	$this->Text(80,10,date('d/m/Y'));
	$this->Text(80,15,"Laboratoire :");
	$this->Text(80,20,"PTS Ain oussera");
	$this->Text(80,25,"GROUPAGE:"."".$row['GROUPAGE']);
	$this->Text(80,30,"RHESUS:"."".$row['RHESUS']);
	$this->Text(80,35,"Du:------------------------------");
	$this->Text(80,40,"D:-------------------------------");
	$this->Text(80,45,"C:-------------------------------");
	$this->Text(80,50,"E:-------------------------------");
	$this->Text(80,55,"c:-------------------------------");
	$this->Text(80,60,"e:-------------------------------");
	$this->Text(80,65,"K:-------------------------------");
	$this->Line(115,1 ,115 ,68);
	$this->Text(116,5,"2EME détermination:");
	$this->Text(116,10,"-------------------------------");
	$this->Text(116,15,"Laboratoire :");
	$this->Text(116,20,"-------------------------------");
	$this->Text(116,25,"GROUPAGE:-------------");
	$this->Text(116,30,"RHESUS:------------------");
	$this->Text(116,35,"Du:----------------------------");
	$this->Text(116,40,"D:-----------------------------");
	$this->Text(116,45,"C:-----------------------------");
	$this->Text(116,50,"E:-----------------------------");
	$this->Text(116,55,"c:-----------------------------");
	$this->Text(116,60,"e:-----------------------------");
	$this->Text(116,65,"K:-----------------------------");
	$this->Line(78 ,70 ,148 ,70);
	$this->SetFont('Arial','B',9);
	$this->Text(80,75,"les resultats figurant ci dessus ne doivent");
	$this->Text(80,80,"étre considerés comme définitifs qu'aprés");
	$this->Text(80,85,"une deuxième détermination effectuée sur");
	$this->Text(80,90,"un second prélèvement.");
	$this->Output();
	}
	//***********************************************************************//
	
	function fichedonneur($idon) 
	{
	$this->entetepage("FICHE DONNEUR");
	$this->mysqlconnect();
	$query1 = "select * from tdon WHERE  idon = '$idon'";
	$resultat1=mysql_query($query1);
	$row = mysql_fetch_array($resultat1); 
	$IDDNR=$row['IDDNR'];
	$this->RoundedRect($x=5, $y=36, $w=200, $h=30, $r=2, $style = '');
	$this->Text(5,40,"Numero d identification");
	$this->Text(5,50,"Structure de Transfusion Sanguine:");
	$this->Text(5,55,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS").' Wilaya de '.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(150,40,"Groupage ABO:");$this->Text(150,45,"Groupage Rhesus:");
	$this->Text(150,50,"Autres:");
    $this->Text(182,50,"---------");
    $this->Line(5 ,70 ,200 ,70 );
    $this->RoundedRect($x=5, $y=74, $w=200, $h=30, $r=2, $style = '');
    
    $this->Text(5,80,"Nom:");
	$this->Text(84,80,"Prénom:");
	$this->Text(165,80,"Sexe:");
	$this->Text(5,90,"Né(e):le ");
	$this->Text(165,90,"Age:");
	$this->Line(5 ,108 ,200 ,108);
	$this->RoundedRect($x=5, $y=112, $w=200, $h=30, $r=2, $style = '');
	$this->Text(5,110+8,"Wilaya de naissance:");
	$this->Text(84,110+8,"Commune de naissance:");
	$this->Text(5,120+8,"Wilaya de residence:");
	$this->Text(84,120+8,"Commune de residence:");
	$this->Text(5,130+8,"Adresse de residence:");
	$this->Text(165,130+8,"Tél:");
	$this->Text(172,130+8,"");
	$this->Line(5 ,146 ,200 ,146 );
	$this->SetTextColor(225,0,0);
	$this->Text(5,45,$row['IDDNR']);
	$this->Text(5,60,"Date:".date('d/m/Y'));
	$this->Text(182,40,$row['GROUPAGE']);
	$this->Text(182,45,$row['RHESUS']);
	$this->Text(15,80,$row['NOMDNR']);
	$this->Text(100,80,$row['PRENOMDNR']);
	$this->Text(175,80,$row['SEXE']);
	$this->Text(20,90,$row['DATENAISSANCE']);
	$this->Text(175,90,substr(date('Y-m-d'),0,4)-substr($row['DATENAISSANCE'],6,4)." ans");
	$this->Text(42,110+8,$this->nbrtostring("gpts2012","wil","IDWIL",$row['WILAYA'],"WILAYAS"));$this->Text(84+42,110+8,$this->nbrtostring("gpts2012","com","IDCOM",$row['COMMUNE'],"COMMUNE"));
	$this->Text(42,120+8,$this->nbrtostring("gpts2012","wil","IDWIL",$row['WILAYAR'],"WILAYAS"));$this->Text(84+42,120+8,$this->nbrtostring("gpts2012","com","IDCOM",$row['COMMUNER'],"COMMUNE"));
	$this->Text(43,130+8,$row['ADRESSE']);
	$this->Text(173,130+8,$row['TELEPHONE']);
	$this->SetTextColor(0,0,0);
	$h=150;
	$this->SetXY(05,$h); 	  
	$this->cell(20,05,"Date",1,0,'C',0);
	$this->SetXY(25,$h); 	  
	$this->cell(22,05,"Lieu du don ",1,0,'C',0);
	$this->SetXY(47,$h); 	  
	$this->cell(44,05,"N° d'identification du don",1,0,'C',0);
	$this->SetXY(91,$h); 	  
	$this->cell(20,05,"TA",1,0,'C',0);
	$this->SetXY(111,$h); 	  
	$this->cell(20,05,"Poids",1,0,'C',0);
	$this->SetXY(131,$h); 	  
	$this->cell(30,05,"Volume a preleve",1,0,'C',0);
	$this->SetXY(161,$h); 	  
	$this->cell(44,05,"Observation",1,0,'C',0);
	$this->SetXY(5,155); // marge sup 13
	$query = "select datedon,str,idon,IDP,ta,poids from tdon WHERE  IDDNR = '$IDDNR'  order by  idon   ";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	  {
	   $this->cell(20,5,$this->dateUS2FR($row->datedon) ,1,0,'L',0);//5  =hauteur de la cellule origine =7
	   $this->cell(22,5,$row->str,1,0,'L',0);
	   $this->cell(44,5,$row->idon,1,0,'C',0);
	   $this->cell(20,5,$row->ta,1,0,'C',0);
	   $this->cell(20,5,$row->poids,1,0,'C',0);
	   $this->cell(30,5,'',1,0,'C',0);
	   $this->cell(44,5,'',1,0,'C',0);
	   $this->SetXY(05,$this->GetY()+5); 
	  }
	$this->SetXY(05,$this->GetY()); 	  
	$this->cell(42,5," TOTAL DON",1,0,'C',0);	  
	$this->SetXY(47,$this->GetY());
	$this->cell(158,5,$totalmbr1,1,0,'C',0);	
	$this->SetXY(150,$this->GetY()+15);				 
	$this->cell(40,5,"Signature  médecin:",1,0,'C',0);
	$this->SetXY(150,$this->GetY()+10);				 
	$this->cell(40,5,"Dr ".$this->USER(),1,0,'C',0);
	$this->SetXY(5,$this->GetY()+10);				 
	$this->cell(70,5,"Code Barre D identification Du Donneur",1,0,'C',0);
	// $this->EAN13(5, $this->GetY()+10,$idon, $h=16, $w=.35);
	$this->Code39(5, $this->GetY()+10, $IDDNR, $baseline=0.5, $height=16);
	$this->Output();
	}
	
	
	
   
	
	
	
//***************************************************************************************************************************************************//
    function BSA($w,$h) 
	{
	//Formule Dubois et Dubois² (1916).
	//Surface corporelle (m²) = 0,007184 x Taille(cm)0,725 x Poids(kg)0,425  
	//poids entre 6 et 93 kg taille entre 73 et 184 cm.
	$BSA = 0.007184 * pow($w,0.425)* pow($h,0.725) ." m2" ;
	
	//Formule de Gehan et George (1970)poids entre 4 et 132 kg ;taille entre 50 et 220 cm.
	//Surface corporelle (m²) = 0,0235 x Taille(cm)0,42246 x Poids(kg)0,51456
	//$BSA1 = 0.0235 * pow($w,0.51456)* pow($h,0.42246) ."m2" ;
	
	//pour enfant 
	 //Surface corporelle (m²) = [4 x Poids(kg) +7] / [Poids(kg) + 90]
	//$BSA2 = (4*$w+7)/($w+90) ."m2" ;
	
	
	//poid ideal Formule de Lorentz
	//Femme = Taille(cm) - 100 - [Taille(cm) - 150] / 2   Homme = Taille(cm) - 100 - [Taille(cm) - 150] / 4
	//âge de supérieur à 18 ans ;taille entre 140 et 220 cm (55 à 87 inch)
	//Poids idéal = 50 + [Taille(cm) - 150]/4 + [Age(an) - 20]/4
	
	//Calcul du poids maigre (LBM)
	//Poids maigre (homme) en kg = 1.10 x Poids(kg) - 128 [Poids(kg)2/Taille(cm)2]
	//Poids maigre (femme) en kg  = 1.07 x Poids(kg) - 148 [Poids(kg)2/Taille(cm)2]
	//âge entre 18 et 80 ans ; poids entre 35 et 130 kg ;aille entre 140 et 185 cm.
	
	return $BSA;
	}
    
	function PI($h) 
	{
	//poid ideal Formule de Lorentz
	//Femme = Taille(cm) - 100 - [Taille(cm) - 150] / 2   
	//  Homme = Taille(cm) - 100 - [Taille(cm) - 150] / 4
	//âge de supérieur à 18 ans ;taille entre 140 et 220 cm (55 à 87 inch)
	//Poids idéal = 50 + [Taille(cm) - 150]/4 + [Age(an) - 20]/4
	$PI =$h-100-($h-150)/4 ."kg" ;
	return $PI;
	}



   

  
	function insertiondnr ($NOMDNR,$PRENOMDNR,$SEXE,$DATENAISSANCE,$WILAYA,$COMMUNE,$WILAYAR,$COMMUNER,$ADRESSE,$TELEPHONE,$date,$STR,$TDNR,$TDON,$POIDS,$TA,$IDP,$HDP,$IDDNR,$AGE) 
    {
	$IND='IND';
	$dateus=$this->dateFR2US($date); 
	$db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass=""; 
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ; 
    $DP= date('Y/m/d',strtotime('+90 days'));  //DATE PROCHAIN DON 
    $sql = "INSERT INTO TDON( iddnr,nomdnr,prenomdnr,sexe,datenaissance,age,wilaya,commune,wilayar,communer,adresse,telephone,datedon,str,tdnr,tdon,poids,ta,DP,IDP,IND,HDP,SRS,WRS,CRS,USER ) VALUES ('".$IDDNR."','".$NOMDNR."','".$PRENOMDNR."','".$SEXE."','".$DATENAISSANCE."','".$AGE."','".$WILAYA."','".$COMMUNE."','".$WILAYAR."','".$COMMUNER."','".$ADRESSE."','".$TELEPHONE."','".$dateus."','".$STR."','".$TDNR."','".$TDON."','".$POIDS."','".$TA."','".$DP."','".$IDP."','".$IND."','".$HDP."','".$this->STRUCTURE()."','".$this->WILAYA()."','".$this->REGION()."','".$this->USER()."')";
    $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()); 
    }
	
	
	
	function cherchednr ($IDDNR) 
    {
	$db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass=""; 
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($db_name,$cnx) ;
	//requette de recherche si un idrec existe 
	$sql = "SELECT IDDNR FROM TDON WHERE  IDDNR = '".$IDDNR."' "	;
	$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
	$result = mysql_fetch_object($requete) ;
	if(is_object($result))
	{
	$IDDNRmg =" NB:Le donneur figure dans notre base de donnees *****" ;
	}  
	else
	{
	$IDDNRmg ="NB:Le donneur ne figure pas dans notre base de donnees " ; 
	}
	mysql_free_result($requete);
	return $IDDNRmg;
    }
	//entete
    
	
	function enteteques()
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	//$this->Image('../IMAGES/logoao.gif',90,26,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(80,10,'WILAYA DE :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->Text(70,25,"- QUESTIONNAIRE -");
	$this->SetFont('Arial','B',10);
    }
	function entete()
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	//$this->Image('../IMAGES/logoao.gif',90,26,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(80,10,'WILAYA DE :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->Text(55,25,"FICHE DE PRELEVEMENT ");
	$this->SetFont('Arial','B',10);
	$this->Text(5,40,"Numero d identification");
    }
	function entete1()
    {
	$this->SetTextColor(0);
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->Image('../IMAGES/logoao.gif',90,26,15,15,0);
	$this->Text(70,5,'AGENCE REGIONALE DE :'.$this->nbrtostring("gpts2012","ars","IDARS",$this->REGION(),"WILAYAS"));
	$this->Text(80,10,'WILAYA DE :'.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(46,15,'STRUCTURE DE TRANSFUSION SANGUINE :'.$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	$this->SetFont('Arial','B',20);
	$this->Text(65,25,"FICHE DONNEUR ");
	$this->SetFont('Arial','B',10);
	$this->Text(5,40,"Numero d identification");
	$this->Text(5,50,"Structure de Transfusion Sanguine:");
    $this->Text(5,55,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS").' Wilaya de '.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Text(150,40,"Groupage ABO:");$this->Text(150,45,"Groupage Rhesus:");
	$this->Text(150,50,"Autres:");
    $this->Text(182,50,"---------");
    $this->Line(5 ,70 ,200 ,70 );
    $this->Text(5,80,"Nom:");
	$this->Text(84,80,"Prénom:");
	$this->Text(165,80,"Sexe:");
	$this->Text(5,90,"Né(e):le ");
	$this->Text(165,90,"Age:");
	$this->Line(5 ,100 ,200 ,100 );
	$this->Text(5,110,"Wilaya de naissance:");
	$this->Text(84,110,"Commune de naissance:");
	$this->Text(5,120,"Wilaya de residence:");
	$this->Text(84,120,"Commune de residence:");
	$this->Text(5,130,"Adresse de residence:");
	$this->Text(165,130,"Tél:");
	$this->Text(172,130,"");
	$this->Line(5 ,140 ,200 ,140 );
	$this->SetTextColor(225,0,0);
    }
	
	function entetecpn()
    {
	$this->AddPage('p','A4');
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('Arial','B',10);
	$this->SetTextColor(225,0,0);
	$this->Text(50,68,'');//$this->USER()

	// $this->Text(35,68+16,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS"));
	// $this->Text(35,68+24,"wilaya de  ".$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->SetTextColor(0,0,0);
	
    }
	

	
	
    function corps($POIDS,$IDP,$TYPEPOCHE)
    {
	$this->SetFont('Arial','B',10);
	$this->Text(55,40,"Date:");
	$this->Text(118,40,"Structure");
	$this->SetXY(158,30);
	$this->Cell(43,14,'Coller etiquette du don',1,1,'C');
	$this->SetXY(158,30+15);
	$this->Cell(43,14,'NDP'.$IDP,1,1,'C');
	$this->Text(5,65,"Structure de Transfusion Sanguine:");
	$this->Text(70,65,$this->nbrtostring("gpts2012","cts","IDCTS",$this->STRUCTURE(),"CTS").'  Wilaya de '.$this->nbrtostring("gpts2012","wrs","IDWIL",$this->WILAYA(),"WILAYAS"));
	$this->Line(5 ,70 ,200 ,70 );
	$this->Text(5,80,"Nom:");
	$this->Text(84,80,"Prenom:");
	$this->Text(170,80,"Sexe:");
	$this->Text(5,90,"Ne(e):le ");
	$this->Text(170,90,"Age:");
	$this->Line(5 ,100 ,200 ,100 );
	$this->Text(5,110,"Wilaya de naissance:");
	$this->Text(84,110,"Commune de naissance:");
	$this->Text(5,120,"Wilaya de residence:");
	$this->Text(84,120,"Commune de residence:");
	$this->Text(5,130,"Adresse de residence:");
	$this->Text(160,130,"Tel:");
	$this->Line(5 ,140 ,200 ,140 );
	//**************************************PARTIE A REMPLIR PAR LE MEDECIN ******************************************//
	$this->Text(5,150,"Partie a remplir  Par le Medecin:");
	$this->Text(5,160,"Type de donneur:");
	$this->Text(5,170,"Poids:");
	$this->Text(28,170,"Kg");
	$this->Text(140,170,"Autres examens: RAS");
	$this->Text(5,180,"TA:");
	$this->Text(30,180,"mmhg");
	$this->Text(140,180,"Type de poche : ".$TYPEPOCHE);
	$this->Text(5,190,"Type de don:");
	$this->Text(140,190,"Volume maximum a prelever:");
	$this->Text(191,190,"500 cc");
	$this->Text(5,200,"Volume a prelever:");
	$this->Text(40,200,$POIDS*8);
	$this->Text(48,200,"cc");
	$this->Text(5,210,"Heure de prelevement:");
	$this->SetXY(150,200);				 
    $this->cell(40,5,"Signature  médecin:",1,0,'C',0);
    $this->SetXY(150,210);				 
    $this->cell(40,5,"DR : ".$this->USER() ,1,0,'C',0);
	$this->Line(5 ,230 ,200 ,230 );
	//***************************************partie a remplire PAR ide***************************************************//
	$this->Text(5,240,"Partie a remplire par IDE:");
	$this->Text(5,250,"Volume preleve:");
	$this->Text(5,260,"Temps de prelevement:");
	$this->Text(5,270,"Commentaires-Incidents:");
	$this->Text(140,270,"Signature IDE:");
	//***************************************FICHE DONNEUR 2EME PAGE ********************************************//
	$this->SetFont('Arial','B',13);
    $this->SetTextColor(225,0,0);
    }
// ***************************************************barre code******************************************
//ne pas modifier
	function EAN13($x, $y, $barcode, $h=16, $w=.35)
	{
		$this->Barcode($x,$y,$barcode,$h,$w,13);
	}

	function UPC_A($x, $y, $barcode, $h=16, $w=.35)
	{
		$this->Barcode($x,$y,$barcode,$h,$w,12);
	}

	function GetCheckDigit($barcode)
	{
		//Calcule le chiffre de contrôle
		$sum=0;
		for($i=1;$i<=11;$i+=2)
			$sum+=3*$barcode[$i];
		for($i=0;$i<=10;$i+=2)
			$sum+=$barcode[$i];
		$r=$sum%10;
		if($r>0)
			$r=10-$r;
		return $r;
	}

	function TestCheckDigit($barcode)
	{
		//Vérifie le chiffre de contrôle
		$sum=0;
		for($i=1;$i<=11;$i+=2)
			$sum+=3*$barcode[$i];
		for($i=0;$i<=10;$i+=2)
			$sum+=$barcode[$i];
		return ($sum+$barcode[12])%10==0;
	}

	function Barcode($x, $y, $barcode, $h, $w, $len)
	{
		//Ajoute des 0 si nécessaire
		$barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
		if($len==12)
			$barcode='0'.$barcode;
		//Ajoute ou teste le chiffre de contrôle
		if(strlen($barcode)==12)
			$barcode.=$this->GetCheckDigit($barcode);
		elseif(!$this->TestCheckDigit($barcode))
			$this->Error('Incorrect check digit');
		//Convertit les chiffres en barres
		$codes=array(
			'A'=>array(
				'0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
				'5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
			'B'=>array(
				'0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
				'5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
			'C'=>array(
				'0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
				'5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
			);
		$parities=array(
			'0'=>array('A','A','A','A','A','A'),
			'1'=>array('A','A','B','A','B','B'),
			'2'=>array('A','A','B','B','A','B'),
			'3'=>array('A','A','B','B','B','A'),
			'4'=>array('A','B','A','A','B','B'),
			'5'=>array('A','B','B','A','A','B'),
			'6'=>array('A','B','B','B','A','A'),
			'7'=>array('A','B','A','B','A','B'),
			'8'=>array('A','B','A','B','B','A'),
			'9'=>array('A','B','B','A','B','A')
			);
		$code='101';
		$p=$parities[$barcode[0]];
		for($i=1;$i<=6;$i++)
			$code.=$codes[$p[$i-1]][$barcode[$i]];
		$code.='01010';
		for($i=7;$i<=12;$i++)
			$code.=$codes['C'][$barcode[$i]];
		$code.='101';
		//Dessine les barres
		for($i=0;$i<strlen($code);$i++)
		{
			if($code[$i]=='1')
				$this->Rect($x+$i*$w,$y,$w,$h,'F');
		}
		//Imprime le texte sous le code-barres
		//$this->SetFont('aefurat','', 12);
		$this->SetFont('Arial','',12);
		$this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));
	}
// ***************************************************barre code******************************************
   