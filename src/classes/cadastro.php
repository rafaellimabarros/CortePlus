<!DOCTYPE html>
<html>
<head>
	<title>Cadastrando ... </title>
	<script type="text/javascript">
		function msgOk(){
			
			window.location.href = "../pages/login.html";
		}
		function msgError(){
			alert("Falha ao autenticar! "+ "Verifique os dados e tente novamente");
			window.location.href = "../pages/cadastro.html";
		}

	</script>
</head>
<body>

</body>
</html><?php 
require ('conexao.php');

	 $cpf = $_POST["cpf"];
	 $cidade = $_POST["cidade"];
	 $bairro = $_POST["bairro"];
	 $logradouro = $_POST["logradouro"];
	 $nome = $_POST["nome"];
	 $email = $_POST["email"];
	 $senha = $_POST["senha"];
	 $data = $_POST["data"];
	 $contato = $_POST["contato"];
	
	
		
			$sql = 'INSERT INTO cliente(cpf,cidade,bairro,logradouro,nome,email,senha,dataNascimento,contato)VALUES(:cpf,:cidade,:bairro,:logradouro,:nome,:email,:senha,:data,:contato)';

			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(':cpf',$cpf);
			$stmt->bindValue(':cidade',$cidade);
			$stmt->bindValue(':bairro',$bairro);
			$stmt->bindValue(':logradouro',$logradouro);
			$stmt->bindValue(':nome',$nome);
			$stmt->bindValue(':email',$email);
			$stmt->bindValue(':senha',$senha);
			$stmt->bindValue(':data',$data);
			$stmt->bindValue(':contato',$contato);

			$stmt->execute();
		
		echo $stmt->rowCount();	

		if( $stmt->rowCount()>0){
			echo "<script>msgOk()</script>";
		}else{
			echo "<script>msgError()</script>";
			
		}
		
		
	

?>