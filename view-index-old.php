<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <title>Bric do Klaus</title>
  <!-- <?php include './includes/inc-session-validation.php';?> -->

  <style>
    .dropdown-toggle::after {
      content: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <!-- LOGO / HOME BUTTON -->
      <a class="navbar-brand" href="#"><img src="images/logo-teste.png" alt="Logo" style="width: 200px;" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- END LOGO / HOME BUTTON -->

      <!-- NAVBAR LINKS -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="font-size: 24px;">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          
          <div class="border-left ml-2 mr-2"></div>

          <li class="nav-item">
            <a class="nav-link" href="#">Adicionar Item</a>
          </li>

          <div class="border-left ml-2 mr-2"></div>

          <li class="nav-item">
            <a class="nav-link" href="#">Painel de Controle</a>
          </li>

          <div class="border-left ml-2 mr-2"></div>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Sair</a>
          </li>
        </ul>


        <!-- <form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						  </form> -->
      </div>
      <!-- END NAVBAR LINKS -->
    </nav>

    <div class="dropdown float-right dropleft m-1">
      <div class="fa fa-bars" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        style="font-size: 48px;"></div>

      <div class="dropdown-menu mr-2 mt-1" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Todos</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">HQs</a>
        <a class="dropdown-item" href="#">Livros</a>
        <a class="dropdown-item" href="#">Mangas</a>
      </div>
    </div>
  </div>
  <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
		<script src="js/main.js"></script>
		<script src="js/returnTop.js"></script>
    <script src="js/teste.js"></script> -->
</body>

</html>