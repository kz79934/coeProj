<?php
session_start();



$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);
$studid = $_SESSION["studID"];
$sql = "select * from Proj2Students where `StudentID` = '$studid'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);
$firstn = strtoupper($row[1]);
$lastn = strtoupper($row[2]);
$email = $row[4];
$major = $row[5];


if(!empty($row)){


	$compressedMajor = $COMMON->compressMajor($major);





	$sql = "update `Proj2Students` set `FirstName` = '$firstn', `LastName` = '$lastn', `Email` = '$email', `Major` = '$compressedMajor' where `StudentID` = '$studid'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);




}

header('Location: 02StudHome.php');
?>