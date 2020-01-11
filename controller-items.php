<?php
include 'Includes/inc-mysql-connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getNome($link, $table, $field, $value)
{
    $result = mysqli_query($link, "SELECT nome FROM $table WHERE $field=$value;");
    $array  = mysqli_fetch_assoc($result);
    return $array['nome'];
}

//Values => Query - Arrays
$display_types = array(
    'thumb' => "SELECT id_book, title, image_cover, preco_venda FROM livro WHERE for_sale = 1 ",
    'list' => "SELECT * FROM livro WHERE for_sale = 1 "
);

$filter_types = array(
    'HQs' => "AND id_category = 1 ",
    'Livros' => "AND id_category = 2 ",
    'Mangás' => "AND id_category = 3 ",
    'Todos' => ""
);

$sort_types = array(
    'a-z' => 'ORDER BY title ASC;',
    'z-a' => 'ORDER BY title DESC;',
    'menorVal' => 'ORDER BY preco_venda ASC;',
    'maiorVal' => 'ORDER BY preco_venda DESC;'
);
//END of Values => Query - Arrays

//Variáveis para uso futuro
$preco_antigo = "";
$em_promo = "";
$novo_item = "";
//END of Variáveis para uso futuro

//Get values
$display = $_POST['dispay'];
$filter  = $_POST['filter'];
$sort    = $_POST['sort'];
$search  = $_POST['search'];
//END of Get values

if ($search != "") {
    $search_value = "AND title LIKE '$search%' ";
    $sql = $display_types[$display] . $search_value . $sort_types[$sort];
} else {
    $sql = $display_types[$display] . $filter_types[$filter] . $sort_types[$sort];
}

$result   = mysqli_query($link, $sql);
$rows     = mysqli_num_rows($result);
// $array    = mysqli_fetch_assoc($result);

$retorno_titulo = "";
$retorno_filtro = "";
$retorno        = "";

if ($search != "" && $rows > 0) {
    $retorno_titulo = "<h4 id='cabecalho-text'>Bucsa ( $rows )</h4><div id='filtro-adv' class='ml-auto'></div>";
} else {
    $retorno_titulo = "<h4 id='cabecalho-text'>$filter ( $rows )</h4><div id='filtro-adv' class='ml-auto'></div>";
}

$retorno_filtro .= "<p id='sortby' style='margin: 0 15px 0 0; width 10rem;'>Odernar por: </p>";
$retorno_filtro .= "<select class='custom-form form-control custom-select custom-select-sm dropdown' id='sort-options' name='sort-options'>";
$retorno_filtro .= "    <option value='a-z' " . ($sort == 'a-z' ? 'selected' : '') . ">A-Z</option>";
$retorno_filtro .= "    <option value='z-a' " . ($sort == 'z-a' ? 'selected' : '') . ">Z-A</option>";
$retorno_filtro .= "    <option value='menorVal' " . ($sort == 'menorVal' ? 'selected' : '') . ">Menor Preço</option>";
$retorno_filtro .= "    <option value='maiorVal' " . ($sort == 'maiorVal' ? 'selected' : '') . ">Maior Preço</option>";
$retorno_filtro .= "</select>";
$retorno_filtro .= "<button class='btn btn-link' id='item-thumb'>";
$retorno_filtro .= "    <i class='fas fa-th fa-lg' style='height: 100%; width: 100%;'></i>";
$retorno_filtro .= "</button>";
$retorno_filtro .= "<button class='btn btn-link' id='item-list'>";
$retorno_filtro .= "    <i class='fas fa-th-list fa-lg' style='height: 100%; width: 100%;'></i>";
$retorno_filtro .= "</button>";

$retorno_values = "<div id='current-values' data-display-type='$display' data-filter-type='$filter' data-sort-type='$sort'></div>";

