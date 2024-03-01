<?php
	include('connection.php');

		$id=$_GET['id'];
		$sql = "DELETE FROM books WHERE id = $id";
		$conn->query($sql);
				

	header('location: index.php');
?>
