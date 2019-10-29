<?php
	include_once('config.php');
	$masach = $_GET['masach'];
	$sql = "DELETE FROM sach
			WHERE masach = $masach";
	mysqli_query($conn, $sql);
	header('location:index.php');
?>