<?php
session_start();

$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$AdvF = $_POST["firstN"];
$AdvL = $_POST["lastN"];
$AdvLoc = $_POST["location"];
$AdvOff = $_POST["office"];


//$_SESSION["AdvF"] = $_POST["firstN"];
//$_SESSION["AdvL"] = $_POST["lastN"];
//$_SESSION["AdvLoc"] = $_POST["location"];
//$_SESSION["AdvOff"] = $_POST["office"];


$_SESSION["AdvUN"] = $_POST["UserN"];
$_SESSION["AdvPW"] = $_POST["PassW"];
$_SESSION["PassCon"] = false;

$sql = "update `Proj2Advisors` set `FirstName` = '$AdvF', `LastName` = '$AdvL', `Location` = '$AdvLoc',`Office` = '$AdvOff' where `Username` = 'Dummy' and `Password` = 'nothing'";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

if($_POST["PassW"] == $_POST["ConfP"]){
	header('Location: AdminCreateNew.php');
}
elseif($_POST["PassW"] != $_POST["ConfP"]){
	$_SESSION["PassCon"] = true;
	header('Location: AdminCreateNewAdv.php');
}

?>