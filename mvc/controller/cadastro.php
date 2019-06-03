<?php
	require '../model/cliente.php';

	
		 global $pdo;
		$msgErro="";
		
	   /*
	   	  $nome = $_POST['nome'];
	   	 $cpf = $_POST['cpf'];
	     $data = $_POST['data'];
         $contato= $_POST['contato'];
                              
         $bairro= $_POST['bairro'];
         $cidade= $_POST['Cidade'];  
         $email = $_POST['email'];      
         $senha= $_POST['senha'];
		*/
         $nome = "jardriel";
	   	 $cpf = "7777777";
	     $data = "08101997";
         $bairro= "centro";
         $cidade= "aquiraz";
         $contato= "985528894";          
         $email = "root@123";
         $senha= "qwe123";

   		$cliente = new Cliente();
  		$cliente->insert($nome,$cpf,$data,$bairro,$cidade,$contato,$email,$senha);
	  
		

?>