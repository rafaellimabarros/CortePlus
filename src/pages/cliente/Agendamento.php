<?php
    require '../../classes/conexao.php';
  session_start();
  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('location:../login.html');
  }
 
$logado = $_SESSION['email'];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Agendamento - Salões Plus</title>

  <!-- Bootstrap core CSS -->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../Salao%20Plus/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../css/index.css">
  <link rel="icon" type="image/png" href="../../../images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../../css/util.css">
  <link rel="stylesheet" type="text/css" href="../../../css/main.css">
<!--===============================================================================================-->
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../../../index.html">Salões Plus</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" >
            <a class="nav-link" href="../../../index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../salao/salao.php">Salões</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Serviços</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Agendamentos.php">Agendamentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
             <?php 
                echo "Bem Vindo $logado"
              ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../classes/sair.php">sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Salão Plus</h1>
          <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="wrap-login100 p-t-30 p-b-50" style="margin-left: 30%">
     <fieldset >
        <legend>Agendamento</legend>
           <!-- div form -->
                <form class="login100-form validate-form p-b-33 p-t-5" action="../../classes/inseriAgendamento.php" method="POST">

                    <div class="wrap-input100 validate-input" data-validate = "salao">
                      <select name="codSalao" class="input100"
                      required="true">
                        <option>Selecione o salao...</option>
                            <?php 
                            $dado = $pdo->query('SELECT DISTINCT * FROM salao') ;
                              foreach ($dado as $row) { ?>
                            <option value="<?php echo $row['codSalao'] ?>"><?php echo $row['nomeSalao'] ?></option>
                            <?php } ?>
                      </select>
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                   <div>
                    <?php
                       $dado = $pdo->query('SELECT * FROM cliente');
                        foreach ($dado as $row) { ?>
                    <input type="hidden" name="codCliente" value="<?php
                     echo $row['codCliente'] ?>">
                    <?php  } ?>
                   </div>
                     <div class="wrap-input100 validate-input" data-validate = "servico">
                      <select name="codServico" class="input100" 
                      required="true">
                        <option>Selecione o servico...</option>
                            <?php 
                            $dado = $pdo->query('SELECT DISTINCT * FROM servico') ;
                              foreach ($dado as $row) { ?>
                            <option value="<?php echo $row['codServico'] ?>"><?php echo $row['descricaoServico'] ?></option>
                            <?php } ?>
                      </select>
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                       <div class="wrap-input100 validate-input">
                      <select name="codPagamento" class="input100"
                      required="true">
                        <option>Selecione a forma de pagamento...</option>
                            <?php 
                            $dado = $pdo->query('SELECT DISTINCT * FROM formadepagamento') ;
                              foreach ($dado as $row) { ?>
                            <option value="<?php echo $row['codPagamento'] ?>"><?php echo $row['descricaoPagamento'] ?></option>
                            <?php } ?>
                      </select>
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "funcionamento">
                       <select name="codFuncionamento" class="input100"
                      required="true" type="hidden">
                            <?php 
                            $dado = $pdo->query('SELECT DISTINCT * FROM funcionamento') ;
                              foreach ($dado as $row) { ?>
                            <option value="<?php echo $row['codFuncionamento'] ?>"><?php echo $row['descricaoFuncionamento'] ?></option>
                            <?php } ?>
                      </select>
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "agendamento">
                       <input type="time" name="horaAgendamento" class="input100">
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "agendamento">
                       <input type="date" name="dataAgendamento" class="input100">
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                      <button class="login100-form-btn">
                        agendar
                      </button>
                    </div>  

                  </form>
     </fieldset>
      </div>
  </div>
<!-- \. Page Content -->
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Salões Plus 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../../Salao%20Plus/vendor/jquery/jquery.min.js"></script>
  <script src="../../Salao%20Plus/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
--===============================================================================================-->
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

</html>