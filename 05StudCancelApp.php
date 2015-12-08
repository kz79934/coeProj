<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Cancel Appointment</title>
    	<link rel='stylesheet' type='text/css' href='./css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
		<h1>Cancel Appointment</h1>
	    <div class="field">
	    <?php
			$firstn = $_SESSION["firstN"];
			$lastn = $_SESSION["lastN"];
			$studid = $_SESSION["studID"];
			$major = $_SESSION["major"];



			$email = $_SESSION["email"];
			

			//replaced SQL query with function
			$row = $COMMON->getRowFromAppointmentsForEnrolledID($studid, $_SERVER["SCRIPT_NAME"]);








			$oldAdvisorID = $row[2];
			$oldDatephp = strtotime($row[1]);				
				
			//for individual appointments
			if($oldAdvisorID != 0){


				//replaces sql query with function
				$oldAdvisorName = $COMMON->getAdvisorName($oldAdvisorID, $_SERVER["SCRIPT_NAME"]);


			}
		
			//group appointments
			else{$oldAdvisorName = "Group";}
			
			echo "<h2>Current Appointment</h2>";
			echo "<label for='info'>";
			echo "Advisor: ", $oldAdvisorName, "<br>";
			echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</label><br>";
		?>		
        </div>
	    <div class="finishButton">
			<form action = "StudProcessCancel.php" method = "post" name = "Cancel">
			<input type="submit" name="cancel" class="button large go" value="Cancel">
			<input type="submit" name="cancel" class="button large" value="Keep">
			</form>
	    </div>
		</div>
		<div class="bottom">
			<p>Click "Cancel" to cancel appointment. Click "Keep" to keep appointment.</p>
		</div>
		</form>
  <?php include('Footer.php'); ?>
