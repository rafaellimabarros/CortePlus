<?php try{
		$pdo = new PDO('mysql:host=localhost;dbname=salaoplus','root','vertrigo');
		$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
		echo "Conectou no banco ... ";
			;

}catch(PDOException $e){
		echo "ErroR:" . $e->getMessage();
	}

?>