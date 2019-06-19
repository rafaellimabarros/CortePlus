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
  <link rel="stylesheet" href="../../../css/agendamentos.css">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top" style=" font-size: 20px; background:black" >
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../../../img/iconetesouraatt.png" alt="Salao" style="height: 80px; width: 80px;">
      </a>
          <a href="#"style="color: white; font-family: sans-serif;"> Salão Plus </a>
    
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
            <a class="nav-link" href="../salao/servico.php">Serviços</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="AgendamentosSalao.php" style="color:white">Agendamentos</a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link " href="#" style="color: white">
             <?php 
                echo "Bem Vindo $logado"
              ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../classes/sair.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-dange py-5 mb-5" >
    <div class="container ">
      
        <div class="col-lg-12">
        </div>
      
    </div>
  </header>

  

  <!-- Page Content -->
  <div class="container">
    <h1>Agendamentos</h1>
<table class="table col-lg-12">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome do Salão</th>
      <th scope="col">Horário</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
                <?php 
                  $cliente = $pdo->query("SELECT * FROM cliente where email = '$logado'");
                  
                  $dado = $pdo->query("SELECT * FROM clienteagendamento
                    INNER JOIN cliente on cliente.codCliente = clienteagendamento.codCliente
                    INNER JOIN salao on salao.codSalao = clienteagendamento.codSalao where salao.email = '$logado'") ;/*
                    INNER JOIN salao on codSalao = codSalao
                    INNER JOIN servico on codSalaoServico_fk = codServico
                    INNER JOIN funcionamento on codSalaoFuncionamento_fk = codSalaoFuncionamento_fk
                    INNER JOIN forma de pagamento on codSalaoFormaPagamento_fk = codPagamento*/
                  foreach ($dado as $row) {
                  ?>

                <tr>          
                  <td><?php echo $row['codClienteAgendamento'];?></td>            <td><?php echo $row['nome'];?></td>
                  <td><?php echo $row['horaAgendamento']; ?></td>
                  <td><?php echo $row['dataAgendamento']; ?></td>
                  
                  <!--
                  <td>
                    <div class="container-login100-form-btn m-t-32">
                      <button class="login100-form-btn" data-toggle="modal" data-target="#exampleModal<?php echo $row['codClienteAgendamento'];?>" data-whatever="@getbootstrap">
                        Agendamento
                    </button>
                   div modal
                    <div class="modal fade" id="exampleModal<?php echo $row['codClienteAgendamento'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nomeSalao']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="" >
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Serviços:</label>                                  
                                  <?php 
                                  $codSalao = $row['codSalao'];
                                  $dado = $pdo->query("SELECT DISTINCT descricaoServico FROM salao 
                                    INNER JOIN salaoServico on codSalao = codSalao_fk 
                                    INNER JOIN servico on codServico_fk = codServico
                                    WHERE codSalao =' $codSalao' ") ;
                                  

                                  echo "<select name='' id='recipient-name' class='form-control'>";
                                    foreach ($dado as $row) {

                                   echo "<option value='".$row["codServico"]."'>".$row["descricaoServico"]."</option>";
                                  } 
                                echo "</select>";
                                ?>
                                 </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Data e Horário:</label>       
                                <input type="datetime-local" name="" class="form-control" id="message-text" />
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">
                            Agendar
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                     /.div modal--> 
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </table>
      </div>
    </div>
    <!-- /.row -->
 
 
  </div>
  <!-- /.container -->

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

</html>