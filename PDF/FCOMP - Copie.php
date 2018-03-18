<?php
$t=$_GET['DATEDON'];
$id=$_GET['id'];
require('DNR.php');
$pdf = new DNR( 'P', 'mm', 'A4' );
$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetTitle('compagne de don ');
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$pdf->AliasNbPages();//prise encharge du nbr de page 


$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportName = 'Collecte du '.$t;
$reportNameYPos = 50;
$logoFile = "../public/IMAGES/photos/logoao.gif";
$logoXPos = 50;
$logoYPos = 108;
$logoWidth = 110;
$columnLabels = array( "Q1", "Q2", "Q3", "Q4" );
$rowLabels = array( "SupaWidget", "WonderWidget", "MegaWidget", "HyperWidget" );
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartXLabel = "Product";
$chartYLabel = "2009 Sales";
$chartYStep = 20000;

$chartColours = array(
                  array( 255, 100, 100 ),
                  array( 100, 255, 100 ),
                  array( 100, 100, 255 ),
                  array( 255, 255, 100 ),
                );

$data = array(
          array( 9940, 10100, 9490, 11730 ),
          array( 19310, 21140, 20560, 22590 ),
          array( 25110, 26260, 25210, 28370 ),
          array( 27650, 24550, 30040, 31980 ),
        );

$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
// $pdf->AddPage();


// $pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );

// $pdf->SetFont( 'Arial', 'B', 24 );
// $pdf->Ln( $reportNameYPos );
// $pdf->Cell( 0, 15, html_entity_decode(utf8_decode($reportName)), 0, 0, 'C' );
// $pdf->AddPage();
// $pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
// $pdf->SetFont( 'Arial', '', 17 );
// $pdf->Cell( 0, 15, html_entity_decode(utf8_decode($reportName)), 0, 0, 'C' );
// $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
// $pdf->SetFont( 'Arial', '', 20 );
// $pdf->Write( 19, "2009 Was A Good Year" );
// $pdf->Ln( 16 );
// $pdf->SetFont( 'Arial', '', 12 );
// $Firstname = "En 2006 à travers le territoire national algérien, 334 628 dons de sang total ont été collectés dans les différentes structures de transfusion que compte le pays soit 12 260 dons de plus qu'en 2005 (augmentation significative de 3.8% par rapport à l'année précédente p 10-3).";
// $pdf->Write( 6,html_entity_decode(utf8_decode($Firstname)));
// $pdf->Ln( 12 );
// $pdf->Write( 6, html_entity_decode(utf8_decode($Firstname)) );




/**
  Create the table
**/

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 15 );

// "PRODUCT" cell
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );
$pdf->Cell( 46, 12, " PRODUCT", 1, 0, 'L', true );

// Remaining header cells
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

for ( $i=0; $i<count($columnLabels); $i++ ) {
  $pdf->Cell( 36, 12, $columnLabels[$i], 1, 0, 'C', true );
}

$pdf->Ln( 12 );

// Create the table data rows

$fill = false;
$row = 0;

// foreach ( $data as $dataRow ) {

 // Create the left header cell
  // $pdf->SetFont( 'Arial', 'B', 15 );
  // $pdf->SetTextColor( $tableHeaderLeftTextColour[0], $tableHeaderLeftTextColour[1], $tableHeaderLeftTextColour[2] );
  // $pdf->SetFillColor( $tableHeaderLeftFillColour[0], $tableHeaderLeftFillColour[1], $tableHeaderLeftFillColour[2] );
  // $pdf->Cell( 46, 12, " " . $rowLabels[$row], 1, 0, 'L', $fill );

  //Create the data cells
  // $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
  // $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
  // $pdf->SetFont( 'Arial', '', 15 );

  // for ( $i=0; $i<count($columnLabels); $i++ ) {
    // $pdf->Cell( 36, 12, ( '$' . number_format( $dataRow[$i] ) ), 1, 0, 'C', $fill );
  // }

  // $row++;
  // $fill = !$fill;
  // $pdf->Ln( 12 );
// }


/***
  Create the chart
***/

// Compute the X scale
//$xScale = count($rowLabels) / ( $chartWidth - 40 );

// Compute the Y scale

// $maxTotal = 0;

// foreach ( $data as $dataRow ) {
  // $totalSales = 0;
  // foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;
  // $maxTotal = ( $totalSales > $maxTotal ) ? $totalSales : $maxTotal;
// }

// $yScale = $maxTotal / $chartHeight;

// Compute the bar width
// $barWidth = ( 1 / $xScale ) / 1.5;

// Add the axes:

// $pdf->SetFont( 'Arial', '', 10 );

// X axis
// $pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + $chartWidth, $chartYPos );

// for ( $i=0; $i < count( $rowLabels ); $i++ ) {
  // $pdf->SetXY( $chartXPos + 40 +  $i / $xScale, $chartYPos );
  // $pdf->Cell( $barWidth, 10, $rowLabels[$i], 0, 0, 'C' );
// }

// Y axis
// $pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + 30, $chartYPos - $chartHeight - 8 );

// for ( $i=0; $i <= $maxTotal; $i += $chartYStep ) {
  // $pdf->SetXY( $chartXPos + 7, $chartYPos - 5 - $i / $yScale );
  // $pdf->Cell( 20, 10, '$' . number_format( $i ), 0, 0, 'R' );
  // $pdf->Line( $chartXPos + 28, $chartYPos - $i / $yScale, $chartXPos + 30, $chartYPos - $i / $yScale );
// }

// Add the axis labels
// $pdf->SetFont( 'Arial', 'B', 12 );
// $pdf->SetXY( $chartWidth / 2 + 20, $chartYPos + 8 );
// $pdf->Cell( 30, 10, $chartXLabel, 0, 0, 'C' );
// $pdf->SetXY( $chartXPos + 7, $chartYPos - $chartHeight - 12 );
// $pdf->Cell( 20, 10, $chartYLabel, 0, 0, 'R' );

// Create the bars
// $xPos = $chartXPos + 40;
// $bar = 0;

// foreach ( $data as $dataRow ) {

  //Total up the sales figures for this product
  // $totalSales = 0;
  // foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;

  //Create the bar
  // $colourIndex = $bar % count( $chartColours );
  // $pdf->SetFillColor( $chartColours[$colourIndex][0], $chartColours[$colourIndex][1], $chartColours[$colourIndex][2] );
  // $pdf->Rect( $xPos, $chartYPos - ( $totalSales / $yScale ), $barWidth, $totalSales / $yScale, 'DF' );
  // $xPos += ( 1 / $xScale );
  // $bar++;
// }


/***
  Serve the PDF
***/


// $pdf->AddPage();
// $pdf->addSociete( "Etablissement Public Hospitalier",
                  // "Ainoussera\n" .
                  // "Djelfa\n"
                   // );
