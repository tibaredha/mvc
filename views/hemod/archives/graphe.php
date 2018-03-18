<?php 
include "./CHART/libchart/classes/libchart.php";
//demo1.png
$chart = new VerticalBarChart();
$fichier='./CHART/demo/generated/demo1.png';
//demo3.png
// $chart = new PieChart();
// $fichier='./CHART/demo/generated/demo3.png';
//demo5.png
// $chart = new LineChart(); 
// $fichier='./CHART/demo/generated/demo5.png';
$dataSet = new XYDataSet(); 
// $dataSet->addPoint(new Point("A+", $i));
// $dataSet->addPoint(new Point("A-", 10));
// $dataSet->addPoint(new Point("B+", 10));
// $dataSet->addPoint(new Point("B-", 10));
// $dataSet->addPoint(new Point("AB+",10));
// $dataSet->addPoint(new Point("AB-",10));
// $dataSet->addPoint(new Point("O+", 10));
// $dataSet->addPoint(new Point("O-", 10));
for( $i = 10; $i<=100; $i += 10 ) 
$dataSet->addPoint(new Point("A+", $i));
$chart->setDataSet($dataSet);
$chart->setTitle("*******************");
$chart->render($fichier);
echo '<div align="center"  > ';
echo '<img alt="Pie chart"  src=".'.$fichier.'" style="border: 2px solid red;"/>';
echo "</div>";
verifsession();
?>