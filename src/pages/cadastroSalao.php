<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro de salões</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../img/index.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Cadastro de Salões 
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="../classes/cadastroSalao.php" method="post">
					<div class="wrap-input100 validate-input" data-validate = "Nome do Salão">
						<input class="input100" type="text" name="nomeSalao" placeholder="Nome do Salão" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Nome do Responsavel">
						<input class="input100" type="text" name="responsavel" placeholder="Nome do Responsavel" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "CNPJ">
						<input class="input100" type="number" name="cnpj" placeholder="CNPJ" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "logradouro">
						<input class="input100" type="text" name="logradouro" placeholder="logradouro" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "bairro">
						<input class="input100" type="text" name="bairro" placeholder="bairro" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "cidade">
						<select name="cidade" id="cidade"  class="input100">
							<option value="">Selecione a Cidade...</option>
							 <?php 
							 	require "../classes/conexao.php";
                  				$dado = $pdo->query('SELECT DISTINCT cidade FROM salao') ;
                    				foreach ($dado as $row) { ?>
		                  			<option value="<?php echo $row['cidade'] ?>"><?php echo $row['cidade'] ?>
		              
		                  			</option>
                  			<?php } ?>
						</select>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "contato">
						<input class="input100 form-control phone-ddd-mask" type="number" name="contato" 
						placeholder="contato" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "codServico">
						 <select class="input100" type="" name="codServico" placeholder="codServico" required>
		                  <option value="">Escolha o principal Serviço ...</option>
							 <?php 
							 	require "../classes/conexao.php";
                  				$dado = $pdo->query('SELECT DISTINCT * FROM servico') ;
                    				foreach ($dado as $row) { ?>
		                  			<option value="<?php echo $row['codServico'] ?>"><?php echo $row['descricaoServico'] ?>
		              
		                  			</option>
                  			<?php } ?>
		                </select>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "codFuncionamento">
						 <select class="input100" type="" name="codFuncionamento"  required>
		                  <option value="">Horário de Funcionamento ...</option>
							 <?php 
							 	require "../classes/conexao.php";
                  				$dado = $pdo->query('SELECT DISTINCT * FROM funcionamento') ;
                    				foreach ($dado as $row) { ?>
		                  			<option value="<?php echo $row['codFuncionamento'] ?>"><?php echo $row['horarioAbertura'] ?> - <?php echo $row['horarioEncerramento'] ?>
		              
		                  			</option>
                  			<?php } ?>
		                </select>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "codPagamento">
						<select class="input100" type="" name="codPagamento"  required>
		                  <option value="">Forma de Pagamento ...</option>
		                  <option value="1">Dinheiro</option>
		                  <option value="2">Cartão de Credito</option>
		                  <option value="3">Cartão de Débito</option>
		                 
		                </select>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "email">
						<input class="input100" type="email" name="email" placeholder="Email" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "senha">
						<input class="input100" type="password" name="senha" placeholder="senha" required="true">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Cadastro
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>