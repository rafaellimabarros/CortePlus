<?php 
include ('conexao.php');
	 $nome = $_POST["nome"];
	 $cpf = $_POST["cpf"];
	 $data = $_POST["data"];
	 $bairro = $_POST["bairro"];
	 $cidade = $_POST["cidade"];
	 $contato = $_POST["contato"];
     $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

	
		try {
			$stmt = $pdo->prepare('INSERT INTO cliente(nome,cpf,dataNascimento,bairro,cidade,contato,email,senha) VALUES (:nome,:cpf,:data,:bairro,:cidade,:contato,:email,:senha) ' );

			$stmt->bindValue(":nome",$nome);
			$stmt->bindValue(':cpf',$cpf);
			$stmt->bindValue(':data',$data);
			$stmt->bindValue(':bairro',$bairro);
			$stmt->bindValue(':cidade',$cidade);
			$stmt->bindValue(':contato',$contato);
			$stmt->bindValue(':email',$email);
			$stmt->bindValue(':senha',$senha);
		$stmt->execute();
		$data = $stmt->fetch();
			print_r($data);
		echo $stmt->rowCount();	
			//header('location:index.php');
			
		
	
		} catch (Exception $e) {
			echo $e->getMessage();		
		}

?>