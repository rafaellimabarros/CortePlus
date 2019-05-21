<?php 
	require 'cliente.php';
	require 'programador.php';
	require 'conexao.php';
	/*$pessoa = new Cliente("Jardriel");
	$pessoa->setIdade(21);
	echo "Seu nome é: " . $pessoa->getNome()."<br>";
	echo "Sua idade é: " . $pessoa->getIdade()." Anos";*/

	$programador = new cliente("Jardriel","00000","08/10/1997","985528894","centro","aquiraz","root@123","qwe123");
	echo $programador->getNome() . "<br>";
	echo $programador->getCpf(). "<br>";
	echo $programador->getDataNascimento(). "<br>";
	echo $programador->getContato(). "<br>";
	echo $programador->getBairro(). "<br>";
	echo $programador->getCidade(). "<br>";
	echo $programador->getEmail(). "<br>";
	echo $programador->getSenha(). "<br>";


	$corte = new salaoPlus;
	echo $corte->conectar();
	

?>