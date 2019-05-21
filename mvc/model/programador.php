<?php
	
	class Programador extends Cliente{
		protected $linguagem;
		function __construct($nome , $linguagem)
		{
			$this->nome = $nome;
			$this->linguagem = $linguagem;

			echo "<br>O objeto " .__class__." Foi instanciado<br>";
		}

		public function setLinguagem($linguagem)
		{
			$this->linguagem = $linguagem;
		}
		public function getLinguagem()
		{
			return $this->linguagem;
		}
	}

?>