// $pdf->fact_dev( "Devis ", "TEMPO" );
// $pdf->temporaire( "Devis temporaire" );
// $pdf->addDate( "03/12/2003");
// $pdf->addClient("CL01");
// $pdf->addPageNumber("1");
// $pdf->addClientAdresse("Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS");
// $pdf->addReglement("Chèque à réception de facture");
// $pdf->addEcheance("03/12/2003");
// $pdf->addNumTVA("FR888777666");
// $pdf->addReference("Devis ... du ....");
// $cols=array( "REFERENCE"    => 23,
             // "DESIGNATION"  => 78,
             // "QUANTITE"     => 22,
             // "P.U. HT"      => 26,
             // "MONTANT H.T." => 30,
             // "TVA"          => 11 );
// $pdf->addCols( $cols);
// $cols=array( "REFERENCE"    => "L",
             // "DESIGNATION"  => "L",
             // "QUANTITE"     => "C",
             // "P.U. HT"      => "R",
             // "MONTANT H.T." => "R",
             // "TVA"          => "C" );
// $pdf->addLineFormat( $cols);
// $pdf->addLineFormat($cols);

// $y    = 109;
// $line = array( "REFERENCE"    => "REF1",
               // "DESIGNATION"  => "Carte Mère MSI 6378\n" .
                                 // "Processeur AMD 1Ghz\n" .
                                 // "128Mo SDRAM, 30 Go Disque, CD-ROM, Floppy, Carte vidéo",
               // "QUANTITE"     => "1",
               // "P.U. HT"      => "600.00",
               // "MONTANT H.T." => "600.00",
               // "TVA"          => "1" );
// $size = $pdf->addLine( $y, $line );
// $y   += $size + 2;

// $line = array( "REFERENCE"    => "REF2",
               // "DESIGNATION"  => "Câble RS232",
               // "QUANTITE"     => "1",
               // "P.U. HT"      => "10.00",
               // "MONTANT H.T." => "60.00",
               // "TVA"          => "1" );
// $size = $pdf->addLine( $y, $line );
// $y   += $size + 2;

// $pdf->addCadreTVAs();
        
// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
// $tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    // array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
// $tab_tva = array( "1"       => 19.6,
                  // "2"       => 5.5);
// $params  = array( "RemiseGlobale" => 1,
                      // "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      // "remise"         => 0,       // {montant de la remise}
                      // "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  // "FraisPort"     => 1,
                      // "portTTC"        => 10,      // montant des frais de ports TTC
                                                   //par defaut la TVA = 19.6 %
                      // "portHT"         => 0,       // montant des frais de ports HT
                      // "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                  // "AccompteExige" => 1,
                      // "accompte"         => 0,     // montant de l'acompte (TTC)
                      // "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                  // "Remarque" => "Avec un acompte, svp..." );

// $pdf->addTVAs( $params, $tab_tva, $tot_prods);
// $pdf->addCadreEurosFrancs();








//repartition geographique 
$pdf->entetepage1('Reartition Geographique Des Dons Par Commune  ');
// $pdf->RoundedRect(5,35,285,160, 2, $style = '');

// $pdf->tblparcommune('Dons') ;////Donneurs
// sig djelfa
// $data = array(
// "A"  => '00-00',
// "B"  => '01-20',
// "C"  => '20-40',
// "D"  => '40-60',
// "E"  => '60-100',
// "1"  => 0,//daira  ainoussera
// "916"  => $pdf->donparcommune(916),//daira  Djelfa
// "916"  => $pdf->donparcommune('17000',916),//daira  Djelfa
// "917"  => $pdf->donparcommune('17000',917),// daira El Idrissia
// "918"  => $pdf->donparcommune('17000',918),//Oum Cheggag
// "919"  => $pdf->donparcommune('17000',919),//El Guedid
// "920"  => $pdf->donparcommune('17000',920),//daira Charef
// "921"  => $pdf->donparcommune('17000',921),//El Hammam
// "922"  => $pdf->donparcommune('17000',922),//Touazi
// "923"  => $pdf->donparcommune('17000',923),//Beni Yacoub
// "924"  => $pdf->donparcommune('17000',924),//daira ainoussera
// "925"  => $pdf->donparcommune('17000',925),//guernini
// "926"  => $pdf->donparcommune('17000',926),//daira sidilaadjel
// "927"  => $pdf->donparcommune('17000',927),//hassifdoul
// "928"  => $pdf->donparcommune('17000',928),//elkhamis
// "929"  => $pdf->donparcommune('17000',929),//daira birine
// "930"  => $pdf->donparcommune('17000',930),//Dra Souary
// "931"  => $pdf->donparcommune('17000',931),//benahar
// "932"  => $pdf->donparcommune('17000',932),//daira hadshari
// "933"  => $pdf->donparcommune('17000',933),//bouiratlahdab
// "934"  => $pdf->donparcommune('17000',934),//ainfka
// "935"  => $pdf->donparcommune('17000',935),//daira hassi bahbah
// "936"  => $pdf->donparcommune('17000',936),//Mouilah
// "937"  => $pdf->donparcommune('17000',937),//El Mesrane
// "938"  => $pdf->donparcommune('17000',938),//Hassi el Mora
// "939"  => $pdf->donparcommune('17000',939),//zaafrane
// "940"  => $pdf->donparcommune('17000',940),//hassi el euche
// "941"  => $pdf->donparcommune('17000',941),//ain maabed
// "942"  => $pdf->donparcommune('17000',942),//daira darchioukh
// "943"  => $pdf->donparcommune('17000',943),//Guendouza
// "944"  => $pdf->donparcommune('17000',944),//El Oguila
// "945"  => $pdf->donparcommune('17000',945),//El Merdja
// "946"  => $pdf->donparcommune('17000',946),//mliliha
// "947"  => $pdf->donparcommune('17000',947),//sidibayzid
// "948"  => $pdf->donparcommune('17000',948),//daira Messad
// "949"  => $pdf->donparcommune('17000',949),//Abdelmadjid
// "950"  => $pdf->donparcommune('17000',950),//Haniet Ouled Salem
// "951"  => $pdf->donparcommune('17000',951),//Guettara
// "952"  => $pdf->donparcommune('17000',952),//Deldoul
// "953"  => $pdf->donparcommune('17000',953),//Sed Rahal
// "954"  => $pdf->donparcommune('17000',954),//Selmana
// "955"  => $pdf->donparcommune('17000',955),//El Gahra
// "956"  => $pdf->donparcommune('17000',956),//Oum Laadham
// "957"  => $pdf->donparcommune('17000',957),//Mouadjebar
// "958"  => $pdf->donparcommune('17000',958),//daira Ain el Ibel
// "959"  => $pdf->donparcommune('17000',959),//Amera
// "960"  => $pdf->donparcommune('17000',960),//N'thila
// "961"  => $pdf->donparcommune('17000',961),//Oued Seddeur
// "962"  => $pdf->donparcommune('17000',962),//Zaccar
// "963"  => $pdf->donparcommune('17000',963),//Douis
// "964"  => $pdf->donparcommune('17000',964),//Ain Chouhada
// "965"  => $pdf->donparcommune('17000',965),//Tadmit
// "966"  => $pdf->donparcommune('17000',966),//El Hiouhi
// "967"  => $pdf->donparcommune('17000',967),//daira Faidh el Botma
// "968"  => $pdf->donparcommune('17000',968) //Amourah
// );
// $pdf->djelfa($data,560,128,3.7); 


