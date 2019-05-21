<?php

	class salaoPlus{
	public function conectar()
	{
		global $pdo;
		try {
			$dbname = "localhost";
			$servidor = "salaoplus";
			$usuario = "root";
			$senha = "vertrigo";

			$pdo = new PDO("mysql:dbname=".$dbname.";servidor=".$servidor, $usuario, $senha);
            echo "Conectado";
		} catch (Exception $e) {
			$e->getMessage();
		}
	}
	}



?>