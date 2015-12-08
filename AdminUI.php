<?php 
session_start();
$debug = false;

if($debug) { echo("Session variables-> ".var_dump($_SESSION)); }

include('../CommonMethods.php');
$COMMON = new Common($debug);
$_SESSION["PassCon"] = false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Home</title>
	<link rel='stylesheet' type='text/css' href='./css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	<h2> Hello 
	<?php

	if(!isset($_SESSION["UserN"])) // someone landed this page by accident
	{
		return;
	}		

		$User = $_SESSION["UserN"];
		$Pass = $_SESSION["PassW"];
		$sql = "SELECT `firstName` FROM `Proj2Advisors` 
			WHERE `Username` = '$User' 
			and `Password` = '$Pass'";

		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		$row = mysql_fetch_row($rs);
		echo $row[0];
	?>
	</h2>
	
	<form action="AdminProcessUI.php" method="post" name="UI">
  
		<button type="submit" name="next" class="button large selection" value="Schedule appointments"><img src='images/signup.png' width='30' height='30' align= 'left'/>Schedule Apppointments</button><br>
		<button type='submit' name='next' class='button large selection' value='Print schedule for a day'><img src='images/printer.png' width='30' height='30' align = 'left'/>Print Schedule for a day</button><br>
		<button type='submit' name='next' class='button large selection' value='Edit appointments'><img src='images/Edit.png' width='30' height='30' align = 'left'/>
				Edit Appointments</button><br>
		<button type='submit' name='next' class='button large selection' value='Search for an appointment'> <img src='images/Search.png' width='30' height='30' align = 'left'/>Search For an Appointment</button><br>
		<button type='submit' name='next' class='button large selection' value='Create new Admin Account'> <img src='images/paper.png' width='30' height='30' align = 'left'/>Create New Admin Account</button><br>
	
	</form>
	<br>

	<form method="link" action="Logout.php">
		<input type="submit" name="next" class="button large go" value="Log Out">
	</form>
          
        </div>
        <div class="field">
          
        </div>
	</div>

	<?php include('./workOrder/workButton.php'); ?>

 <?php include('Footer.php'); ?>