//$pdf->entetepage1('Collecte du '.$t);
		$T2F2=array(
					"xt" => 5,
					"yt" => 42,
					"wc" => "",
					"hc" => "",
					"tt" => "I  Repartition des donneurs par type et sexe",
					"tc" => "Sexe",
					"tc1" =>"M",
					"tc3" =>"F",
					"T" =>'1',
					"tl" =>"Type",
					"1MF"  => 'OCCA',"1M"  => $pdf->compagnetype('OCCASIONNEL','M',$t),   "1F"  => $pdf->compagnetype('OCCASIONNEL','F',$t),   
					"2MF"  => 'REGU',"2M"  => $pdf->compagnetype('REGULIER','M',$t),      "2F"  => $pdf->compagnetype('REGULIER','F',$t),   
					"tc5" =>"Total"
					);
		//$pdf->T2F2($T2F2);
		$pie2 = array(
			"x" => 200, 
			"y" => 67, 
			"r" => 17,
			"v1" => $pdf->compagnetype('OCCASIONNEL','M',$t)+$pdf->compagnetype('OCCASIONNEL','F',$t),
			"v2" => $pdf->compagnetype('REGULIER','M',$t)+$pdf->compagnetype('REGULIER','F',$t),
			"t0" => " Donneurs par type  Occa/Regu  ",
			"t1" => "OCCA",
			"t2" => "REGU");
			//$pdf->pie2($pie2);

		$T2F3=array(
					"xt" => 5,
					"yt" => 130,
					"wc" => "",
					"hc" => "",
					"tt" => "I  Repartition des donneurs par indication",
					"tc" => "Sexe",
					"tc1" =>"M",
					"tc3" =>"F",
					"T" =>'1',
					"tl" =>"IND",
					"1MF"  => 'IND',"1M"  => $pdf->compagneind('IND','M',$t),       "1F"  => $pdf->compagneind('IND','F',$t),   
					"2MF"  => 'CIT',"2M"  => $pdf->compagneind('CIDT','M',$t),      "2F"  => $pdf->compagneind('CIDT','F',$t),   
					"3MF"  => 'CID',"3M"  => $pdf->compagneind('CIDD','M',$t),      "3F"  => $pdf->compagneind('CIDD','F',$t),   
					"tc5" =>"Total"
					);
		//$pdf->T2F3($T2F3);

//$pdf->entetepage1('Collecte du '.$t);
	$M1=$pdf->AGESEXE(0,4,$t,'M');  $F1=$pdf->AGESEXE(0,4,$t,'F');
	$M2=$pdf->AGESEXE(5,9,$t,'M');  $F2=$pdf->AGESEXE(5,9,$t,'F');
	$M3=$pdf->AGESEXE(10,14,$t,'M');$F3=$pdf->AGESEXE(10,14,$t,'F');
	$M4=$pdf->AGESEXE(15,19,$t,'M');$F4=$pdf->AGESEXE(15,19,$t,'F');
	$M5=$pdf->AGESEXE(20,24,$t,'M');$F5=$pdf->AGESEXE(20,24,$t,'F');
	$M6=$pdf->AGESEXE(25,29,$t,'M');$F6=$pdf->AGESEXE(25,29,$t,'F');
	$M7=$pdf->AGESEXE(30,34,$t,'M');$F7=$pdf->AGESEXE(30,34,$t,'F');
	$M8=$pdf->AGESEXE(35,39,$t,'M');$F8=$pdf->AGESEXE(35,39,$t,'F');
	$M9=$pdf->AGESEXE(40,44,$t,'M');$F9=$pdf->AGESEXE(40,44,$t,'F');
	$M10=$pdf->AGESEXE(45,49,$t,'M');$F10=$pdf->AGESEXE(45,49,$t,'F');
	$M11=$pdf->AGESEXE(50,54,$t,'M');$F11=$pdf->AGESEXE(50,54,$t,'F');
	$M12=$pdf->AGESEXE(55,59,$t,'M');$F12=$pdf->AGESEXE(55,59,$t,'F');
	$M13=$pdf->AGESEXE(60,64,$t,'M');$F13=$pdf->AGESEXE(60,64,$t,'F');
	$M14=$pdf->AGESEXE(65,69,$t,'M');$F14=$pdf->AGESEXE(65,69,$t,'F');
	$M15=$pdf->AGESEXE(70,74,$t,'M');$F15=$pdf->AGESEXE(70,74,$t,'F');
	$M16=$pdf->AGESEXE(75,79,$t,'M');$F16=$pdf->AGESEXE(75,79,$t,'F');
	$M17=$pdf->AGESEXE(80,84,$t,'M');$F17=$pdf->AGESEXE(80,84,$t,'F');
	$M18=$pdf->AGESEXE(85,89,$t,'M');$F18=$pdf->AGESEXE(85,89,$t,'F');
	$M19=$pdf->AGESEXE(90,94,$t,'M');$F19=$pdf->AGESEXE(90,94,$t,'F');
	$M20=$pdf->AGESEXE(95,99,$t,'M');$F20=$pdf->AGESEXE(95,99,$t,'F');

	$pyramide= array(
	"1M"  => $M1,   "1F"  => $F1,
	"2M"  => $M2,   "2F"  => $F2,
	"3M"  => $M3,   "3F"  => $F3,
	"4M"  => $M4,   "4F"  => $F4,
	"5M"  => $M5,   "5F"  => $F5,
	"6M"  => $M6,   "6F"  => $F6,
	"7M"  => $M7,   "7F"  => $F7,
	"8M"  => $M8,   "8F"  => $F8,
	"9M"  => $M9,   "9F"  => $F9,
	"10M" => $M10,  "10F" => $F10,
	"11M" => $M11,  "11F" => $F11,
	"12M" => $M12,  "12F" => $F12,
	"13M" => $M13,  "13F" => $F13,
	"14M" => $M14,  "14F" => $F14,
	"15M" => $M15,  "15F" => $F15,
	"16M" => $M16,  "16F" => $F16,
	"17M" => $M17,  "17F" => $F17,
	"18M" => $M18,  "18F" => $F18,
	"19M" => $M19,  "19F" => $F19,
	"20M" => $M20,  "20F" => $F20
	);
	//$pdf->pyramide(200,150,utf8_decode('1 - Pyramide des âges de la population des donneurs'),$pyramide);
	$T2F20=array(
			"xt" => 5,
			"yt" => 42,
			"wc" => "",
			"hc" => "",
			"tt" => "I  Repartition des dons par tranche d'age ( 05 ans ) et sexe",
			"tc" => "Sexe",
			"tc1" =>"M",
			"tc3" =>"F",
			"tc5" =>"Total",
			"1M"  => $M1,   "1F"  => $F1,
			"2M"  => $M2,   "2F"  => $F2,
			"3M"  => $M3,   "3F"  => $F3,
			"4M"  => $M4,   "4F"  => $F4,
			"5M"  => $M5,   "5F"  => $F5,
			"6M"  => $M6,   "6F"  => $F6,
			"7M"  => $M7,   "7F"  => $F7,
			"8M"  => $M8,   "8F"  => $F8,
			"9M"  => $M9,   "9F"  => $F9,
			"10M" => $M10,  "10F" => $F10,
			"11M" => $M11,  "11F" => $F11,
			"12M" => $M12,  "12F" => $F12,
			"13M" => $M13,  "13F" => $F13,
			"14M" => $M14,  "14F" => $F14,
			"15M" => $M15,  "15F" => $F15,
			"16M" => $M16,  "16F" => $F16,
			"17M" => $M17,  "17F" => $F17,
			"18M" => $M18,  "18F" => $F18,
			"19M" => $M19,  "19F" => $F19,
			"20M" => $M20,  "20F" => $F20,
			"T" =>'1',
			"tl" =>"Age",
			"1MF"  => '00-04',  
			"2MF"  => '05-09',   
			"3MF"  => '10-14',  
			"4MF"  => '15-19',   
			"5MF"  => '20-24',  
			"6MF"  => '25-29',   
			"7MF"  => '30-34',  
			"8MF"  => '35-39',   
			"9MF"  => '40-44',   
			"10MF" => '45-49',  
			"11MF" => '50-54',  
			"12MF" => '55-59', 
			"13MF" => '60-64',  
			"14MF" => '65-69', 
			"15MF" => '70-74',  
			"16MF" => '75-79',  
			"17MF" => '80-84',  
			"18MF" => '85-89', 
			"19MF" => '90-94', 
			"20MF" => '95-99'  
			);
	//$pdf->T2F20($T2F20);
	//$pdf->T2F20STAT($t,'AGEDNR','AGE');

