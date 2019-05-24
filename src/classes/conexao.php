<?php try{
		$pdo = new PDO('mysql:host=localhost;dbname=salao','root','vertrigo');
		echo "Conectou no banco ... ";
			;

}catch(PDOException $e){
		echo "ErroR:" . $e->getMessage();
	}

?>