<?php
	session_start();
	require ('conexao.php');
	$codClienteAgendamento = $_POST["codClienteAgendamento"];
	$apagar = $pdo->prepare("DELETE  FROM clienteagendamento where codClienteAgendamento = :codClienteAgendamento");
	$apagar->bindValue(":codClienteAgendamento",$codClienteAgendamento);
	$apagar->execute();
	echo $apagar->rowCount();

	if($apagar->rowCount()>0){
			echo "<script>alert('Agendamento foi Apagado!!!!')</script>";
			header('refresh:0.5;url=../pages/cliente/Agendamentos.php');	
	}else{
		echo "<script>alert('Problema ao apagar!!!!')</script>";
		header('refresh:0.5;url=../pages/cliente/Agendamentos.php');
	}

?>