//$pdf->entetepage1('Collecte du '.$t);
	$ta1M=$pdf->AGESEXE(18,19,$t,'M');$ta1F=$pdf->AGESEXE(18,19,$t,'F');
	$ta2M=$pdf->AGESEXE(20,29,$t,'M');$ta2F=$pdf->AGESEXE(20,29,$t,'F');
	$ta3M=$pdf->AGESEXE(30,39,$t,'M');$ta3F=$pdf->AGESEXE(30,39,$t,'F');
	$ta4M=$pdf->AGESEXE(40,49,$t,'M');$ta4F=$pdf->AGESEXE(40,49,$t,'F');
	$ta5M=$pdf->AGESEXE(50,59,$t,'M');$ta5F=$pdf->AGESEXE(50,59,$t,'F');
	$ta6M=$pdf->AGESEXE(60,69,$t,'M');$ta6F=$pdf->AGESEXE(60,69,$t,'F');
	$ta7M=$pdf->AGESEXE(70,100,$t,'M');$ta7F=$pdf->AGESEXE(70,100,$t,'F');
	
	// $table['1'] = array('M' => $ta1M, 'F' => $ta1F);
	// $table['2'] = array('M' => $ta2M, 'F' => $ta2F);
	// $table['3'] = array('M' => $ta3M, 'F' => $ta3F);
	// $table['4'] = array('M' => $ta4M, 'F' => $ta4F);
	// $table['5'] = array('M' => $ta5M, 'F' => $ta5F);
	// $table['6'] = array('M' => $ta6M, 'F' => $ta6F);
	// $table['7'] = array('M' => $ta7M, 'F' => $ta7F);
	// $result = $pdf->chiTest($table);
	// $probability = $pdf->chiDist($result['chi'], $result['df']);
	// $pdf->SetXY(120,40);$pdf->cell(20,5,'DLL',1,0,'L',1,0);$pdf->cell(20,5,round($result['df'],6),1,0,'L',1,0);	
	// $pdf->SetXY(120,45);$pdf->cell(20,5,'X2',1,0,'L',1,0);$pdf->cell(20,5,round($result['chi'],6),1,0,'L',1,0);	
	// $pdf->SetXY(120,50);$pdf->cell(20,5,'Pr',1,0,'L',1,0);$pdf->cell(20,5,round($probability,6),1,0,'L',1,0);	
	
	$T2F7=array(
			"xt" => 5,
			"yt" => 42,
			"wc" => "",
			"hc" => "",
			"tt" => "II  Repartition des dons par tranche d'age ( 10 ans ) et sexe",
			"tc" => "Sexe",
			"tc1" =>"M",
			"tc3" =>"F",
			"tc5" =>"Total",
			"l1c1" =>$ta1M,
			"l1c3" =>$ta1F,
			"l1c5" =>$ta1M+$ta1F,
			"l2c1" =>$ta2M,
			"l2c3" =>$ta2F,
			"l2c5" =>$ta2M+$ta2F,
			"l3c1" =>$ta3M,
			"l3c3" =>$ta3F,
			"l3c5" =>$ta3M+$ta3F,
			"l4c1" =>$ta4M,
			"l4c3" =>$ta4F,
			"l4c5" =>$ta4M+$ta4F,
			"l5c1" =>$ta5M,
			"l5c3" =>$ta5F,
			"l5c5" =>$ta5M+$ta5F,
			"l6c1" =>$ta6M,
			"l6c3" =>$ta6F,
			"l6c5" =>$ta6M+$ta6F,
			"l7c1" =>$ta7M,
			"l7c3" =>$ta7F,
			"l7c5" =>$ta7M+$ta7F,
			"l8c1" =>$ta1M+$ta2M+$ta3M+$ta4M+$ta5M+$ta6M+$ta7M,
			"l8c3" =>$ta1F+$ta2F+$ta3F+$ta4F+$ta5F+$ta6F+$ta7F,
			"l8c5" =>$ta1M+$ta2M+$ta3M+$ta4M+$ta5M+$ta6M+$ta7M+$ta1F+$ta2F+$ta3F+$ta4F+$ta5F+$ta6F+$ta7F,
			"tl" =>"Age",
			"tl1" =>"18-19",
			"tl2" =>"20-29",
			"tl3" =>"30-39",
			"tl4" =>"40-49",
			"tl5" =>"50-59",
			"tl6" =>"60-69",
			"tl7" =>"70-79",
			"tl8" =>"Total"
			);
	//$pdf-> T2F7($T2F7);
	//$pdf->bar(200,150,$ta1M+$ta1F,$ta2M+$ta2F,$ta3M+$ta3F,$ta4M+$ta4F,$ta5M+$ta5F,$ta6M+$ta6F,$ta7M+$ta7F,utf8_decode('II - Dons par tranche d\'age ( 10 ans )  en année'));


