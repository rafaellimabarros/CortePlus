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
  <link href="../../../css/business-frontpage.css" rel="stylesheet">
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
            <a class="nav-link" href="../salao/salao.php">Salões</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Agendamentos.php">Agendamentos</a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link " href="#">
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
  <h1>Meus Agendamentos</h1>
    <div class="row">
<table class="table col-lg-12">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome do Salão</th>
      <th scope="col">Horário</th>
      <th scope="col">Data</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <?php 
                  $cliente = $pdo->query("SELECT * FROM cliente where email = '$logado'");
                  
                  $dado = $pdo->query("SELECT * FROM clienteagendamento
                    INNER JOIN cliente on cliente.codCliente = clienteagendamento.codCliente
                    INNER JOIN salao on salao.codSalao = clienteagendamento.codSalao where cliente.email = '$logado'") ;/*
                    INNER JOIN salao on codSalao = codSalao
                    INNER JOIN servico on codSalaoServico_fk = codServico
                    INNER JOIN funcionamento on codSalaoFuncionamento_fk = codSalaoFuncionamento_fk
                    INNER JOIN forma de pagamento on codSalaoFormaPagamento_fk = codPagamento*/
                  foreach ($dado as $row) {
                  ?>
      <th scope="row"><?php echo $row['codClienteAgendamento'];?></th>       
        <th scope="row"><?php echo $row['nomeSalao'];?></th>
        <th scope="row"><?php echo $row['horaAgendamento']; ?></th>
        <th scope="row"><?php echo $row['dataAgendamento']; ?></th>
        <th>
          <!-- Botão para acionar modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Editar<?php echo $row['codClienteAgendamento'];?>">
  Apagar Agendamento
</button>

<!-- Modal -->
<div class="modal fade" id="Editar<?php echo $row['codClienteAgendamento'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="../../classes/apagarAgendamento.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja Realmente Apagar o Agendamento?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="codClienteAgendamento" value="<?php echo $row['codClienteAgendamento'];?>">
        <div>
          <label for="nomeSalao">Nome:</label>
          <h5> <?php echo $row['nomeSalao'];?></h5>
        </div>
        <div>
          <label for="nomeSalao">Data do Agendamento:</label>
          <input type="text" name="data" value="<?php echo $row['dataAgendamento'];?>" id="data">
        </div>
        <div>

          <label for="nomeSalao">Horário:</label>
          <input type="text" name="hora" value="<?php echo $row['horaAgendamento'];?>" id="hora">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger">Excluir</button>
      </div>
      </form>
    </div>
  </div>
</div>
        </th>
    </tr>
       <?php } ?>
  </tbody>
</table>
 
             


    
               
               

                          </div>
                        </div>
                      </div>
                    </div>
                     <!-- /.div modal--> 
                    </div>
                  </td>
               
      </div>
    </div>
    <!-- /.row -->
 
 
  </div>
  <!-- /.container -->

  <!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4" style="background-color: rgb(23, 36, 41);margin-top: 100px;" id="sobre">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">  
      <!-- Grid row -->
      <div class="row" style="font-family: sans-serif;color: white;">
  
        <!-- Grid column -->
        <div class="col-md-4 mx-auto">
  
          <!-- Content -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Quem Somos?</h5>
          <p align="justify"> A equipe SalãoPlus tem como principal objetivo agilizar a sua vida! com o nosso sistema os salões obterão um maior 
            controle e gerência de tempo. </p>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">

  
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-2 mx-auto">
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Contato</h5>
  
            <p>Centro,Aquiraz</p>
            <p> SalaoPlus@Gmail.com.br</p>
            <p> (85) 985528894 </p>          
        
          </div>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
  

    <!-- Social buttons -->

    <ul class="list-unstyled list-inline text-center" >
      <li class="list-inline-item" >
        <a class="btn-floating btn-fb mx-1">
          <i class="fab fa-facebook-f"> </i>
          <img src="../../../img/iconeFace.png" style="width: 50px;">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
          <i class="fab fa-twitter"> </i>
          <img src="../../../img/iconeInsta.png" style="width: 50px;">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
          <i class="fab fa-google-plus-g"> </i>
          <img src="../../../img/iconeTwitter.png" style="width: 50px;">
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1">
          <i class="fab fa-linkedin-in"> </i>
          <img src="../../../img/IconeGit.png" style="width: 50px;">
        </a>
      </li>
    </ul>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"style="background-color: black;color:white;">© 2019 Copyright: SalãoPlus
    </div>
    <!-- Copyright -->
  
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
   <script type="text/javascript">
    var $m = jQuery.noConflict()
        $m(document).ready(function(){
        $m("#data").mask("99/99/9999");
        $m("#cpf").mask("999.999.999-99");
        $m("#hora").mask("99:99:99");
        $m("#telefone").mask("(99) 9999-9999");
    });
</script>  
</body>

</html>