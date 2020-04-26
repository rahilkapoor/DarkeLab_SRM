<?php
	include_once 'dbh.inc.php';

	//if submit is clicked
		$qname = mysqli_real_escape_string($conn, $_POST['qname']);
		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$codearea = mysqli_real_escape_string($conn, $_POST['codearea']);
	
	$insert =  "INSERT INTO users(qname,uname,code)
		VALUES ('$qname', '$user', '$codearea');";

	mysqli_query($conn, $insert);

	header("Location: ../index.php?submit=success");