//$pdf->entetepage1('Collecte du '.$t);
	$M1=$pdf->POIDSSEXE(0,4,$t,'M');  $F1=$pdf->POIDSSEXE(0,4,$t,'F');
	$M2=$pdf->POIDSSEXE(5,9,$t,'M');  $F2=$pdf->POIDSSEXE(5,9,$t,'F');
	$M3=$pdf->POIDSSEXE(10,14,$t,'M');$F3=$pdf->POIDSSEXE(10,14,$t,'F');
	$M4=$pdf->POIDSSEXE(15,19,$t,'M');$F4=$pdf->POIDSSEXE(15,19,$t,'F');
	$M5=$pdf->POIDSSEXE(20,24,$t,'M');$F5=$pdf->POIDSSEXE(20,24,$t,'F');
	$M6=$pdf->POIDSSEXE(25,29,$t,'M');$F6=$pdf->POIDSSEXE(25,29,$t,'F');
	$M7=$pdf->POIDSSEXE(30,34,$t,'M');$F7=$pdf->POIDSSEXE(30,34,$t,'F');
	$M8=$pdf->POIDSSEXE(35,39,$t,'M');$F8=$pdf->POIDSSEXE(35,39,$t,'F');
	$M9=$pdf->POIDSSEXE(40,44,$t,'M');$F9=$pdf->POIDSSEXE(40,44,$t,'F');
	$M10=$pdf->POIDSSEXE(45,49,$t,'M');$F10=$pdf->POIDSSEXE(45,49,$t,'F');
	$M11=$pdf->POIDSSEXE(50,54,$t,'M');$F11=$pdf->POIDSSEXE(50,54,$t,'F');
	$M12=$pdf->POIDSSEXE(55,59,$t,'M');$F12=$pdf->POIDSSEXE(55,59,$t,'F');
	$M13=$pdf->POIDSSEXE(60,64,$t,'M');$F13=$pdf->POIDSSEXE(60,64,$t,'F');
	$M14=$pdf->POIDSSEXE(65,69,$t,'M');$F14=$pdf->POIDSSEXE(65,69,$t,'F');
	$M15=$pdf->POIDSSEXE(70,74,$t,'M');$F15=$pdf->POIDSSEXE(70,74,$t,'F');
	$M16=$pdf->POIDSSEXE(75,79,$t,'M');$F16=$pdf->POIDSSEXE(75,79,$t,'F');
	$M17=$pdf->POIDSSEXE(80,84,$t,'M');$F17=$pdf->POIDSSEXE(80,84,$t,'F');
	$M18=$pdf->POIDSSEXE(85,89,$t,'M');$F18=$pdf->POIDSSEXE(85,89,$t,'F');
	$M19=$pdf->POIDSSEXE(90,94,$t,'M');$F19=$pdf->POIDSSEXE(90,94,$t,'F');
	$M20=$pdf->POIDSSEXE(95,150,$t,'M');$F20=$pdf->POIDSSEXE(95,150,$t,'F');

	$pyramide= array(
	"1M"  => $M1,   "1F"  => $F1,
	"2M"  => $M2,   "2F"  => $F2,
	"3M"  => $M3,   "3F"  => $F3,
	"4M"  => $M4,   "4F"  => $F4,
	"5M"  => $M5,   "5F"  => $F5,
	"6M"  => $M6,   "6F"  => $F6,
	"7M"  => $M7,   "7F"  => $F7,
	"8M"  => $M8,   "8F"  => $F8,
	"9M"  => $M9,   "9F"  => $F9,
	"10M" => $M10,  "10F" => $F10,
	"11M" => $M11,  "11F" => $F11,
	"12M" => $M12,  "12F" => $F12,
	"13M" => $M13,  "13F" => $F13,
	"14M" => $M14,  "14F" => $F14,
	"15M" => $M15,  "15F" => $F15,
	"16M" => $M16,  "16F" => $F16,
	"17M" => $M17,  "17F" => $F17,
	"18M" => $M18,  "18F" => $F18,
	"19M" => $M19,  "19F" => $F19,
	"20M" => $M20,  "20F" => $F20
	);
	//$pdf->pyramide(200,150,utf8_decode('1 - Pyramide des poids de la population des donneurs'),$pyramide);
	$T2F20=array(
			"xt" => 5,
			"yt" => 42,
			"wc" => "",
			"hc" => "",
			"tt" => "I  Repartition des dons par tranche de poids ( 05 kg ) et sexe",
			"tc" => "Sexe",
			"tc1" =>"M",
			"tc3" =>"F",
			"tc5" =>"Total",
			"1M"  => $M1,   "1F"  => $F1,
			"2M"  => $M2,   "2F"  => $F2,
			"3M"  => $M3,   "3F"  => $F3,
			"4M"  => $M4,   "4F"  => $F4,
			"5M"  => $M5,   "5F"  => $F5,
			"6M"  => $M6,   "6F"  => $F6,
			"7M"  => $M7,   "7F"  => $F7,
			"8M"  => $M8,   "8F"  => $F8,
			"9M"  => $M9,   "9F"  => $F9,
			"10M" => $M10,  "10F" => $F10,
			"11M" => $M11,  "11F" => $F11,
			"12M" => $M12,  "12F" => $F12,
			"13M" => $M13,  "13F" => $F13,
			"14M" => $M14,  "14F" => $F14,
			"15M" => $M15,  "15F" => $F15,
			"16M" => $M16,  "16F" => $F16,
			"17M" => $M17,  "17F" => $F17,
			"18M" => $M18,  "18F" => $F18,
			"19M" => $M19,  "19F" => $F19,
			"20M" => $M20,  "20F" => $F20,
			"T" =>'1',
			"tl" =>"Poids",
			"1MF"  => '00-04',  
			"2MF"  => '05-09',   
			"3MF"  => '10-14',  
			"4MF"  => '15-19',   
			"5MF"  => '20-24',  
			"6MF"  => '25-29',   
			"7MF"  => '30-34',  
			"8MF"  => '35-39',   
			"9MF"  => '40-44',   
			"10MF" => '45-49',  
			"11MF" => '50-54',  
			"12MF" => '55-59', 
			"13MF" => '60-64',  
			"14MF" => '65-69', 
			"15MF" => '70-74',  
			"16MF" => '75-79',  
			"17MF" => '80-84',  
			"18MF" => '85-89', 
			"19MF" => '90-94', 
			"20MF" => '95-99'  
			);
	//$pdf->T2F20($T2F20);	
	//$pdf->T2F20STAT($t,'POIDS','POIDS');
	
