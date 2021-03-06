<?php
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
<link rel="stylesheet" type="text/css" href="../../../css/homeCliente.css">
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
          <li class="nav-item active">
            <a class="nav-link" href="servico.php">Serviços</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="AgendamentosSalao.php">Agendamentos</a>
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
    <div class="container h-100">
      <div class="row h-100 align-items-center back">
        <div class="col-lg-12">
          

        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">
    <div class="index">
      <h1>Salão Plus</h1>
      <p>A equipe SalãoPlus tem como principal objetivo agilizar a sua vida! com o nosso sistema os salões obterão um maior controle e gerência de tempo. Assim facilitando a vida do consumidor final, podendo realizar o agendamento de serviços em qualquer salão e a qualquer hora!</p>
      <a href="#Destaques">Destaques</a>
    </div>
    <div id="Destaques">
      <h1>Destaques</h1>
    </div>
    <div class="row"  style="margin-top: 250px">
      
      <div class="col-md-4 mb-5">
        <div class="card h-100">

          <img class="card-img-top" src="../../../img/lequipe.png" alt="">
          <div class="card-body">
            <h4 class="card-title">L'Equipe</h4>
            <p class="card-text" align="justify">O salão de beleza L'Equipe oferece uma equipe formado por especialistas com o objetivo de proporcionar experiências inovadoras em cortes de cabelo, coloração e estética do corpo.</p>
          </div>
          <div class="card-footer">
            <a href="../../pages/login.html" class="btn btn-primary"style="background-color: #00BFFF;">Agendar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="../../../img/beleza.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Beleza Oculta</h4>
            <p class="card-text" align="justify"> Salão Beleza Oculta faz com que a ida ao salão se torne um momento prazeroso. Eles ostentam uma equipe de profissionais competentes, com os melhores cursos da área, para garantir aquele resultado incrível para você. </p>
          </div>
          <div class="card-footer">
            <a href="../../pages/login.html" class="btn btn-primary"style="background-color: #00BFFF"; >Agendar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="../../../img/daqua.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">D'aque</h4>
            <p class="card-text" align="justify">Unhas maravilhosas, penteados divos, e cabelos musos. Na D'aque você encontra resultados incríveis para se inspirar para a próxima transformação.</p>
          </div>
          <div class="card-footer">
            <a href="../../pages/login.html" class="btn btn-primary" style="background-color: #00BFFF;">Agendar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->

  <a name="sobre">
  <footer class="page-footer font-small stylish-color-dark pt-4" style="background-color: rgb(23, 36, 41);" id="sobre">

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
</a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>