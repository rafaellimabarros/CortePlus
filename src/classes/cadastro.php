<?php 
require ('conexao.php');
	 $nome = $_POST["nome"];
	 $cpf = $_POST["cpf"];
	 $data = $_POST["data"];
	 $bairro = $_POST["bairro"];
	 $cidade = $_POST["cidade"];
	 $contato = $_POST["contato"];
     $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

	
		
			$sql = 'INSERT INTO cliente(nome,dataNascimento,contato,cpf,bairro,cidade,email,senha)VALUES(:nome,:data,:contato,:cpf,:bairro,:cidade,:email,:senha)';

			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(':nome',$nome);
			$stmt->bindValue(':cpf',$cpf);
			$stmt->bindValue(':data',$data);
			$stmt->bindValue(':bairro',$bairro);
			$stmt->bindValue(':cidade',$cidade);
			$stmt->bindValue(':contato',$contato);
			$stmt->bindValue(':email',$email);
			$stmt->bindValue(':senha',$senha);

			$stmt->execute();
		
		echo $stmt->rowCount();	
			header('location:pages/cliente/homeCliente.php');
			
		
	

?>