//$pdf->entetepage1('Collecte  du '.$t);
	$ap=$pdf->compagne('A','Positif',$t);
	$an=$pdf->compagne('A','negatif',$t);
	$bp=$pdf->compagne('B','Positif',$t);
	$bn=$pdf->compagne('B','negatif',$t);
	$abp=$pdf->compagne('AB','Positif',$t);
	$abn=$pdf->compagne('AB','negatif',$t);
	$op=$pdf->compagne('O','Positif',$t);
	$on=$pdf->compagne('O','negatif',$t);
	
	// $pdf->color(0);
	// $table['rhp'] = array('A' => $ap, 'B' => $bp, 'AB' => $abp, 'O' => $op);
	// $table['rhn'] = array('A' => $an, 'B' => $bn, 'AB' => $abn, 'O' => $on); 
	// $result = $pdf->chiTest($table);
	// $probability = $pdf->chiDist($result['chi'], $result['df']);
	// $pdf->SetXY(120,40);$pdf->cell(20,5,'DLL',1,0,'L',1,0);$pdf->cell(20,5,round($result['df'],6),1,0,'L',1,0);	
	// $pdf->SetXY(120,45);$pdf->cell(20,5,'X2',1,0,'L',1,0);$pdf->cell(20,5,round($result['chi'],6),1,0,'L',1,0);	
	// $pdf->SetXY(120,50);$pdf->cell(20,5,'Pr',1,0,'L',1,0);$pdf->cell(20,5,round($probability,6),1,0,'L',1,0);	

	$T4F2=array(
			"xt" => 5,
			"yt" => 40,
			"wc" => "",
			"hc" => "",
			"tt" => "III  Repartition des dons par groupage rhesus",
			"tc" => "Groupage",
			"tc1" =>"A",
			"tc2" =>"B",
			"tc3" =>"AB",
			"tc4" =>"O",
			"tc5" =>"Total",
			"l1c1" =>$ap,
			"l1c2" =>$bp,
			"l1c3" =>$abp,
			"l1c4" =>$op,
			"l1c5" =>$ap+$bp+$abp+$op,
			"l2c1" =>$an,
			"l2c2" =>$bn,
			"l2c3" =>$abn,
			"l2c4" =>$on,
			"l2c5" =>$an+$bn+$abn+$on,
			"l3c1" =>$ap+$an,
			"l3c2" =>$bp+$bn,
			"l3c3" =>$abp+$abn,
			"l3c4" =>$op+$on,
			"l3c5" =>$ap+$an+$bp+$bn+$abp+$abn+$op+$on,
			"tl" =>"Rhesus",
			"tl1" =>"Rh+",
			"tl2" =>"Rh-",
			"tl3" =>"Total"
			);
	//$pdf-> T4F2($T4F2);
	$pie4 = array(
			"x" => 200, "y" => 65, 
			"r" => 17,
			"v1" => $ap+$an,
			"v2" => $bp+$bn,
			"v3" => $abp+$abn,
			"v4" => $op+$on,
			"t0" => "III.A - Dons par groupage ABO ",
			"t1" => "A",
			"t2" => "B",
			"t3" => "AB",
			"t4" => "O"
			);
	//$pdf->pie4($pie4);
	$pie2 = array(
	"x" => 200, 
	"y" => 116, 
	"r" => 17,
	"v1" => $ap+$bp+$abp+$op,
	"v2" => $an+$bn+$abn+$on,
	"t0" => "III.B - Dons par groupage RH(-/+)  ",
	"t1" => "RH+",
	"t2" => "RH-");
	//$pdf->pie2($pie2);

	
	$T4F2=array(
			"xt" => 5,
			"yt" => 97,
			"wc" => "",
			"hc" => "",
			"tt" => "III  Repartition des dons par serologie",
			"tc" => "serologie",
			"tc1" =>"HIV",
			"tc2" =>"HVB",
			"tc3" =>"HVC",
			"tc4" =>"TPHA",
			"tc5" =>"Total",
			"l1c1" =>$ap,
			"l1c2" =>$bp,
			"l1c3" =>$abp,
			"l1c4" =>$op,
			"l1c5" =>$ap+$bp+$abp+$op,
			"l2c1" =>$an,
			"l2c2" =>$bn,
			"l2c3" =>$abn,
			"l2c4" =>$on,
			"l2c5" =>$an+$bn+$abn+$on,
			"l3c1" =>$ap+$an,
			"l3c2" =>$bp+$bn,
			"l3c3" =>$abp+$abn,
			"l3c4" =>$op+$on,
			"l3c5" =>$ap+$an+$bp+$bn+$abp+$abn+$op+$on,
			"tl" =>"Resulta",
			"tl1" =>"S+",
			"tl2" =>"S-",
			"tl3" =>"Total"
			);
	//$pdf-> T4F2($T4F2);	
	

// $am=$pdf->compagnesexe('A','M',$t);
// $af=$pdf->compagnesexe('A','F',$t);
// $bm=$pdf->compagnesexe('B','M',$t);
// $bf=$pdf->compagnesexe('B','F',$t);
// $abm=$pdf->compagnesexe('AB','M',$t);
// $abf=$pdf->compagnesexe('AB','F',$t);
// $om=$pdf->compagnesexe('O','M',$t);
// $of=$pdf->compagnesexe('O','F',$t);
// $T4F2=array(
		// "xt" => 5,
		// "yt" => 142,
		// "wc" => "",
		// "hc" => "",
		// "tt" => "IV  Repartition des dons par  groupage sexe",
		// "tc" => "Groupage",
		// "tc1" =>"A",
		// "tc2" =>"B",
		// "tc3" =>"AB",
		// "tc4" =>"O",
		// "tc5" =>"Total",
		// "l1c1" =>$am,
		// "l1c2" =>$bm,
		// "l1c3" =>$abm,
		// "l1c4" =>$om,
		// "l1c5" =>$am+$bm+$abm+$om,
		// "l2c1" =>$af,
		// "l2c2" =>$bf,
		// "l2c3" =>$abf,
		// "l2c4" =>$of,
		// "l2c5" =>$af+$bf+$abf+$of,
		// "l3c1" =>$am+$af,
		// "l3c2" =>$bm+$bf,
		// "l3c3" =>$abm+$abf,
		// "l3c4" =>$om+$of,
		// "l3c5" =>$am+$af+$bm+$bf+$abm+$abf+$om+$of,
		// "tl" =>"Sexe",
		// "tl1" =>"M",
		// "tl2" =>"F",
		// "tl3" =>"Total"
		// );
// $pdf-> T4F2($T4F2);
// $pie2 = array(
// "x" => 200, 
// "y" => 167, 
// "r" => 17,
// "v1" => $am+$bm+$abm+$om,
// "v2" => $af+$bf+$abf+$of,
// "t0" => "IV - Dons par sexe  MF  ",
// "t1" => "M",
// "t2" => "F");
// $pdf->pie2($pie2);





