<?php 
require ('conexao.php');

			 $codClienteAgendamento = $_POST["codClienteAgendamento"];
			     $data = str_replace("/", "-", $_POST["data"]);
    				$date = date('Y-m-d', strtotime($data));
			 $hora = $_POST["hora"];

			 
			 
		
			if(!empty($date) && !empty($hora)){
				$adicionarServico = $pdo->prepare("UPDATE clienteagendamento set dataAgendamento = :data and horaAgendamento = :hora where codClienteAgendamento = '$codClienteAgendamento' ");
			 	
			 	$adicionarServico->bindValue(":data",$date);
			 	$adicionarServico->bindValue(":hora",$hora);
  			 	$adicionarServico->execute();
			
			echo $adicionarServico->rowCount();	

			if ($adicionarServico->rowCount()>0) {
				echo "Alterado com sucesso!!!";
			}else{
				echo "Erro ao alterar!!!";
			}
					
			}else{
            	echo "<script>alert('Preencha todos os campos')</script>";
                   

			
			}

?>