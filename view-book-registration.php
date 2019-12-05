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
    <script src="js/databaseFunctions.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/items.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">

    <title>Bric do Klaus</title>
    <?php include './includes/inc-session-validation.php';?>

    <style>
        .dropdown-toggle::after {
            content: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 ">
        <div class="row" id="body-row">

            <!-- SIDEBAR -->
            <div id="sidebar-container" class="sidebar-expanded fixed-top">
                <!-- FOTO E NOME DO USUÁRIO -->
                <div class="text-center mt-4 mb-2">
                    <img class="rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mantia/128.jpg" class="img-circle"> <!-- trocar por imagem do usuário -->
                    <div class="text-light mt-2" style="font-size: 20px;">
                        <p>Username</p> <!-- trocar por nome do usuário -->
                    </div>
                </div>
                <!-- FIM DA FOTO E NOME DO USUÁRIO-->

                <ul class="list-group">
                    <!-- SEPARADOR DE MENU -->
                    <li class="list-group-item text-muted">
                        <small>COLEÇÃO</small>
                    </li>
                    <!-- FIM DO SEPARADOR DE MENU -->

                    <!-- MENU COM SUB-MENU 1 -->
                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item">
                        <span class="fa fa-filter fa-fw mr-3"></span>
                        <span class="menu-collapsed">Exibir</span>
                    </a>
                    <!-- CONTEÚDO DO SUB-MENU 1 -->
                    <div id='submenu1' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Todos</span>
                        </a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">HQs</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Livros</span>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Mangas</span>
                        </a>
                    </div>
                    <!-- FIM DO DO SUB-MENU 1 -->
                    
                    <a href="#" class="bg-dark list-group-item">
                        <span class="fa fa-plus fa-fw mr-3"></span>
                        <span class="menu-collapsed">Adicionar Item</span>
                    </a>

                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <span class="fa fa-tasks fa-fw mr-3"></span>
                        <span class="menu-collapsed">Estatísticas</span>
                    </a>

                    <!-- SEPARADOR DE MENU -->
                    <li class="list-group-item text-muted">
                        <small>USUÁRIO</small>
                    </li>
                    <!-- FIM DO SEPARADOR DE MENU -->

                    <!-- MENU COM SUB-MENU 2 -->
                    <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item">
                        <span class="fa fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Perfil</span>
                    </a>
                    <!-- CONTEÚDO DO SUB-MENU 1 -->
                    <div id='submenu2' class="collapse sidebar-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Editar</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                            <span class="menu-collapsed">Senha</span>
                        </a>
                    </div>
                    <!-- FIM DO SUB-MENU 1 -->

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
                </ul>

                <!-- LOGO -->
                <div style="position: absolute; bottom: 0; left: 0;">
                    <img src="images/Logo.png" style="width: 230px;">
                    <div class="text-light mt-2" style="font-size: 20px;">
                        <p style="margin-left: 2rem;">© Klaus D. Galm</p>
                    </div>
                </div>
                <!-- FIM DO LOGO -->
            </div>
            <!-- FIM DO SIDEBAR -->
            
            <!-- MAIN -->
            <div class="col" style="margin-left: 15rem;">
                <h1>
                    Adicionar Item
                </h1>

                <div class="container-fluid my-2" style="height: 87vh;">
                    <!-- FORM DE INSERÇÃO DE ITENS -->
                    <form class="form row" name="book-registration" action="controller-register_book.php" method="POST" enctype="multipart/form-data" onsubmit="return ValidateBooksRegistration();">
                        <div class="card col-12 p-0">
                            <!-- CAMPOS PRINCIPAIS HEAD -->
                            <a class="card-header collapse-link" data-toggle="collapse" href="#multiCollapseExample1"
                                aria-expanded="false" aria-controls="multiCollapseExample1">
                                <h4>Campos Principais</h4>
                            </a>
                            <!-- CAMPOS PRINCIPAIS BODY -->
                            <div class="card-body row py-1 pr-3 show" id="multiCollapseExample1">

                                <div class="form-group col-4">
                                    <label for="input-titulo"><strong>Titulo</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm" id="titulo"
                                        name="input-titulo">
                                </div>

                                <div class="form-group col-4">
                                    <label for="input-titulo"><strong>Titulo Original</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="titulo-original" name="input-titulo-original">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-4">
                                    <label for="input-titulo"><strong>Autor</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm" id="autor"
                                        name="input-autor" onkeyup="pesqref(this)">
                                    <div class="pt-1" id="autor-list"></div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-titulo"><strong>Lingua</strong></label>
                                    <select class="custom-form form-control custom-select custom-select-sm dropdown"
                                        id="lingua" name="input-lingua">
                                        <!-- ESPAÇO PREENCHIDO VIA AJAX -->
                                    </select>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-titulo"><strong>Categoria</strong></label>
                                    <select class="custom-form form-control custom-select custom-select-sm dropdown"
                                        id="categoria" name="input-categoria" onchange="ToggleCatFormInput(this);">
                                        <!-- ESPAÇO PREENCHIDO VIA AJAX -->
                                    </select>
                                </div>

                                <div class="form-group col-8" id="input-ilustrador-div" style="display: none;">
                                    <label for="input-titulo"><strong>Ilustrador</strong></label>
                                    <input type="text" class="custom-form form-control custom-select-sm"
                                        id="input-ilustrador" name="input-ilustrador">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="input-titulo"><strong>Descrição</strong></label>
                                    <textarea name="input-desc" id="desc" cols="30" rows="5"
                                        class="custom-form form-control"></textarea>
                                </div>
                            </div>
                            <!-- FIM DOS CAMPOS PRINCIPAIS -->



                            <!-- CARACTERÍSTICAS GERAIS HEAD -->
                            <a class="card-header collapse-link" data-toggle="collapse" href="#multiCollapseExample2"
                                aria-expanded="false" aria-controls="multiCollapseExample2">
                                <h4>Características Gerais</h4>
                            </a>
                            <!-- CARACTERÍSTICAS GERAIS BODY -->
                            <div class="card-body row py-1 pr-3 collapse" id="multiCollapseExample2">
                                <div class="form-group col-12 ">
                                    <label for="input-genero"><strong>Generos</strong></label>
                                    <div class="custom-form form-control form-control-sm" id="genero">
                                        <!-- ESPAÇO PREENCHIDO VIA AJAX -->
                                    </div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-editora"><strong>Editora</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="editora" name="input-editora" onkeyup="pesqref2(this);">
                                    <div class="pt-1" id="editora-list"></div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-datapub"><strong>Data de Publicação</strong></label>
                                    <input class="custom-form form-control form-control-sm input-date"
                                        name="input-datapub" id="input-datapub">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-1">
                                    <label for="input-paginas"><strong>N. de Páginas</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="paginas" name="input-paginas">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-1">
                                    <label for="input-preco-capa"><strong>R$ de Capa</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="preco-capa" name="input-preco-capa" onblur="NumberInputFormatter(this);">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-colecao"><strong>Coleção</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="colecao" name="input-colecao" onkeyup="pesqref(this);">
                                    <div class="position-fixed pt-1" id="colecao-list"></div>
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-4">
                                    <label for="input-link-amaz"><strong>Link da Amazon</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="titulo" name="input-link-amaz">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="input-foto-capa"><strong>Foto da Capa</strong></label>
                                    <input type="file" class="custom-form form-control form-control-sm"
                                        id="input-foto-capa" name="input_foto_capa">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-tipo-capa"><strong>Tipo de Capa</strong></label>
                                    <select class="custom-form form-control custom-select custom-select-sm dropdown"
                                        id="tipo_capa" name="input-tipo-capa">
                                        <!-- ESPAÇO PREENCHIDO VIA AJAX -->
                                    </select>
                                </div>
                            </div>
                            <!-- FIM DAS CARACTERÍSTICAS GERAIS -->

                            <!-- CARACTERÍSTICAS PESSOAIS HEAD -->
                            <a class="card-header collapse-link" data-toggle="collapse"
                                href="#multiCollapseExample3" aria-expanded="false"
                                aria-controls="multiCollapseExample3">
                                <h4>Características Pessoais</h4>
                            </a>
                            <!-- CARACTERÍSTICAS PESSOAIS BODY -->
                            <div class="card-body row py-1 pr-3 collapse multi-collapse" id="multiCollapseExample3">
                                <div class="form-group col-2">
                                    <label for="input-data-compra"><strong>Data da Compra</strong></label>
                                    <input class="custom-form form-control form-control-sm input-date"
                                        name="input-data-compra" id="input-data-compra">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-1">
                                    <label for="input-valor-pago"><strong>R$ Pago</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="input-valor-pago" name="input-valor-pago" onblur="NumberInputFormatter(this);">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-condicao"><strong>Condição</strong></label>
                                    <select class="custom-form form-control custom-select custom-select-sm dropdown"
                                        id="condicao" name="input-condicao">
                                        <!-- ESPAÇO PREENCHIDO VIA AJAX -->
                                    </select>
                                </div>

                                <div class="form-group col-3 ">
                                    <label for="input-venda"><strong>A Venda?</strong></label>
                                    <div class="custom-form form-control d-flex form-control-sm">
                                        <label class="col"><input type="radio" name="input-venda" value="1">
                                            Sim</label>
                                        <label class="col"><input type="radio" name="input-venda" value="0" checked>
                                            Não</label>
                                    </div>
                                </div>

                                <div class="form-group col-1">
                                    <label for="input-preco-venda"><strong>R$ de Venda</strong></label>
                                    <input type="text" class="custom-form form-control form-control-sm"
                                        id="preco-venda" name="input-preco-venda" onblur="NumberInputFormatter(this);">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-2">
                                    <label for="input-estatus-leitura"><strong>Estatus de
                                            Leitura</strong></label>
                                    <select class="custom-form form-control custom-select custom-select-sm dropdown"
                                        id="estatus_leitura" name="input-estatus-leitura" onchange="ToggleReadFormInput(this);">
                                        <!-- ESPAÇO PREENCHIDO VIA AJAX -->
                                    </select>
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-2 mr-2" id="input-dta-i-div" style="display: none;">
                                    <label for="input-datai"><strong>Data Inicial</strong></label>
                                    <input class="custom-form form-control form-control-sm input-date"
                                        name="input-datai" id="input-datai">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>

                                <div class="form-group col-2 mr-2" id="input-dta-f-div" style="display: none;">
                                    <label for="input-dataf"><strong>Data Final</strong></label>
                                    <input class="custom-form form-control form-control-sm input-date"
                                        name="input-dataf" id="input-dataf">
                                    <div class="text-muted small">(Campo Opcional)</div>
                                </div>
                            </div>
                            <!-- FIM DAS CARACTERÍSTICAS PESSOAIS -->
                        </div>
                        <button type="submit"
                            class="btn btn-success fixed-bottom m-3 rounded-circle fa fa-chevron-right fa-lg"
                            id="btn-addbook-submit">
                        </button>
                    </form>
                </div>
            </div><!-- Main Col END -->
        </div><!-- body-row END -->
    </div>

    <script>
        $('#input-data-compra').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4'
        });
        $('#input-datapub').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4'
        });
        $('#input-datai').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4'
        });
        $('#input-dataf').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4'
        });
    </script>


</body>

</html>