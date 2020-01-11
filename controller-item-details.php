<?php
include 'Includes/inc-mysql-connect.php';

function getNome($link, $table, $field, $value) {
    $result = mysqli_query($link, "SELECT nome FROM $table WHERE $field=$value;");
    $array  = mysqli_fetch_assoc($result);
    return $array['nome'];
}

//Variáveis para uso futuro
$preco_antigo = "";

$retorno = "";

$id = $_POST['value'];
$id = substr($id, 5);

$sql = "SELECT * FROM livro WHERE id_book=$id;";

$result   = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    $array = mysqli_fetch_assoc($result);

    //Armazena os valores em variáveis
    $titulo             = $array['title'];
    $orig_titulo        = $array['title_original'];
    $id_autor           = $array['id_author'];
    $id_ilustrador      = $array['id_illustrator']; //Implementar
    $dta_pub            = $array['publish_date'];
    $paginas            = $array['nr_pages'];
    $foto_capa          = $array['image_cover'];
    $descricao          = $array['descri'];
    $id_editora         = $array['id_publisher'];
    $id_categoria       = $array['id_category'];
    $preco_capa         = $array['retail_price'];
    $id_condicao        = $array['id_condition'];
    $preco_venda        = $array['preco_venda'];
    $link_amazon        = $array['link_amazon'];
    $id_lingua          = $array['id_language'];
    $id_colecao         = $array['id_collection'];
    $id_tipo_capa       = $array['id_tipo_capa'];

    //CALCULA A DIFERENÇA DO VALOR DE CAPA PARA O VALOR DE VENDA
    $dif = $preco_capa - $preco_venda;
    $desconto = round(100 * ($dif / $preco_capa));

    //FORMATA A DATA PARA O PADRÃO BRASILEIRO
    $dta_pub_formatada = date("d/m/Y", strtotime($dta_pub));

    //PEGA O NOME DO AUTOR NO BANCO
    $autor = getNome($link, "autor", "id_author", $id_autor);
    //PEGA O NOME DA EDITORA NO BANCO
    $editora = getNome($link, "editora", "id_publisher", $id_editora);
    //PEGA O NOME DA CATEGORIA NO BANCO
    $categoria = getNome($link, "categoria", "id_category", $id_categoria);
    //PEGA O NOME DA CONDIÇÃO NO BANCO
    $condicao = getNome($link, "condicao", "id_condition", $id_condicao);
    //PEGA O NOME DO IDIOMA NO BANCO
    $idioma = getNome($link, "lingua", "id_language", $id_lingua);
    //PEGA O NOME DA COLEÇÃO NO BANCO
    if ($id_colecao) {
        $colecao = getNome($link, "colecao", "id_collection", $id_colecao);
        $colecaoHTML = "            <p><strong>Coleção: &ensp; </strong> <span>$colecao</span></p>";
    }
    //PEGA O NOME DO TIPO DE CAPA NO BANCO
    $capa = getNome($link, "tipo_capa", "id_tipo_capa", $id_tipo_capa);
    
    $retorno_titulo = "$titulo<span> ($idioma)</span>";

    $retorno_filtro = " ";

    $retorno .= "<h4 id='cabecalho-text'></h4>";
    $retorno .= "<div class='product-entry-full'>";
    $retorno .= "    <div class='product-img-full'";
    $retorno .= "        style='background-image: url(images/covers/$foto_capa.jpg);'>";
    $retorno .= "    </div>";
    $retorno .= "    <div class='price-row'>";
    $retorno .= "        <div class='price-box'>";
    $retorno .= "            <p>R$$preco_venda</p>";
    $retorno .= "            <span>Preço de Capa: <span class='old-price'>R$$preco_capa</span></span> <br>";
    $retorno .= "            <span class='text-muted txt-small'>Você economiza: R$$dif ($desconto%)</span>";
    $retorno .= "        </div>";
    $retorno .= "    </div>";
    $retorno .= "    <div>";
    $retorno .= "        <span>Compare o preço:</span>";
    $retorno .= "        <a href='$link_amazon' target='_blank'><img class='w-100' src='images/amazon_logo.svg' alt='amazon-logo'></a>";
    $retorno .= "    </div>";
    // $retorno .= "    <div class='cart-button'>";
    // $retorno .= "        <button class='btn btn-success' onclick='addToCart();'>Adicionar ao carrinho</button>";
    // $retorno .= "    </div>";
    $retorno .= "</div>";
    $retorno .= "<div class='content-divider'>";
    $retorno .= "    <div class='details-container'>";
    $retorno .= "        <div class='description-row'>";
    $retorno .= "            <h5><strong>Descrição:</strong></h5>";
    $retorno .= "            <p>$descricao</p>";
    $retorno .= "        </div>";
    $retorno .= "        <div class='horizontal-divider'></div>";
    $retorno .= "        <div class='details-row'>";
    $retorno .= "            <p><strong>Titulo Original: &ensp;</strong><span>$orig_titulo</span></p>";
    $retorno .= "            <p><strong>Autor: &ensp; </strong> <span>$autor</span></p>";
    $retorno .= "            <p><strong>Editora: &ensp; </strong> <span>$editora</span></p>";
    $retorno .= "            <p><strong>Idioma: &ensp; </strong> <span>$idioma</span></p>";
    $retorno .= "            <p><strong>Nro. Páginas: &ensp; </strong> <span>$paginas</span></p>";
    $retorno .= "            <p><strong>Tipo de Capa: &ensp; </strong> <span>$capa</span></p>";
    $retorno .= "            <p><strong>Condição: &ensp; </strong> <span>$condicao</span></p>";
    $retorno .= "            <p><strong>Tipo: &ensp; </strong> <span>$categoria</span></p>";
    $retorno .= "            <p><strong>Data de Lançamento: &ensp; </strong><span>$dta_pub_formatada</span></p>";
    if ($id_colecao) {
        $retorno .= "            <p><strong>Coleção: &ensp; </strong> <span>$colecao</span></p>";
    }
    $retorno .= "        </div>";
    $retorno .= "    </div>";
    $retorno .= "</div>";

    echo $retorno_titulo . "*" . $retorno_filtro . "*" . $retorno;

} else {
    echo "Não Encontrado.";
}

mysqli_close($link);
