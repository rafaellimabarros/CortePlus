<?php 
include ('conexao.php');

 	$email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = $pdo->prepare('SELECT * FROM cliente WHERE email = :email && senha = :senha');

   	$sql->bindValue(':email',$email);
	$sql->bindValue(':senha',$senha);
	$sql->execute();
	$sql->rowCount();
	if($sql->rowCount() ==1){
		echo "<script>alert('Deu certo')</script>";
	}else{
		echo "<script>não deu certo()</script>";
	}	

?>

