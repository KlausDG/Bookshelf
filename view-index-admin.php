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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/items.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Bric do Klaus</title>
    <?php include './includes/inc-session-validation.php';?>

    <style>
        .dropdown-toggle::after {
            content: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- Bootstrap row -->
        <div class="row" id="body-row">
            <!-- Sidebar -->
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
                <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->

                <!-- User photo and name -->
                <div class="text-center mt-4 mb-2">
                    <img class="rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mantia/128.jpg"
                        class="img-circle">
                    <div class="text-light mt-2" style="font-size: 20px;">
                        <p>Username</p>
                    </div>
                </div>
                <!-- END - User photo and name -->

                <!-- Bootstrap List Group -->
                <ul class="list-group">
                    <!-- Separator with title -->
                    <li
                        class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>COLEÇÃO</small>
                    </li>
                    <!-- /END Separator -->
                    <!-- Menu with submenu -->
                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false"
                        class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-filter fa-fw mr-3"></span>
                            <span class="menu-collapsed">Exibir</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu1' class="collapse sidebar-submenu">
                        <a class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed filtro-btn" value="Todos">Todos</span>
                        </a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed filtro-btn" value="HQs">HQs</span>
                        </a>
                        <a class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed filtro-btn" value="Livros">Livros</span>
                        </a>

                        <a class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed filtro-btn" value="Mangás">Mangás</span>
                        </a>
                    </div>
                    <a href="view-book-registration.php" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-plus fa-fw mr-3"></span>
                            <span class="menu-collapsed">Adicionar Item</span>
                        </div>
                    </a>
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-tasks fa-fw mr-3"></span>
                            <span class="menu-collapsed">Estatísticas</span>
                        </div>
                    </a>
                    <!-- Separator with title -->
                    <li
                        class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>USUÁRIO</small>
                    </li>
                    <!-- /END Separator -->
                    <a href="#submenu2" data-toggle="collapse" aria-expanded="false"
                        class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-user fa-fw mr-3"></span>
                            <span class="menu-collapsed">Perfil</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                    </a>
                    <!-- Submenu content -->
                    <div id='submenu2' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Editar</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Senha</span>
                        </a>
                    </div>

                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-calendar fa-fw mr-3"></span>
                            <span class="menu-collapsed">Calendar</span>
                        </div>
                    </a>
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-envelope-o fa-fw mr-3"></span>
                            <span class="menu-collapsed">Messages <span
                                    class="badge badge-pill badge-primary ml-2">5</span></span>
                        </div>
                    </a>
                    <!-- Separator without title -->
                    <li class="list-group-item sidebar-separator menu-collapsed"></li>
                    <!-- /END Separator -->
                    <a href="#" data-toggle="sidebar-colapse"
                        class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                            <span id="collapse-text" class="menu-collapsed">Collapse</span>
                        </div>
                    </a>
                </ul><!-- List Group END-->
            </div><!-- sidebar-container END -->
            <!-- Logo -->
            <div style="position: absolute; bottom: 0; left: 0;">
                <img src="images/Logo.png" style="width: 230px;">
                <div class="text-light mt-2" style="font-size: 20px;">
                    <p style="margin-left: 2rem;">© Klaus D. Galm</p>
                </div>
            </div>
            <!-- END Logo -->

            <!-- MAIN -->
            <div class="col">

                <h1>
                    Coleção
                    <small class="text-muted">( 354 )</small>
                </h1>

                <div class="card">
                    <h4 class="card-header" id="cabecalho"></h4>
                    <div class="card-body py-0 pr-0" style="height: 85vh;">
                        <div class="row card-container" id="mostra">
                            <!-- Item Cards Display Here -->

                        </div>
                    </div>
                </div>

            </div><!-- Main Col END -->
        </div><!-- body-row END -->

        <script type="text/javascript">
            $(document).ready(function () {
                $('.filtro-btn').click(function () {
                    $('#cabecalho').html($(this).attr("value"));

                    $.ajax({
                        url: "controller-items.php",
                        method: "POST",
                        data: {
                            value: $(this).attr("value")
                        },
                        success: function (data) {
                            document.getElementById("mostra").innerHTML = data;
                        }
                    });
                });

                $('#cabecalho').html("Todos");
                $.ajax({
                    url: "controller-items.php",
                    method: "POST",
                    data: {
                        value: "SELECT * FROM livro;"
                    },
                    success: function (data) {
                        document.getElementById("mostra").innerHTML = data;
                    }
                });
            });

        </script>

    </body>

</html>