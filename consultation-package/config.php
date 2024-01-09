<?php
	$conn = new mysqli("localhost","root","","consultation_package");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>



