<?php
	require 'config.php';
	class Conexao{
		private static $instance;

		public static function getInstance()
		{
			if(!isset(self::$instance)){
				try{
					self::$instance = new PDO('mysql:servidor=' . servidor . ';dbname=' . dbname,usuario,senha);
					echo "Deu certo";
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			return self::$instance;
		}
		public static function prepare($sql){
			return self::getInstance()->prepare($sql);
		}
		
	}
?>