<?php
	include "./CHART/libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Mozilla Firefox (80)", 10));
	$dataSet->addPoint(new Point("Konqueror (75)", 10));
	$dataSet->addPoint(new Point("Opera (50)", 10));
	$dataSet->addPoint(new Point("Safari (37)", 17));
	$dataSet->addPoint(new Point("Dillo (37)", 17));
	$dataSet->addPoint(new Point("Other (72)", 10));
	$chart->setDataSet($dataSet);

	$chart->setTitle("User agents for www.example.com");
	$chart->render("./CHART/demo/generated/demo3.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Pie chart"  src="./CHART/demo/generated/demo3.png" style="border: 1px solid gray;"/>
</body>
</html>
