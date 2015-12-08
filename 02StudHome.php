<?php
session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Student Advising Home</title>
	<link rel='stylesheet' type='text/css' href='./css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
		<h2>Hello 
		<?php
			$debug = false;
			include('../CommonMethods.php');
			$COMMON = new Common($debug);
			$studid = $_SESSION["studID"];
			$sql = "select * from Proj2Students where `StudentID` = '$studid'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			echo $row[1];
			
		?>
        </h2>
	    <div class="selections">
		<form action="StudProcessHome.php" method="post" name="Home">
	    <?php
			//$debug = false;
			//include('../CommonMethods.php');
			//$COMMON = new Common($debug);
			$studExist = false;
			//$_SESSION["studExist"] = false;
			$adminCancel = false;
			$noApp = false;
			$studid = $_SESSION["studID"];

			$sql = "select * from Proj2Students where `StudentID` = '$studid'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			
			if (!empty($row)){
				//$_SESSION["studExist"] = true;
				$studExist = true;
				if($row[6] == 'C'){
					$adminCancel = true;
				}
				if($row[6] == 'N'){
					$noApp = true;
				}
			}

			if ($studExist == false || $adminCancel == true || $noApp == true){
				if($adminCancel == true){
					echo "<p style='color:red'>The advisor has cancelled your appointment! Please schedule a new appointment.</p>";
				}
				echo "<button type='submit' name='selection' class='button large selection' value='Signup'><img src='images/signup.png' width='30' height='30' align= 'left'/>Signup for an appointment</button><br>";
			}
			else{
				echo "<button type='submit' name='selection' class='button large selection' value='View'><img src='images/View.png' width='30' height='30' align = 'left'/>View my appointment</button><br>";
				echo "<button type='submit' name='selection' class='button large selection' value='Reschedule'><img src='images/Reschedule.png' width='30' height='30' align = 'left'/>Reschedule my appointment</button><br>";
				echo "<button type='submit' name='selection' class='button large selection' value='Cancel'><img src='images/Cancel.png' width='30' height='30' align = 'left'/>Cancel my appointment</button><br>";
			}
			echo "<button type='submit' name='selection' class='button large selection' value='Search'><img src='images/Search.png' width='30' height='30' align = 'left'/>Search for appointment</button><br>";
			echo "<button type='submit' name='selection' class='button large selection' value='Edit'><img src='images/Edit.png' width='30' height='30' align = 'left'/>Edit student information</button><br>";
		?>
		</form>
        </div>
		<form action="Logout.php" method="post" name="Logout">
	    <div class="logoutButton">
			<input type="submit" name="logout" class="button large go" value="Logout">
	    </div>
		</div>
		</form>
			  <?php include('Footer.php'); ?>
