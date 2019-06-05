<?php 
require ('conexao.php');

			 $codCliente = $_POST["codCliente"];
			 $codSalao =  $row['codSalao'];
			 $codSalaoServico_fk = $_POST["codSalaoServico_fk"];
			 $codSalaoFuncionamento_fk = $_POST["codSalaoFuncionamento_fk"];
			 $codSalaoFormaPagamento_fk = $_POST["codSalaoFormaPagamento_fk"];
			 
			
		
			$sql = 'INSERT INTO agendamento(codCliente,codSalao,codSalaoServico_fk,codSalaoFuncionamento_fk,codSalaoFormaPagamento_fk)VALUES(:codCliente,:codSalao,:codSalaoServico_fk,:codSalaoFuncionamento_fk,:codSalaoFormaPagamento_fk)';

			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(':codCliente',$codCliente);
			$stmt->bindValue(':codSalao',$codSalao);
			$stmt->bindValue(':codSalaoServico_fk',$codSalaoServico_fk);
			$stmt->bindValue(':codSalaoFuncionamento_fk',$codSalaoFuncionamento_fk);
			$stmt->bindValue(':codSalaoFormaPagamento_fk',$codSalaoFormaPagamento_fk);
			
			$stmt->execute();
		
		echo $stmt->rowCount();	

		
		
	

?>