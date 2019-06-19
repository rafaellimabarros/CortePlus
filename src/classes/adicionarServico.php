<?php 
require ('conexao.php');

			 $codSalao = $_POST["codSalao"];
			 $descricaoServico = $_POST["descricaoServico"];
			 $precoServico = $_POST["precoServico"];
		
			if(!empty($descricaoServico) && !empty($precoServico)){
				$adicionarServico = $pdo->prepare("INSERT INTO servico(descricaoServico,precoServico) values(:descricaoServico,:precoServico)");
			 	$adicionarServico->bindValue(":descricaoServico",$descricaoServico);
			 	$adicionarServico->bindValue(":precoServico",$precoServico);
  			 	$adicionarServico->execute();
			
			echo $adicionarServico->rowCount();	
					
			}else{
            	echo "<script>alert('Preencha todos os campos')</script>";
                   

			
			}
/*$adicionaServicoSalao = $pdo->prepare("INSERT INTO salaoservico(codSalao_fk,codServico_fk) values(:codSalao,:codServico_fk)");

			$adicionaServicoSalao->bindValue(":codSalao_fk",$codSalao_fk);
			$adicionaServicoSalao->bindValue(":codServico_fk",$codServico_fk);
  			$adicionaServicoSalao->execute();
*/
	

?>