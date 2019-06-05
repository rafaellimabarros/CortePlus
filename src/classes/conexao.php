<?php try{
		$pdo = new PDO('mysql:host=localhost;dbname=salaoplusatualizado','root','vertrigo');
		echo "Conectou no banco ... ";
			;

}catch(PDOException $e){
		echo "ErroR:" . $e->getMessage();
	}

?>