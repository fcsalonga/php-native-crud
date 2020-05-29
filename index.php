<html>
<head>

	<title>CRUD</title>
	
	<script src = "js/jquery-1.12.3.js" type = "text/javascript"></script>
	<?php  include('source/fancy.php'); ?>
	<script src = "js/jquery.dataTables.min.js" type = "text/javascript"></script>
	<link href = "css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	</script>
	
</head>
<body>

<div id = "header" >CRUD</div>

<br>

<div id = "container">
	<div align = "right"><a href = "add.php"  class="fancybox fancybox.iframe"><button class = "myButton">Add</button></a></div>	</br>
	<div align = "left">Search Reference No:&ensp;<input type = "textbox" id = "searchref">&ensp;&ensp;<button class = "">Search</button></div></br>

	<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr style = "font-weight:bold;">
				<th>Name</th>
				<th>Continent</th>
				<th>Population</th>
				<th>Region</th>
				<th>Capital</th>
				<th>Head Of State</th>
				<th>Government Form</th>
			</tr>
		</thead>
		<tbody>
		<?php
		require_once('connection.php');
		$sql = "SELECT Code, Name, Continent, Population, Region, Capital, HeadOfState, GovernmentForm FROM country";
		$result = $conn->query($sql) or die($conn->error);
		while($row = $result->fetch_assoc()) {
			echo "<tr>
					<td><a href = 'update.php?code=".$row["Code"]."' class='fancybox fancybox.iframe'>" . $row["Name"]. "</a></td>
					<td>" . $row["Continent"]. "</td>
					<td>" . $row["Population"]. "</td>
					<td>" . $row["Region"]. "</td>
					<td>" . $row["Capital"]. "</td>
					<td>" . $row["HeadOfState"]. "</td>
					<td>" . $row["GovernmentForm"]. "</td>	
				</tr>";
		}
		$conn->close();
		?>
		</tbody>
	</table>
</div>

</body>
</html>