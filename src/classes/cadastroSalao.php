<!DOCTYPE html>
<html>
<head>
	<title>Cadastrando Salão ... </title>
	<script type="text/javascript">
		function msgOk(){
			
			window.location.href = "../pages/loginSalao.html";
		}
		function msgError(){
			alert("Falha ao autenticar! "+ "Verifique os dados e tente novamente");
			window.location.href = "../pages/cadastroSalao.html";
		}

	</script>
</head>
<body>

</body>
</html><?php 
require ('conexao.php');

			 $responsavel = $_POST["responsavel"];
			 $cnpj = $_POST["cnpj"];
			 $nomeSalao = $_POST["nomeSalao"];
			 $cidade = $_POST["cidade"];
			 $bairro = $_POST["bairro"];
			 $logradouro = $_POST["logradouro"];
			 $contato = $_POST["contato"];	
			 $codServico = $_POST["codServico"];
			 $codFuncionamento = $_POST["codFuncionamento"];
			 $codPagamento = $_POST["codPagamento"];
			 $email = $_POST['email'];
    		 $senha = $_POST['senha'];

			 $imagem = $_FILES["imagem"]['name'];
			 $UP['pasta'] = '../../fotoSalao/';
			 $UP['tamanho'] = 1024 * 1024 * 100;
			 $UP['extensoes'] = array('png','jpg','jpeg','gif');
			 $UP['renomeia'] = false;

			 if($imagem != null){
			 		$extensoes = strtolower(end(explode('.', $_FILES['imagem']['name'])));
			 		if(array_search($extensoes,$UP['extensoes'])===false){

			 			echo "<META HHTTP-EQUIV=REFRESH CONTENT= '0;URL=http://localhost/SaloesPlus/src/pages/salao/cadastroSalao.php'>
			 			<script>Imagem não foi cadastrada Extensão invalida!!!!</script>";
			 		}else{

			 				$nomeFinal = $_FILES['imagem']['name'];
			 				if(move_uploaded_file($_FILES['imagem']['tmp_name'],$UP['pasta'].$nomeFinal)){

							$sql = "INSERT INTO salao(nomeResponsavel,cnpj,nomeSalao,cidade,bairro,logradouro,contato,codSalaoServico_fk,codSalaoFuncionamento_fk,codSalaoFormaPagamento_fk,senha,email,imagem)VALUES(:responsavel,:cnpj,:nomeSalao,:cidade,:bairro,:logradouro,:contato,:codServico,:codFuncionamento,:codPagamento,:senha,:email,:nomeFinal)";

			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(':responsavel',$responsavel);
			$stmt->bindValue(':cnpj',$cnpj);
			$stmt->bindValue(':nomeSalao',$nomeSalao);
			$stmt->bindValue(':cidade',$cidade);
			$stmt->bindValue(':bairro',$bairro);
			$stmt->bindValue(':logradouro',$logradouro);
			$stmt->bindValue(':contato',$contato);
			$stmt->bindValue(':codServico',$codServico);
			$stmt->bindValue(':codFuncionamento',$codFuncionamento);
			$stmt->bindValue(':codPagamento',$codPagamento);
			$stmt->bindValue(':senha',$senha);
			$stmt->bindValue(':email',$email);
			$stmt->bindValue(':nomeFinal',$nomeFinal);
			$stmt->execute();
		
		echo $stmt->rowCount();	

		if( $stmt->rowCount()>0){
			echo "<script>msgOk()</script>";
		}else{
			echo "<script>msgError()</script>";
			
		}	 		
			 	
			}
			}
			 }

		
		
		
	

?>