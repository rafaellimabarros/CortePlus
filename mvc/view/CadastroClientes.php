<?php
  function __autoload($class_name){
    require '../model/'.$class_name.'.php';
}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Salões Plus</title>
  <link rel="stylesheet" href="../../css/router.css">
  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/business-frontpage.css" rel="stylesheet">
  <!-- Css Router-->
  
</head>

<body>
  <?php
    $cliente = new Cliente();
    if(isset($_POST['cadastrar'])):
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $data = $_POST['data'];
      $bairro = $_POST['bairro'];
      $cidade = $_POST['cidade'];
      $contato = $_POST['contato'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      if($nome == ''){
      echo "Digite seu nome";
      return false;
    }
      
      $cliente->setNome($nome);
      $cliente->setCpf($cpf);
      $cliente->setData($data);
      $cliente->setBairro($bairro);
      $cliente->setCidade($cidade);
      $cliente->setContato($contato);
      $cliente->setEmail($email);
      $cliente->setSenha($senha);

      if($cliente->insert()){
      echo "<script>inserido com sucesso!</script>";
    }else{
      echo "<script>não deu certo</script>script>";
  }
    endif;

  ?>

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
            <a class="nav-link" href="#">Sobre Nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cadastro/Login</a>
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
        </div>
      </div>
    </div>
  </header>
  <!-- Formulario Cadastro de Clientes -->
  <div class="form">
    <h3>Cadastro de Clientes</h3>
    <form method="post" action="">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputNome">Nome</label>
          <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
        </div>
        <div class="form-group col-md-6">
          <label for="inputCPF">CPF</label>
          <input type="number" class="form-control" id="inputCPF" placeholder="CPF" required="true" 
          name="cpf">
        </div>
        <div class="form-group col-md-6">
          <label for="inputData">Data de Nascimento</label>
          <input type="date" class="form-control" id="inputData" placeholder="Data de Nascimento" required="true" name="data">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Bairro</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required="true" name="bairro">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Cidade</label>
          <input type="text" class="form-control" id="inputCity" placeholder="Cidade" required="true" name="cidade">
        </div>
        <div class="form-group col-md-6">
          <label for="inputContato">Contato</label>
          <input type="number" class="form-control" id="inputContato" placeholder="Contato" required="true"
          name="contato">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required="true" name="email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Senha</label>
          <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" required="true" name="senha">
        </div>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck" required="true">
          <label class="form-check-label" for="gridCheck">
            Confirma os dados ?
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" >Cadastrar</button>
    </form>
  </div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Salões Plus 2019</p>
    </div>
    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
