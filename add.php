<html>
<head>

	<title>Add</title>
	<script src = "js/jquery-1.12.3.js" type = "text/javascript"></script>
	<script src = "js/jquery.dataTables.min.js" type = "text/javascript"></script>
	<link href = "css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href = "css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href = "css/simpleform.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div id = "header" >Add Country</div>

<br>
<?php
require_once("connection.php");

if(isset($_POST['add'])){
$code = $_POST['code'];
$name = $_POST['name'];
$continent = $_POST['continent'];
$population = $_POST['population'];
$region = $_POST['region'];
$capital = $_POST['capital'];
$headofstate = $_POST['headofstate'];
$governmentform = $_POST['governmentform'];

$sqlAdd = "INSERT INTO country (Code, Name, Continent, Population, Region, Capital, HeadOfState, GovernmentForm) VALUES ('$code', '$name', '$continent', '$population', '$region', '$capital', '$headofstate', '$governmentform')";

if ($conn->query($sqlAdd) === TRUE) {
    echo "<script>
		alert('Successfully Inserted.');
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
	<form method = 'POST' action = 'add.php' >
	<table border = '0' width = '100%' align = 'center'>
		<tr><td>Code</td><td><input type = 'textbox' name = 'code' required autocomplete = 'off'></td></tr>
		<tr><td>Name</td><td><input type = 'textbox' name = 'name' autocomplete = 'off'></td></tr>
		<tr><td>Continent</td><td>
								<select name = 'continent'>
								<option value = 'Asia'>Asia</option>
								<option value = 'Europe'>Europe</option>
								<option value = 'North America'>North America</option>
								<option value = 'Africa'>Africa</option>
								<option value = 'Oceania'>Oceania</option>
								<option value = 'Antarctica'>Antarctica</option>
								<option value = 'South America'>South America</option>
								</select>
							</td></tr>
		<tr><td>Population</td><td><input type = 'textbox' name = 'population' autocomplete = 'off'></td></tr>
		<tr><td>Region</td><td><input type = 'textbox' name = 'region' autocomplete = 'off'></td></tr>
		<tr><td>Capital</td><td><input type = 'textbox' name = 'capital' autocomplete = 'off'></td></tr>
		<tr><td>Head Of State</td><td><input type = 'textbox' name = 'headofstate' autocomplete = 'off'></td></tr>
		<tr><td>Government Form</td><td><input type = 'textbox' name = 'governmentform' autocomplete = 'off'></td></tr>
		<tr><td colspan = '2' align = 'right'><input type = 'submit' name = 'add' value = 'Add' class = 'myButton'></td></tr>
	</table>
	</form>";

?>

</body>
</html>