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
    $dado = $pdo->query("SELECT * FROM salaoservico
                                          INNER JOIN servico on codServico_fk = codServico
                                          INNER JOIN salao on codSalao_fk = codSalao
                                          where '$logado' = email
                                            ") ;

    foreach ($dado as $row) {
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
            <a class="nav-link" href="../salao/salao.php">Salões</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="AgendamentosSalao.php" style="color:white">Agendamentos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="configuracao.php">Configuração</a>
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
    <div class="detalhes">        
        <fieldset style="border:1px solid black; padding: 70px;border-radius:10px;">
          <legend>Dados Cadastrais</legend>
           <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome do Salão:</label>
                    <input type="text" class="form-control" id="nomeSalao" value="<?php echo $row['nomeSalao'];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Responsável</label>
                    <input type="text" class="form-control" id="responsavel" value="<?php echo $row['nomeResponsavel'];?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputAddress">Endereço</label>
                    <input type="text" class="form-control" id="endereco" value="<?php echo $row['logradouro'];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="cnpj">Cnpj</label>
                    <input type="text" class="form-control" id="cnpj" value="<?php echo $row['cnpj'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Bairro</label>
                  <input type="text" class="form-control" id="bairro" value="<?php echo $row['bairro'];?>">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="cidade" value="<?php echo $row['cidade'];?>">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="contato">Contato</label>
                    <input type="text" class="form-control" id="contato" value="<?php echo $row['contato'];?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputCity">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $row['email'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required="true">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
              <!-- Button trigger modal -->
              <button type="submit" class="btn btn-warning" 
              data-toggle="modal" data-target="#exampleModal2">Alterar</button>
          </form>
        </fieldset>
    </div>
  
    <h1>Serviços</h1>
    <table class="table col-lg-12">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Descrição Serviço</th>
          <th scope="col">Preço ( R$ ) </th>
          <th scope="col">Ações</th>
          
        </tr>
      </thead>
      <tbody>
                    <?php 
                      $cliente = $pdo->query("SELECT * FROM cliente where email = '$logado'");
                      
                  /*
                        INNER JOIN salao on codSalao = codSalao
                        INNER JOIN servico on codSalaoServico_fk = codServico
                        INNER JOIN funcionamento on codSalaoFuncionamento_fk = codSalaoFuncionamento_fk
                        INNER JOIN forma de pagamento on codSalaoFormaPagamento_fk = codPagamento*/
                      
                      ?>

                    <tr>          
                      <td><?php echo $row['codSalaoServico'];?></td>   
                      <td><?php echo $row['descricaoServico'];?></td>
                      <td><?php echo $row['precoServico'];?></td>
                      <td>
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Adicionar
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditarServico">
                              Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirServico">
                              Excluir
                            </button>
                      </td>                         
                        </div>
                      </td>
                    </tr>
                    <!-- Modal Adicionar Dados-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Salão Plus - Cadastrar Serviço</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                    <label for="nomeServico">Serviço:</label>
                                    <input type="text" class="form-control" id="nomeServico">
                                  </div>
                                  <div class="form-group">
                                    <label for="precoServico">Preço:</label>                                  
                                     <input type="text" name="precoServico" class="form-control" onkeyup="maskIt(this,event,'###.###.###,##',true,{pre:'R$'})" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- .\ Modal Adicionar Dados-->
                     <!-- Modal Alterar Dados-->
                        <div class="modal fade" id="EditarServico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Salão Plus - Alterar Serviço</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                    <label for="nomeServico">Serviço:</label>
                                    <input type="text" class="form-control" id="nomeServico" value="<?php echo $row['descricaoServico'];?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="precoServico">Preço:</label>                                  
                                     <input type="text" name="precoServico" class="form-control" onkeyup="maskIt(this,event,'###.###.###,##',true,{pre:'R$'})" value="<?php echo $row['precoServico'];?>" />
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- .\ Modal Alterar Dados-->
                    <!-- Modal Alterar Salao-->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Salão Plus - <?php echo $row['nomeSalao'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Deseja Realmente fazer alterações no <?php echo $row['nomeSalao'];?> ?
                              </div>
                              <div class="modal-footer">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- .\ Modal Dados-->
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