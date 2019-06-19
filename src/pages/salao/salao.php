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

  <title>Salões Plus</title>

  <!-- Bootstrap core CSS -->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../../Salao%20Plus/css/business-frontpage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
       <a class="navbar-brand" href="index.html">
        <img src="../../../img/iconetesouraatt.png" alt="Salao" style="height: 80px; width: 80px;">
      </a>
      <a class="navbar-brand" href="#">Salões Plus</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cliente/Agendamentos.php">Agendamentos</a>
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
  <header class="bg-dange py-5 mb-5" >
    <div class="container h-100">
      <div class="row h-100 align-items-center back">
        <div class="col-lg-12">
            <div class="index"> 
              <h1>Salões</h1>
      <p>Aqui você poderá encontrar os melhores salões que estão cadastrados em nosso site. Você poderá ver preços de serviços, endereços, telefones e agendar o seu com apenas 1 clique! Salão Plus sua vida mais bela.  </p>
      <a href="#Destaques">Visitar Salões</a>
    </div>      

        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <!-- row -->
    <div class="row">
        <!-- div principal-->
        <div class="principal">
          <!-- div filtros-->
            <div class="filtros" id="Destaques">
        

            </div>
            <!-- /.div filtros-->
            <!-- div dados-->

            <div class="dados">
              
                <?php 
                  $dado = $pdo->query('SELECT * FROM salao ') ;

                  foreach ($dado as $row) {

                  ?>

                   <div class="card">
                      <div class="card-body">
                        <img class="card-img-top" src="<?php echo "../../../fotoSalao/".$row['imagem'];?>" alt="Card image cap">

                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nomeSalao']; ?></h5>
                        <p class="card-text">Endereço:<?php echo $row['logradouro']; ?></p>
                        <p class="card-text">Bairro:<?php echo $row['bairro']; ?></p>
                        <p class="card-text">Contato:<?php echo $row['contato']; ?></p>
                        <p class="card-text">Email:<?php echo $row['email']; ?></p>

                      </div>
                        
                    <div class="container-login100-form-btn m-t-32">
                      <button class="login100-form-btn btn-primary"  data-toggle="modal" data-target="#exampleModal<?php echo $row['codSalao'];?>" data-whatever="@getbootstrap">
                        Agendar
                    </button>
                  <!-- div modal-->
                    <div class="modal fade" id="exampleModal<?php echo $row['codSalao'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nomeSalao']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="../../classes/inseriAgendamento.php" method="post" >
                              <input type="hidden" value="<?php echo $row['codSalao']; ?>" name="codSalao">
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Nome:<?php echo $row['nomeSalao']; ?></label>       
                               <h5 class="modal-title" id="exampleModalLabel" name="nome">
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Serviços:</label>
                                  
                                  <?php 
                                  $codSalao = $row['codSalao'];
                                  $dado = $pdo->query("SELECT DISTINCT * FROM servico
                                    inner join salaoservico on codServico = codServico_fk
                                    inner join salao on codSalao = codSalao_fk
                                    where codSalao_fk = '$codSalao'") ;
                                  
                                  echo "<select name='codServico' id='recipient-name' class='form-control'>";
                                    foreach ($dado as $row) {
                                   echo "<option value='".$row["codServico"]."'>".$row["descricaoServico"]."</option>";
                                  } 
                                echo "</select>";
                                ?>
                                 </div>
                                
                             <div class="wrap-input100 validate-input">
                              <label for="recipient-name" class="col-form-label">Forma de Pagamento:</label>
                              <select name="codPagamento" class="input100 form-control"
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
                      <label for="recipient-name" class="col-form-label">Funcionamento:</label>
                       <select name="codFuncionamento" class="input100 form-control"
                      required="true" type="hidden">
                            <?php 
                            $dado = $pdo->query('SELECT DISTINCT * FROM funcionamento ');
                              
                              
                              
                              foreach ($dado as $row) { ?>
                            <option value="<?php echo $row['codFuncionamento'] ?>"><?php echo $row['descricaoFuncionamento'] ?></option>
                            <?php } ?>
                      </select>
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "agendamento">
                      <label for="recipient-name" class="col-form-label">Horário:</label>
                       <input type="time" name="horaAgendamento" class="input100 form-control">
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "agendamento">
                      <label for="recipient-name" class="col-form-label">Data do Agendameto:</label>
                       <input type="date" name="dataAgendamento" class="input100 form-control">
                      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                            
                                    <?php 
                            $dado = $pdo->query("SELECT DISTINCT * FROM cliente where email = '$logado'") ;
                              foreach ($dado as $row) { ?>
                            
                            <input type="hidden" value="<?php echo $row['codCliente'] ?>" name="codCliente">
                            <?php } ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">
                            Agendar
                            </button>
                          </div>
                    </form>
                        </div>
                      </div>
                    </div>
                     <!-- /.div modal--> 
                    </div>
                </div>
              </div>
                
                
                <?php } ?>
              
            </div>
            <!-- /.div filtros-->
            
        </div>
        <!-- /.div principal -->
    </div>
  <!-- /.row-->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark" style="margin-top: 100px;">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Salões Plus 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <script type="text/javascript">
     $('#exampleModal').on('show.bs.modal', function (event) {
     var button = $(event.relatedTarget) // Button that triggered the modal
     var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
     var modal = $(this)
     modal.find('.modal-title').text('New message to ' + recipient)
     modal.find('.modal-body input').val(recipient)
})
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>