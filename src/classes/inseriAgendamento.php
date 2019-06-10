<?php 
require ('conexao.php');

			 $codCliente = $_POST["codCliente"];
			 $codSalao = $_POST["codSalao"];
			 $codServico = $_POST["codServico"];
			 $codPagamento = $_POST["codPagamento"];
			 $codFuncionamento = $_POST["codFuncionamento"];
			 $dataAgendamento = $_POST["dataAgendamento"];
			 $horaAgendamento = $_POST["horaAgendamento"];
			
			/*echo $codCliente,$codSalao,$codServico,$codPagamento,$codFuncionamento,$dataAgendamento,$horaAgendamento;*/
	
			if(!empty($codSalao) && !empty($codCliente) && !empty($codServico) && !empty($codPagamento) && !empty($codFuncionamento) && !empty($dataAgendamento) && !empty($horaAgendamento)){

					  $data = $pdo->prepare("SELECT * FROM agendamento WHERE dataAgendamento = :dataAgendamento");
  					  $data->bindValue(":dataAgendamento",$dataAgendamento);
  					  $data->execute();
						
					  $hora = $pdo->prepare("SELECT * FROM agendamento WHERE horaAgendamento = :horaAgendamento");
  					  $hora->bindValue(":horaAgendamento",$horaAgendamento);
  					  $hora->execute();
  					  
  					  
				if($data->rowCount()>0 && $hora->rowCount()>0) {			
					echo "Horário já marcado !!!";
				}else{
					$sql = "INSERT INTO clienteagendamento(codCliente, codSalao,codSalaoServico_fk,codSalaoFuncionamento_fk,codSalaoFormaPagamento_fk, dataAgendamento, horaAgendamento) VALUES(:codCliente,:codSalao,:codSalaoServico_fk,:codSalaoFuncionamento_fk,:codSalaoFormaPagamento_fk,:dataAgendamento,:horaAgendamento)";
							
							

						$stmt = $pdo->prepare($sql);

						$stmt->bindValue(':codCliente',$codCliente);
						$stmt->bindValue(':codSalao',$codSalao);
						$stmt->bindValue(':codSalaoServico_fk',$codServico);
						$stmt->bindValue(':codSalaoFormaPagamento_fk',$codPagamento);
						$stmt->bindValue(':codSalaoFuncionamento_fk',$codFuncionamento);
						
						$stmt->bindValue(':dataAgendamento',$dataAgendamento);
						$stmt->bindValue(':horaAgendamento',$horaAgendamento);
						$stmt->execute();
							/*if($stmt->execute()){
								$stmt = "INSERT INTO agendamento(horaAgendamento) VALUES ('$horaAgendamento')";
			                                    $stmt = Conexao::getInstance()->prepare($stmt);
			                                    $stmt -> execute(); 
							}*/
					echo $stmt->rowCount();	
					if($stmt->rowCount()>0){
						//echo "<script>alert('agendado com sucesso');</script>";
						//header('Location:../pages/cliente/Agendamentos.php');

					}
				}
						
							

			}else{
				echo "Prencha todos os campos!! !!!";


		}
		
		
	

?>