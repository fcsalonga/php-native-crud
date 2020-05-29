<html>
<head>
	<title>Update</title>
	<script src = "js/jquery-1.12.3.js" type = "text/javascript"></script>
	<script src = "js/jquery.dataTables.min.js" type = "text/javascript"></script>
	<link href = "css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href = "css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href = "css/simpleform.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div id = "header" >Edit Country</div>

	<br>
	<?php
	require_once("connection.php");
	$code = $_GET['code'];
	$queryCode ="SELECT Code, Name, Continent, Population, Region, Capital, HeadOfState, GovernmentForm FROM country WHERE Code = '$code'";
	$resultCode = $conn->query($queryCode) or die($conn->error);
	$rowCode = $resultCode->fetch_assoc();

	if(isset($_POST['submit'])){

	$sqlUpdate = "UPDATE country SET Name = '".$_POST['name']."', Continent = '".$_POST['continent']."', Population = '".$_POST['population']."', Region = '".$_POST['region']."', Capital = '".$_POST['capital']."', HeadOfState = '".$_POST['headofstate']."', GovernmentForm = '".$_POST['governmentform']."' WHERE Code = '$code'";

	if ($conn->query($sqlUpdate) === TRUE) {
		echo "<script>
			alert('Successfully Updated.');
			parent.jQuery.fancybox.close();	
			parent.location.reload(true);
			window.location.href('index.php');
		</script>";
	} else {
		echo "Error updating record: " . $conn->error;
	}


	$conn->close();

	}

	echo "
		<div id = 'wrapper' align = 'center'>
		<form method = 'POST' action = 'update.php?code=$code'>
		<table border = '0' width = '100%' align = 'center'>
			<tr><td>Name</td><td><input type = 'textbox' name = 'name' value = '".$rowCode['Name']."'></td></tr>
			<tr><td>Continent</td><td><input type = 'textbox' name = 'continent' value = '".$rowCode['Continent']."'></td></tr>
			<tr><td>Population</td><td><input type = 'textbox' name = 'population' value = '".$rowCode['Population']."'></td></tr>
			<tr><td>Region</td><td><input type = 'textbox' name = 'region' value = '".$rowCode['Region']."'></td></tr>
			<tr><td>Capital</td><td><input type = 'textbox' name = 'capital' value = '".$rowCode['Capital']."'></td></tr>
			<tr><td>Head Of State</td><td><input type = 'textbox' name = 'headofstate' value = '".$rowCode['HeadOfState']."'></td></tr>
			<tr><td>Government Form</td><td><input type = 'textbox' name = 'governmentform' value = '".$rowCode['GovernmentForm']."'></td></tr>
			<tr><td colspan = '2' align = 'right'><input type = 'submit' name = 'submit' value = 'Save' class = 'myButton'></td></tr>
		</table>
		</form>";

	?>

</body>
</html>