<?php
require_once("connection.php");
$code = $_GET['code'];
$sqlDelete = "DELETE FROM country WHERE Code = '$code'";
$conn->query($sqlDelete);

echo "<script>
	alert('Deleted.');
	window.location.href = 'select.php';
</script>";


$conn->close();
?>