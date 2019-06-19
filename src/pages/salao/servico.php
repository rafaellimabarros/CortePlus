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

  <title>Configuração - Salões Plus</title>

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
            <a class="nav-link" href="homeSalao.php">Home
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
  <!-- AdicionaServico -->
  <div class=" offset-lg-5">
      
        <fieldset style="border:1px solid black;width: 300px;padding: 30px; border-radius: 10px;">
          <legend>Adicionar Serviços</legend>
          <form action="../../classes/adicionarServicoSalao.php" method="post">
          <div class="form-row">
            <div class="">
              <?php $dado = $pdo->query("SELECT DISTINCT * FROM salao where email = '$logado'");
                            foreach ($dado as $row) { ?>
              <input type="hidden" name="codSalao" id="codSalao" value="<?php echo $row['codSalao'] ?>">
              <?php } ?>
              <label class="sr-only" for="inlineFormInputName">Serviço</label>
              <select class="form-control" name="codServico" id="codServico">
                <option value="">Selecione Servico</option>
                 <?php 
                include "../classes/conexao.php";
                          $dado = $pdo->query('SELECT DISTINCT * FROM servico
                            ') ;
                            foreach ($dado as $row) { ?>
                            <option value="<?php echo $row['codServico'] ?>"><?php echo $row['descricaoServico'] ?>
                  
                            </option>
                        <?php } ?>
              </select>
            </div>
            <div class="col-auto my-1">
              <button type="submit" class="btn btn-primary">Adicionar Serviços</button>
            </div>
          </div>
        </form>
        </fieldset>
      
  </div>
  <!-- \. Adiciona servico -->
  <!-- Page Content -->
  <div class=" offset-lg-2">
    <div class="row">
      <h1>Serviços</h1>
    </div>
    <table class="table col-lg-10">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Descrição Serviço</th>
          
          
        </tr>
      </thead>
      <tbody>
                 <?php
                    $add = $pdo->query("SELECT codSalaoServico_fk FROM salao");
                    $dado = $pdo->query("SELECT * FROM salaoservico
                                          INNER JOIN servico on codServico_fk = codServico
                                          INNER JOIN salao on  codSalao = codSalao_fk
                                          where '$logado' = email
                                            ") ;

                    foreach ($dado as $row) { ?>
                    <tr>          
                      <td><?php echo $row['codSalaoServico'];?></td>   
                      <td><?php echo $row['descricaoServico'];?></td>
                      <td>
                
                      </td>                         
                        </div>
                      </td>
                    </tr>
                    <!-- Modal Adicionar Dados-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form action="../../classes/adicionarServico.php" method="post">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Salão Plus - Cadastrar Serviço</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <input type="text" class="form-control input100" id="codSalao" name="descricaoServico" value="<?php echo $row['codSalao'];?>">
                                        <label for="nomeServico">Serviço:</label>
                                         <input type="text" name="descricaoServico" id="descricaoServico" class="form-control input100" required="true">
                                      </div>
                                      <div class="form-group">
                                        <label for="precoServico">Preço:</label>                                  
                                         <input type="text" name="precoServico" id="precoServico" class="form-control" required />
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">
                                          Save changes
                                      </button>
                                    </div>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- .\ Modal Adicionar Dados-->
                 
                   
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
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>