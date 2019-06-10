<?php 
	session_start();
	unset(
		$_SESSION['nome'] , 
		$_SESSION['email'] , 
		$_SESSION['senha'] 
	);
	header('location:../../index.html')
?>