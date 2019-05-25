<?php 
include ('conexao.php');
session_start();

 	$email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = $pdo->prepare('SELECT * FROM cliente WHERE email = :email && senha = :senha');

   	$sql->bindValue(':email',$email);
	$sql->bindValue(':senha',$senha);
	$sql->execute();
	$sql->rowCount();
	if($sql->rowCount() >0){
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		echo "<script>alert('Deu certo')</script>";
		header('location:../pages/cliente/homeCliente.php');	
	}else{
		unset ($_SESSION['email']);
  		unset ($_SESSION['senha']);
		echo "<script>alert('não deu certo')</script>";

		header('location:../pages/login.html');
	}	

?>

