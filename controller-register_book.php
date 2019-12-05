<?php
    //Sql connection
    include 'Includes/inc-mysql-connect.php';
    include 'Includes/inc-main.php';

    //Constantes
    define('INDEX', "view-book-registration.php");

   function RandomImageName($nome)
   {
          $s = strtoupper(md5(uniqid(rand(), true)));
          $guidText =
              substr($s, 0, 8) . '-' .
              substr($s, 8, 4) . '-' .
              substr($s, 12, 4). '-' .
              substr($s, 16, 4). '-' .
              substr($s, 20);
          return $guidText;
   }

   function TrataImagem($titulo)
   {
       $imagem_novo_nome = RandomImageName($titulo);
       move_uploaded_file($_FILES['input_foto_capa']['tmp_name'], SITE_ROOT.'/images/covers/'.$imagem_novo_nome.'.jpg');
       return $imagem_novo_nome;
   }

    //Ger variables from form //
    $titulo          = $_POST['input-titulo'];
    $orig_titulo     = $_POST['input-titulo-original'];
    $autor           = $_POST['input-autor'];
    $lingua          = $_POST['input-lingua'];
    $categoria       = $_POST['input-categoria'];
    $ilustrador      = $_POST['input-ilustrador'];
    $descricao       = $_POST['input-desc'];
    $genero          = $_POST['input-genero'];
    $editora         = $_POST['input-editora'];
    $data_publicacao = $_POST['input-datapub'];
    $paginas         = $_POST['input-paginas'];
    $preco_capa      = $_POST['input-preco-capa'];
    $colecao         = $_POST['input-colecao'];
    $link_amazon     = $_POST['input-link-amaz'];
    $tipo_capa       = $_POST['input-tipo-capa'];
    $dta_compra      = $_POST['input-data-compra'];
    $valor_pago      = $_POST['input-valor-pago'];
    $condicao        = $_POST['input-condicao'];
    $a_venda         = $_POST['input-venda'];
    $preco_venda     = $_POST['input-preco-venda'];
    $status_leitura  = $_POST['input-estatus-leitura'];
    $dta_i           = $_POST['input-datai'];
    $dta_f           = $_POST['input-dataf'];

    //Tratar campos antes de armazenar no banco

    //Verifica se existe o autor no banco. Se não, adiciona.
    if ($result = mysqli_query($link, "SELECT id_author FROM autor WHERE nome='".$_POST['input-autor']."';")) {
        if (mysqli_num_rows($result) == 0) {
            if (!($insert_result = mysqli_query($link, "INSERT INTO autor (nome) VALUES ('".$_POST['input-autor']."');"))) {
                echo "alert('".$_POST['input-autor']."' Não cadastrado!');";
            }
        }
        if ($result = mysqli_query($link, "SELECT id_author FROM autor WHERE nome='".$_POST['input-autor']."';")) {
            $array = mysqli_fetch_assoc($result);
            $autor_id =  $array['id_author'];
        }
    }
    //Verifica se existe a editora no banco. Se não, adiciona.
    if ($result = mysqli_query($link, "SELECT id_publisher FROM editora WHERE nome='".$_POST['input-editora']."';")) {
        if (mysqli_num_rows($result) == 0) {
            if (!($insert_result = mysqli_query($link, "INSERT INTO editora (nome) VALUES ('".$_POST['input-editora']."');"))) {
                echo "alert('".$_POST['input-editora']."' Não cadastrado!');";
            }
        }
        if ($result = mysqli_query($link, "SELECT id_publisher FROM editora WHERE nome='".$_POST['input-editora']."';")) {
            $array = mysqli_fetch_assoc($result);
            $editora_id =  $array['id_publisher'];
        }
    }
    //Verifica se existe a coleção no banco. Se não, adiciona.
    if ($_POST['input-colecao'] != "") {
        if ($result = mysqli_query($link, "SELECT id_collection FROM saga WHERE nome='".$_POST['input-colecao']."';")) {
            if (mysqli_num_rows($result) == 0) {
                if (!($insert_result = mysqli_query($link, "INSERT INTO saga (nome) VALUES ('".$_POST['input-colecao']."');"))) {
                    echo "alert('".$_POST['input-colecao']."' Não cadastrado!');";
                }
            }
            if ($result = mysqli_query($link, "SELECT id_collection FROM saga WHERE nome='".$_POST['input-colecao']."';")) {
                $array = mysqli_fetch_assoc($result);
                $colecao_id =  $array['id_collection'];
            }
        }
    } else {
        $colecao_id = "";
    }
    //Verifica se tem ilustrador e verifica se esxite no banco. Se não existe no banco, adiciona.
    $ilustrador_id = 1;
    if ($categoria == "hq" || $categoria == "manga") {
        if ($ilustrador != "") {
            $ilustrador_id = VerificaEAdiciona($link, $ilustrador, "ilustrador", "id_ilustrador");
        }
    }
    //Pega o ID da lingua.
    if ($result = mysqli_query($link, "SELECT id_language FROM lingua WHERE nome LIKE '".$_POST['input-lingua']."%';")) {
        $array = mysqli_fetch_assoc($result);
        $lingua_id =  $array['id_language'];
    }
    //Pega o ID da categoria.
    if ($result = mysqli_query($link, "SELECT id_category FROM categoria WHERE nome='".$_POST['input-categoria']."';")) {
        $array = mysqli_fetch_assoc($result);
        $categoria_id =  $array['id_category'];
    }
    //Pega o ID do tipo de capa.
    if ($result = mysqli_query($link, "SELECT id_tipo_capa FROM tipo_capa WHERE nome='".$_POST['input-tipo-capa']."';")) {
        $array = mysqli_fetch_assoc($result);
        $tipo_capa_id =  $array['id_tipo_capa'];
    }
    //Pega o ID da condição.
    if ($result = mysqli_query($link, "SELECT id_condition FROM condicao WHERE nome='".$_POST['input-condicao']."';")) {
        $array = mysqli_fetch_assoc($result);
        $condicao_id =  $array['id_condition'];
    }
    //Pega o ID do status de leitura.
    if ($result = mysqli_query($link, "SELECT id_reading_status FROM estatus_leitura WHERE nome='".$_POST['input-estatus-leitura']."';")) {
        $array = mysqli_fetch_assoc($result);
        $status_leitura_id =  $array['id_reading_status'];
    }
    //Trata as imagens.
    $capa_novo_nome = TrataImagem($titulo);
    //Trata as datas.
    $data_publicacao = str_replace("-", "", $data_publicacao);
    $dta_compra      = str_replace("-", "", $dta_compra);
    $dta_i           = str_replace("-", "", $dta_i);
    $dta_f           = str_replace("-", "", $dta_f);

    //Monta o SQL
    $livro_sql = "INSERT INTO livro ( title, for_sale, ";
    if ($orig_titulo != "") {
        $livro_sql .= "title_original, ";
    }
    if ($autor != "") {
        $livro_sql .= "id_author, ";
    }
    if ($lingua != "none") {
        $livro_sql .= "id_language, ";
    }
    if ($categoria != "none") {
        $livro_sql .= "id_category, ";
    }
    if ($ilustrador != "none") {
        $livro_sql .= "id_illustrator, ";
    }
    if ($descricao != "") {
        $livro_sql .= "descri, ";
    }
    if ($editora != "") {
        $livro_sql .= "id_publisher, ";
    }
    if ($data_publicacao != "") {
        $livro_sql .= "publish_date, ";
    }
    if ($paginas != "") {
        $livro_sql .= "nr_pages, ";
    }
    if ($preco_capa != "") {
        $livro_sql .= "retail_price, ";
    }
    if ($colecao != "") {
        $livro_sql .= "id_collection, ";
    }
    if ($link_amazon != "") {
        $livro_sql .= "link_amazon, ";
    }
    if ($tipo_capa != "none") {
        $livro_sql .= "id_tipo_capa, ";
    }
    if ($dta_compra != "") {
        $livro_sql .= "purchase_date, ";
    }
    if ($valor_pago != "") {
        $livro_sql .= "purchased_price, ";
    }
    if ($condicao != "none") {
        $livro_sql .= "id_condition, ";
    }
    if ($preco_venda != "") {
        $livro_sql .= "preco_venda, ";
    }
    if ($dta_i != "") {
        $livro_sql .= "start_reading_date, ";
    }
    if ($dta_f != "") {
        $livro_sql .= "finished_reading_date, ";
    }
    if ($status_leitura != "none") {
        $livro_sql .= "id_reading_status, ";
    }

    $livro_sql .= "image_cover) VALUES ('$titulo', $a_venda, ";

    if ($orig_titulo != "") {
        $livro_sql .= "'$orig_titulo', ";
    }
    if ($autor != "") {
        $livro_sql .= "$autor_id, ";
    }
    if ($lingua != "none") {
        $livro_sql .= "$lingua_id, ";
    }
    if ($categoria != "none") {
        $livro_sql .= "$categoria_id, ";
    }
    if ($ilustrador != "none") {
        $livro_sql .= "$ilustrador_id, ";
    }
    if ($descricao != "") {
        $livro_sql .= "'$descricao', ";
    }
    if ($editora != "") {
        $livro_sql .= "$editora_id, ";
    }
    if ($data_publicacao != "") {
        $livro_sql .= "$data_publicacao, ";
    }
    if ($paginas != "") {
        $livro_sql .= "$paginas, ";
    }
    if ($preco_capa != "") {
        $livro_sql .= "$preco_capa, ";
    }
    if ($colecao != "") {
        $livro_sql .= "$colecao_id, ";
    }
    if ($link_amazon != "") {
        $livro_sql .= "'$link_amazon', ";
    }
    if ($tipo_capa != "none") {
        $livro_sql .= "$tipo_capa_id, ";
    }
    if ($dta_compra != "") {
        $livro_sql .= "$dta_compra, ";
    }
    if ($valor_pago != "") {
        $livro_sql .= "$valor_pago, ";
    }
    if ($condicao != "none") {
        $livro_sql .= "$condicao_id, ";
    }
    if ($preco_venda != "") {
        $livro_sql .= "$preco_venda, ";
    }
    if ($dta_i != "") {
        $livro_sql .= "$dta_i, ";
    }
    if ($dta_f != "") {
        $livro_sql .= "$dta_f, ";
    }
    if ($status_leitura != "none") {
        $livro_sql .= "$status_leitura_id, ";
    }

    $livro_sql .= "'$capa_novo_nome');";
    //Fim da montagem do SQL


    $livro_result = mysqli_query($link, $livro_sql);

    if (!$livro_result) {
        InvalidParameterAlert("Falha ao cadastrar o livro", INDEX);
    } else {
        //Pega o id do livro que acabou de ser inserido
        $livro_id_sql    = "SELECT id_book FROM livro WHERE title='$titulo'";
        $livro_id_result = mysqli_query($link, $livro_id_sql);
        $livro_id_array  = mysqli_fetch_assoc($livro_id_result);
        $livro_id        = $livro_id_array['id_book'];

        //Trata os generos.
        foreach ($genero as $item) {
            //Pega o id do subgenero no banco
            if ($result = mysqli_query($link, "SELECT id_genre FROM genero WHERE nome = '".$item."';")) {
                $array = mysqli_fetch_assoc($result);
                $genero_id =  $array['id_genre'];
            }

            $insert_sql = "INSERT INTO livro_genero (id_book, id_genre)
                        VALUES ($livro_id, $genero_id)";

            if (!mysqli_query($link, $insert_sql)) {
                InvalidParameterAlert("Failed to add relation", INDEX);
            }
        }
        mysqli_close($link);
        Redirect("view-index-admin.php");
    }