if ($rows > 0) {
    while ($array = mysqli_fetch_assoc($result)) {
        $id         = $array['id_book'];
        $filter     = $array['title'];
        $imagem_url = $array['image_cover'];
        $preco      = $array['preco_venda'];

        if ($display == "thumb") {
            $retorno .= "<div class='col-sm-2 col-xs-6 text-center' id='item-$id'>";
            $retorno .= "    <div class='product-entry-thumb'><a class='item-link' onclick=detalhesAjax(this);>";
            $retorno .= "        <div class='product-img' style='background-image: url(images/covers/$imagem_url);'>";
            if ($em_promo != "") {
                $retorno .= "            <p class='tag'><span class='sale'>Sale</span></p>";
            } elseif ($novo_item != "") {
                $retorno .= "            <p class='tag'><span class='new'>New</span></p>";
            }
            $retorno .= "        </div></a>";
            $retorno .= "        <div class='desc'>";
            $retorno .= "            <h5><strong>$filter</strong></h5>";
            $retorno .= "            <p class='price'><span>R$$preco</span>";
            if ($preco_antigo != "") {
                $retorno .= "                <span class='sale'>R$300.00</span>";
            }
            $retorno .= "            </p>";
            $retorno .= "        </div>";
            // $retorno .= "        <div class='cart-button'>";
            // $retorno .= "            <button class='btn btn-success add-cart' data-product-id='$id' data-product-title='$filter' data-product-price='$preco' data-product-image='$imagem_url' onclick='addCart(this)'>Adicionar ao carrinho</button>";
            // $retorno .= "        </div>";
            $retorno .= "    </div>";
            $retorno .= "</div>";
        }

        if ($display == "list") {
            $paginas = $array['nr_pages'];
            //Pega a data e transforma no formato brasileiro
            $dta = date("d/m/Y", strtotime($array['publish_date']));
            //PEGA O NOME DO AUTOR NO BANCO
            $autor = getNome($link, "autor", "id_author", $array['id_author']);
            //PEGA O NOME DA EDITORA NO BANCO
            $editora = getNome($link, "editora", "id_publisher", $array['id_publisher']);

            $retorno .= "<div class='col-sm-4 col-xs-6' id='item-$id'>";
            $retorno .= "    <div class='product-entry-list'><a class='item-link' onclick=detalhesAjax(this);>";
            $retorno .= "        <div class='product-img' style='background-image: url(images/covers/$imagem_url);'>";
            if ($em_promo != "") {
                $retorno .= "            <p class='tag'><span class='sale'>Sale</span></p>";
            } elseif ($novo_item != "") {
                $retorno .= "            <p class='tag'><span class='new'>New</span></p>";
            }
            $retorno .= "        </div></a>";
            $retorno .= "        <div class='desc'>";
            $retorno .= "            <h2><strong>$filter</strong></h2>";
            $retorno .= "            <h3><strong>Autor: </strong>$autor</h3>";
            $retorno .= "            <h3><strong>Editora: </strong>$editora<span> ($dta)</span></h3>";
            $retorno .= "            <h3><strong>$paginas</strong> Páginas</h3>";
            $retorno .= "            <div class='price'>";
            $retorno .= "               <div class='price-text'><p>R$$preco</p></div>";
            if ($preco_antigo != "") {
                $retorno .= "                <span class='sale'>R$300.00</span>";
            }
            // $retorno .= "                <div class='cart-button'>";
            // $retorno .= "                    <button class='btn btn-success add-cart' data-product-id='$id' data-product-title='$filter' data-product-price='$preco' data-product-image='$imagem_url' onclick='addCart(this)'><i class='fas fa-shopping-cart'></i></button>";
            // $retorno .= "                </div>";
            $retorno .= "            </div>";
            $retorno .= "        </div>";
            $retorno .= "    </div>";
            $retorno .= "</div>";
        }
    }
    echo $retorno_titulo . "*" . $retorno_filtro . "*" . $retorno . "*" . $retorno_values;
    // echo $retorno_filtro . "*" . $retorno;
} else {
    $retorno = "Nenhum item encontrado.";
    echo $retorno_titulo . "*" . $retorno_filtro . "*" . $retorno . "*" . $retorno_values;
    // echo $retorno_filtro . "*" . $retorno;
}


mysqli_close($link);