//$pdf->entetepage1('Repartition Geographique Des Donneurs Par Commune  ');
		//$pdf->RoundedRect(5,35,285,160, 2, $style = '');
		//$pdf->tblparcommune('Donneurs') ;//Dons//

		$data = array(
		"A"  => '00-00',
		"B"  => '01-20',
		"C"  => '20-40',
		"D"  => '40-60',
		"E"  => '60-100',
		"1"  => 0,//daira  ainoussera
		// "916"  => $pdf->donparcommune(916),//daira  Djelfa
		"916"  => $pdf->dnrparcommune('17000',916),//daira  Djelfa
		"917"  => $pdf->dnrparcommune('17000',917),// daira El Idrissia
		"918"  => $pdf->dnrparcommune('17000',918),//Oum Cheggag
		"919"  => $pdf->dnrparcommune('17000',919),//El Guedid
		"920"  => $pdf->dnrparcommune('17000',920),//daira Charef
		"921"  => $pdf->dnrparcommune('17000',921),//El Hammam
		"922"  => $pdf->dnrparcommune('17000',922),//Touazi
		"923"  => $pdf->dnrparcommune('17000',923),//Beni Yacoub
		"924"  => $pdf->dnrparcommune('17000',924),//daira ainoussera
		"925"  => $pdf->dnrparcommune('17000',925),//guernini
		"926"  => $pdf->dnrparcommune('17000',926),//daira sidilaadjel
		"927"  => $pdf->dnrparcommune('17000',927),//hassifdoul
		"928"  => $pdf->dnrparcommune('17000',928),//elkhamis
		"929"  => $pdf->dnrparcommune('17000',929),//daira birine
		"930"  => $pdf->dnrparcommune('17000',930),//Dra Souary
		"931"  => $pdf->dnrparcommune('17000',931),//benahar
		"932"  => $pdf->dnrparcommune('17000',932),//daira hadshari
		"933"  => $pdf->dnrparcommune('17000',933),//bouiratlahdab
		"934"  => $pdf->dnrparcommune('17000',934),//ainfka
		"935"  => $pdf->dnrparcommune('17000',935),//daira hassi bahbah
		"936"  => $pdf->dnrparcommune('17000',936),//Mouilah
		"937"  => $pdf->dnrparcommune('17000',937),//El Mesrane
		"938"  => $pdf->dnrparcommune('17000',938),//Hassi el Mora
		"939"  => $pdf->dnrparcommune('17000',939),//zaafrane
		"940"  => $pdf->dnrparcommune('17000',940),//hassi el euche
		"941"  => $pdf->dnrparcommune('17000',941),//ain maabed
		"942"  => $pdf->dnrparcommune('17000',942),//daira darchioukh
		"943"  => $pdf->dnrparcommune('17000',943),//Guendouza
		"944"  => $pdf->dnrparcommune('17000',944),//El Oguila
		"945"  => $pdf->dnrparcommune('17000',945),//El Merdja
		"946"  => $pdf->dnrparcommune('17000',946),//mliliha
		"947"  => $pdf->dnrparcommune('17000',947),//sidibayzid
		"948"  => $pdf->dnrparcommune('17000',948),//daira Messad
		"949"  => $pdf->dnrparcommune('17000',949),//Abdelmadjid
		"950"  => $pdf->dnrparcommune('17000',950),//Haniet Ouled Salem
		"951"  => $pdf->dnrparcommune('17000',951),//Guettara
		"952"  => $pdf->dnrparcommune('17000',952),//Deldoul
		"953"  => $pdf->dnrparcommune('17000',953),//Sed Rahal
		"954"  => $pdf->dnrparcommune('17000',954),//Selmana
		"955"  => $pdf->dnrparcommune('17000',955),//El Gahra
		"956"  => $pdf->dnrparcommune('17000',956),//Oum Laadham
		"957"  => $pdf->dnrparcommune('17000',957),//Mouadjebar
		"958"  => $pdf->dnrparcommune('17000',958),//daira Ain el Ibel
		"959"  => $pdf->dnrparcommune('17000',959),//Amera
		"960"  => $pdf->dnrparcommune('17000',960),//N'thila
		"961"  => $pdf->dnrparcommune('17000',961),//Oued Seddeur
		"962"  => $pdf->dnrparcommune('17000',962),//Zaccar
		"963"  => $pdf->dnrparcommune('17000',963),//Douis
		"964"  => $pdf->dnrparcommune('17000',964),//Ain Chouhada
		"965"  => $pdf->dnrparcommune('17000',965),//Tadmit
		"966"  => $pdf->dnrparcommune('17000',966),//El Hiouhi
		"967"  => $pdf->dnrparcommune('17000',967),//daira Faidh el Botma
		"968"  => $pdf->dnrparcommune('17000',968) //Amourah
		);
		//$pdf->djelfa($data,560,128,3.7); 


//$pdf->entetepage1('  Collecte  du '.$t);//N:'.$id.'
//$pdf->listdoncomp($t);
		
$pdf->Output();







// $pdf->AddPage();
// $pdf->SetFont('Arial','',10);
// $data = array(
	// 'Group 1' => array(
		// '01' => 12,
		// '02' => 14,
		// '03' => 12,
		// '04' => 14,
		// '05' => 12
	// ),
	// 'Group 2' => array(
		// '01' =>50,
		// '02' =>50,
		// '03' =>50,
		// '04' =>50,
		// '05' =>50
	// )
// );
// $colors = array(
	// 'Group 1' => array(114,171,237),
	// 'Group 2' => array(163,36,153)
// );
// $pdf->LineGraph(190,100,$data,'VHkBvBgBdB',$colors,100,10);
// $pdf->SetLineWidth(0.51);

// $pdf->AddPage();
// $pdf->SetFont('Arial','',10);
// $data = array(
	// 'Group 1' => array(
		// '08-02' => 2,
		// '08-23' => 4,
		// '09-13' => 2,
		// '10-04' => 4,
		// '10-25' => 2
	// ),
	// 'Group 2' => array(
		// '08-02' =>0,
		// '08-23' => 0,
		// '09-13' => 0,
		// '10-04' => 0,
		// '10-25' => 0
	// )
// );
// $colors = array(
	// 'Group 1' => array(114,171,237),
	// 'Group 2' => array(163,36,153)
// );
// $pdf->LineGraph(190,100,$data,'VHkBvBgBdB',$colors,100,6);
// $pdf->SetLineWidth(0.51);
// $pdf->SetFont('Times', 'B', 11);
// $tta1=$pdf->AGEDON1(18,19,$t,'A');$ttb1=$pdf->AGEDON1(18,19,$t,'B');$ttab1=$pdf->AGEDON1(18,19,$t,'AB');$tto1=$pdf->AGEDON1(18,19,$t,'O');
// $tta2=$pdf->AGEDON1(20,29,$t,'A');$ttb2=$pdf->AGEDON1(20,29,$t,'B');$ttab2=$pdf->AGEDON1(20,29,$t,'AB');$tto2=$pdf->AGEDON1(20,29,$t,'O');
// $tta3=$pdf->AGEDON1(30,39,$t,'A');$ttb3=$pdf->AGEDON1(30,39,$t,'B');$ttab3=$pdf->AGEDON1(30,39,$t,'AB');$tto3=$pdf->AGEDON1(30,39,$t,'O');
// $tta4=$pdf->AGEDON1(40,49,$t,'A');$ttb4=$pdf->AGEDON1(40,49,$t,'B');$ttab4=$pdf->AGEDON1(40,49,$t,'AB');$tto4=$pdf->AGEDON1(40,49,$t,'O');
// $tta5=$pdf->AGEDON1(50,59,$t,'A');$ttb5=$pdf->AGEDON1(50,59,$t,'B');$ttab5=$pdf->AGEDON1(50,59,$t,'AB');$tto5=$pdf->AGEDON1(50,59,$t,'O');
// $tta6=$pdf->AGEDON1(60,69,$t,'A');$ttb6=$pdf->AGEDON1(60,69,$t,'B');$ttab6=$pdf->AGEDON1(60,69,$t,'AB');$tto6=$pdf->AGEDON1(60,69,$t,'O');
// $tta7=$pdf->AGEDON1(70,79,$t,'A');$ttb7=$pdf->AGEDON1(70,79,$t,'B');$ttab7=$pdf->AGEDON1(70,79,$t,'AB');$tto7=$pdf->AGEDON1(70,79,$t,'O');

