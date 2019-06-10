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
    <!-- row -->
    <div class="row">
        <!-- div principal-->
        <div class="principal">
          <!-- div filtros-->
            <div class="filtros">
             <!-- div filtros por bairro-->
            <!-- <div class="filtroBairro">
               <form name="bairro" method="post" action="">
                <label>Selecione o Bairro:</label>
                <select>
                  <option>Selecione...</option>
                   
                  //abrimos um contador while para que enquanto houver registros ele continua no loopin
                  <?php 
                  $dado = $pdo->query('SELECT DISTINCT bairro FROM salao') ;
                    foreach ($dado as $row) { ?>
                  <option value="<?php echo $row['codSalao'] ?>"><?php echo $row['bairro'] ?></option>
                  <?php } ?>
                </select>
                <label>Selecione a Cidade:</label>
                <select>
                  <label>Selecione a Cidade:</label>
                  <option>Selecione...</option>
                  //abrimos um contador while para que enquanto houver registros ele continua no loopin
                  <?php 
                  $dado = $pdo->query('SELECT DISTINCT cidade FROM salao') ;
                    foreach ($dado as $row) { ?>
                  <option value="<?php echo $row['codSalao'] ?>"><?php echo $row['cidade'] ?></option>
                  <?php } ?>
                </select>
                <button type="button" class="btn btn-primary">
                            Pesquisar
                </button>
              </form>
             </div> -->
             <!-- /.div filtros por Bairro-->

            </div>
            <!-- /.div filtros-->
            <!-- div dados-->

            <div class="dados" style="margin-left: 30%">
              
                <?php 
                  $dado = $pdo->query('SELECT * FROM salao') ;
                  foreach ($dado as $row) {
                  ?>
                   <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="../../../img/salaoslide1.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nomeSalao']; ?></h5>
                        <p class="card-text">Endereço:<?php echo $row['logradouro']; ?></p>
                        <p class="card-text">Bairro:<?php echo $row['bairro']; ?></p>
                        <p class="card-text">Contato:<?php echo $row['contato']; ?></p>
                        <p class="card-text">Email:<?php echo $row['email']; ?></p>
                        
                    <div class="container-login100-form-btn m-t-32">
                      <button class="login100-form-btn btn-primary"  data-toggle="modal" data-target="#exampleModal<?php echo $row['codSalao'];?>" data-whatever="@getbootstrap">
                        <a href="../cliente/Agendamento.php" style="color: white;">Agendamento</a>
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
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Nome:</label>       
                               <h5 class="modal-title" id="exampleModalLabel" name="nome">
                              </div>
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