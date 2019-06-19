<?php 
require ('conexao.php');

			 $codSalao = $_POST["codSalao"];
			 $codServico = $_POST["codServico"];
			 
		
			if(!empty($codSalao ) && !empty($codServico)){
				$adicionarServico = $pdo->prepare("INSERT INTO salaoservico(codSalao_fk,codServico_fk) values(:codSalao,:codServico)");
			 	$adicionarServico->bindValue(":codSalao",$codSalao);
			 	$adicionarServico->bindValue(":codServico",$codServico);
  			 	$adicionarServico->execute();
			
			echo $adicionarServico->rowCount();
					if ($adicionarServico->rowCount()>0) {
						 header('location:../pages/salao/servico.php');

					}else{
						echo "Erro ao inserir ao banco";
					}
			}else{
            	echo "<script>alert('Preencha todos os campos')</script>";
					header("Refresh:1;url../pages/salao/servico.php");                   			
			}
/*$adicionaServicoSalao = $pdo->prepare("INSERT INTO salaoservico(codSalao_fk,codServico_fk) values(:codSalao,:codServico_fk)");

			$adicionaServicoSalao->bindValue(":codSalao_fk",$codSalao_fk);
			$adicionaServicoSalao->bindValue(":codServico_fk",$codServico_fk);
  			$adicionaServicoSalao->execute();
*/
	

?>