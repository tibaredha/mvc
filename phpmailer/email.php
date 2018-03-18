<?php
//marche tres  bien  http://www.learn2crack.com/2014/03/sending-mail-phpmailer.html
//necessite activation  extesion php_sockets  and php open_ssl 
$per-> mysqlconnect();
$id  = $_GET["idp"] ;
$sql = "SELECT * FROM grh where idp = ".$id;
$requete = mysql_query( $sql ) ; 
if( $result = mysql_fetch_object( $requete )  )//and $Sexe =="2"
{
$per ->h(2,480,180,'Envoyer un E-mail A');
$per -> sautligne (2);
//$per -> photos(1000,250);
$per ->f0('index.php?uc=EMAIL1','post');
$per ->submit(670,490+30,'FICHE RH-SANTE-GOV');
// $per ->label(100,250,'Structure');               $per ->combov(260,250,'STR',array("FIXE", "MOBILE"));// $per ->datetime (670,250,'DATE');
// $per ->label(500,250,'Date de l\'accident ');    $per ->txt(670,250,'DATE',6,date('d/m/Y'));$per ->label(755,250,'heure don');$per ->txt(832,250,'HDA',3,date("H:i"));
$per ->label(100,280,'*Nom');                       $per ->txt(260,280,'NOM',30,$result->Nomlatin);
$per ->label(500,280,'*Prénom');                    $per ->txt(670,280,'PRENOM',30,$result->Prenom_Latin);
$per ->label(100,310,'Grade');                      $per ->txt(260,310,'GRADE',30,$result->rnvgradear); 
$per ->label(500,310,'*Né(e) Le (jj/mm/aaaa)');     $per ->txt(670,310,'DATENAISSANCE',30,$result->Date_Naissance);
                        
$per ->label(100,370,'Sujet');                      $per ->txt(260,370,'sujet',30,'AS DE');
$per ->label(500,370,'message');                    $per ->txt(670,370,'Body',30,'XYZ');
$per ->hide(260,340,'idp',30,$id);
$per ->f1();
}
// $per ->label(80,535,'(*)champ obligatoire'); 
$per -> sautligne (25);


?>