// $T4F7=array(
		// "xt" => 5,
		// "yt" => 42,
		// "wc" => "",
		// "hc" => "",
		// "tt" => "II  Repartition des dons par tranche d'age et groupage ABO",
		// "tc" => "Groupage",
		// "tc1" =>"A",
		// "tc2" =>"B",
		// "tc3" =>"AB",
		// "tc4" =>"O",
		// "tc5" =>"Total",
		// "l1c1" =>$tta1,
		// "l1c2" =>$ttb1,
		// "l1c3" =>$ttab1,
		// "l1c4" =>$tto1,
		// "l1c5" =>$tta1+$ttb1+$ttab1+$tto1,
		// "l2c1" =>$tta2,
		// "l2c2" =>$ttb2,
		// "l2c3" =>$ttab2,
		// "l2c4" =>$tto2,
		// "l2c5" =>$tta2+$ttb2+$ttab2+$tto2,
		// "l3c1" =>$tta3,
		// "l3c2" =>$ttb3,
		// "l3c3" =>$ttab3,
		// "l3c4" =>$tto3,
		// "l3c5" =>$tta3+$ttb3+$ttab3+$tto3,
		// "l4c1" =>$tta4,
		// "l4c2" =>$ttb4,
		// "l4c3" =>$ttab4,
		// "l4c4" =>$tto4,
		// "l4c5" =>$tta4+$ttb4+$ttab4+$tto4,
		// "l5c1" =>$tta5,
		// "l5c2" =>$ttb5,
		// "l5c3" =>$ttab5,
		// "l5c4" =>$tto5,
		// "l5c5" =>$tta5+$ttb5+$ttab5+$tto5,
		// "l6c1" =>$tta6,
		// "l6c2" =>$ttb6,
		// "l6c3" =>$ttab6,
		// "l6c4" =>$tto6,
		// "l6c5" =>$tta6+$ttb6+$ttab6+$tto6,
		// "l7c1" =>$tta7,
		// "l7c2" =>$ttb7,
		// "l7c3" =>$ttab7,
		// "l7c4" =>$tto7,
		// "l7c5" =>$tta7+$ttb7+$ttab7+$tto7,
		// "l8c1" =>$tta1+$tta2+$tta3+$tta4+$tta5+$tta6+$tta7,
		// "l8c2" =>$ttb1+$ttb2+$ttb3+$ttb4+$ttb5+$ttb6+$ttb7,
		// "l8c3" =>$ttab1+$ttab2+$ttab3+$ttab4+$ttab5+$ttab6+$ttab7,
		// "l8c4" =>$tto1+$tto2+$tto3+$tto4+$tto5+$tto6+$tto7,
		// "l8c5" =>$tta1+$tta2+$tta3+$tta4+$tta5+$tta6+$tta7+$ttb1+$ttb2+$ttb3+$ttb4+$ttb5+$ttb6+$ttb7+$ttab1+$ttab2+$ttab3+$ttab4+$ttab5+$ttab6+$ttab7+$tto1+$tto2+$tto3+$tto4+$tto5+$tto6+$tto7,
		// "tl" =>"Age",
		// "tl1" =>"18-19",
		// "tl2" =>"20-29",
		// "tl3" =>"30-39",
		// "tl4" =>"40-49",
		// "tl5" =>"50-59",
		// "tl6" =>"60-69",
		// "tl7" =>"70-79",
		// "tl8" =>"Total"
		// );
// $pdf-> T4F7($T4F7);
// $ta=$pdf->AGEDON1(0,19,$t,'A')+$pdf->AGEDON1(0,19,$t,'B')+$pdf->AGEDON1(0,19,$t,'AB')+$pdf->AGEDON1(0,19,$t,'O');
// $tb=$pdf->AGEDON1(20,29,$t,'A')+$pdf->AGEDON1(20,29,$t,'B')+$pdf->AGEDON1(20,29,$t,'AB')+$pdf->AGEDON1(20,29,$t,'O');
// $tc=$pdf->AGEDON1(30,39,$t,'A')+$pdf->AGEDON1(30,39,$t,'B')+$pdf->AGEDON1(30,39,$t,'AB')+$pdf->AGEDON1(30,39,$t,'O');
// $td=$pdf->AGEDON1(40,49,$t,'A')+$pdf->AGEDON1(40,49,$t,'B')+$pdf->AGEDON1(40,49,$t,'AB')+$pdf->AGEDON1(40,49,$t,'O');
// $te=$pdf->AGEDON1(50,59,$t,'A')+$pdf->AGEDON1(50,59,$t,'B')+$pdf->AGEDON1(50,59,$t,'AB')+$pdf->AGEDON1(50,59,$t,'O');
// $tf=$pdf->AGEDON1(60,69,$t,'A')+$pdf->AGEDON1(60,69,$t,'B')+$pdf->AGEDON1(60,69,$t,'AB')+$pdf->AGEDON1(60,69,$t,'O');
// $tg=$pdf->AGEDON1(70,100,$t,'A')+$pdf->AGEDON1(70,100,$t,'B')+$pdf->AGEDON1(70,100,$t,'AB')+$pdf->AGEDON1(70,100,$t,'O');
// $pdf->bar(200,150,$ta,$tb,$tc,$td,$te,$tf,$tg,utf8_decode('II - Dons par tranche d\'age en année'));
//IV  Repartition des donneurs par indication
// $pdf->SetXY(5,150);$pdf->cell(90+15,5,'II  Repartition des donneurs par indication',1,0,'L',1,0);
// $pdf->SetXY(5,155);$pdf->cell(20,5,'IND',1,0,'C',1,0);                        $pdf->SetXY(25,155);$pdf->cell(20,5,'CIT',1,0,'C',1,0);                       $pdf->SetXY(45,155);$pdf->cell(20,5,'CID',1,0,'C',1,0);                       $pdf->SetXY(65,155);$pdf->cell(30+15,5,'TOTAL',1,0,'C',1,0);
// $pdf->SetXY(5,160);$pdf->cell(20,5,$pdf->compagneind('IND',$t),1,0,'C',0,0);  $pdf->SetXY(25,160);$pdf->cell(20,5,$pdf->compagneind('CIDT',$t),1,0,'C',0,0);$pdf->SetXY(45,160);$pdf->cell(20,5,$pdf->compagneind('CIDD',$t),1,0,'C',0,0);$pdf->SetXY(65,160);$pdf->cell(30+15,5,$pdf->compagneind('IND',$t)+$pdf->compagneind('CIDT',$t)+$pdf->compagneind('CIDD',$t),1,0,'C',0,0);
// tel ans
// 021550366
// 021402237

?>