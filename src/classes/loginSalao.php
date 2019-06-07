<!DOCTYPE html>
<html>
<head>
	<title>valida</title>
	<script type="text/javascript">
		function msgOk(){
			
			window.location.href = "../pages/salao/homeSalao.php";
		}
		function msgError(){
			alert("Falha ao autenticar! "+"<br>"+ "Verifique usuario e senha");
			window.location.href = "../pages/loginSalao.html";
		}

	</script>
</head>
<body>

</body>
</html>

<?php 
include ('conexao.php');

 	$email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare('SELECT * FROM salao WHERE email = :email && senha = :senha');

   	$sql->bindValue(':email',$email);
	$sql->bindValue(':senha',$senha);
	$sql->execute();
	$sql->rowCount();
	if($sql->rowCount() >0){
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		echo "<script>msgOk()</script>";
	}else{
		echo "<script>msgError()</script>";
	}	

?>

